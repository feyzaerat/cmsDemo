<?php

class Product extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "product_v";

        $this->load->model("ProductModel");
        $this->load->model("ProductimageModel");

       if(!getActiveUser()){redirect(base_url("Login"));}

    }

    public function index(){

        $vData = new stdClass();

        
        $items = $this->ProductModel->getAll(
            array(), "rank ASC"
        );

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('Product'));
        };

        $vData = new stdClass();


        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function save(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("title", lang('title'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();
        $user = getActiveUser();

        if($validate){


            $insert = $this->ProductModel->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "createdBy_id"    => $user->id,
                    "created_ip_address" => $this->input->ip_address()
                )
            );


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

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Product"));

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
            redirect(base_url('Product'));
        };

        $vData = new stdClass();

        
        $item = $this->ProductModel->get(
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
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();
        $user = getActiveUser();

        if($validate){

            $update = $this->ProductModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "updatedAt"     => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()
                )
            );


            if($update){

                $alert = array(
                    "title" => lang('successful'),
                    "type" => "success",
                    "text" => lang('update-successful'),
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "type" => "error",
                    "text" => lang('there-is-a-problem')
                );

            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Product"));

        } else {

            $vData = new stdClass();

            $item = $this->ProductModel->get(
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
        $delete = $this->ProductModel->delete(
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
        redirect(base_url("Product"));

    }

    public function imageDelete($id,$parent_id){
        if(!isAllowedDeleteModule()){
            redirect(base_url($this->router->fetch_class()));
        }
        $fileName = $this->ProductimageModel->get(
            array(
                "id" => $id
            )
        );

        $delete = $this->ProductimageModel->delete(
            array(
                "id"    => $id
            )
        );

        if($delete){

            $alert = array(
                "title" => lang('successful'),
                "type" => "success",
                "text" => lang('delete-photo-successful')
            );
            unlink("uploads/{$this->vFolder}/$fileName->img_url");

        } else {
            $alert = array(
                "title" => lang('failed'),
                "type" => "error",
                "text" => lang('there-is-a-problem')
            );

        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("Product/ImageForm/$parent_id"));

    }

    public function isActiveSetter($id){
               if(!isAllowedUpdateModule()){die();}
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->ProductModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function imageIsActiveSetter($id){
               if(!isAllowedUpdateModule()){die();}
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->ProductimageModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function isCoverSetter($id, $parent_id){
               if(!isAllowedUpdateModule()){die();}
        if($id && $parent_id){

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            $this->ProductimageModel->update(
                array(
                    "id"         => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover"  => $isCover
                )
            );

            $this->ProductimageModel->update(
                array(
                    "id !="      => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover"  => 0
                )
            );

            $vData = new stdClass();

            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "image";

            $vData->item_images = $this->ProductimageModel->getAll(
                array(
                    "product_id"    => $parent_id
                ),  "rank ASC"
            );

            $render_html = $this->load->view("{$vData->vFolder}/{$vData->subFolder}/render_elements/image_list_v", $vData, true);


            echo $render_html;

        }
    }

    public function rankSetter(){
               if(!isAllowedUpdateModule()){die();}

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->ProductModel->update(
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

    public function imageRankSetter(){
               if(!isAllowedUpdateModule()){die();}

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->ProductimageModel->update(
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

    public function ImageForm($id){

        $vData = new stdClass();

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "image";

        $vData->item = $this->ProductModel->get(
            array(
                "id"    => $id
            )
        );

        $vData->item_images = $this->ProductimageModel->getAll(
            array(
                "product_id"    => $id
            ),  "rank ASC"
        );

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function DetailForm($id){

        $vData = new stdClass();

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "detail";

        $vData->item = $this->ProductModel->get(
            array(
                "id"    => $id
            )
        );
        $vData->item_images = $this->ProductimageModel->getAll(
            array(
                "product_id"    => $id,
            ),  "rank ASC"
        );


        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function imageUpload($id){

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png|ico";
        $config["upload_path"]   = "uploads/$this->vFolder/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if($upload){

            $uploadedFile = $this->upload->data("file_name");

            $this->ProductimageModel->add(
                array(
                    "img_url"       => $uploadedFile,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "isCover"       => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "product_id"    => $id,
                    "created_ip_address" => $this->input->ip_address()

                )
            );


        } else {
            $alert = array(
                "title" => lang('failed'),
                "type" => "error",
                "text" => lang('there-is-a-problem')

            );
        }
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("Product"));

    }

    public function refresh_image_list($id){

        $vData = new stdClass();

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "image";

        $vData->item_images = $this->ProductimageModel->getAll(
            array(
                "product_id"    => $id
            )
        );

        $render_html = $this->load->view("{$vData->vFolder}/{$vData->subFolder}/render_elements/image_list_v", $vData, true);

        echo $render_html;

    }

}
