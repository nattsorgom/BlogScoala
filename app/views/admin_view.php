<?php if ($_SESSION['logat'] != true) {
header('Location:/blog_scoala/');
} else {
    echo "<div class='admin-body'>";
    echo "<h3>Admin tools :</h3>";
    echo "<p id='add-article-button' class='my-buttons'>Add Articles</p>";
    echo "<p id='edit-button' class = 'my-buttons'>Edit Articles/Comments</p>";
    echo "</div>";
}
?>
