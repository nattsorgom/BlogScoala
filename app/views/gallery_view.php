<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14.02.2016
 * Time: 15:16
 */

echo "<h3>Gallery HTML</h3>";
//echo "<img src='public/img/40.jpg'>";
$articles = $this->current_page;//$x
    for ($x=0; $x<count($articles); $x++) {
    echo "<div> ";
    echo " <hr><img src='".BASE_URL . $articles[$x]['img'] . "'><br>";
    echo "</div>";
}
for ($i = 1; $i <= $this->total_pages; $i++) {
    echo "  <a href='/blog_scoala/Gallery/?page_number=".$i."'>" . $i . "</a>  ";
}
?>