<?php
// check if user is online
// function ft_check_online($user_id) {
//     // connection with database
//     $DB_DSN = 'mysql:dbname=matcha_mm;host=127.0.0.1';
//     $DB_USER = 'root';
//     $DB_PASSWORD = '';
//     $DB_NAME = 'matcha';
//     $DB_HOST = '127.0.0.1';
        
//     try {
//         $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
//     } catch (PDOException $e) {
//         echo 'Connection failed: ' . $e->getMessage();
//     }


//     $query = ' SELECT * FROM `user` WHERE `user_id`="'.$user_id.'" ';
// 	$query = $db->prepare($query);
// 	$query->execute();
//     $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
//     return ($la_case[0]['lastonline']);
// }

// Get Distance
// from https://stackoverflow.com/questions/27928/calculate-distance-between-two-latitude-longitude-points-haversine-formula
function ft_getDistance($latitude2, $longitude2) {
    $earth_radius = 6371;

    $latitude1 = $_SESSION['auth']['lati'];
    $longitude1 = $_SESSION['auth']['longi'];

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

// send mail function
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
?>