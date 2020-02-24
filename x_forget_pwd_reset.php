<?php
session_start();
require_once("config/connection.php");

if(isset($_POST["signup"])) {
    if(empty($_POST["password1"]) || empty($_POST["password2"])) {
        $message = 'All fields are required.';
    } else if(($_POST["password1"]) !== ($_POST["password2"])) {
        $message = 'Password does not match!';
    } else {
        $password = hash('whirlpool', $_POST['password1']);
        $pwdlen = strlen($_POST['password1']);
        $uppercase = preg_match('@[A-Z]@', $_POST['password1']);
        $lowercase = preg_match('@[a-z]@', $_POST['password1']);
        $number    = preg_match('@[0-9]@', $_POST['password1']);
        $specialChars = preg_match('@[^\w]@', $_POST['password1']);

        if($pwdlen < 8) {
            $message = 'Invalid password. Password must be at least 8 characters.';
        } else if(!$uppercase || !$lowercase || !$number || !$specialChars) {
            $message = 'Password should be include at least one upper case letter, one number, and one special character.';
        } else {
            $query = 'SELECT * FROM user WHERE username="'.$_POST['username'].'"';
            $query = $db->prepare($query);
            $query->execute();
            $count = $query->rowCount();
            $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($count > 0) {
                $message = 'Username is already taken!';
            } else {
                $sql = "UPDATE user SET `password`=?";
                $db->prepare($sql)->execute([$password]);

                $msg = 'Your password has been reset successfully!.';
                header("location:signin.php?msg=".$msg."");
            }
        } 
    }
} 
?>

<!-- header -->
<?php include 'include/header.php'; ?>

<!-- menu -->
<?php include 'include/menu.php'; ?>

<!-- start container -->
<?php include 'include/title.php'; ?>
<br><br><br>
        <div class="content" style="text-align: center;">
            <h2 class="content-subhead">Reset Password</h2>
            <div class="pure-u-1-4">
                <form class="pure-form" method="post" action="forget_pwd_reset.php">
                    <input type="password"  name="password1" value="<?php if (isset($_POST['password'])) echo htmlspecialchars(trim($_POST['password'])); ?>"    placeholder="Password"  class="pure-input-rounded" required>
                    <input type="password"  name="password2" value="<?php if (isset($_POST['password'])) echo htmlspecialchars(trim($_POST['password'])); ?>"    placeholder="Confirme Password"  class="pure-input-rounded" required>
                    <?php if(isset($message)) {echo '<label class="text-danger">'.htmlspecialchars($message).'</label>'; } ?><br>
                    <button type="submit" name="signup" class="pure-button">Submit</button>
                </form>
            </div><br><br><br>
            <?php include 'include/slide.php'; ?>
        </div>
    </div>
</div>
<!-- end container -->

<!-- footer -->
<?php include 'include/footer.php'; ?>








