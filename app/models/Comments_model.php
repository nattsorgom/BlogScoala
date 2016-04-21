<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:52
 */
class Comments_model extends DB{
    function getAll() {
        $statement = $this->executeQuery("SELECT * FROM comments");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function addComment($comment) {
        $this->executeQuery("INSERT into comments (article_id, email, body) values ('".$comment["article_id"]."', '".$comment["email"]."', '".$comment["body"]."');");
    }
    function getComments($id){
        $count = count($this->executeQuery("SELECT * FROM comments WHERE article_id='{$id}' ORDER BY creation_date DESC "));
        if ($count>0) {
            $comments = $this->executeQuery("SELECT * FROM comments WHERE article_id='{$id}' ORDER BY creation_date DESC");
            $result = $comments->fetchAll(PDO::FETCH_ASSOC);
        }
    return $result;
    }
}
