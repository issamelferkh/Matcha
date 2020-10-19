<?php
session_start();
require_once("config/connection.php");
require_once("include/libft.php");


if(isset($_POST["reset"])) {
    if(empty($_POST["password1"]) || empty($_POST["password2"]) || empty($_POST["email"]) || empty($_POST["hash"])) {
        ft_putmsg('danger','All fields are required.','/forget_pwd.php');
    } else if(($_POST["password1"]) !== ($_POST["password2"])) {
        ft_putmsg('danger','Password does not match!','/forget_pwd.php');
    } else {
        $password = hash('whirlpool', $_POST['password1']);
        $pwdlen = strlen($_POST['password1']);
        $uppercase = preg_match('@[A-Z]@', $_POST['password1']);
        $lowercase = preg_match('@[a-z]@', $_POST['password1']);
        $number    = preg_match('@[0-9]@', $_POST['password1']);
        $specialChars = preg_match('@[^\w]@', $_POST['password1']);
        $email = htmlspecialchars(trim($_POST["email"]));
        $hash = htmlspecialchars(trim($_POST["hash"])); 


        if($pwdlen < 8) {
            ft_putmsg('danger','Invalid password. Password must be at least 8 characters.','/forget_pwd.php');
        } else if(!$uppercase || !$lowercase || !$number || !$specialChars) {
            ft_putmsg('danger','Password should be include at least one upper case letter, one number, and one special character.','/forget_pwd.php');
        } else {
            $query = 'SELECT * FROM user WHERE email="'.$email.'" AND hash="'.$hash.'"';
            $query = $db->prepare($query);
            $query->execute();
            $count = $query->rowCount();
            $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($count > 0) {
                $sql = "UPDATE user SET `password`=? WHERE `user_id`=?";
                $db->prepare($sql)->execute([$password,$la_case[0]['user_id']]);
                ft_putmsg('success','Your password has been reset successfully!','/signin.php');
            } else {
                ft_putmsg('danger','Sorry, something is wrong!','/forget_pwd.php');
            }
        } 
    }
} else if(empty($_GET['email']) || empty($_GET["hash"])) { // check source
    ft_putmsg('danger','Sorry, something is wrong!','/forget_pwd.php');
} else {
    $email = htmlspecialchars(trim($_GET["email"]));
    $hash = htmlspecialchars(trim($_GET["hash"]));
}
?>

<?php include 'include/header.php'; ?>

<?php include 'include/navbar.php'; ?>

<!-- start container -->
<main role="main" class="container">
    <?php include("include/title.php") ;?>


    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Reset Password</h6></br>
        <form method="post" action="forget_pwd_reset.php">
            <div class="form-row">
                <input type="hidden" name="email" value="<?= $email; ?>">
                <input type="hidden" name="hash" value="<?= $hash; ?>">

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








