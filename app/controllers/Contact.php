<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23.03.2016
 * Time: 19:37
 */
class Contact {
    public $js_file = 'contact.js';
    public $page_view;
    public $title = 'Contact';
    public $contact_model;
    public $message = 'Contact us !';
    public $error_message = 'Please Log In or Sign Up !';

    function __construct() {
        $this->page_view = VIEWS.'contact_view.php';
        require MODELS . "DB_model.php";
        require MODELS . "contact_model.php";

    }
    function index() {
        include VIEWS.'layout.php';
    }
    function sendMessage() {
        $this->contact_model = new Contact_model();
        $this->contact_model->addMessage($_POST['receiver'],$_POST['email'],$_POST['body']);
        $this->sendEmail();
        header('Location:http://localhost/blog_scoala/Contact/message/');
    }
    function sendEmail() {
        if(isset($_POST['submit'])) {
            $receiver = $_POST['receiver'];
            $subject = " myblog contact submission ";
            $body = $_POST['body'];
            mail($receiver, $subject, $body);
        }
    }
        function message() {
            $this->message = 'Your message has been sent !';
            include VIEWS.'layout.php';
        }
}