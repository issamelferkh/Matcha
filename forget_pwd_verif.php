<?php
session_start();
require_once("config/connection.php");


if(empty($_GET['email']) || empty($_GET['hash'])) {
    $msg_get = '';
    ft_putmsg('warning','All fields are required.','/signin.php');
}
else{        
    $query = 'SELECT * FROM user WHERE email="'.$_GET['email'].'" AND hash="'.$_GET['hash'].'"';
    $query = $db->prepare($query);
    $query->execute();
    $count = $query->rowCount();
    $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
    if($count > 0) {
        $token = md5(rand(0,1000));
        header("location:forget_pwd_reset.php?msg=".$token."");        
    } else{
        ft_putmsg('warning','You don\'t have an account yet in Matcha!','/signin.php');
    }
}
?>