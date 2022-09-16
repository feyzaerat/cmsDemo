<?php

class News extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "news_v";

        $this->load->model("NewsModel");

        if(!getActiveUser()){redirect(base_url("Login"));}


    }

    public function index(){

        $vData = new stdClass();

        $items = $this->NewsModel->getAll(
            array(), "rank ASC"
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('News'));
        };

        $vData = new stdClass();


        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function save(){
               if(!isAllowedWriteModule()){die();}
        $this->load->library("form_validation");

        $newsType = $this->input->post("news_type");

        if($newsType == "image"){

             if($_FILES["img_url"]["name"] == ""){

                 $alert = array(
                     "title" => lang('failed'),
                     "text"  => lang('choose-an-image'),
                     "type"  => "error"
                 );

                 $this->session->set_flashdata("alert", $alert);

                 redirect(base_url("News/NewForm"));
                 die();


             }

        }
        elseif ($newsType == "video"){

            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");

        }
        else{
            $alert = array(
                "title" => lang('failed'),
                "type" => "error",
                "text" => lang('choose-a-news-type')

            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("News/NewForm"));
            die();
        }

        $this->form_validation->set_rules("title", lang('title'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

          if($newsType == "image") {

              $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

              $config["allowed_types"] = "jpg|jpeg|png|ico";
              $config["upload_path"]   = "uploads/$this->vFolder/";
              $config["file_name"] = $file_name;

              $this->load->library("upload", $config);

              $upload = $this->upload->do_upload("img_url");

              if($upload){
                  $user=getActiveUser();

                  $uploadedFile = $this->upload->data("file_name");
                  $data = array(

                      "title"         => $this->input->post("title"),
                      "description"   => $this->input->post("description"),
                      "news_type"     => $newsType,
                      "url"           => convertToSEO($this->input->post("title")),
                      "img_url"       => $uploadedFile,
                      "video_url"     => "#",
                      "rank"          => 0,
                      "isActive"      => 1,
                      "createdAt"     => date("Y-m-d H:i:s"),
                      "createdBy_id"    => $user->id,
                      "created_ip_address" => $this->input->ip_address()

                  );

              } else {


                  $alert = array(
                      "title" => lang('failed'),
                      "type" => "error",
                      "text" => lang('there-was-a-problem-loading-image')

                  );

                  $this->session->set_flashdata("alert", $alert);

                  redirect(base_url("News/NewForm"));

              }

          }

          else if ($newsType == "video"){
              $user = getActiveUser();

              $data = array(
                  "title"              => $this->input->post("title"),
                  "description"        => $this->input->post("description"),
                  "news_type"          => $newsType,
                  "url"                => convertToSEO($this->input->post("title")),
                  "img_url"            => "#",
                  "video_url"          => $this->input->post("video_url"),
                  "rank"               => 0,
                  "isActive"           => 1,
                  "createdAt"          => date("Y-m-d H:i:s"),
                  "createdBy_id"       => $user->id,
                  "created_ip_address" => $this->input->ip_address()
              );

          }

            $insert = $this->NewsModel->add($data);

            if($insert){

                $alert = array(
                    "title" => lang('successful'),
                    "type" => "success",
                    "text" => lang('save-successful')
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "type"  => "error",
                    "text"  => lang('there-is-a-problem')

                );

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("News"));

        } else {

            $vData = new stdClass();

            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "add";
            $vData->form_error = true;
            $vData->newsType = $newsType;



            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function updateForm($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url('News'));
        };

        $vData = new stdClass();

        $item = $this->NewsModel->get(
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

        

        $newsType = $this->input->post("news_type");

        if($newsType == "video"){

            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");

        }

        $this->form_validation->set_rules("title", lang('title'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

      
        $validate = $this->form_validation->run();

        if($validate){
            $user = getActiveUser();

            if($newsType == "image"){

                if($_FILES["img_url"]["name"] !== "") {

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
                            "news_type" => $newsType,
                            "img_url" => $uploadedFile,
                            "video_url" => "#",
                            "updatedAt"     => date("Y-m-d H:i:s"),
                            "updatedBy_id"  => $user->id,
                            "updated_ip_address" => $this->input->ip_address()
                        );

                    } else {

                        $alert = array(
                            "title" => lang('failed'),
                            "text"  => lang('there-was-a-problem-loading-image'),
                            "type"  => "error"
                        );

                        $this->session->set_flashdata("alert", $alert);

                        redirect(base_url("News/updateForm/$id"));

                        die();

                    }

                } else {

                    $data = array(
                        "title"       => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url"         => convertToSEO($this->input->post("title")),
                        "updatedAt"   => date("Y-m-d H:i:s")
                    );

                }

            } else if($newsType == "video"){

                $data = array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "news_type"     => $newsType,
                    "img_url"       => "#",
                    "video_url"     => $this->input->post("video_url"),
                    "updatedAt"     => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()
                );

            }

            $update = $this->NewsModel->update(array("id" => $id), $data);

           
            if($update){

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('update-successful'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" => lang('a-problem-occurred-during-the-update'),
                    "type"  => "error"
                );
            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("News"));

        } else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;
            $vData->news_type = $newsType;

            
            $vData->item = $this->NewsModel->get(
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

        $delete = $this->NewsModel->delete(
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
        redirect(base_url("News"));

    }

    public function isActiveSetter($id){

               if(!isAllowedUpdateModule()){die();}
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->NewsModel->update(
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

            $this->NewsModel->update(
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
