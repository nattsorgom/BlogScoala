<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:52
 */
class DB {
    protected $db;
    function __construct() {
        $this->db = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    }

    function executeQuery($query){
        $statement = $this->db->prepare ($query);
        $statement->execute();
        return $statement;
    }
}
