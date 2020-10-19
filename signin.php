<!-- not include 'include/session.php' because not loged yet-->
<?php session_start(); ?>

<?php
require_once("config/connection.php");
require_once("include/libft.php");

if(isset($_POST["signin"])) {
    if(empty($_POST["username"]) || empty($_POST["password"])) {
        ft_putmsg('dark','All fields are required!','/signin.php');
    }
    else {   
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"])); 

        $query = 'SELECT * FROM user WHERE username="'.$username.'" AND password="'.hash('whirlpool', $password).'"';
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
            if ($la_case[0]['active'] == 1) {
                $_SESSION['user_id']=$la_case[0]['user_id'];
                $_SESSION['username']=$la_case[0]['username'];
                $_SESSION['fname']=$la_case[0]['fname'];
                $_SESSION['lname']=$la_case[0]['lname'];
                $_SESSION['email']=$la_case[0]['email'];
                $_SESSION['token']=hash('whirlpool', (rand(0,1000)));
                $_SESSION['auth'] = $la_case[0];

                // recorver Profile picture
                $query = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'" AND `asProfile` = 1';
                $query = $db->prepare($query);
                $query->execute();
                $pic = $query->fetchAll(\PDO::FETCH_ASSOC);
                if (isset($pic[0]['imgURL'])) {
                    $user_o_pic_profile = $pic[0]['imgURL'];
                } else {
                    $user_o_pic_profile = "/assets/img/avatar.png";
                }
                $_SESSION['profile_pic'] = $user_o_pic_profile;
				ft_putmsg('info','Welcome.','/user/index.php');
            } else {
                ft_putmsg('warning','Your account is not activated yet!','/signin.php');
            }
        } else {
            ft_putmsg('danger','Incorrect Username or Password!','/signin.php');
        }
    }
} 
?>

<?php include('include/header.php'); ?>

<?php include("include/navbar.php"); ?>

<!-- if logged -> redirect to app -->
<?php if (isset($_SESSION['username']))  { header("location:user/index.php");} ?>  

<!-- start container -->
<main role="main" class="container">
    <?php include("include/title.php"); ?>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Sign In</h6></br>
        <form method="post" action="signin.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <button name="signin" type="submit" class="btn btn-primary">Sign in</button>
            <a href="<?php echo $url; ?>/forget_pwd.php" class="btn btn-danger" role="button">Forgot Password</a>
        </form>
    </div>
    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include 'include/footer.php'; ?>








