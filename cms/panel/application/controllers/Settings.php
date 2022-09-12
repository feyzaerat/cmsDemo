<?php

class Settings extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->vFolder = "settings_v";

        $this->load->model("SettingsModel");

        if(!getActiveUser()){
            redirect(base_url("Login"));
        }


    }

    public function index(){

        $vData = new stdClass();

        $item = $this->SettingsModel->get();

        if($item){
            $vData->subFolder = "update";
        }
        else{
            $vData->subFolder = "no_content";
        }

        $vData->vFolder = $this->vFolder;
        $vData->item = $item;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function newForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('Settings'));
        };

        $vData = new stdClass();


        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function save()
    {
        if(!isAllowedWriteModule()){
            die();
        }

        $this->load->library("form_validation");

        if($_FILES["logo"]["name"] == ""){

            $alert = array(
                "title" => lang('failed'),
                "text"  => lang('choose-an-image'),
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Settings/newForm"));
            die();

        }


        $this->form_validation->set_rules("company_name", lang('company-name'), "required|trim");
        $this->form_validation->set_rules("phone_1", lang('phone')." 1", "required|trim");
        $this->form_validation->set_rules("email", lang('mail-address'), "required|trim|valid_email");



        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email"=> lang('enter-valid-mail')
            )
        );

        $validate = $this->form_validation->run();

        if($validate){



            $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png|ico";
            $config["upload_path"]   = "uploads/$this->vFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("logo");
            $user = getActiveUser();

            if($upload){

                $uploadedFile = $this->upload->data("file_name");


                $insert = $this->SettingsModel->add(
                    array(

                        "company_name"         => $this->input->post("company_name"),
                        "phone_1"              => $this->input->post("phone_1"),
                        "phone_2"              => $this->input->post("phone_2"),
                        "fax"                => $this->input->post("fax"),
                        
                        "address"              => $this->input->post("address"),
                        "about_us"             => $this->input->post("about_us"),
                        "mission"              => $this->input->post("mission"),
                        "vision"               => $this->input->post("vision"),
                        "email"                => $this->input->post("email"),
                        "facebook"             => $this->input->post("facebook"),
                        "instagram"            => $this->input->post("instagram"),
                        "twitter"              => $this->input->post("twitter"),
                        "linkedin"             => $this->input->post("linkedin"),
                        "logo"                 => $uploadedFile,
                        "createdAt"            => date("Y-m-d H:i:s"),
                        "createdBy_id"    => $user->id,
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

            }
            else {


                $alert = array(
                    "title" => lang('failed'),
                    "type" => "error",
                    "text" => lang('there-was-a-problem-loading-image')

                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("Settings/newForm"));
                die();

            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Settings"));


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
            redirect(base_url('Settings'));
        };

        $vData = new stdClass();

        $item = $this->SettingsModel->get(
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


        $this->form_validation->set_rules("company_name", lang('company-name'), "required|trim");
        $this->form_validation->set_rules("phone_1", lang('phone')." 1", "required|trim");
        $this->form_validation->set_rules("email", lang('mail-address'), "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email"=> lang('enter-valid-mail')

            )
        );


        $validate = $this->form_validation->run();

        if($validate) {

            if ($_FILES["logo"]["name"] !== "") {

                $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|ico";
                $config["upload_path"] = "uploads/$this->vFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("logo");
                $user = getActiveUser();

                if ($upload) {

                    $uploadedFile = $this->upload->data("file_name");

                    $data = array(
                        "company_name"         => $this->input->post("company_name"),
                        "phone_1"              => $this->input->post("phone_1"),
                        "phone_2"              => $this->input->post("phone_2"),
                        "fax"                => $this->input->post("fax"),
                        "address"              => $this->input->post("address"),
                        "about_us"             => $this->input->post("about_us"),
                        "mission"              => $this->input->post("mission"),
                        "vision"               => $this->input->post("vision"),
                        "email"                => $this->input->post("email"),
                        "facebook"             => $this->input->post("facebook"),
                        "instagram"            => $this->input->post("instagram"),
                        "twitter"              => $this->input->post("twitter"),
                        "linkedin"             => $this->input->post("linkedin"),
                        "logo"                 => $uploadedFile,
                        "updatedAt"            => date("Y-m-d H:i:s"),
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

                    redirect(base_url("Settings/updateForm/$id"));

                    die();

                }

            } else {
                $user = getActiveUser();

                $data = array(
                    "company_name"         => $this->input->post("company_name"),
                    "phone_1"              => $this->input->post("phone_1"),
                    "phone_2"              => $this->input->post("phone_2"),
                    "fax"                => $this->input->post("fax"),
                    "address"              => $this->input->post("address"),
                    "about_us"             => $this->input->post("about_us"),
                    "mission"              => $this->input->post("mission"),
                    "vision"               => $this->input->post("vision"),
                    "email"                => $this->input->post("email"),
                    "facebook"             => $this->input->post("facebook"),
                    "instagram"            => $this->input->post("instagram"),
                    "twitter"              => $this->input->post("twitter"),
                    "linkedin"             => $this->input->post("linkedin"),
                    "updatedAt"            => date("Y-m-d H:i:s"),
                    "updatedBy_id"  => $user->id,
                    "updated_ip_address" => $this->input->ip_address()

                );

            }



            $update = $this->SettingsModel->update(array("id" => $id), $data);


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

            //Session Update İslemi

            $settings = $this->SettingsModel->get();
            $this->session->set_userdata("settings", $settings);


            // The process of writing the Result of the Action to the Session...

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Settings"));

        } else {

            $vData = new stdClass();


            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;



            $vData->item = $this->SettingsModel->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }
}
