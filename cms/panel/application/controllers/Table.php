<?php

class Copy extends VS_Controller
{
    public $vFolder = "";

    public function __construct()
    {

        parent::__construct();
        $table_name_cont_class = $this->input->post("table_name_cont_class");

        $this->Copy = $table_name_cont_class;
        $this->vFolder = "news_v";

        //$this->load->model("NewsModel");

        if(!getActiveUser()){redirect(base_url("Login"));}


    }

    public function index(){

        $vData = new stdClass();

       /* $items = $this->NewsModel->getAll(
            array(), "rank ASC"
        );*/

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
       // $vData->items = $items;

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
    }

    /*public function NewForm(){

        if(!isAllowedWriteModule()){
            redirect(base_url('News'));
        };

        $vData = new stdClass();


        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "add";

        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);

    }

    public function save(){
               if(!isAllowedWriteModule()){die();}


            $vData = new stdClass();

            $vData->vFolder = $this->vFolder;
            $vData->subFolder = "add";



            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


    }

    public function updateForm($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url('News'));
        };

        $vData = new stdClass();

        $item = $this->NewsModel->get(
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
        $vData = new stdClass();

        $item = $this->NewsModel->get(
            array(
                "id"    => $id,
            )
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "update";
        $vData->item = $item;

            $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);


    }

    public function delete($id){

        if(!isAllowedDeleteModule()){
            redirect(base_url($this->router->fetch_class()));
        }

        $delete = $this->NewsModel->delete(
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
        redirect(base_url("News"));

    }

    public function isActiveSetter($id){

               if(!isAllowedUpdateModule()){die();}
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->NewsModel->update(
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

            $this->NewsModel->update(
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
*/

}
