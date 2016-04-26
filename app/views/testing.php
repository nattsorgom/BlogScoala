<?php
/**
 * Created by PhpStorm.
 * User: Ioan
 * Date: 4/26/2016
 * Time: 12:43 PM

 */
$target_dir = "public/img/".$_POST['pictureCategory']."/".$_POST['pictureid']."/";
mkdir($target_dir);
function getFileExtension($file){
    $extensie = explode('.',$file);
    $n = count($extensie);
    $n = $n-1;
    return $extensie[$n];
}
$extension = getFileExtension($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'] , $target_dir . $_POST['pictureid'].".".$extension);
echo "<br>".$_FILES['file']['name']."<br>";
echo $target_dir . $_FILES['file']['name']."<br>";
//print_r($_POST['pictureid']);
//print_r($_FILES);
?>