<?php
require_once("config/connection.php");
?>

<?php include 'include/header.php'; ?>

<?php include 'include/menu.php'; ?>

<!-- start container -->
<?php include 'include/title.php'; ?>

<?
/* page nbr */
$resulta1 = "";
if (isset($_GET['page']) && isset($_GET['oldpage'])) {
    if ($_GET['oldpage'] == hash('whirlpool', htmlspecialchars($_GET['page'])+171)) {
        $page = htmlspecialchars($_GET['page']);
        if ($page == "" || $page == "1") {
            $page = 0;
        } else {
            $page = ($page*5)-5;
        }
    } else {
        $resulta1 = 'Sorry page not found !!!<br>';
        $_GET['page'] = 0;
        $page = 0;
    }
} else {
    $_GET['page'] = 0;
    $page = 0;
}

/* view comments of each post */
$query = "SELECT * FROM `comment`";
$query = $db->prepare($query);
$query->execute();
$count = $query->rowCount();
$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
if ($count) {
    $i=0;
    while ($i < $count) {
        $post_id = $la_case[$i]['post_id'];
        $msg[$post_id] = "";
        $j=0;
        while ($j < $count) {
            if ($la_case[$i]['post_id'] == $la_case[$j]['post_id']) {
                $msg[$post_id] = $msg[$post_id]."
                                <form class='pure-form galerie-form'>
                                    Comment by <B>".$la_case[$j]['username']."</B> at <B>".$la_case[$j]['created_at']."</B><br>
                                    <textarea class='pure-input-1' readonly>".$la_case[$j]['comment']."</textarea>
                                </form><br>
                            ";
            }
            $j++;
        }
        $i++;  
    }
}

/* view post */
    $query = "SELECT * FROM `post` ORDER BY `post`.`created_at` DESC LIMIT $page,5";
    $query = $db->prepare($query);
    $query->execute();
    $count = $query->rowCount();
    $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);

    if ($count) {
        $resulta1 = $resulta1.'All Posts';
        $resulta2="";
        $i = 0;
        while ($count > 0) {
            $post_id = $la_case[$i]['post_id'];
            if (empty($msg[$post_id])) {
                $comment = "";
            } else {
                $comment = $msg[$post_id];
            }
            $resulta2 = $resulta2."
                        <div class='pure-u-1'>
                        Post by <B>".$la_case[$i]['username']."</B>, at <B>".$la_case[$i]['created_at']."</B><br>
                        <img class='pure-img-responsive galerie-post' src='assets/".$la_case[$i]['imgURL']."'>
                            ".$comment."                            
                        </div><br><br><br>
                        ";
            $count--;
            $i++;  
        }
    } else {
        $resulta1 = $resulta1.'No post yet !!!';
    }
?>

<br><br><br>
        <div class="content" style="text-align: center;">
            <h2 class="content-subhead">Gallery</h2>
            <?php if(isset($resulta1)) {echo '<h3 class="content-subhead">'.$resulta1.'</h3>'; } ?><br>
            <div class="ca_gallery">
                <div class="galerie-main">
                    <br>
                    <?php if(isset($resulta2)) { echo $resulta2; } ;?>
                </div>

<?php 
/* calculer le nomber des pages */
    $query = 'SELECT COUNT(*) FROM `post`';
    $query = $db->prepare($query);
    $query->execute();
    $nbr_page = $query->fetchColumn();
    $i = ceil($nbr_page/5); /* nbr des page */
    for ($j=1;$j<=$i;$j++) {
        $k = hash('whirlpool', $j+171); /* for secure GET*/
        ?><a href="gallery.php?page=<?php echo $j; ?>&oldpage=<?php echo $k; ?>" style="text-decoration:none"><?php echo $j." ";?></a><?php
    }

?><br><br>
            </div>
        </div>
    </div>
</div>
<!-- end container -->


<!-- footer -->
<?php include 'include/footer.php'; ?>