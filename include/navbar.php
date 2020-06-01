<?php
ob_start(); // Turn on output buffering - avoid "Cannot modify header information - headers already sent by" Error
// check if logged
if (isset($_SESSION['username']))  { ?>  
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $url; ?>/user/index.php">Matcha</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/user/profile.php"><?php echo $_SESSION["username"]; ?>-Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/user/browsing_in.php">Browsing</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/user/research.php">Research</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/user/chat.php">Chat</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/user/matche.php">Matches</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/user/history.php">Personal History</a>
            </li>
            
            <!-- noti -->
            <!-- source : https://www.cloudways.com/blog/real-time-php-notification-system/ -->
            <li class="nav-item dropdown" style=" position: relative; top: 8px">
                <a href="#" id="noti_click" data-toggle="dropdown"></a>
                <ul id="noti_fetch" class="dropdown-menu" style="height:300px; overflow-y: scroll;"></ul>
            </li>

        </ul>
    
        <a href="<?php echo $url; ?>/signout.php?token=<?php echo $_SESSION['token']; ?>" class="btn btn-outline-danger my-2 my-sm-0" role="button">Sign Out</a>
    </div>
</nav>

<script>
    $(document).ready(function(){
        $("#noti_click").click(function() {
            var noti_fetch = "noti_fetch";

            $.ajax({
                url:"../user/noti_fetch.php",
                type: 'POST',
                data: { noti_fetch:noti_fetch},
                success: function(data) {
                    $("#noti_fetch").html(data);
                }
            });
        });
	});

    function get_noti_count() {
        var noti_count = "noti_count";

        $.ajax({
                url:"../user/noti_fetch.php",
                type: 'POST',
                data: { noti_count:noti_count},
                success: function(data) {
                	$("#noti_click").html(data);
                }
            });
	}
	setInterval('get_noti_count()', 2000);
</script>

<?php }
else { ?>
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
    
        <a href="<?php echo $url; ?>/signin.php" class="btn btn-outline-primary my-2 my-sm-0" role="button">Sign In</a>
        <a href="<?php echo $url; ?>/signup.php" class="btn btn-outline-success my-2 my-sm-0" role="button">Sign Up</a>
    </div>
</nav>
<?php }
?>
