<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:56
 */
class Home {
    public $js_file = "home.js";
    public $page_view = VIEWS.'home_view.php';
    public $title = 'Home';
    public $error_message = 'Please Log In or Sign Up !';

    function __construct() {
        //echo "Controlleru de Home <br>";
    }
    function index() {
        //echo "functia de index de la home";
        include VIEWS . "layout.php";
    }

}

?>