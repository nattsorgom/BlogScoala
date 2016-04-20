<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23.03.2016
 * Time: 19:40
 */
class Contact_model extends DB {
    /*function __construct(){
        parent::__construct();
    }*/
    function addMessage($receiver, $email, $body) {
        $this->executeQuery("INSERT INTO contacts (receiver , email , body)
        VALUES ('".$receiver."' , '".$email."' , '".$body."');");
    }
}