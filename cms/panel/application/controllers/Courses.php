<?php

class Courses extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "courses_v";

        $this->load->model("CourseDetailModel");
        $this->load->model("CourseModel");

       if(!getActiveUser()){
            redirect(base_url("Login"));
        }


    }

    public function index(){

        $vData = new stdClass();

        $items = $this->CourseModel->getAll(
            array(), "rank ASC"
        );



        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;


        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('Courses'));
        };

    $vData = new stdClass();


    $vData->vFolder = $this->vFolder;
    $vData->subFolder = "add";

    $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

}

    public function save(){

        if(!isAllowedWriteModule()){
            die();
        }

        $this->load->library("form_validation");

            if($_FILES["img_url"]["name"] == ""){

                $alert = array(
                    "title" => lang('failed'),
                    "text"  => lang('choose-an-image'),
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("Courses/NewForm"));
                die();


            }


        $this->form_validation->set_rules("title", lang('title'), "required|trim");
        $this->form_validation->set_rules("event_date", lang('course-date'), "required|trim");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){



                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|ico";
                $config["upload_path"]   = "uploads/$this->vFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("img_url");

                if($upload){

                    $uploadedFile = $this->upload->data("file_name");
                    $user = getActiveUser();


                    $insert = $this->CourseModel->add(
                        array(

                            "title"         => $this->input->post("title"),
                            "description"   => $this->input->post("description"),
                            "url"           => convertToSEO($this->input->post("title")),
                            "by"           => convertToSEO($this->input->post("by")),
                            "img_url"       => $uploadedFile,
                            "rank"          => 0,
                            "isActive"      => 1,
                            "event_date"     => $this->input->post("event_date"),
                            "createdAt"    => date("Y-m-d H:i:s"),
                            "createdBy_id"    => $user->id,
                            "created_ip_address" => $this->input->ip_address()


                        ));


                    if($insert){

                        $alert = array(
                            "title" => lang('successful'),
                            "type" => "success",
                            "text" => lang('save-successful')
                        );

                    } else {

                        $alert = array(
                            "title" => lang('failed'),
                            "type" => "error",
                            "text" => lang('there-is-a-problem')

                        );

                    }

                } else {


                    $alert = array(
                        "title" => lang('failed'),
                        "type" => "error",
                        "text" => lang('there-was-a-problem-loading-image')

                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("Courses/NewForm"));
                    die();

                }





            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Courses"));



        } else {

            $vData = new stdClass();

            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "add";
            $vData->form_error = true;




            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function updateForm($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url('Courses'));
        };

        $vData = new stdClass();

        $item = $this->CourseModel->get(
            array(
                "id"    => $id,
            )
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "update";
        $vData->item = $item;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


    }

    public function update($id){

        if(!isAllowedUpdateModule()){
            die();
        }

        $this->load->library("form_validation");


        $this->form_validation->set_rules("title", lang('title'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

      
        $validate = $this->form_validation->run();

        if($validate) {

            if ($_FILES["img_url"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|ico";
                $config["upload_path"] = "uploads/$this->vFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("img_url");

                if ($upload) {

                    $uploadedFile = $this->upload->data("file_name");
                    $user = getActiveUser();

                    $data = array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "by"           => convertToSEO($this->input->post("by")),
                        "img_url"       => $uploadedFile,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "event_date"     => $this->input->post("event_date"),
                        "updatedAt"     => date("Y-m-d H:i:s"),
                        "updatedBy_id"  => $user->id,
                        "updated_ip_address" => $this->input->ip_address()
                    );

                } else {

                    $alert = array(
                        "title" => lang('failed'),
                        "text" => lang('there-was-a-problem-loading-image'),
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("Courses/update_form/$id"));

                    die();

                }

            } else {
                $user = getActiveUser();

                $data = array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "by"           => convertToSEO($this->input->post("by")),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "event_date"     => $this->input->post("event_date"),
                    "updatedAt"     => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()


                );

            }

            $update = $this->CourseModel->update(array("id" => $id), $data);


           
            if ($update) {

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('update-successful'),
                    "type" => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" => lang('a-problem-occurred-during-the-update'),
                    "type" => "error"
                );
            }

            // The process of writing the Result of the Action to the Session...

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Courses"));

        } else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;


            
            $vData->item = $this->CourseModel->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function detailForm($id){

        $vData = new stdClass();


        $items=$this->CourseModel->get(array("id"=>$id));

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "detail";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);



    }

    public function updateDetail($id){

        $this->load->library("form_validation");


        $this->form_validation->set_rules("price", lang('price'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

      
        $validate = $this->form_validation->run();

        if($validate) {

            $course_terms=explode(';',$this->input->post('course_terms'));
            $course_content=explode(';',$this->input->post('course_content'));
            $course_docs=explode(';',$this->input->post('course_document'));
            $course_time=explode(';',$this->input->post('course_time'));



                    $data = array(

                        "course_price"  => $this->input->post("price"),
                        "course_terms"  =>  $this->input->post("course_terms"),
                        "course_content" =>  $this->input->post("course_content"),
                        "course_document" =>  $this->input->post("course_document"),
                        "course_time"   =>  $this->input->post("course_time"),
                        "updatedAt"     => date("Y-m-d H:i:s")
                    );

            
           

            $update = $this->CourseModel->update(array("id" => $id), $data);

           
            if ($update) {

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('update-successful'),
                    "type" => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" => lang('a-problem-occurred-during-the-update'),
                    "type" => "error"
                );
            }

            // The process of writing the Result of the Action to the Session...

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Courses"));

        } else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "detail";
            $vData->form_error = true;


            
            $vData->items = $this->CourseModel->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }
    
    public function delete($id){

        if(!isAllowedDeleteModule()){
            redirect(base_url($this->router->fetch_class()));
        }

        $delete = $this->CourseModel->delete(
            array(
                "id"    => $id
            )
        );

        if($delete){

            $alert = array(
                "title" => lang('successful'),
                "type" => "success",
                "text" => lang('delete-successful')
            );

        } else {
            $alert = array(
                "title" => lang('failed'),
                "type" => "error",
                "text" => lang('there-is-a-problem')
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("Courses"));

    }

    public function isActiveSetter($id){

        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->CourseModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function rankSetter(){

        if(!isAllowedUpdateModule()){
            die();
        }
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->CourseModel->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

}
