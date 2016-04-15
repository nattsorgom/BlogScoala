<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2016
 * Time: 21:14
 */
class Admin
{
    public $js_file = "admin.js";
    public $all_users;
    public $articles;
    public $title =  'Admin';
    public $page_view = VIEWS.'admin_view.php';
    public $error_message = 'Please Log In or Sign Up !';

    function __construct()
    {
            require MODELS . "DB_model.php";
            require MODELS . "Admin_model.php";
            require MODELS . "Articles_model.php";
            $this->all_users = new Admin_model();
            $this->articles = new Articles_model();
    }

    function index()
    {
        if (empty($_SESSION['logat'])) {
            if (isset($_POST['user']) && isset($_POST['pass'])) {
                $user = $this->test_input($_POST['user']);
                $pass = $this->test_input($_POST['pass']);
                if (count($this->all_users->login($user, $pass)) == 1) {
                    $_SESSION['user'] = $user;
                    $_SESSION['logat'] = true;

                } else {
                    $this->error_message = "Username and password do not match !";
                }
            } else {
                $_SESSION['logat'] = false;
            }
        }
        include VIEWS . "layout.php";
    }


    function test_input($data)
    {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
        return $data;
    }

    function logout()
    {
        session_destroy();
        header('Location:/blog_scoala/');
    }

    function getJson()
    {
        if (!$_SESSION['logat'] == true) {
            header('Location:/blog_scoala/');
        } else {
            header('Content-Type: application/json');
            $articlesModel = new Articles_model();
            $articles = $articlesModel->getAll(1);
            echo json_encode($articles);
        }
    }

    function addArticle()
    {

    }




}