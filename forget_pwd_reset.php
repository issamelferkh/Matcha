<?php
session_start();
require_once("config/connection.php");

if(isset($_POST["reset"])) {
    if(empty($_POST["password1"]) || empty($_POST["password2"])) {
        $msg_danger = 'All fields are required.';
    } else if(($_POST["password1"]) !== ($_POST["password2"])) {
        $msg_danger = 'Password does not match!';
    } else {
        $password = hash('whirlpool', $_POST['password1']);
        $pwdlen = strlen($_POST['password1']);
        $uppercase = preg_match('@[A-Z]@', $_POST['password1']);
        $lowercase = preg_match('@[a-z]@', $_POST['password1']);
        $number    = preg_match('@[0-9]@', $_POST['password1']);
        $specialChars = preg_match('@[^\w]@', $_POST['password1']);

        if($pwdlen < 8) {
            $msg_danger = 'Invalid password. Password must be at least 8 characters.';
        } else if(!$uppercase || !$lowercase || !$number || !$specialChars) {
            $msg_danger = 'Password should be include at least one upper case letter, one number, and one special character.';
        } else {
            $query = 'SELECT * FROM user WHERE username="'.$_POST['username'].'"';
            $query = $db->prepare($query);
            $query->execute();
            $count = $query->rowCount();
            $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($count > 0) {
                $msg_danger = 'Username is already taken!';
            } else {
                $sql = "UPDATE user SET `password`=?";
                $db->prepare($sql)->execute([$password]);

                $msg_get = 'Your password has been reset successfully!.';
                header("location:signin.php?msg_get=".$msg_get."");
            }
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
        <?php if(isset($_GET['msg_get'])) {echo '<div class="alert alert-primary" role="alert">'.htmlspecialchars($_GET['msg_get']).'</div>';}?>
        
        <form method="post" action="forget_pwd_reset.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="password" name="password1" value="<?php if (isset($_POST['password'])) echo htmlspecialchars(trim($_POST['password'])); ?>" placeholder="Password" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" type="password" name="password2" value="<?php if (isset($_POST['password'])) echo htmlspecialchars(trim($_POST['password'])); ?>" placeholder="Confirme Password" required>
                </div>
            </div>
            <button name="reset" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include 'include/footer.php'; ?>








