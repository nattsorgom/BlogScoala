<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2016
 * Time: 21:15
 */


if ($_SESSION['logat'] == false) {
    echo
"<p>".$this->error_message."</p>
<hr>
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
    echo "<hr>
<button class='btn btn-primary btn-block'>Adauga un articol</button><br>
<button class='btn btn-primary btn-block'>Editeaza articole</button><br>
<button class='btn btn-primary btn-block'>Sterge articole/commenturi</button><br>
<button class='btn btn-primary btn-block'><a href='/blog_scoala/Admin/logout'>Log Out</a></button>";
}
?>


