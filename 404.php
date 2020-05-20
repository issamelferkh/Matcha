<?php include("config/connection.php"); ?>   
<?php include("include/header.php"); ?>   

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $url; ?>/home.php">Matcha</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/home.php">Home</a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">   
	<?php include("include/title.php"); ?>
    <div class="my-3 p-3 bg-white rounded box-shadow text-center">
        <div class="row">			
            <div class="col-md-4"></div>
			<div class="col-md-4">
				</br></br></br>
				<img class='card-img-top rounded' src='<?php echo $url; ?>/assets/img/404.png'>
				</br></br></br>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-12"><h4 class="text-primary">Seems like your page doesn't exist anymore !</h4></div>
        </div>
    </div>
</main>

<?php include("include/footer.php"); ?>