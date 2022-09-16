<?php

class Galleries extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "galleries_v";

        $this->load->model("GalleryModel");
        $this->load->model("ImageModel");
        $this->load->model("VideoModel");
        $this->load->model("FileModel");

       if(!getActiveUser()){redirect(base_url("Login"));}
    }

    public function index(){

        $vData = new stdClass();

        
        $items = $this->GalleryModel->getAll(
            array(), "rank ASC"
        );

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function save(){

        if(!isAllowedWriteModule()){die();}

        $this->load->library("form_validation");

        
        $this->form_validation->set_rules("title", lang('gallery-name'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $gallery_type = $this->input->post("gallery_type");
            $path         = "uploads/$this->vFolder/";
            $folder_name = "";

            if($gallery_type == "image"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/images/$folder_name";

            }
            else if($gallery_type == "file"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/files/$folder_name";
            }


            if($gallery_type != "video"){

                if(!mkdir($path, 0755)){

                    $alert = array(
                        "title" => lang('failed'),
                        "text" => lang('there-is-a-problem'),
                        "type" => "error"
                    );

                    // The process of writing the Result of the Action to the Session...

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("Galleries"));
                    die();
                }

            }
            $user = getActiveUser();
            $insert = $this->GalleryModel->add(
                array(
                    "title"         => $this->input->post("title"),
                    "gallery_type"  => $this->input->post("gallery_type"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "folder_name"   => $folder_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "createdBy_id"    => $user->id,
                    "created_ip_address" => $this->input->ip_address()
                )
            );

           
            if($insert){

                $alert = array(
                    "title" =>lang('successful'),
                    "text"  => lang('save-successful'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" => lang('there-is-a-problem'),
                    "type" => "error"
                );
            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Galleries"));

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
            redirect(base_url('Galleries'));
        };

        $vData = new stdClass();

        
        $item = $this->GalleryModel->get(
            array(
                "id"    => $id,
            )
        );

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "update";
        $vData->item = $item;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


    }

    public function update($id, $gallery_type, $oldFolderName = ""){

               if(!isAllowedUpdateModule()){die();}

        $this->load->library("form_validation");

        
        $this->form_validation->set_rules("title", lang('gallery-name'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){
            $user = getActiveUser();


            $path         = "uploads/$this->vFolder/";
            $folder_name = "";

            if($gallery_type == "image"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/images";

            } else if($gallery_type == "file"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/files";
            }


            if($gallery_type != "video"){

                if(!rename("$path/$oldFolderName", "$path/$folder_name")){

                    $alert = array(
                        "title" => lang('failed'),
                        "text"  => lang('folder-content'),
                        "type"  => "error"
                    );

                    // The process of writing the Result of the Action to the Session...

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("Galleries"));
                    die();
                }

            }


            $update = $this->GalleryModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "folder_name"   => $folder_name,
                    "url"           => convertToSEO($this->input->post("title")),
                    "updatedAt"     => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()

                )
            );

           
            if($update){

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('update-successful'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" =>  lang('there-was-a-problem-occurred-during-the-update'),
                    "type"  => "error"
                );

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Galleries"));

        } else {

            $vData = new stdClass();

            
            $item = $this->GalleryModel->get(
                array(
                    "id"    => $id,
                )
            );

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;
            $vData->item = $item;

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function delete($id){

        if(!isAllowedDeleteModule()){
            redirect(base_url($this->router->fetch_class()));
        }

        $gallery = $this->GalleryModel->get(
            array(
                "id"    => $id
            )
        );

        if($gallery){


            if($gallery->gallery_type != "video"){

                if($gallery->gallery_type == "image")
                    $path = "uploads/$this->vFolder/images/$gallery->folder_name";
                else if($gallery->gallery_type == "file")
                    $path = "uploads/$this->vFolder/files/$gallery->folder_name";

                $delete_folder = rmdir($path);

                if(!$delete_folder){

                    $alert = array(
                        "title" => lang('failed'),
                        "text" => lang('there-was-a-problem'),
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("Galleries"));

                    die();
                }

            }

            $delete = $this->GalleryModel->delete(
                array(
                    "id"    => $id
                )
            );

           
            if($delete){

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('delete-successful'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text"  => lang('there-is-a-problem'),
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Galleries"));

        }
    }

    public function isActiveSetter($id){

               if(!isAllowedUpdateModule()){die();}

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->GalleryModel->update(
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

            $this->GalleryModel->update(
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

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('Galleries'));
        };

        $vData = new stdClass();

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function fileDelete($id, $parent_id, $gallery_type){

        $modelName = ($gallery_type == "image") ? "ImageModel" : "FileModel";

        $fileName = $this->$modelName->get(
            array(
                "id"    => $id
            )
        );

        $delete = $this->$modelName->delete(
            array(
                "id"    => $id
            )
        );


       
        if($delete){

            unlink("$fileName->url");

            $alert = array(
                "title" =>lang('successful'),
                "text" => lang('delete-successful'),
                "type"  => "success"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Galleries/UploadForm/$parent_id"));
        } else {

            $alert = array(
                "title" =>lang('failed'),
                "text" => lang('successful'),
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Galleries/UploadForm/$parent_id"));
        }

    }

    public function fileIsActiveSetter($id, $gallery_type){

        if($id){

            $modelName = ($gallery_type == "image") ? "ImageModel" : "FileModel";

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->$modelName->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function fileRankSetter($gallery_type){


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];
        $modelName = ($gallery_type == "image") ? "ImageModel" : "FileModel";

        foreach ($items as $rank => $id){

            $this->$modelName->update(
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

    public function UploadForm($id){

        $vData = new stdClass();
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "image";

        $item = $this->GalleryModel->get(
            array(
                "id"    => $id
            )
        );

        $vData->item = $item;

        if($item->gallery_type == "image"){

            $vData->items = $this->ImageModel->getAll(
                array(
                    "gallery_id"    => $id
                ),  "rank ASC"
            );

        }
        else if($item->gallery_type == "file"){

            $vData->items = $this->FileModel->getAll(
                array(
                    "gallery_id"    => $id
                ),  "rank ASC"
            );

        }
        else {

            $vData->items = $this->VideoModel->getAll(
                array(
                    "gallery_id"    => $id
                ),  "rank ASC"
            );

        }

        $vData->gallery_type = $item->gallery_type;


        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function FileUpload($gallery_id, $gallery_type, $folderName){

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "*";
        $config["upload_path"]   = ($gallery_type == "image") ? "uploads/$this->vFolder/images/$folderName/" : "uploads/$this->vFolder/files/$folderName/";
        $config["file_name"]     = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if($upload){

            $uploaded_file = $this->upload->data("file_name");

            $modelName = ($gallery_type == "image") ? "ImageModel" : "FileModel";

            $this->$modelName->add(
                array(
                    "url"           => "{$config["upload_path"]}$uploaded_file",
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "gallery_id"    => $gallery_id
                )
            );

        } else {
            $alert = array(
                "title" =>lang('failed'),
                "text" => lang('successful'),
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Galleries"));
        }

    }

    public function refresh_file_list($gallery_id, $gallery_type){

       $vData = new stdClass();

       
       $vData->vFolder = $this->vFolder;
       $vData->subFolder = "image";

        $modelName = ($gallery_type == "image") ? "ImageModel" : "FileModel";

        $vData->items = $this->$modelName->getAll(
           array(
               "gallery_id"    => $gallery_id
          )
        );

        $vData->gallery_type = $gallery_type;

       $render_html = $this->load->view("{$vData->vFolder}/{$vData->subFolder}/render_elements/file_list_v", $vData, true);

        echo $render_html;

    }

    public function gallery_video_list($id){

        $vData = new stdClass();

        $gallery = $this->GalleryModel->get(
            array(
                "id" =>  $id
            )
        );

        
        $items = $this->VideoModel->getAll(
            array(
                "gallery_id" => $id
            ), "rank ASC"
        );

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "video/list";
        $vData->items = $items;
        $vData->gallery = $gallery;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function newGalleryVideoForm($id){

        $vData = new stdClass();
        $vData->gallery_id = $id;

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "video/add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function GalleryVideoSave($id){

        $this->load->library("form_validation");

        
        $this->form_validation->set_rules("url", "Video URL", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->VideoModel->add(
                array(

                    "gallery_id"   => $id,
                    "url"           => $this->input->post("url"),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

           
            if($insert){

                $alert = array(
                    "title" =>lang('successful'),
                    "text"   => lang('save-successful'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text"  => lang('there-is-a-problem'),
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Galleries/gallery_video_list/$id"));

        } else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->gallery_id = $id;

            $vData->subFolder = "video/add";
            $vData->form_error = true;

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function updateGalleryVideoForm($id){

        $vData = new stdClass();

        
        $item = $this->VideoModel->get(
            array(
                "id"    => $id,
            )
        );

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "video/update";
        $vData->item = $item;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


    }

    public function GalleryVideoUpdate($id,$gallery_id){

        $this->load->library("form_validation");

        
        $this->form_validation->set_rules("url", lang('title'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){


            $update = $this->VideoModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "url"           => $this->input->post("url"),
                )
            );

           
            if($update){

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('update-successful'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text"  => lang('there-was-a-problem-occurred-during-the-update'),
                    "type"  => "error"
                );

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Galleries/gallery_video_list/$gallery_id"));

        } else {

            $vData = new stdClass();

            
            $item = $this->VideoModel->get(
                array(
                    "id"    => $id,
                )
            );

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "video/update";
            $vData->form_error = true;
            $vData->item = $item;

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function rankGalleryVideoSetter(){


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->VideoModel->update(
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

    public function GalleryVideoisActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->VideoModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function GalleryVideoDelete($id, $gallery_id){


            $delete = $this->VideoModel->delete(
                array(
                    "id"    => $id
                )
            );

           
            if($delete){

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('delete-successful'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" =>  lang('there-is-a-problem'),
                    "type"  => "error"
                );


            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Galleries/gallery_video_list/$gallery_id"));


    }


}
