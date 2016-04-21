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
        <ul class="nav nav-pills">
            <li><a href="/blog_scoala/Home">Home</a></li>
            <li><a href="/blog_scoala/Articles">Articles</a></li>
            <li><a href="/blog_scoala/Gallery">Gallery</a></li>
            <li><a href="/blog_scoala/Authors">Authors</a></li>
            <li><a href="/blog_scoala/Contact">Contact</a></li>
            <li role="presentation" class="dropdown">
                <?php if ($_SESSION['logat']!=true) { ?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Log In <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form role="form" method="POST" action="/blog_scoala/Admin">
                            <div class="form-group">
                                <label>Username :</label>
                                <input type="text" class="form-control" name="user">
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm btn-block">Log In</button>
                            </div>
                        </form>
                    </li>
                </ul>
                <?php  } else { ?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php echo " * ".$_SESSION['user']." * "; ?><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/blog_scoala/Admin">Admin Tools</li>
                    <li><a href="/blog_scoala/Admin/logout">Log Out</li>
                </ul>
                <?php } ?>
            </li>

        </ul>

        <div class="row">

            <div class="col-sm-9">
                <div class="main-body">
                    <?php include $this->page_view; ?>
                </div>
            </div>

            <div class="col-sm-3 sidenav">
                <div class="second-body">
                    <div class="well">
                        <p>Some stuff here</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="container-fluid">
      <p>FOOTER</p>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/<?php echo $this->js_file; ?>"></script>

</body>
</html>