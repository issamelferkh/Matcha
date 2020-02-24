<?php
session_start();
require_once("../config/connection.php");

function ft_send_email($username,$email,$post,$auteur){

    $to      = $email; // Send email to our user
    $subject = 'Camagru | Notification - Comments'; // Give the email a subject 
    $message = '
     
    Hi "'.$auteur.'",
    
    We inform you that you have a new comment on your post ID: '.$post.', by: '.$username.'.
    
    Thank you for using Camagru!
    '; // Our message above including the link
                         
    $headers = 'From:no-reply@camagru.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
}

if(isset($_POST["OK"])) {
    if(empty($_POST["comment"]) || empty($_POST["post_id"]) || empty($_POST["username"]) || empty($_POST["token"]) || ($_SESSION["token"] != $_POST["token"]) ) {
        header("location:gallery.php?");
    }
    else {
        $comment = htmlspecialchars($_POST['comment']);   
        $query = 'INSERT INTO `comment` (`comment`, `post_id`, `username`,`user_id`) VALUES (?,?,?,?)';
        $query = $db->prepare($query);
        $query->execute([$comment,$_POST['post_id'],$_POST['username'],$_POST['user_id']]);

        $query = 'SELECT * FROM user WHERE `user_id`="'.$_POST['auteur_id'].'" ';
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
            if ($la_case[0]['active'] == 1) {
                $auteur=$la_case[0]['username'];
                $email=$la_case[0]['email'];
                $notification=$la_case[0]['notification'];
            }
        }
        if ($notification == 1) {
            ft_send_email($_POST['username'],$email,$_POST['post_id'],$auteur);
        }
        header("location:gallery.php");
    }
} 
?>