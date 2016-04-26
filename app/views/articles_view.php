
<div class="btn-group">
    <ul class="nav nav-pills nav-justified">
        <li><a >Above</a></li>
        <li><a >Below</a></li>
        <li><a >People</a></li>
    </ul>
</div>
<div class='articole'>
<?php
$articles = $this->current_page;
$picturePath = "public/img/";
for($i=0; $i<count($articles); $i++) {?>
        <div class="one-of-three-articles" data-articleid="
            <?php echo $articles[$i]['id'];?>">
            <h2 class="text-link"><?php echo 'Title : '.$articles[$i]["title"]; ?></h2><br>
            <img src="<?php echo $picturePath.$articles[$i]["category"]."/".$articles[$i]["id"]."/".$articles[$i]["img"]; ?>"><br>
            <p class="text-link"><?php echo substr($articles[$i]["body"],0,125).' ... '; ?></p>
            <p><i> author : </i><?php echo $articles[$i]["author"]?></p>
        </div>
<?php }?>
</div>


<div class = 'paginare'>
<?php
    for ($i = 1; $i <= $this->total_pages; $i++) {
        echo "<button class='page-button' data-pagenumber='".$i."'>".$i."</button>";
    }
?>
</div>
