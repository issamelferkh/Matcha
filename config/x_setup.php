<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Camagru</title>    
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    
    <link rel="stylesheet" href="../assets/css/main.css">

</head>
<body>

<!-- menu -->
<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">Camagru</a>
    </div>
</div>

<!-- start container -->
<div id="layout">
    <div id="main">
        <div class="header">
        <br><br><br>
            <h1 style="text-align: center;">Camagru ... Instagram in our way</h2>
        </div>
<br><br><br>
        <div class="content" style="text-align: center;">
            <h2 class="content-subhead">Install Camagru DataBase</h2><br>
            <div class="pure-u-1-4">
                
				<?php
					include_once 'database.php';
					try {
						$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

						$sql = "DROP DATABASE IF EXISTS `" . $DB_NAME . "`;"; 
						$db->exec($sql);
						echo "Removing any pre-existing 'camagru' database ---> OK<br>";

						$sql = "CREATE DATABASE IF NOT EXISTS `" . $DB_NAME . "`;"; 
						$db->exec($sql);
						echo "Fresh database 'camagru' successfully created ---> OK<br>";

						$db->exec('use ' . $DB_NAME . ';');
						echo "Switching to " . $DB_NAME . " ---> OK<br>";

						$sql = file_get_contents('camagru.sql');
						$db->exec($sql);
						echo "Database schema imported ---> OK<br>";
						echo "Camagru App is Ready to use ---> OK<br>";
						
					} catch (PDOException $e) {
						echo 'Connection failed: ' . $e->getMessage();
					}
				?><br>
				<a href="../index.php" type="submit" name="signin" class="pure-button">Go to Camagru App</a>
            </div><br><br>
            <?php include '../include/slide.php'; ?>
        </div>
    </div>
</div>
<!-- end container -->

<!-- footer -->

</body>
</html>










