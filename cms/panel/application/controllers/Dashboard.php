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
        $this->load->model("PortfolioModel");
        $this->load->helper("text");

        $this->vFolder = "dashboard_v";

        if(!getActiveUser()){redirect(base_url("Login"));}

    }

    public function index()
	{
        $vData = new stdClass();

        $images = $this->ProductimageModel->getAll(array(), "rank ASC");
        $items = $this->UserModel->getAll(array(), "rank ASC");
        $news = $this->NewsModel->getAll(array(), "rank ASC");
        $courses = $this->CourseModel->getAll(array(), "rank ASC");
        $galleries = $this->GalleryModel->getAll(array(), "rank ASC");

        $date=new DateTime();
        $countNews2 = $this->NewsModel->countToday();
        $countCourses2 = $this->CourseModel->countToday();
        $countGalleries2 = $this->PortfolioModel->countToday();
        $countProducts2 = $this->ProductModel->countToday(array("createdAt"=>$date));
        $countNews = $this->NewsModel->count();
        $countCourses = $this->CourseModel->count();
        $countGalleries = $this->GalleryModel->count();
        $countProducts = $this->ProductModel->count(array("createdAt"=>$date));

        $vData->vFolder = $this->vFolder;
        $vData->subFolder = "list";
        $vData->items = $items;
        $vData->images = $images;
        $vData->news = $news;
        $vData->courses = $courses;
        $vData->galleries = $galleries;
        $vData->countNews = $countNews;
        $vData->countCourses = $countCourses;
        $vData->countGalleries = $countGalleries;
        $vData->countProducts = $countProducts;
        $vData->countNews2 = $countNews2;
        $vData->countCourses2 = $countCourses2;
        $vData->countGalleries2 = $countGalleries2;
        $vData->countProducts2 = $countProducts2;


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
