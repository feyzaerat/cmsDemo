<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public $vFolder = "";


    public function __construct()
    {
        parent::__construct();
        $this->load->library('logger');

        $this->vFolder = "users_v";
        $this->load->model("UserModel");
        $this->load->model("LogModel");
        $this->load->model("EmailSettingModel");


    }

    public function login()
    {

        $vData = new stdClass();
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "login";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    public function DoLogin(){

        if(getActiveUser()){
            redirect(base_url());
        }

        $this->load->library("form_validation");


        $this->form_validation->set_rules("email", lang('mail-address'), "required|trim|valid_email");
        $this->form_validation->set_rules("password", lang('password'), "required|trim");



        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email" => lang('enter-valid-mail'),

            )
        );

       if($this->form_validation->run() == FALSE ){

           $vData = new stdClass();
           $vData->vFolder = $this->vFolder;
           $vData->subFolder = "login";
           $vData->form_error = true;

           $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


       }
       else{
          $user = $this->UserModel->get(
              array(
                  "email" => $this->input->post("email"),
                  "password" =>md5( $this->input->post("password")),
                  "isActive" =>1
              )
          );

          if($user){

              $alert = array(
                  "title" => lang('successful'),
                  "type" => "success",
                  "text" => "$user->full_name" . " ".lang('welcome')
              );
              setUserRoles();

              $this->LogModel->add(array(
                  'user_id' => $user->id,
                  'type'    => 'get',
                  'type_id' => 1,
                  'rank' => 0,
                  'token'   => 'Login',
                  'created_ip_address'   => $this->input->ip_address(),
                  'comment'   => $user->user_name . ' Logged in'
              ));
              $this->session->set_userdata("user",$user);
              $this->session->set_flashdata("alert", $alert);

              redirect(base_url());

          }
          else{

              $alert = array(
                  "title" => lang('failed'),
                  "type" => "warning",
                  "text" => lang('failed-login-info')
              );


              $this->session->set_flashdata("alert", $alert);
              redirect(base_url('Login'));

          }


       }



    }

    public function logout(){
        $user=getActiveUser();

        $this->LogModel->add(array(
            'user_id' => $user->id,
            'type'    => 'get',
            'type_id' => 1,
            'rank' => 0,
            'token'   => 'Login',
            'created_ip_address'   => $this->input->ip_address(),
            'comment'   => $user->user_name . ' Logged out '
        ));


        $this->session->unset_userdata("user");
        redirect(base_url("Login"));

    }
   /* public function resetPass(){
        $this->load->helper("string");

        $this->load->library("form_validation");


        $this->form_validation->set_rules("email", "E-posta Adresi", "required|trim|valid_email");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email" => lang('enter-valid-mail'),

            )
        );

        if($this->form_validation->run()==FALSE){

            $vData = new stdClass();
            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "forget_password";
            $vData->form_error = true;

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

        }
        else {

            $user = $this->UserModel->get(
                array(
                    "isActive" => 1,
                    "email" => $this->input->post("email")
                )
            );
            $mail = $this->EmailSettingModel->get(
                array(
                    "isActive" => 1
                )
            );

            if ($user) {

                $this->load->helper("string");
                $temp_password = random_string();

                $config=array(
                    "protocol" => $mail->protocol,
                    "smtp_host" => $mail->host,
                    "smtp_port" => $mail->port,
                    "smtp_user" => $mail->user,
                    // "smtp_pass" => "kdvudffrlkbeyojp",
                    "smtp_pass" => $mail->password,
                    "starttls" => true,
                    "charset" => "utf-8",
                    "mailtype" => "html",
                    "wordwrap" => true,
                    "newline" => "\r\n",

                );
                $this->load->library("email",$config);

                $this->email->from("admin@feyzaerat.com", "CMS ADMIN DASHBOARD");
                $this->email->to("feyzakrnfl@gmail.com");
                $this->email->subject("Şifremi Unuttum");
                $this->email->message(" FKE Panele geçici olarak <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz");

                $send=$this->email->send();

                if ($send) {

                    $this->UserModel->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );

                    $alert = array(
                        "title" =>lang('successful'),
                        "text" => "Şifreniz Başarılı Bir Şekilde Sıfırlandı. Lütfen E-Posta Kutunuzu Kontrol Ediniz",
                        "type" => "success"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("Login"));
                    die();


                } else {

                    //echo $this->email->print_debugger();
                    //die();

                    $alert = array(
                        "title" => lang('failed'),
                        "text" => "E-Posta Gönderilirken Bir Problem Oluştu !",
                        "type" => "error"
                    );
                    //echo $this->email->print_debugger();
                   // die();
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("forget_password"));
                    die();


                }


            } else {

                $alert = array(
                    "title" => lang('failed'),
                    "text" => "Böyle bir kullanıcı bulunamadı!!!",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("forget_password"));

            }

        }

    }*/
    public function forgetPass(){
        if(getActiveUser()){

            redirect(base_url());
        }

        $vData = new stdClass();

        
        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "forget_password";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function resetPass(){

        $this->load->library("form_validation");


        $this->form_validation->set_rules("email", lang('mail-address'), "required|trim|valid_email");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b>". lang('must-be-filled'),
                "valid_email" => lang('enter-valid-mail'),

            )
        );

      if($this->form_validation->run()==FALSE){

          $vData = new stdClass();
          $vData->vFolder = $this->vFolder;
          $vData->subFolder = "forget_password";
          $vData->form_error = true;

          $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

      }
      else{

          $user = $this->UserModel->get(
              array(
                  "isActive" => 1,
                  "email" =>$this->input->post("email")
              )
          );

          if($user){

              $this->load->helper("string");
              $temp_password = random_string();

              $send=send_email($user->email,"Reset Password", "
      <!doctype html>
      <html lang='en'>
      <head>
      <meta charset='UTF - 8'>
      <meta name='viewport' content='width = device - width, user - scalable = no, initial - scale = 1.0, maximum - scale = 1.0, minimum - scale = 1.0'>
      <meta http-equiv='X - UA - Compatible' content='ie = edge'>
      <title>Reset Password</title>
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
                  <p style='margin: 0;'> Your Temporary Password has been created. You can login to the panel with the password below. </p><br>
                  <p style='margin: 0;'> Your temporary password : <b>{$temp_password}</b> </p>
                </td>
              </tr>
              <!-- BULLETPROOF BUTTON -->
              <tr>
                <td bgcolor='#ffffff' align='left'>
                  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                        <table border='0' cellspacing='0' cellpadding='0'>
                          <tr>
                              <td align='center' style='border-radius: 3px;' bgcolor='#b4d0e1'><a href='https://feyzaerat.com/cms_2/panel/login' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none;  padding: 15px 25px; border-radius: 2px; border: 1px solid #3F7591FF!important; display: inline-block;'>LOGIN</a></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
             </table>
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
                  <p style='margin: 0;'>You received this email because you requested a password reset. If you did not, <a href='mailto:admin@feyzaerat.com' target='_blank' style='color: #ffffff; font-weight: 700;'>please contact us.</a>.</p>
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










              if($send){
                  echo "E-posta başarılı bir şekilde gonderilmiştir..";

                  $this->UserModel->update(
                      array(
                          "id"  => $user->id
                      ),
                      array(
                          "password" =>md5($temp_password)
                      )
                  );

                  $alert = array(
                      "title" =>lang('successful'),
                      "text" => "Şifreniz Başarılı Bir Şekilde Sıfırlandı. Lütfen E-Posta Kutunuzu Kontrol Ediniz",
                      "type"  => "success"
                  );

                  $this->session->set_flashdata("alert", $alert);
                  redirect(base_url("Login"));
                  die();


              } else {

                  echo $this->email->print_debugger();
                  die();
                  $alert = array(
                      "title" => lang('failed'),
                      "text" => "E-Posta Gönderilirken Bir Problem Oluştu !",
                      "type"  => "error"
                  );

                  $this->session->set_flashdata("alert", $alert);
                  redirect(base_url("forget_password"));
                  die();


              }


          } else {

              $alert = array(
                  "title" => lang('failed'),
                  "text" => "Böyle bir kullanıcı bulunamadı!!!",
                  "type"  => "error"
              );

              $this->session->set_flashdata("alert", $alert);
              redirect(base_url("forget_password"));

          }


      }



    }
}
