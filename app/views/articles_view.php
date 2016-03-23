


<div class='articole'>
<?php
$articles = $this->current_page;
for($i=0; $i<count($articles); $i++) {?>
        <div class="one-of-three-articles" data-articleid="
            <?php echo $articles[$i]['id'];?>">
            <h2 class="text-link"><?php echo 'Title : '.$articles[$i]["title"]; ?></h2><br>
            <img src="<?php echo $articles[$i]['img'];?>"><br>
            <p class="text-link"><?php echo substr($articles[$i]["body"],0,125).' ... '; ?></p>
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
