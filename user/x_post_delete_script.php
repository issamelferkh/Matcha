<?php
require_once("../config/connection.php");

include '../include/session.php'; 

    if (isset($_POST) && ($_SESSION["token"] === $_POST["token"]) )
    {
        $query = 'DELETE FROM `post` WHERE `post_id` = :post_id AND `user_id`=:userid';
        $query = $db->prepare($query);
        $query->bindParam(':post_id', $_POST['post_id'], PDO::PARAM_INT); 
        $query->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT); 
        $query->execute();
        $msg = 'The picture '.$_POST['user_id'].' is deleted with succeed.';
        header("location:montage.php?msg=".$msg."");

    }
?>









