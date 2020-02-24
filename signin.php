<?php
session_start();
require_once("config/connection.php");


if(isset($_POST["signin"])) {
    if(empty($_POST["username"]) || empty($_POST["password"])) {
        $message3 = 'All fields are required!';
    }
    else {        
        $query = 'SELECT * FROM user WHERE username="'.$_POST['username'].'" AND password="'.hash('whirlpool', $_POST['password']).'"';
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
                header("location:user/index.php");
            } else {
                $message2 = 'Your account is not activated yet!';
            }
            
        } else {
            $message1 = 'Incorrect Username or Password!';
        }
    }
} 
?>

<?php include 'include/header.php'; ?>

<?php include 'include/nav.php'; ?>

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
        <h6 class="border-bottom border-gray pb-2 mb-0">Sign In</h6></br>
        <?php if(isset($message1)) {echo '<div class="alert alert-danger" role="alert">'.htmlspecialchars($message1).'</div>';}?>
        <?php if(isset($message2)) {echo '<div class="alert alert-warning" role="alert">'.htmlspecialchars($message2).'</div>';}?>
        <?php if(isset($message3)) {echo '<div class="alert alert-dark" role="alert">'.htmlspecialchars($message3).'</div>';}?>
        <?php if(isset($_GET['msg'])) {echo '<div class="alert alert-primary" role="alert">'.htmlspecialchars($_GET['msg']).'</div>';}?>
        
        <form method="post" action="signin.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="text" name="username" value="<?php if (isset($_POST['username'])) echo htmlspecialchars(trim($_POST['username'])); ?>" placeholder="Username" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" type="password" name="password" value="<?php if (isset($_POST['password'])) echo htmlspecialchars(trim($_POST['password'])); ?>"    placeholder="Password" required>
                </div>
            </div>
            <button name="signin" type="submit" class="btn btn-primary">Sign in</button>
            <a href="https://10.12.100.163/matcha/forget_pwd.php" class="btn btn-danger" role="button">Forgot Password</a>
        </form>
    </div>
    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include 'include/footer.php'; ?>








