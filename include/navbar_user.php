<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $url; ?>/index.php">Matcha</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/home.php">Home</a>
            </li>
        </ul>
    
        <a href="<?php echo $url; ?>/signout.php" class="btn btn-outline-danger my-2 my-sm-0" role="button">Sign Out</a>
    </div>
</nav>