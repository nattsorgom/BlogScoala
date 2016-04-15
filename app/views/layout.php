<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12.02.2016
 * Time: 19:53
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $this->title; ?></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/blog_scoala/public/css/style.css">

</head>


<body>
    <h1 class="logo">ABOVE AND BELOW</h1>
    <div class="container-fluid">
        <div class="menu">
                <a href="/blog_scoala/Home">Home</a>

                <a href="/blog_scoala/Articles">Articles</a>

                <a href="/blog_scoala/Gallery">Gallery</a>

                <a href="/blog_scoala/Authors">Authors</a>

                <a href="/blog_scoala/Contact">Contact</a>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="main-body">
                    <?php include $this->page_view; ?>
                </div>
            </div>

            <div class="col-sm-3 sidenav">
                <div class="second-body">
                    <?php require 'app/views/right_panel_view.php';?>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid">
      <p>FOOTER</p>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/animate.js"></script>
    <script type="text/javascript" src="public/js/<?php echo $this->js_file; ?>"></script>

</body>
</html>