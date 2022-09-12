<?defined('BASEPATH') OR exit('No direct script access allowed');
class Language extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function change($langCode)
    {
        $lang   =   new stdClass();
        if($langCode        ==  'en'){
            $lang->langCode =   'en';
            $lang->language =   'english';
        }elseif ($langCode  ==  'tr'){
            $lang->langCode =   'tr';
            $lang->language =   'turkish';
        }
        $this->session->set_userdata('lang', $lang);
        redirect($_SERVER['HTTP_REFERER']);
    }
}