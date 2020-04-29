<?php

// check if sessions are enabled, but none exists.
if(session_status() === PHP_SESSION_NONE) { 
    session_start();
}

// check if the user are logged
if (!$_SESSION['username'])  {
    header('Location:../index.php');
}
