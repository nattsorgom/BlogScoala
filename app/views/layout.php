<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:53
 */
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->title; ?></title>
    <link rel="stylesheet" type="text/css" href="/blog_scoala/public/css/style.css">

</head>


<body>
<h1 class="logo">ABOVE AND BELOW</h1>
<div class="menu">
        <a href="/blog_scoala/Home">Home</a>

        <a href="/blog_scoala/Articles">Articles</a>

        <a href="/blog_scoala/Gallery">Gallery</a>

        <a href="/blog_scoala/Authors">Authors</a>

        <a href="/blog_scoala/Contact">Contact</a>
</div>




<div class="main-body">
<?php include $this->page_view; ?>
</div>
<div class="second-body">
<p>Some text or stuff here !</p>
    <?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 15.02.2016
     * Time: 21:15
     */


    echo "<h3>ADMIN VIEW</h3>";
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
        echo "<a href='/blog_scoala/Admin/logout'>Log Out</a>";


    }
    ?>

</div>
<footer>
  <p>FOOTER</p>
</footer>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.js"></script>
<script type="text/javascript" src="public/js/menu.js"></script>
</body>
</html>