<!-- header -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Camagru</title>    
    
    <link rel="stylesheet" href="https://10.12.100.163/camagru/assets/css/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="https://10.12.100.163/camagru/assets/css/grids-responsive-min.css">
    <link rel="stylesheet" href="https://10.12.100.163/camagru/assets/css/font-awesome.css">
    
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>

<!-- menu -->
<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="https://10.12.100.163/camagru/home.php">Camagru</a>

        <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/home.php" class="pure-menu-link">Home</a></li>
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/gallery.php" class="pure-menu-link">Gallery</a></li>
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/signin.php" class="pure-menu-link">Sign In</a></li>
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/signup.php" class="pure-menu-link">Sign Up</a></li>
        </ul>
    </div>
</div>


<!-- start container -->
<!-- title -->
<div id="layout">
    <div id="main">
        <div class="header">
        <br><br><br>
            <h1 style="text-align: center;">Camagru ... Instagram in our way</h2>
        </div>

        <!-- /////// -->

<br><br><br>
        <div class="content">
            <h2 class="content-subhead">About Us</h2>
            <?php if(isset($_GET['msg'])) {echo '<h3 class="content-subhead">'.htmlspecialchars($_GET['msg']).'</h3>'; } ?><br>
            <p>
                We are the first to provide IT training in Morocco, completely free of charge, 
                open and accessible to anyone between the ages of 18 and 30. No need for an IT degree, 
                or of having undergone extensive IT training. 
                The only criteria for admission CREATIVITY, we are <a href="https://1337.ma/en/">Thirteen Thirty Seven</a>.
            </p>

            <h2 class="content-subhead">What is Camagru</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <!-- Slide -->
            <?php include 'include/slide.php'; ?>

            <h2 class="content-subhead">How to use Camagru</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
</div>
<!-- end container -->

<!-- footer -->
<div class="footer">
  <p>Camagru &copy; 2019 by <a href="https://profile.intra.42.fr/users/iel-ferk">iel-ferk</a></p>
</div>
</body>
</html>








