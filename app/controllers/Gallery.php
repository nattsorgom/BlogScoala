<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14.02.2016
 * Time: 15:09
 */
class Gallery {
    public $all_img;
    public $page_number;
    public $total_pages;
    public $current_page;
    public $page_view ;
    public $title = 'Gallery';
    public $error_message = 'Please Log In or Sign Up !';

    function __construct() {
        //echo "controllerul de Gallery";
        $this->page_view = VIEWS.'gallery_view.php';
        require MODELS . "DB_model.php";
        require  MODELS . "Articles_model.php";
        $this->all_img = new Articles_model();
        $this->defaultPageNumber();

    }
    function index() {
        //echo " gallery index method";
        $this->total_pages = $this->all_img->getPages( null ,'img');
        $this->current_page = $this->all_img->getAll($this->page_number);
        include VIEWS . "layout.php";
    }
    function defaultPageNumber () {
        if (isset($_GET['page_number']) && !empty($_GET['page_number'])) {
            $this->page_number = $_GET['page_number'];
        } else {
            $this->page_number = 1;
        }
    }

}