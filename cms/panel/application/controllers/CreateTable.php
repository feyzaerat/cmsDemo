<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateTable extends CI_Controller
{

    public $vFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ProductModel");
        $this->load->model("UserModel");
        $this->load->model("NewsModel");
        $this->load->model("CourseModel");
        $this->load->model("GalleryModel");
        $this->load->model("ProductimageModel");
        $this->load->model("PortfolioModel");

        $this->vFolder = "table_v";
        if (!getActiveUser()) {
            redirect(base_url("Login"));
        }

    }

    public function index()
    {

        $vData = new stdClass();

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }
    public function add()
    {
        $tabLeName = $this->input->post("table_name");
        $table_name_cont_class = $this->input->post("table_name_cont_class");

        if (!is_dir("$tabLeName" . "_v")) {
            mkdir("./application/views/$tabLeName" . "_v/list/", 0777, true);
            mkdir("./application/views/$tabLeName" . "_v/list/page_scripts/", 0777, true);
            copy('./application/views/dashboard_v/list/index.php', "./application/views/$tabLeName" . "_v/list/index.php");
            copy('./application/views/dashboard_v/list/content.php', "./application/views/$tabLeName" . "_v/list/content.php");
            copy('./application/views/dashboard_v/list/page_scripts/main.js', "./application/views/$tabLeName" . "_v/list/page_scripts/main.js");
            copy('./application/views/dashboard_v/list/page_scripts/popper.js', "./application/views/$tabLeName" . "_v/list/page_scripts/popper.js");
            copy('./application/views/dashboard_v/list/page_scripts/widgets.scss', "./application/views/$tabLeName" . "_v/list/page_scripts/widgets.scss");
            copy('./application/controllers/Table.php', "./application/controllers/".ucfirst( $tabLeName).".php");
            copy('./application/models/TableModel.php', "./application/models/".ucfirst( $tabLeName)."Model.php");
        }


        $this->load->dbforge();



// define table fields
       /* $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 9,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => 30
            ),
            'description' => array(
                'type' => 'TEXT',
                'constraint' => 300
            ),
            'img_url' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
            ),
            'createdAt' => array(
                'type' => 'DATETIME',
                'constraint' => 6
            ),
            'updatedAt' => array(
                'type' => 'DATETIME',
                'constraint' => 6
            ),
            'created_ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => 15
            ),
            'updated_ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => 15
            ),
            'createdBy_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 4
            ),
            'updatedBy_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 4
            ),
            'isActive' => array(
                'type' => 'VARCHAR',
                'constraint' => 4
            ),
            'rank' => array(
                'type' => 'VARCHAR',
                'constraint' => 4
            )
        );

        $this->dbforge->add_field($fields);

// define primary key
        $this->dbforge->add_key('id', TRUE);

// create table
        $this->dbforge->create_table("$tabLeName");

*/

        $vData = new stdClass();

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        print_r($table_name_cont_class);
        die();
        $render_html = $this->load->view("$tabLeName" . "_v/list/index", $vData, true);

        echo $render_html;

        //redirect(base_url((ucfirst( $tabLeName)),$vData));
    }
    public function changeName()
    {

        $vData = new stdClass();

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "change";


        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }
}