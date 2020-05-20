<?php
session_start();
require_once("config/connection.php");
require_once("include/libft.php");


if(empty($_GET['email']) || empty($_GET['hash'])) {
    ft_putmsg('danger','All fields are required.','signin.php');
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
            ft_putmsg('primary','Your account is active now.','signin.php');
        } else if($la_case[0]['active'] == 1) {
            ft_putmsg('warning','Your account is already activated!','signin.php');
        }
    } else{
        ft_putmsg('warning','You don\'t have an account yet in Matcha!','signin.php');
    }
}
?>