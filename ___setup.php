<!-- not include 'include/session.php' because not loged yet-->
<?php session_start(); ?>
<!-- connection -->
<?php require_once("config/connection.php"); ?>
<!-- header -->
<?php include("include/header.php"); ?>   
<!-- nav -->
    <!-- Turn on output buffering - avoid "Cannot modify header information - headers already sent by" Error -->
    <?php ob_start(); ?>

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $url; ?>/user/index.php">Matcha</a>
</nav>

<!-- start container -->
<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        <img class="mr-3" src="<?php echo $url; ?>/assets/img/logo.png" alt="" width="48" height="48">
        <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Matcha | <small>Setup</small></h6>
        <small>Since 2020</small>
        </div>
    </div>

    <!-- setup -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="d-flex justify-content-center text-center">
            <?php
                include_once 'config/database.php';
                try {
                	$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

                	$sql = "DROP DATABASE IF EXISTS `" . $DB_NAME . "`;"; 
                	$db->exec($sql);
                	echo "Removing any pre-existing 'matcha' database ---> OK</br></br>";

                	$sql = "CREATE DATABASE IF NOT EXISTS `" . $DB_NAME . "`;"; 
                	$db->exec($sql);
                	echo "Fresh database 'matcha' successfully created ---> OK</br></br>";

                	$db->exec('use ' . $DB_NAME . ';');
                	echo "Switching to " . $DB_NAME . " ---> OK</br></br>";

                	$sql = file_get_contents('config/matcha.sql');
                	$db->exec($sql);
                	echo "Database schema imported ---> OK</br></br>";
                	echo "Matcha is Ready to use ---> OK</br></br>";
                    
                } catch (PDOException $e) {
                	echo 'Connection failed: ' . $e->getMessage();
                }
			?>
        </div>
        
        
        <small class="d-block text-right mt-3"></small>
    </div>

    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include("include/footer.php"); ?>