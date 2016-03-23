<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2016
 * Time: 21:14
 */
class Admin_model extends DB{
    function login($user,$pass) {
        $statement = $this->executequery("SELECT user , pass FROM users WHERE user='$user' AND pass='$pass' ");
        $result = $statement -> fetchAll();
        //var_dump( $result);
        return $result;
    }
}