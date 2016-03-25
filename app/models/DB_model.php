<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:52
 */
class DB {
    protected $database;

    function __construct() {

        $this->database = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
        //echo"gsdhsd";
    }

    function executeQuery($query){
        //var_dump($query);
        $statement = $this->database->prepare ($query);
        $statement->execute();
        return $statement;
    }
}
