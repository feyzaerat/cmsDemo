<?php

class Users extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->vFolder = "users_v";

        $this->load->model("UserModel");
        $this->load->model("UserRoleModel");

        if(!getActiveUser()){redirect(base_url("Login"));}
    }

    public function index(){

        $vData = new stdClass();
        $user = getActiveUser();

        if(isAdmin()){
            $where = array();
        }
        else{
            $where = array(
                "id" => $user->id
            );
        }

        $items = $this->UserModel->getAll(
            $where,"rank ASC"
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function NewForm(){

        if(!isAllowedWriteModule()){redirect(base_url('Users'));};

        $vData = new stdClass();

        $this->load->model("UserRoleModel");

        $vData->user_roles = $this->UserRoleModel->getAll(array("isActive" => 1));

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function save(){
        if(!isAllowedWriteModule()){die();}
        $this->load->library("form_validation");
        $this->load->helper("string");
        if($_FILES["img_url"]["name"] == ""){

            $alert = array(
                "title" => lang('failed'),
                "text"  => lang('choose-an-image'),
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Users/NewForm"));
            die();


        }

        $this->form_validation->set_rules("user_name", lang('username'), "required|trim|is_unique[users.user_name]");
        $this->form_validation->set_rules("full_name", lang('full-name'), "required|trim");
        $this->form_validation->set_rules("email", lang('mail-address'), "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", lang('password'), "required|trim|min_length[6]|regex_match[/([a-z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([@ # $ ^ & * ( ) _ + ! { } :]|\s)+/]");
        $this->form_validation->set_rules("re_password", lang('re-password'), "required|trim|min_length[6]|regex_match[/([a-z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([@ # $ ^ & * ( ) _ + ! { } :]|\s)+/]|matches[password]");
        $this->form_validation->set_rules("user_role_id", lang('user-role'), "required|trim");


        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email"   => lang('enter-valid-mail'),
                "is_unique"     => "<b>{field} </b>". lang('before-used'),
                "regex_match"   => "<b>{field} </b>". lang('pass-has-to-be-char'),
                "matches"       => lang('does-not-match-password'),
                "min_length[6]" => "<b>{field}</b>". lang('must-be-at-least-6-char'),
            )
        );

        $validate = $this->form_validation->run();
        $user = getActiveUser();

        if ($validate) {

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png|ico";
            $config["upload_path"] = "uploads/$this->vFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("img_url");

            if ($upload) {

                $uploadedFile = $this->upload->data("file_name");


                $insert = $this->UserModel->add(
                    array(
                        "user_name"          => $this->input->post("user_name"),
                        "full_name"          => $this->input->post("full_name"),
                        "email"              => $this->input->post("email"),
                        "img_url"            => $uploadedFile,
                        "user_role_id"       => $this->input->post("user_role_id"),
                        "password"           => md5($this->input->post("password")),
                        "isActive"           => 1,
                        "createdAt"          => date("Y-m-d H:i:s"),
                        "createdBy_id"       => $user->id,
                        "created_ip_address" => $this->input->ip_address()

                    ));

                 send_email($this->input->post("email"),"Welcome to CMS Panel", "
      <!doctype html>
      <html lang='en'>
      <head>
      <meta charset='UTF - 8'>
      <meta name='viewport' content='width = device - width, user - scalable = no, initial - scale = 1.0, maximum - scale = 1.0, minimum - scale = 1.0'>
      <meta http-equiv='X - UA - Compatible' content='ie = edge'>
      <title>Welcome</title>
      <style type='text/css'>
	/* FONTS */
    @media screen {
		@font-face {
		  font-family: 'Lato';
		  font-style: normal;
		  font-weight: 400;
		  src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
		}
		
		@font-face {
		  font-family: 'Lato';
		  font-style: normal;
		  font-weight: 700;
		  src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
		}
		
		@font-face {
		  font-family: 'Lato';
		  font-style: italic;
		  font-weight: 400;
		  src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
		}
		
		@font-face {
		  font-family: 'Lato';
		  font-style: italic;
		  font-weight: 700;
		  src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
		}
    }
    
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* ANDROID CENTER FIX */
    div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>
      </head>
      <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>

         <table border='0' cellpadding='0' cellspacing='0' width='100%'>
          <!-- LOGO -->
          <tr>
           <td bgcolor='#b4d0e1' align='center'>
            <table border='0' cellpadding='0' cellspacing='0' width='480' >
                <tr>
                    <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                        <a href='#' target='_blank'>
                            <img alt='Logo' src='https://feyzaerat.com/cms_2/panel/assets/images/fkeo-logo-light.png' width='100' height='100' style='display: block;   color: #ffffff; font-size: 18px;' border='0'>
                        </a>
                    </td>
                </tr><br><br>
            </table>
        </td>
          </tr>
          <!-- HERO -->
          <tr>
           <td bgcolor='#b4d0e1' align='center' style='padding: 0px 10px 0px 10px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='480' >
                <tr>
                    <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111;  font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                      <h1 style='font-size: 32px; font-weight: 400; margin: 0;'>CMS ADMIN DASHBOARD</h1>
                    </td>
                </tr>
            </table>
            </td>
           </tr>
          <!-- COPY BLOCK -->
          <tr>
           <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
            <table  border='0' cellpadding='0' cellspacing='0' width='480' >
              <!-- COPY -->
              <tr>
                <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666;  font-size: 18px; font-weight: 400; line-height: 25px;' >
                  <p style='margin: 0;'> Dear <b>{$this->input->post('full_name')}, You can log in to the system with the following information. </p><br>
                  <p style='margin: 0;'> Username : <b>{$this->input->post('user_name')}</b> </p>
                  <p style='margin: 0;'> Password : <b>{$this->input->post('password')}</b> </p><br>
                  <small style='margin: 0; color: red'> Do not share this information with anyone. You are responsible for the confidentiality of this information. </small>
                </td>
              </tr>
              
          <!-- SUPPORT CALLOUT -->
          <tr>
           <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='480' >
                <!-- HEADLINE -->
                <tr>
                  <td bgcolor='#b4d0e1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-size: 18px; font-weight: 400; line-height: 25px;' >
                    <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                    <p style='margin: 0;'><a href='mailto:contact@feyzaerat.com' target='_blank' style='color: #c7a124!important;'>We&rsquo;re here, ready to talk</a></p>
                  </td>
                </tr>
            </table>
           </td>
          </tr>
          <!-- FOOTER -->
          <tr>
           <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='480' >
              
              <!-- PERMISSION REMINDER -->
              <tr>
                <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-size: 14px; font-weight: 400; line-height: 18px;' >
                  <p style='margin: 0;'>If you did not, <a href='mailto:admin@feyzaerat.com' target='_blank' style='color: #ffffff; font-weight: 700;'>please contact us.</a>.</p>
                </td>
              </tr>
              
              <!-- ADDRESS -->
              <tr>
                <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-size: 14px; font-weight: 400; line-height: 18px;' >
                  <p style='margin: 0;'>All rights reserved | F.K.Erat 2022 ©</p>
                </td>
              </tr>
              </table>
           </td>
          </tr>
         </table>

       </body>
      </html>
              ");

                if ($insert) {

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

                redirect(base_url("Users"));
                die();
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("Users"));
            die();
        }

        else {

            $vData = new stdClass();
            $vData->user_roles = $this->UserRoleModel->getAll(
                array(
                    "isActive" => 1
                ));
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "add";
            $vData->form_error = true;

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

        }

    }

    public function updateForm($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url('Users'));
        };

        $vData = new stdClass();

        $item = $this->UserModel->get(
            array(
                "id"    => $id,
            )
        );
        $user_roles = $this->UserRoleModel->getAll(
            array(
                "isActive"  => 1
            )
        );
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "update";
        $vData->item = $item;
        $vData->user_roles = $user_roles;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


    }

    public function update($id){
        if(!isAllowedUpdateModule()){die();}

        $this->load->library("form_validation");

        $oldUser = $this->UserModel->get(array("id"    => $id));

        if($oldUser->user_name != $this->input->post("user_name")){
            $this->form_validation->set_rules("user_name", lang('username'), "required|trim|is_unique[users.user_name]");
        }

        if($oldUser->email != $this->input->post("email")){
            $this->form_validation->set_rules("email", lang('mail-address'), "required|trim|valid_email|is_unique[users.email]");
        }


        $this->form_validation->set_rules("full_name", lang('full-name'), "required|trim");


        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email" => lang('enter-valid-mail'),
                "is_unique"   => "<b>{field} </b>". lang('used-before'),
            )
        );

      
        $validate = $this->form_validation->run();
        $user = getActiveUser();

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

                    $data = array(
                        "user_name"           => $this->input->post("user_name"),
                        "full_name"           => $this->input->post("full_name"),
                        "email"               => $this->input->post("email"),
                        "user_role_id"        => $this->input->post("user_role_id"),
                        "img_url"             => $uploadedFile,
                        "updatedAt"           => date("Y-m-d H:i:s"),
                        "updatedBy_id"        => $user->id,
                        "updated_ip_address"  => $this->input->ip_address()
                    );

                } else {

                    $alert = array(
                        "title" => lang('failed'),
                        "text" => lang('there-was-a-problem-loading-image'),
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("Users/updateForm/$id"));

                    die();

                }

            } else {

                $data = array(
                    "user_name"           => $this->input->post("user_name"),
                    "full_name"           => $this->input->post("full_name"),
                    "email"               => $this->input->post("email"),
                    "user_role_id"        => $this->input->post("user_role_id"),
                    "updatedAt"           => date("Y-m-d H:i:s"),
                    "updatedBy_id"        => $user->id,
                    "updated_ip_address"  => $this->input->ip_address()

                );

            }
            $update = $this->UserModel->update(array("id" => $id), $data);

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

            redirect(base_url("Users"));
        }

         else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "update";
            $vData->form_error = true;


            
            $vData->item = $this->UserModel->get(
                array(
                    "id"    => $id,
                )
            );


             $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
        }

    }

    public function updatePasswordForm($id){

        $vData = new stdClass();

        $item = $this->UserModel->get(
            array(
                "id"    => $id,
            )
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "password";
        $vData->item = $item;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


    }

    public function profile(){

        $vData = new stdClass();

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "profile";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function updatePassword($id){
               if(!isAllowedUpdateModule()){die();}
        $this->load->library("form_validation");

        $this->form_validation->set_rules("password", lang('password'), "required|trim|min_length[6]|regex_match[/([a-z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([@ # $ ^ & * ( ) _ + ! { } :]|\s)+/]");
        $this->form_validation->set_rules("re_password",lang('re_password'),"required|trim|min_length[6]|regex_match[/([a-z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([A-Z]|\s)+/]|regex_match[/([@ # $ ^ & * ( ) _ + ! { } :]|\s)+/]|matches[password]");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b>". lang('must-be-filled'),
                 "matches"    => lang('does-not-match-password'),
                "regex_match" => "<b>{field} </b>". lang('pass-has-to-be-char')
            )
        );

      
        $validate = $this->form_validation->run();

        if($validate) {

            $update = $this->UserModel->update(
                array(
                    "id" => $id
                ),

                array(

                    "password"         => md5($this->input->post("password")),

                )
            );

            if ($update) {

                $alert = array(
                    "title" =>lang('successful'),
                    "text" => lang('success-password-update'),
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

            redirect(base_url("Users"));
        }

        else {

            $vData = new stdClass();

            
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "password";
            $vData->form_error = true;


            
            $vData->item = $this->UserModel->get(
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
        $delete = $this->UserModel->delete(
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
        redirect(base_url("Users"));

    }

    public function isActiveSetter($id){
        if(!isAllowedUpdateModule()){die();}

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->UserModel->update(
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

            $this->UserModel->update(
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
