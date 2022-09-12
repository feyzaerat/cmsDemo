<?php

class Email_settings extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "email_settings_v";

        $this->load->model("EmailSettingModel");

       if(!getActiveUser()){
            redirect(base_url("Login"));
        }


    }

    public function index(){

        $vData = new stdClass();

        $items = $this->EmailSettingModel->getAll(
            array(), "rank ASC"
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('Email_settings'));
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


        $this->form_validation->set_rules("protocol", "Protocol", "required|trim");
        $this->form_validation->set_rules("host", "host", "required|trim");
        $this->form_validation->set_rules("port", "port", "required|trim");
        $this->form_validation->set_rules("user", "user", "required|trim");
        $this->form_validation->set_rules("from", "from", "required|trim");
        $this->form_validation->set_rules("to", "to", "required|trim");
        $this->form_validation->set_rules("password", lang('password'), "required|trim|min_length[6]");



        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email" => lang('enter-valid-mail'),
                "is_unique" =>"<b>{field}</b>". lang('before-used-mail')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){
            $user = getActiveUser();
            $insert = $this->EmailSettingModel->add(
                        array(

                            "protocol"         => $this->input->post("protocol"),
                            "host"   => $this->input->post("host"),
                            "port"           => $this->input->post("port"),
                            "password"       => $this->input->post("password"),
                            "user"           => $this->input->post("user"),
                            "user_name"           => $this->input->post("user_name"),
                            "from"           => $this->input->post("from"),
                            "to"           => $this->input->post("to"),
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
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Email_settings"));
            die();
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
            redirect(base_url('Email_settings'));
        };

        $vData = new stdClass();

        $item = $this->EmailSettingModel->get(
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


        $this->form_validation->set_rules("protocol", "Protocol", "required|trim");
        $this->form_validation->set_rules("host", "host", "required|trim");
        $this->form_validation->set_rules("port", "port", "required|trim");
        $this->form_validation->set_rules("user", "user", "required|trim");
        $this->form_validation->set_rules("user_name", "user name", "required|trim");
        $this->form_validation->set_rules("from", "from", "required|trim");
        $this->form_validation->set_rules("to", "to", "required|trim");
        $this->form_validation->set_rules("password", lang('password'), "required|trim|min_length[6]");



        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email" => lang('enter-valid-mail'),

            )
        );

      
        $validate = $this->form_validation->run();

        if($validate) {
            $user = getActiveUser();
            $update = $this->EmailSettingModel->update(
                array(
                    "id" => $id
                ),

                array(


                    "protocol"         => $this->input->post("protocol"),
                    "host"   => $this->input->post("host"),
                    "port"           => $this->input->post("port"),
                    "password"       => $this->input->post("password"),
                    "user"           => $this->input->post("user"),
                    "user_name"           => $this->input->post("user_name"),
                    "from"           => $this->input->post("from"),
                    "to"           => $this->input->post("to"),
                    "updatedAt"     => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()


                )
            );

            if ($update) {

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('update-successful'),
                    "type" => "success"
                );

            }
            else{
                $alert = array(
                    "title" => "Ooppss !!",
                    "text" => lang('there-was-a-problem-update'),
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Email_settings"));

        }

         else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;


            
            $vData->item = $this->EmailSettingModel->get(
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

        $delete = $this->EmailSettingModel->delete(
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
        redirect(base_url("Email_settings"));

    }

    public function isActiveSetter($id){

        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->EmailSettingModel->update(
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

            $this->EmailSettingModel->update(
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
