<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2016
 * Time: 21:14
 */
class Admin
{
    public $all_users;
    public $articles;
    public $addArticleForm;
    public $page_view = VIEWS.'admin_view.php';
    public $title = 'Admin';

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
        //echo "login index method";
        //session_destroy();
        //echo ($_POST['user']);
        //echo ($_POST['pass']);
        if (empty($_SESSION['logat'])) {
            if (isset($_POST['user']) && isset($_POST['pass'])) {
                $user = $this->test_input($_POST['user']);
                $pass = $this->test_input($_POST['pass']);
                if (count($this->all_users->login($user, $pass)) == 1) {
                    $_SESSION['user'] = $user;
                    $_SESSION['logat'] = true;
                    Header('Location:/blog_scoala/Home/index');
                } else {
                    echo "user and password incorect";
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
        header('Location:/blog_scoala/Home/index');
    }

    function getJson()
    {
        header('Content-Type: application/json');
        $articlesModel = new Articles_model();
        $articles = $articlesModel->getAll(1);
        echo json_encode($articles);
    }

    function addArticle()
    {
        //echo "ADD A ARTICLE !";
        $this->addArticleForm = "
        <form action='http://localhost/blog_scoala/Admin/addArticle'>
            <select id='category'>
                <option value='above'>Above</option>
                <option value='below'>Below</option>
                <option value='people'>People</option>
            </select><br>
            <input type='text' name='title'><br>
            <textarea name='body'></textarea><br>
            <input type='submit' value='Add Article'><br>
        <form>";
        if (isset($_GET['category']) && isset($_GET['title']) && isset($_GET['title']) && isset($_GET['body'])) {
            $this->articles->addArticle($_GET['category'], $_GET['title'], $_GET['body'], $_GET['img']);
            echo "New Article Added in " . $_GET['category'];
        } else {
            echo "empty fields";
        }
    }




}