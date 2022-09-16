<?php
function cdn(){
    return base_url();
}

function convertToSEO($text){

    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));


}
// Language helper
function lang($ref){
    $x      =   &get_instance(); //load CI instance
    $lang   =   $x->session->userdata('lang'); //read language identifier
    if (($lang == null) || ($lang == '')){ //if language identifier is blank
        $lang   =   new stdClass();
        $lang->langCode =   'en';
        $lang->language =   'english';
        $x->session->set_userdata('lang', $lang); //set default language is english
    }
    $x->lang->load('base',      $lang->language); //set language is selected
    return ($x->lang->line($ref)) ? $x->lang->line($ref) : $ref; //return translation
}
function language(){
    $x = &get_instance();
    $lang   =   $x->session->userdata('lang'); //read language identifier
    if (($lang == null) || ($lang == '')){ //if language identifier is blank
        $lang   =   new stdClass();
        $lang->langCode =   'en';
        $lang->language =   'english';
        $x->session->set_userdata('lang', $lang); //set default language is english
    }
    return $x->session->userdata('lang');
}

function get_readable_date($date){

    return strftime('%e %B %Y', strtotime($date));

}
function get_readable_hour($date){

    return strftime('%e %B %Y /<b>%R</b>', strtotime($date));

}

function isAdmin(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user->user_role == "Admin")
        return true;
    else
        return false;
}
function isDemo(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    //return true;

    if($user->user_role == "Demo"){
        echo "<button type='button' onclick='demoAlert()' class='btn btn-primary btn-md '>"; echo lang('save')."</button>";
        return false;
    }
    else
        return true;
}
function isDemoUpdate(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    //return true;

    if($user->user_role == "Demo"){
        echo "<button type='button' onclick='demoAlert()' class='btn btn-primary btn-md '>"; echo lang('update')."</button>";
        return false;
    }
    else
        return true;
}
function isDemoDelete(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    //return true;

    if($user->user_role == "Demo"){
        echo "<button type='button' onclick='demoAlert()' class='btn btn-danger btn-sm '>"."<i class='fa fa-trash'></i></button>";
        return false;
    }
    else
        return true;
}

function getActiveUser(){
    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user){
        return $user;
    }
    else{
        return false;
    }
}
function getUserRoles(){

    $t = &get_instance();
    return $t->session->userdata("user_roles");
}
function setUserRoles(){

    $t = &get_instance();

    $t->load->model("UserRoleModel");

    $user_roles = $t->UserRoleModel->getAll(
        array(
            "isActive"  => 1
        )
    );

    $roles = [];
    foreach ($user_roles as $role){
        $roles[$role->id] = $role->permissions;
    }
    $t->session->set_userdata("user_roles", $roles);

}


function getControllerList(){

    $t = &get_instance();

    $controllers = array();
    $t->load->helper("file");

    $files = get_dir_file_info(APPPATH. "controllers", FALSE);

    foreach (array_keys($files) as $file){
        if(($file !== "index.html" ) && ($file !== "Dashboard.php" ) ){
            $controllers[] = str_replace(".php", '', $file);
        }
    }
    return $controllers;

}

function send_email($toEmail = "", $subject = "", $message = ""){

    $t = &get_instance();

    $t->load->model("EmailSettingModel");

    $email_settings = $t->EmailSettingModel->get(
        array(
            "isActive"  => 1
        )
    );

    $config = array(

        "protocol"   => $email_settings->protocol,
        "smtp_host"  => $email_settings->host,
        "smtp_port"  => $email_settings->port,
        "smtp_user"  => $email_settings->user,
        "smtp_pass"  => $email_settings->password,
        "starttls"   => true,
        "charset"    => "utf-8",
        "mailtype"   => "html",
        "wordwrap"   => true,
        "newline"    => "\r\n"
    );

    $t->load->library("email", $config);

    $t->email->from($email_settings->from, $email_settings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);

    return $t->email->send();

}

function getSettings(){

     $t = &get_instance();
     $t ->load->model("SettingsModel");

     if($t->session->userdata("settings")){
         $settings = $t->session->userdata("settings");
     } else {
         $settings = $t->SettingsModel->get();

         if (!$settings) {

             $settings = new stdClass();
             $settings->company_name = "LOREM IPSUM";
             $settings->logo = "default";

         }

         $t->session->set_userdata("settings", $settings);
     }

     return $settings;
}
function getUsers(){

     $t = &get_instance();
     $t ->load->model("UserModel");
     $u = $t->UserModel->getAll(array("isActive" => 1));
     return $u;
}

function getCategoryTitle($category_id = 0){

    $t=&get_instance();
    $t->load->model("PortfolioCategoryModel");
    $category = $t->PortfolioCategoryModel->get(
        array(
            "id" => $category_id
        )
    );

    if($category){
        return $category->title;
    }
    else{
        return "<b style='color: red'>".lang('not-defined')."</b>";
    }
}
function upload_picture($file, $uploadPath,$name){

    $t = &get_instance();
    $t->load->library("simpleimagelib");


    if(!is_dir("{$uploadPath}")){
        mkdir("{$uploadPath}");
    }

    $upload_error = false;
    try {

        $simpleImage = $t->simpleimagelib->get_simple_image_instance();

        $simpleImage
            ->fromFile($file)
            ->thumbnail('64','64','center')
            ->toFile("{$uploadPath}/$name", null, 75);

    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }

    if($upload_error){
        echo $error;
    } else {
        return true;
    }


}
function upload_Model($file, $uploadPath,$name){

    $t = &get_instance();
    $t->load->library("simpleimagelib");


    if(!is_dir("{$uploadPath}")){
        mkdir("{$uploadPath}");
    }

    $upload_error = false;
    try {

        $simpleModel = $t->simpleimagelib->get_simple_image_instance();

        $simpleModel
            ->fromFile($file)
            ->toFile("{$uploadPath}/$name", null, 75);

    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }

    if($upload_error){
        echo $error;
    } else {
        return true;
    }


}

function get_picture($path = "", $picture = ""){

    if($picture != ""){

        if(file_exists(FCPATH . "uploads/$path/$picture")){
            $picture = base_url("uploads/$path/$picture");
        } else {
            $picture = base_url("assets/images/default_logo.png");

        }

    } else {

        $picture = base_url("assets/images/default_logo.png");

    }

    return $picture;

}


function get_page_list($page){

    $page_list = array(
        "home_v"                => "Anasayfa",
        "about_v"               => "Hakkımızda Sayfası",
        "news_list_v"           => "Haberler Sayfası",
        "Galleries"             => "Galeri Sayfası",
        "portfolio_list_v"      => "Portfolyo Sayfası",
        "reference_list_v"      => "Referanslar Sayfası",
        "service_list_v"        => "Hizmetler Sayfası",
        "course_list_v"         => "Eğitimler Sayfası",
        "brand_list_v"          => "Markalar Sayfası",
        "contact_v"             => "İletişim Sayfası",
    );


    return (empty($page)) ? $page_list : $page_list[$page];
}