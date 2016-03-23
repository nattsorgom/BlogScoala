<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2016
 * Time: 21:15
 */


echo "<h3>ADMIN VIEW HTML </h3>";
//var_dump($this->isLoggedIn());
//var_dump($_SESSION['logat']);

if ($_SESSION['logat'] == false) {
    echo "
<form class='login-form' role='form' method='POST' action='/blog_scoala/Admin' >

    <div class='form-group' >
        <label>Username :</label>
        <input type='text' class='form-control' name='user'>
    </div>
    <div class='form-group'>
        <label>Password :</label>
        <input type='password' class='form-control' name='pass'>
    </div>
    <div class='form-group'>
        <button type='submit' class='login-button'>Log In</button>
    </div>

</form> ";
    } else {
    echo "<hr> You are now Logged In as : <b>" . $_SESSION['user'] . "</b><br>";
    echo "<div class='main-body'></div>";
}
?>

