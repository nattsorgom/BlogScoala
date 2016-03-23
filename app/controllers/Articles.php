<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 20:22
 */

class Articles
{
    public $all_articles;
    public $current_page;
    public $page_number;
    public $total_pages;
    public $all_comments;
    public $page_view = VIEWS.'articles_view.php';
    public $title = 'Articles';
    public

    function __construct()
    {
        require MODELS . "DB_model.php";
        require MODELS . "Articles_model.php";
        require MODELS . "Comments_model.php";
        $this->all_articles = new Articles_model();
        $this->all_comments = new Comments_model();
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
        header('Content-Type: application/json');
        $comments = $this->all_comments->getComments($_GET['articleIdComments']);
        echo json_encode($comments);

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

    function addArticle($category, $title, $body, $author, $img)
    {
        if (!$_SESSION['logat']) {
            header('Location:/blog_scoala/Login/index');
        }
        echo $_POST['title'];
        $this->all_articles->addArticle();


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