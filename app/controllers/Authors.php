<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2016
 * Time: 22:28
 */
class Authors {
    public $js_file = 'authors.js';
    public $page_view;
    public $title = 'Authors';
    public $error_message = 'Please Log In or Sign Up !';

    function __construct(){
        $this->page_view = VIEWS.'authors_view.php';
    }
    function index() {
        //echo "authors index method";
        include VIEWS . "layout.php";
    }

}