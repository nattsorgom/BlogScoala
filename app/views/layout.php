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

<?php if ($_SESSION['logat']) {
    echo "
    <a href='/blog_scoala/Authors'>
       ".$_SESSION['user']."
    </a>

        <a href='/blog_scoala/Admin/logout'>Log Out</a>
    ";
} ?>
</div>




<div class="main-body">
<?php include $this->page_view; ?>
</div>
<div class="second-body">
<p>Some text or stuff here !</p>

</div>
<footer>
  <p>FOOTER</p>
</footer>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.js"></script>
<script type="text/javascript" src="public/js/menu.js"></script>
</body>
</html>