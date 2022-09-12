<?php

class Portfolios extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "portfolios_v";

        $this->load->model("PortfolioModel");
        $this->load->model("PortfolioCategoryModel");
        $this->load->model("PortfolioimageModel");

       if(!getActiveUser()){
            redirect(base_url("Login"));
        }

    }

    public function index(){

        $vData = new stdClass();

        
        $items = $this->PortfolioModel->getAll(
            array(), "rank ASC"
        );

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('Portfolios'));
        };

        $vData = new stdClass();

        $vData ->categories = $this->PortfolioCategoryModel->getAll(
            array(
                "isActive" => 1
            )
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function save(){

        if(!isAllowedWriteModule()){
            die();
        }
        $this->load->library("form_validation");

        $this->form_validation->set_rules("title", lang('title'), "required|trim");
        $this->form_validation->set_rules("category_id", lang('category'), "required|trim");
        $this->form_validation->set_rules("client", lang('customer'), "required|trim");
        $this->form_validation->set_rules("finishedAt", lang('end-date'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();
        $user = getActiveUser();

        if($validate){

            $insert = $this->PortfolioModel->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "portfolio_url" => convertToSEO($this->input->post("portfolio_url")),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                    "client"        => $this->input->post("client"),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "finishedAt"    => $this->input->post("finishedAt"),
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

            redirect(base_url("Portfolios"));

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
            redirect(base_url('Portfolios'));
        };

        $vData = new stdClass();

        
        $item = $this->PortfolioModel->get(
            array(
                "id"    => $id,
            )
        );

        $vData ->categories = $this->PortfolioCategoryModel->getAll(
            array(
                "isActive" => 1
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
        $this->form_validation->set_rules("category_id", lang('category'), "required|trim");
        $this->form_validation->set_rules("client", lang('customer'), "required|trim");
        $this->form_validation->set_rules("finishedAt", lang('end-date'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();
        $user = getActiveUser();

        if($validate){

            $update = $this->PortfolioModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "client"        => $this->input->post("client"),
                    "finishedAt"    => $this->input->post("finishedAt"),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
                    "updatedAt"     => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()
                )
            );


            if($update){

                $alert = array(
                    "title" => lang('successful'),
                    "type" => "success",
                    "text" => "Kayıt başarılı bir şekilde güncellendi !"
                );

            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "type" => "error",
                    "text" => lang('there-is-a-problem')
                );

            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Portfolios"));

        } else {

            $vData = new stdClass();

            $item = $this->PortfolioModel->get(
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

        $delete = $this->PortfolioModel->delete(
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
        redirect(base_url("Portfolios"));

    }

    public function imageDelete($id,$parent_id){
        if(!isAllowedDeleteModule()){
            redirect(base_url($this->router->fetch_class()));
        }
        $fileName = $this->PortfolioimageModel->get(
            array(
                "id" => $id
            )
        );

        $delete = $this->PortfolioimageModel->delete(
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
        redirect(base_url("Portfolios/ImageForm/$parent_id"));

    }

    public function isActiveSetter($id){
        if(!isAllowedUpdateModule()){
            die();
        }
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->PortfolioModel->update(
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
        if(!isAllowedUpdateModule()){
            die();
        }
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->PortfolioimageModel->update(
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
        if(!isAllowedUpdateModule()){
            die();
        }
        if($id && $parent_id){

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            $this->PortfolioimageModel->update(
                array(
                    "id"         => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover"  => $isCover
                )
            );

            $this->PortfolioimageModel->update(
                array(
                    "id !="      => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover"  => 0
                )
            );

            $vData = new stdClass();

            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "image";

            $vData->item_images = $this->PortfolioimageModel->getAll(
                array(
                    "portfolio_id"    => $parent_id
                ),  "rank ASC"
            );

            $render_html = $this->load->view("{$vData->vFolder}/{$vData->subFolder}/render_elements/image_list_v", $vData, true);


            echo $render_html;

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

            $this->PortfolioModel->update(
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

        if(!isAllowedUpdateModule()){
            die();
        }
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->PortfolioimageModel->update(
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

        $vData->item = $this->PortfolioModel->get(
            array(
                "id"    => $id
            )
        );

        $vData->item_images = $this->PortfolioimageModel->getAll(
            array(
                "portfolio_id"    => $id
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

            $uploaded_file = $this->upload->data("file_name");

            $this->PortfolioimageModel->add(
                array(
                    "img_url"       => $uploaded_file,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "isCover"       => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "portfolio_id"  => $id
                )
            );


        } else {
            echo "islem basarisiz";
        }

    }

    public function refresh_image_list($id){

        $vData = new stdClass();

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "image";

        $vData->item_images = $this->PortfolioimageModel->getAll(
            array(
                "portfolio_id"    => $id
            )
        );

        $render_html = $this->load->view("{$vData->vFolder}/{$vData->subFolder}/render_elements/image_list_v", $vData, true);

        echo $render_html;

    }

}
