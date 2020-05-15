<!-- connection --> 
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>
<!-- header -->
<?php include("../include/header.php"); ?>
<!--  chat css-->
<link href="<?php echo $url; ?>/assets/css/chat.css" rel="stylesheet">
<!-- nav -->
<?php include("../include/navbar.php"); ?>
<!-- check profile is completed -->
<?php include("../include/check_profile.php"); ?> 

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>  
    <!-- Main -->
    <div class="my-1 p-1 bg-white rounded box-shadow">
    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                        <!-- contact list -->
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users">
                                    <!-- contact list -->
<?php
    // check if is connected or not
    $query1 = " SELECT * FROM `like_table` WHERE `user_p`=".$_SESSION['user_id']." AND `connected` = 1 ";
    $query1 = $db->prepare($query1);
    $query1->execute();
    $count1 = $query1->rowCount();
    $la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
    $i = 0;
    while ($count1 > $i) {
        // list contacts
        $query2 = " SELECT * FROM `user` WHERE `user_id`=".$la_case1[$i]['user_o']." ";
        $query2 = $db->prepare($query2);
        $query2->execute(); 
        $count2 = $query2->rowCount();
        $la_case2 = $query2->fetchAll(\PDO::FETCH_ASSOC);

        // profile pic of the user
        $query3 = 'SELECT * FROM `picture` WHERE `user_id`="'.$la_case1[$i]['user_o'].'" AND `asProfile` = 1';
        $query3 = $db->prepare($query3);
        $query3->execute();
        $pic = $query3->fetchAll(\PDO::FETCH_ASSOC);
        // check if is set user_o profile profile
        if (isset($pic[0]['imgURL'])) {
            $user_o_pic_profile = $pic[0]['imgURL'];
        } else {
            $user_o_pic_profile = "/assets/img/avatar.png";
        }

        // check if online

        if ($count2 > 0) {
            echo "
                    <li class='person'>
                        <div class='user'>
                            <img src='".$url.$user_o_pic_profile."'>
                            <span class='status busy'></span>
                        </div>
                        <p class='name-time'>
                            <span class='name'>".$la_case2[0]['fname']." ".$la_case2[0]['lname']."</span>
                            <span class='time'>15/02/2019</span>
                        </p>
                    </li>
            ";

        }
        $i++;
    }
?>

                                </ul>
                            </div>
                        </div>
                        <!-- message box -->
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
                                <span>To: <span class="name">Emily Russell</span></span>
                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">Russell</div>
                                        </div>
                                        <div class="chat-text">Hello, I'm Russell.
                                            <br>How can I help you today?</div>
                                        <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                    </li>
                                    <li class="chat-right">
                                        <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
                                        <div class="chat-text">Hi, Russell
                                            <br> I need more information about Developer Plan.</div>
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">Sam</div>
                                        </div>
                                    </li>
                                    
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->
    </div>
</main>

<!-- script to check if user is online -->
<script>
$(document).ready(function(){

<?php //if($_SESSION["username"]) { ?>
	// update user lastonline
	function update_user_activity() {
		var action = 'update_time';
		$.ajax({
			url:"online.php",
			method:"POST",
			data:{action:action},
			success:function(data) {}
		});
	}

	setInterval(function(){ 
		update_user_activity();
	}, 3000);

<?php //} else { ?>

	fetch_user_login_data();

	setInterval(function(){
		fetch_user_login_data();
	}, 3000);

	// fetch user online
	function fetch_user_login_data() {
		var action = "fetch_data";
		var user_o = "<?php echo $_SESSION['user_id']; ?>";
		$.ajax({
			url:"online.php",
			method:"POST",
			data:{action:action,
				  user_o:user_o},
			success:function(data) {
                $('#user_login_status').html(data);
                // if (data.includes("Online")){
                //     var status_online = true;
                // }
			}
		});
	}

<?php //} ?>

});
</script>

<!-- footer -->
<?php include("../include/footer.php"); ?>