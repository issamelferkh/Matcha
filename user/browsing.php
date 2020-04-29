<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- header -->
<?php include("../include/header.php"); ?>   
<!-- nav -->
<?php include("../include/navbar_user.php"); ?> 

<!-- php show other profile -->
<?php
	$query = 'SELECT * FROM `user`';
	$query = $db->prepare($query);
	$query->execute();
	$count = $query->rowCount();
    $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);

	if (isset($_GET["i"])) {
		if(isset($_GET["user_p"])) { $user_p = htmlspecialchars(trim($_GET["user_p"])); }
		if(isset($_GET["user_o"])) { $user_o = htmlspecialchars(trim($_GET["user_o"])); }
		if(isset($_GET["liked"]))  { $liked =  htmlspecialchars(trim($_GET["liked"])); }
		if(isset($_GET["noped"]))  { $noped =  htmlspecialchars(trim($_GET["noped"])); }

		$query = 'INSERT INTO `like_table` (`user_p`, `user_o`, `liked`, `noped`) VALUES (?,?,?,?)';
        $query = $db->prepare($query);
        $query->execute([$user_p,$user_o,$liked,$noped]);
	}
	if (isset($_GET["i"]) && $count > $_GET["i"]) {
		$i = $_GET["i"];
	} else {
		$i = 0;
	}
?>

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
    
    <!-- Main -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
		    <!-- Photo profile -->
<?php
	$query = 'SELECT * FROM `picture` WHERE `user_id`="'.$la_case[$i]['user_id'].'" AND `asProfile` = 1';
	$query = $db->prepare($query);
	$query->execute();
    $pic = $query->fetchAll(\PDO::FETCH_ASSOC);
    echo "
	    <div class='col-md-4'>
            <div class='card mb-2'>
                <img class='card-img-top rounded' src='".$url.$pic[0]['imgURL']."'>
            </div>
        </div>
";
?>
		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
			        <h6 class="border-bottom border-gray pb-2 mb-0">About <?php echo $la_case[$i]['username']; ?></h6>
			        <div class="media text-muted pt-3">
			        	<i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">1 Km away</strong>
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <?php 
				        $gender = "man";
				        if($gender === "man") {
				        	echo "<i class='fas fa-venus'></i>";
				        } else if($gender === "woman") {
				        	echo "<i class='fas fa-mars'></i>";
				        }
				         ?>
				        &nbsp;&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@<?php echo $la_case[$i]['fname']." ".$la_case[$i]['lname']; ?></strong>
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <i class="fas fa-book-reader"></i>&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@Biography</strong><?php echo $la_case[$i]['bio']; ?>
				        </p>
			        </div>
			        <small class="d-block text-right mt-3">
				        <a href="<?php echo $url; ?>/user/profile.php">All updates</a>
			        </small>
			        <div class="d-flex justify-content-center">
<a href="<?php echo $url; ?>/user/browsing.php?
	i=<?php echo $i+1;?>&
	user_p=<?php echo $_SESSION['user_id'];?>&
	user_o=<?php echo $la_case[$i]['user_id'];?>&
	liked=1&
	noped=0
	" class="btn btn-success" role="button">Like</a>
&nbsp;&nbsp;&nbsp;
<a href="<?php echo $url; ?>/user/browsing.php?
	i=<?php echo $i+1;?>&
	user_p=<?php echo $_SESSION['user_id'];?>&
	user_o=<?php echo $la_case[$i]['user_id'];?>&
	liked=0&
	noped=1
	" class="btn btn-danger" role="button">Nope</a>
					</div>
			    </div>
            </div>
        </div>
    </div>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>