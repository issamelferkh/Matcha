<?php
session_start();
require_once("../config/connection.php");

if(empty($_GET["post_id"]) || empty($_GET["user_id"]) || empty($_GET["liked"])) {
    header("location:gallery.php");
}
else {
    if ($_GET["liked"] == hash('whirlpool', (1))) {
        $like = 1;
    }        
    $query = 'INSERT INTO `like_table` (`post_id`, `user_id`, `liked`) VALUES (?,?,?)';
    $query = $db->prepare($query);
    $query->execute([$_GET['post_id'],$_GET['user_id'],$like]);
    header("location:gallery.php");
}

?>