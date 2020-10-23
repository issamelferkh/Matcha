<?php

// Get Distance
// from https://stackoverflow.com/questions/27928/calculate-distance-between-two-latitude-longitude-points-haversine-formula
function ft_getDistance($latitude2, $longitude2) {
    $earth_radius = 6371;

    $latitude1 = floatval($_SESSION['auth']['lati']);
    $longitude1 = floatval($_SESSION['auth']['longi']);

    $dLat = deg2rad($latitude2 - $latitude1);
    $dLon = deg2rad($longitude2 - $longitude1);

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;

    return $d;
}

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

// send mail verification function
function ft_send_email_verification($username,$email,$hash){

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

// send mail reset pwd function
function ft_send_email_reset_pwd($username,$email,$hash){

$to      = $email;
$subject = 'Matcha | Reset Password';
$message = '
 
Hi "'.$username.'",
 
Please click this link to Reset your password:
https://10.12.100.163/matcha/forget_pwd_verif.php?email='.$email.'&hash='.$hash.'
 
Thanks for using Matcha!
';
                     
$headers = 'From:no-reply@matcha.com' . "\r\n"; 
mail($to, $subject, $message, $headers);
}

?>