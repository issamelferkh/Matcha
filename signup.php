<?php
session_start();
require_once("config/connection.php");

function ft_send_email($username,$email,$hash){

    $to      = $email; // Send email to our user
    $subject = 'Matcha | Signup - Verification'; // Give the email a subject 
    $message = '
     
    Hi "'.$username.'",

    Your account has been created, you can login with the following username and password after you have activated your account by pressing the url below.

    Please click this link to activate your account:
    https://10.12.100.163/Matcha/active_user.php?email='.$email.'&hash='.$hash.'
     
    Thanks for using Matcha!
    '; // Our message above including the link
                         
    $headers = 'From:no-reply@matcha.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
}

if(isset($_POST["signup"])) {
    if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"]) || empty($_POST["fname"]) || empty($_POST["lname"]) ) {
        $message1 = 'All fields are required.';
    } else {
        // affectations
        $fname = $_POST["lname"];
        $lname = $_POST["fname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"]; 
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
            $message2 = 'Invalid password. Password must be at least 8 characters.';
        } else if(!$uppercase || !$lowercase || !$number || !$specialChars) {
            $message2 = 'Password should be include at least one upper case letter, one number, and one special character.';
        } else if (($usernamelen > 50) || ($usernamelen < 8)){
            $message2 = 'Invalid username. Username must be between 8 and 50 characters.';
        } else if ($emaillen > 320){
            $message2 = 'Invalid email. Email must be less than 320 characters.';
        } else if (!($emailcheck)) {
            $message2 = 'Invalid email format.';
        } else {
            $query = 'SELECT * FROM user WHERE username="'.$username.'" OR email="'.$email.'"';
            $query = $db->prepare($query);
            $query->execute();
            $count = $query->rowCount();
            $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($count > 0) {
                $message3 = 'Username is already taken!';
            } else {
                $notification = 1;
                $query = 'INSERT INTO `user` (`username`, `email`, `password`, `hash`, `notification`) VALUES (?,?,?,?,?)';
                $query = $db->prepare($query);
                $query->execute([$username,$email,$password,$hash,$notification]);
                ft_send_email($username, $email, $hash);
                $msg = 'Please active your account by clicking the activation link that has been send to your email.';
                header("location:signin.php?msg=".$msg."");
            }
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
        <h6 class="border-bottom border-gray pb-2 mb-0">Sign Up</h6></br>
        <?php if(isset($message1)) {echo '<div class="alert alert-dark" role="alert">'.htmlspecialchars($message1).'</div>';}?>
        <?php if(isset($message2)) {echo '<div class="alert alert-warning" role="alert">'.htmlspecialchars($message2).'</div>';}?>
        <?php if(isset($message3)) {echo '<div class="alert alert-danger" role="alert">'.htmlspecialchars($message3).'</div>';}?>
        
        <form method="POST" action="signup.php">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input class="form-control" type="text" name="fname" value="<?php if (isset($_POST['fname'])) echo htmlspecialchars(trim($_POST['fname'])); ?>" placeholder="First Name" required>
                </div>

                <div class="form-group col-md-4">
                    <input class="form-control" type="text" name="lname" value="<?php if (isset($_POST['lname'])) echo htmlspecialchars(trim($_POST['lname'])); ?>" placeholder="Last Name" required>
                </div>


                <div class="form-group col-md-4">
                    <input class="form-control" type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars(trim($_POST['email'])); ?>"    placeholder="Email" required>
                </div>

                <div class="form-group col-md-6">
                    <input class="form-control" type="text" name="username" value="<?php if (isset($_POST['username'])) echo htmlspecialchars(trim($_POST['username'])); ?>" placeholder="Username" required>
                </div>
                
                <div class="form-group col-md-6">
                    <input class="form-control" type="password" name="password" value="<?php if (isset($_POST['password'])) echo htmlspecialchars(trim($_POST['password'])); ?>"    placeholder="Password" required>
                </div>
            </div>
            <button name="signup" type="submit" class="btn btn-primary">Sign Up</button>
            <a href="https://10.12.100.163/matcha/forget_pwd.php" class="btn btn-danger" role="button">Forgot Password</a>
        </form>
    </div>
    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include 'include/footer.php'; ?>