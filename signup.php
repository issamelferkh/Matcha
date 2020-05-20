<!-- not include 'include/session.php' because not loged yet-->
<?php session_start(); ?>
<?php
require_once("config/connection.php");
require_once("include/libft.php");

if(isset($_POST["signup"])) { 
    if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"]) || empty($_POST["fname"]) || empty($_POST["lname"]) ) {
        ft_putmsg('dark','All fields are required.','/signup.php');
    } else {
        // affectations
        $fname = htmlspecialchars(trim($_POST["lname"]));
        $lname = htmlspecialchars(trim($_POST["fname"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"])); 
        $hash = md5(rand(0,1000));

        // check password
        $password = hash('whirlpool', $_POST['password']);
        $pwdlen = strlen($_POST['password']);
        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number    = preg_match('@[0-9]@', $_POST['password']);
        $specialChars = preg_match('@[^\w]@', $_POST['password']);
        // check username
        $usernamelen = strlen($username);
        // check email
        $emaillen = strlen($email);
        $emailcheck = preg_match('(^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]*$)', $email); 

        if($pwdlen < 8) {
            ft_putmsg('warning','Invalid password. Password must be at least 8 characters.','/signup.php');
        } else if(!$uppercase || !$lowercase || !$number || !$specialChars) {
            ft_putmsg('warning','Password should be include at least one upper case letter, one number, and one special character.','/signup.php');
        } else if (($usernamelen > 50) || ($usernamelen < 5)) {
            ft_putmsg('warning','Invalid username. Username must be between 5 and 50 characters.','/signup.php');
        } else if ($emaillen > 320) {
            ft_putmsg('warning','Invalid email. Email must be less than 320 characters.','/signup.php');
        } else if (!($emailcheck)) {
            ft_putmsg('warning','Invalid email format.','/signup.php');
        } else {
            $query = 'SELECT * FROM user WHERE username="'.$username.'" OR email="'.$email.'"';
            $query = $db->prepare($query);
            $query->execute();
            $count = $query->rowCount();
            $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($count > 0) {
                ft_putmsg('danger','Username OR email is already taken!','/signup.php');
            } else {
                $notification = 1;
                $query = 'INSERT INTO `user` (`fname`,`lname`,`username`, `email`, `password`, `hash`, `notification`) VALUES (?,?,?,?,?,?,?)';
                $query = $db->prepare($query);
                $query->execute([$fname,$lname,$username,$email,$password,$hash,$notification]);
                // ft_send_email_verification($username, $email, $hash);
                ft_putmsg('primary','Please active your account by clicking the activation link that has been send to your email.','/signin.php');
            }
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
    <?php include("include/title.php") ;?>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Sign Up</h6></br>        
        <form method="POST" action="signup.php">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input class="form-control" type="text" name="fname" placeholder="First Name" required>
                </div>

                <div class="form-group col-md-4">
                    <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
                </div>


                <div class="form-group col-md-4">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group col-md-6">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                
                <div class="form-group col-md-6">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <button name="signup" type="submit" class="btn btn-primary">Sign Up</button>
            <a href="<?php echo $url; ?>/forget_pwd.php" class="btn btn-danger" role="button">Forgot Password</a>
        </form>
    </div>
    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include 'include/footer.php'; ?>