<?php
session_start();
require_once("config/connection.php");
function ft_send_email($username,$email,$hash){

    $to      = $email; // Send email to our user
    $subject = 'Password | Reset Password'; // Give the email a subject 
    $message = '
     
    Hi "'.$username.'",
     
    Please click this link to Reset your password:
    https://10.12.100.163/camagru/forget_pwd_verif.php?email='.$email.'&hash='.$hash.'
     
    Thanks for using Camagru!
    '; // Our message above including the link
                         
    $headers = 'From:no-reply@camagru.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
}
$token_tmp = hash('whirlpool', $_SERVER['SERVER_ADDR']);
if(isset($_POST["reset_pwd"]) && ($token_tmp === $_POST["token"])) {
    if(empty($_POST["username"]) || empty($_POST["email"])) {
        $message = '<label>All fields are required.</label>';
    } else {
        $query = 'SELECT * FROM user WHERE username="'.$_POST['username'].'" AND email="'.$_POST['email'].'"';
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
            $hash = $la_case[0]['hash'];
            ft_send_email($_POST['username'], $_POST['email'], $hash);
            $msg = 'The magic link for reset your password has been sent to your email.';
            header("location:signin.php?msg=".$msg."");
            $message = '<label>Username is already taken!</label>';
        } else {
            $msg = 'Sorry your Email is incorrect !';
            header("location:signin.php?msg=".$msg."");
            
        }
    } 
} 
?>

<!-- header -->
<?php //include 'include/header.php'; ?>

<!-- menu -->
<?php include 'include/menu.php'; ?>

<!-- start container -->
<?php include 'include/title.php'; ?>
<br><br><br>
<?php $token_tmp = hash('whirlpool', $_SERVER['SERVER_ADDR']); ?>
        <div class="content" style="text-align: center;">
            <h2 class="content-subhead">Reset Password</h2>
            <div class="pure-u-1-4">
                <form class="pure-form" method="post" action="forget_pwd.php">
                <input type="hidden"    name="token"        value="<?php echo $token_tmp; ?>">
                <input type="text"      name="username" value="<?php if (isset($_POST['username'])) echo htmlspecialchars(trim($_POST['username'])); ?>"    placeholder="Username"  class="pure-input-rounded" required>
                <input type="email"     name="email"    value="<?php if (isset($_POST['email']))    echo htmlspecialchars(trim($_POST['email'])); ?>"          placeholder="Email"     class="pure-input-rounded" required>
                    <?php if(isset($message)) {echo '<label class="text-danger">'.htmlspecialchars($message).'</label>'; } ?><br>
                    <button type="submit" name="reset_pwd" class="pure-button">Reset</button>
                </form>
            </div><br><br><br>
            <?php include 'include/slide.php'; ?>
        </div>
    </div>
</div>
<!-- end container -->

<!-- footer -->
<?php include 'include/footer.php'; ?>








