<?php session_start(); ?>

<?php 
    if (isset($_SESSION['username']))  {
        header("location:user/index.php");
    } else {
        header("location:home.php");
    }
?>