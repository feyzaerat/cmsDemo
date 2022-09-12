<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

        $this->vFolder = "dashboard_v";
        if(!getActiveUser()){
            redirect(base_url("Login"));
        }

    }

    public function index()
	{
        $vData = new stdClass();

        $images = $this->ProductimageModel->getAll(
            array(), "rank ASC"
        );
        $items = $this->UserModel->getAll(
            array(), "rank ASC"
        );
        $news = $this->NewsModel->getAll(
            array(), "rank ASC"
        );
        $courses = $this->CourseModel->getAll(
            array(), "rank ASC"
        );
        $galleries = $this->GalleryModel->getAll(
            array(), "rank ASC"
        );

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;
        $vData->images = $images;
        $vData->news = $news;
        $vData->courses = $courses;
        $vData->galleries = $galleries;


        $this->load->view("{$vData->vFolder}/{$vData->subFolder}/index", $vData);
	}
    public function privacy_policy()
	{

        $this->load->view("legal_pages_v/list/index");
    }

    function error_404(){
        $this->load->view("errors/html/error_404");
    }
    function error_db(){
        $this->load->view("errors/html/error_db");
    }
}
