<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username'])  header('Location:../index.php');
?>