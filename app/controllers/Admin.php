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
    public $page_view;
    public $error_message = 'Please Log In or Sign Up !';

    function __construct()
    {
        $this->page_view = VIEWS.'admin_view.php';
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

    function uploadFile() {
        if (!$_SESSION['logat']) {
            header('Location:/blog_scoala/Admin/index');
        }
        $target_dir = "public/img/".$_POST['pictureCategory']."/".$_POST['pictureId']."/";
        mkdir($target_dir);
        function getFileExtension($file){
            $extensie = explode('.',$file);
            $n = count($extensie);
            $n = $n-1;
            return $extensie[$n];
        }
        $extension = getFileExtension($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'] , $target_dir . $_POST['pictureId'].".".$extension);
        $pictureName = $_POST['pictureId'].".".$extension;
        $this->articles->insertPicture($pictureName, $_POST['pictureId']);
        header('Location:/blog_scoala/Articles');

        //var_dump($_POST);
        //var_dump($_FILES);
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