<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:52
 */

class Articles_model extends DB{
    function getAll($page) {
        $page = $page - 1;
        $page = $page*3;
        $statement = $this->executeQuery("SELECT * FROM articles  ORDER BY creation_date DESC LIMIT $page, 3 ");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function getArticles($page,$category){
            $page = $page - 1;
            $page = $page*3;
            //var_dump($page);
            $statement = $this->executeQuery("SELECT * FROM articles WHERE category='$category' ORDER BY creation_date DESC LIMIT $page, 3 ");
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }
    function getPages($category = Null, $field = 'id') {
        if ($category == Null ) {
        //echo $field;
        $nr_art = $this->executeQuery("SELECT COUNT($field) FROM articles WHERE '$field' IS NOT NULL  ");
        $total = $nr_art->fetchAll();
        //var_dump($total);
        $result = ($total[0][0]);
        return (ceil($result/3));
    } else {
        $nr_art = $this->executeQuery("SELECT COUNT($field) FROM  articles WHERE category='$category' ");
        $total = $nr_art->fetchAll();
        //var_dump($total[0][0]);
        $result = $total[0][0];
        return (ceil($result/3));
        }
    }


    function getArticle($id) {
        $statement = $this->executeQuery("SELECT * FROM articles WHERE id='$id' ");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function addArticle ($category,$title,$body,$author) {
        $this->executeQuery("INSERT INTO articles (category,title, body, author)
        VALUES ('".$category."','".$title."','".$body."','".$author."');");
        $last_id = $this->database->lastInsertId();
        return $last_id;
    }
    function insertPicture($value, $id){
        $this->executeQuery("UPDATE articles SET img = '$value' WHERE id = '$id' ");
    }
    function updateArticle() {

    }

    function deleteArticle() {

    }
}