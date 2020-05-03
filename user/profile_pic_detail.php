<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>
<!-- php delete picture -->
<?php
	if(isset($_POST["pic_delete"]) && isset($_POST["img_id"]) && ($_SESSION["token"] === $_POST["token"])) {
	    $query = 'DELETE FROM `picture` WHERE `img_id` = :img_id';
        $query = $db->prepare($query);
        $query->bindParam(':img_id', $_POST['img_id'], PDO::PARAM_INT); 
        $query->execute();
		ft_putmsg('success','The picture '.$_POST['img_id'].' is deleted with succeed.','/user/profile_pic.php');
	}
?>
<!-- header -->
<?php include("../include/header.php"); ?>   
<!-- nav -->
<?php include("../include/navbar.php"); ?> 

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
    
    <!-- Main -->
    <form method="POST" action="profile_pic_detail.php">
	    <div class="my-3 p-3 bg-white rounded box-shadow">
	        <div class="row">
		    	<div class='col-md-4'></div>
			    <!-- Photo profile -->
			   	<div class='col-md-4'>
		            <div class='card mb-2'>
<?php
	$query = 'SELECT * FROM `picture` WHERE `img_id`="'.$_GET['img_id'].'"';
	$query = $db->prepare($query);
	$query->execute();
	$pic = $query->fetchAll(\PDO::FETCH_ASSOC);
	if (isset($pic[0]['imgURL'])) {
		echo "  <img class='card-img-top rounded' src='".$url.$pic[0]['imgURL']."'> 
				<input type='hidden' name='img_id' value='".$pic[0]['img_id']."'>
				<input type='hidden' name='token' value='".$_SESSION['token']."'>
				<button name='pic_delete' type='submit' class='btn btn-primary'>Delete</button>
		";
	} else {
		echo " <img class='card-img-top rounded' src='".$url."/assets/img/avatar_no_pic.png'> ";
	}
?>
			        </div>

		        </div>
		    	<div class='col-md-4'></div>
	        </div>
	    </div>
	</form>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>