<?php if (!$_SESSION['logat'] == true) {
header('Location:/blog_scoala/');
} else {
    echo "<h3>ADMIN VIEW<h3>";
}
?>
