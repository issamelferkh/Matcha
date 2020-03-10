<?php
session_start();
require_once("config/connection.php");
function ft_send_email($username,$email,$hash){

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

$token_tmp = hash('whirlpool', $_SERVER['SERVER_ADDR']);

if(isset($_POST["reset_pwd"]) && ($token_tmp === $_POST["token"])) {
    if(empty($_POST["username"]) || empty($_POST["email"])) {
        $msg_danger = 'All fields are required.';
    } else {
        $query = 'SELECT * FROM user WHERE username="'.$_POST['username'].'" AND email="'.$_POST['email'].'"';
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
            $hash = $la_case[0]['hash'];
            ft_send_email($_POST['username'], $_POST['email'], $hash);
            $msg_get = 'The magic link for reset your password has been sent to your email.';
            header("location:signin.php?msg_get=".$msg_get."");
        } else {
            $msg_get = 'Sorry your Username or Email are incorrect !';
            header("location:signin.php?msg_get=".$msg_get."");
            
        }
    } 
} 
?>

<?php include 'include/header.php'; ?>

<?php include 'include/navbar.php'; ?>

<!-- start container -->
<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        <img class="mr-3" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Matcha</h6>
        <small>Since 2020</small>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Reset Password</h6></br>
        <?php if(isset($msg_danger)) {echo '<div class="alert alert-danger" role="alert">'.htmlspecialchars($msg_danger).'</div>';}?>
        <form method="post" action="forget_pwd.php">
            <input type="hidden"    name="token"        value="<?php echo $token_tmp; ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="text" name="username" value="<?php if (isset($_POST['username'])) echo htmlspecialchars(trim($_POST['username'])); ?>" placeholder="Username" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" type="email" name="email" value="<?php if (isset($_POST['email']))    echo htmlspecialchars(trim($_POST['email'])); ?>"    placeholder="Email" required>
                </div>
            </div>
            <button name="reset_pwd" type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include 'include/footer.php'; ?>







