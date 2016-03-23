<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2016
 * Time: 22:28
 */
class Authors {
    public $page_view = VIEWS.'authors_view.php';
    public $title = 'Authors';

    function index() {
        //echo "authors index method";
        include VIEWS . "layout.php";
    }

}