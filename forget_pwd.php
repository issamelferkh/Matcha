<?php
session_start();
require_once("config/connection.php");
require_once("include/libft.php");



if(isset($_POST["reset_pwd"])) {
    if(empty($_POST["username"]) || empty($_POST["email"])) {
        ft_putmsg('danger','All fields are required.','/forget_pwd.php');
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
        $username = htmlspecialchars(trim($_POST["username"]));

        $query = 'SELECT * FROM user WHERE username="'.$username.'" AND email="'.$email.'"';
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
            $hash = $la_case[0]['hash'];
            ft_send_email_reset_pwd($_POST['username'], $_POST['email'], $hash);
            ft_putmsg('primary','The magic link for reset your password has been sent to your email.','/signin.php');
        } else {
            ft_putmsg('danger','Sorry your Username or Email are incorrect!','/signin.php');            
        }
    } 
} 
?>

<?php include 'include/header.php'; ?>

<?php include 'include/navbar.php'; ?>

<!-- if logged -> redirect to app -->
<?php if (isset($_SESSION['username']))  { header("location:user/index.php");} ?>  

<!-- start container -->
<main role="main" class="container">
    <?php include("include/title.php") ;?>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Reset Password</h6></br>
        <form method="post" action="forget_pwd.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
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








