<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 20:22
 */

class Articles
{
    public $js_file = "articles.js";
    public $all_articles;
    public $current_page;
    public $page_number;
    public $total_pages;
    public $all_comments;
    public $page_view;
    public $title = 'Articles';
    public $error_message = 'Please Log In or Sign Up !';

    function __construct()
    {
        $this->page_view = VIEWS.'articles_view.php';
        require MODELS . "DB_model.php";
        require MODELS . "Articles_model.php";
        require MODELS . "Comments_model.php";
        $this->all_articles = new Articles_model();

        $this->defaultPageNumber();
    }

    function index()
    {
        $this->total_pages = $this->all_articles->getPages();
        $this->current_page = $this->all_articles->getAll($this->page_number);
        include VIEWS . "layout.php";
    }
    function indexJson() {
        header('Content-Type: application/json');
        $this->total_pages = $this->all_articles->getPages();
        $this->current_page = $this->all_articles->getAll($this->page_number);
        //var_dump($this->current_page);
        echo json_encode($this->current_page);
    }
    function getOneArticleJson() {
        header('Content-Type: application/json');
        $articol = $this->all_articles->getArticle($_GET['articleId']);
        echo json_encode($articol);
    }
    function getCommentsForArticleJson() {
        $this->all_comments = new Comments_model();
        header('Content-Type: application/json');
        $comments = $this->all_comments->getComments($_GET['articleIdComments']);
        echo json_encode($comments);

    }
    function addComment() {
        $this->all_comments = new Comments_model();
        header('Content-Type: application/json');
        $article_id = $_POST['article_id'];
        $body = $this->test_input($_POST['body']);
        if ($_SESSION['logat']) {
            $email = $_SESSION['user'];
        } else {
            if (!isset($_POST['email'])||empty($_POST['email'])) {
                $email = 'Anonymous';
            } else {
                $email = $this->test_input($_POST['email']);
            }
        }
        $comment = $this->all_comments->addComment($article_id, $email, $body);
        echo json_encode(array("id"=>$comment));
    }

    function defaultPageNumber()
    {
        if (isset($_GET['page_number']) && !empty($_GET['page_number'])) {
            $this->page_number = $_GET['page_number'];
        } else {
            $this->page_number = 1;
        }
    }

    function above()
    {
        $this->total_pages = $this->all_articles->getPages('above');
        $this->current_page = $this->all_articles->getArticles($this->page_number, 'above');

    }

    function below()
    {
        $this->total_pages = $this->all_articles->getPages('below');
        $this->current_page = $this->all_articles->getArticles($this->page_number, 'below');

    }

    function people()
    {
        $this->total_pages = $this->all_articles->getPages('people');
        $this->current_page = $this->all_articles->getArticles($this->page_number, 'people');

    }

    function addArticle()
    {
        if (!$_SESSION['logat']) {
            header('Location:/blog_scoala/Admin/index');
        }
        header('Content-Type: application/json');
        $title = $this->test_input($_POST['title']);
        $body = $this->test_input($_POST['body']);
        $art = $this->all_articles->addArticle($_POST['category'],$title , $body, $_SESSION['user']);
        echo json_encode(array("id"=>$art));
    }


    function test_input($data)
    {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
        return $data;
    }

}
?>