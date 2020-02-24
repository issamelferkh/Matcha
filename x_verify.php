<?php
session_start();
require_once("config/connection.php");


if(empty($_GET['email']) || empty($_GET['hash'])) {
    $message = 'All fields are required.';
}
else{        
    $query = 'SELECT * FROM user WHERE email="'.$_GET['email'].'" AND hash="'.$_GET['hash'].'"';
    $query = $db->prepare($query);
    $query->execute();
    $count = $query->rowCount();
    $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
    if($count > 0) {
        if($la_case[0]['active'] == 0) {
            $active = 1;
            $sql = 'UPDATE user SET active=? WHERE email="'.$_GET['email'].'" AND hash="'.$_GET['hash'].'"';
            $db->prepare($sql)->execute([$active]);

            $message = 'Your account is active now.';
            header("location:signin.php?msg=".$message."");
        } else if($la_case[0]['active'] == 1) {
            $message = 'Your account is already activated !!!';
            header("location:signin.php?msg=".$message."");
        }
        
    } else{
        $message = 'You don\'t have an account yet in Camagru!!!';
        header("location:signin.php?msg=".$message."");
    }
}

?>