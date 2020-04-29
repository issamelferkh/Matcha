<?php

// put message function
function ft_putmsg($type, $message, $path) {

    // set url vars
    $host1 = $_SERVER['HTTP_HOST'];
    $protocol1 = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    $url1 = "$protocol1://$host1/matcha";

    // check session 
    if (session_status() === PHP_SESSION_NONE ) {
        session_start();
    }

    // set session vars
    $path = $url1.$path;
    $_SESSION['message'] = $message;
    $_SESSION['type'] = $type;

    // locat to the path
    echo '<script language="javascript">
            document.location.replace("'.$path.'");
        </script>';
    exit();

}

// send mail function
function ft_send_email($username,$email,$hash){

    $to      = $email; // email of user
    $subject = 'Matcha | Signup - Verification'; // give the email a subject 
    $message = '
     
    Hi "'.$username.'",

    Your account has been created, you can login with the following username and password after you have activated your account by pressing the url below.

    Please click to this link to activate your account:
    https://10.12.100.163/matcha/active_user.php?email='.$email.'&hash='.$hash.'
     
    Thanks for using Matcha!
    '; // message above including the link
                         
    $headers = 'From:no-reply@matcha.com' . "\r\n"; // set from headers
    mail($to, $subject, $message, $headers); // send email
}
?>