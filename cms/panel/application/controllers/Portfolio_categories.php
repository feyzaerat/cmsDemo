<?php

class Portfolio_categories extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "portfolio_categories_v";

        $this->load->model("PortfolioCategoryModel");

        if(!getActiveUser()){redirect(base_url("Login"));}


    }

    public function index(){

        $vData = new stdClass();

        $items = $this->PortfolioCategoryModel->getAll(
            array()
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('Portfolio_categories'));
        };
        $vData = new stdClass();


        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function save(){

               if(!isAllowedWriteModule()){die();}

        $this->load->library("form_validation");

        $this->form_validation->set_rules("title", lang('title'), "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field} </b>". lang('must-be-filled')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){
            $user = getActiveUser();

                $insert = $this->PortfolioCategoryModel->add(
                    array(

                        "title"              => $this->input->post("title"),
                        "isActive"           => 1,
                        "createdAt"          => date("Y-m-d H:i:s"),
                        "createdBy_id"       => $user->id,
                        "created_ip_address" => $this->input->ip_address()

                    ));


                if($insert){

                    $alert = array(
                        "title" => lang('successful'),
                        "type" => "success",
                        "text" => lang('save-successful')
                    );

                }
                else {

                    $alert = array(
                        "title" => lang('failed'),
                        "type" => "error",
                        "text" => lang('there-is-a-problem')

                    );

                }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Portfolio_categories"));

            }




        else {

            $vData = new stdClass();

            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "add";
            $vData->form_error = true;




            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function updateForm($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url('Portfolio_categories'));
        };

        $vData = new stdClass();

        $item = $this->PortfolioCategoryModel->get(
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
                "required"  => "<b>{field}</b> ". lang('must-be-filled')
            )
        );

      
        $validate = $this->form_validation->run();
        $user = getActiveUser();

        if($validate) {

                $data = array(
                    "title"              => $this->input->post("title"),
                    "updatedAt"          => date("Y-m-d H:i:s"),
                    "updatedBy_id"       => $user->id,
                    "updated_ip_address" => $this->input->ip_address()
                );

            $update = $this->PortfolioCategoryModel->update(array("id" => $id), $data);

           
            if ($update) {

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('update-successful'),
                    "type" => "success"
                );

            }
            else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" => lang('a-problem-occurred-during-the-update'),
                    "type" => "error"
                );
            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Portfolio_categories"));

            }



        else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;


            
            $vData->item = $this->PortfolioCategoryModel->get(
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
        $delete = $this->PortfolioCategoryModel->delete(
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
        redirect(base_url("Portfolio_categories"));

    }

    public function isActiveSetter($id){
               if(!isAllowedUpdateModule()){die();}
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->PortfolioCategoryModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

}
