<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:52
 */
class Controller {
    public $skip_segment = array (
        "blog_scoala"
    );
    public $controller_name;
    public $method_name;
    public $last_segments = array();
    public $params = array();
    public $controller;
    //public $page_view;


    function __construct() {

        session_start();
        $this->checkSession();
        $this->url = $this->parseUrl();
        $this->loadController();
        $this->callMethod();

    }

    function parseUrl() {
        $url = explode('/',filter_var(rtrim($_SERVER["REQUEST_URI"], '/'), FILTER_SANITIZE_URL));
        foreach ($url as $segment) {
            if (empty($segment) )  continue;
            if (in_array($segment, $this->skip_segment)) continue;
            if ($this->controller_name && $this->method_name) {
                $this->last_segments[] = $segment;
                continue;
            }
            if (empty($this->controller_name)) {
                $this->controller_name = $segment;
            } else {
                $this->method_name = $segment;
            }
        }
        $this->pushParams();

    }
    function pushParams() {
        foreach ($this->last_segments as $key=>$element) {
            if ($key%2 == 0) {
                $this->params[$element] = isset($this->last_segments[$key+1]) ? $this->last_segments[$key+1] : null;
            }
        }
    }

    function loadController(){
        $path = "app/controllers/".$this->controller_name.".php";
        if (file_exists($path)) {
            require $path;
            //var_dump($path);
            $this->controller = new $this->controller_name;
        } else {

            $this->controller_name = "Home";
            $this->loadController();
        }
    }

    function callMethod() {
        if (method_exists($this->controller, $this->method_name)) {
            call_user_func_array(array($this->controller,$this->method_name),array($this->params));

        } else {
            $this->method_name = "index";
            $this->callMethod();
        }
    }

    function checkSession() {
        if (!isset($_SESSION['logat'])){
            $_SESSION['logat'] = false;
        }
    }
    /*function isLoggedIn()
    {
        if (isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
            return true;
        } else {
            return false;
        }
    }*/
}



?>