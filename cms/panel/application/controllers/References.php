<?php

class References extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "references_v";

        $this->load->model("ReferenceModel");

       if(!getActiveUser()){redirect(base_url("Login"));}


    }

    public function index(){

        $vData = new stdClass();

        $items = $this->ReferenceModel->getAll(
            array(), "rank ASC"
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('References'));
        };

        $vData = new stdClass();


        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function save(){

               if(!isAllowedWriteModule()){die();}
        $this->load->library("form_validation");

            if($_FILES["img_url"]["name"] == ""){

                $alert = array(
                    "title" => lang('failed'),
                    "text"  => lang('choose-an-image'),
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("References/NewForm"));
                die();


            }


        $this->form_validation->set_rules("title", lang('title'), "required|trim");

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
                $user = getActiveUser();

                if($upload){

                    $uploadedFile = $this->upload->data("file_name");


                    $insert = $this->ReferenceModel->add(
                        array(

                            "title"         => $this->input->post("title"),
                            "description"   => $this->input->post("description"),
                            "url"           => convertToSEO($this->input->post("title")),
                            "img_url"       => $uploadedFile,
                            "rank"          => 0,
                            "isActive"      => 1,
                            "createdAt"     => date("Y-m-d H:i:s"),
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

                    redirect(base_url("References/NewForm"));
                    die();

                }





            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("References"));



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
            redirect(base_url('References'));
        };

        $vData = new stdClass();

        $item = $this->ReferenceModel->get(
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
         if(!isAllowedUpdateModule()){die();}
        $this->load->library("form_validation");


        $this->form_validation->set_rules("title", lang('title'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b> lang('must-be-filled')"
            )
        );

      
        $validate = $this->form_validation->run();

        if($validate) {
            $user = getActiveUser();

            if ($_FILES["img_url"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|ico";
                $config["upload_path"] = "uploads/$this->vFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("img_url");

                if ($upload) {

                    $uploadedFile = $this->upload->data("file_name");

                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                        "img_url" => $uploadedFile,
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

                    redirect(base_url("References/update_form/$id"));

                    die();

                }

            } else {

                $data = array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertToSEO($this->input->post("title")),
                    "updatedAt"     => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()
                );

            }

            $update = $this->ReferenceModel->update(array("id" => $id), $data);

           
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


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("References"));

        } else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;


            
            $vData->item = $this->ReferenceModel->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function delete($id){
        if(!isAllowedDeleteModule()){redirect(base_url($this->router->fetch_class()));}
        $delete = $this->ReferenceModel->delete(
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
        redirect(base_url("References"));

    }

    public function isActiveSetter($id){
        if(!isAllowedUpdateModule()){die();}
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->ReferenceModel->update(
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

        if(!isAllowedUpdateModule()){die();}
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->ReferenceModel->update(
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
