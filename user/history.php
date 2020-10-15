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

    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded box-shadow">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">History | <small>Personal History</small></h6>
        </div>
    </div>

    <!-- Main -->
    <div class="my-1 p-1 bg-white rounded box-shadow">
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="row no-gutters">
<?php
    $sql = " SELECT * FROM `noti` WHERE `receiver_id`=".$_SESSION['user_id']." ORDER BY `created_at` DESC ";
    $sql = $db->prepare($sql);
    $sql->execute();
    $count = $sql->rowCount();
    $history = $sql->fetchAll(\PDO::FETCH_ASSOC);
    $i = 0;
    while ($count > $i) {
        $sql2 = " SELECT * FROM `user`, `picture` WHERE `user`.`user_id`=".$history[$i]['sender_id']." 
        AND `picture`.`user_id`=".$history[$i]['sender_id']." AND `picture`.`asProfile` = 1 ";
        $sql2 = $db->prepare($sql2);
        $sql2->execute();
        $count2 = $sql2->rowCount();
        $history2 = $sql2->fetchAll(\PDO::FETCH_ASSOC);
        if ($count2 > 0) {
            echo "
                <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                    <ul class='users'>
                        <li class='person'>
                            <a href='".$url."/user/profile_detail.php?id=".$history[$i]['sender_id']."'>
                                <div class='user'>
                                    <img src='".$history2[0]['imgURL']."'>
                                    <span class='status busy'></span>
                                </div>
                                <p class='name-time'>
                                    <span class='name'>".$history2[0]['fname']." ".$history2[0]['lname']."</span>
                                    <span class='time'><strong>".$history[$i]['noti_text']."</strong> at: ".$history[$i]['created_at']."</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            ";
            }
        $i++;
    }
?>

                    </div>
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


<!-- chat script -->
<script>
	 $(document).ready(function(){
	 	get_msg();
        $("#send").click(function(){
            
            var sender_id = $("#sender_id").val();
        	var sender_name = $("#sender_name").val();
            var sender_pic = $("#sender_pic").val();

            var receiver_id = $("#receiver_id").val();
            var receiver_name = $("#receiver_name").val();
            var receiver_pic = $("#receiver_pic").val();

            var msg_text = $("#msg_text").val();

            $.ajax({
                url: 'chat/put_msg.php',
                type: 'POST',
                data: { sender_id:sender_id,
        	            sender_name:sender_name,
                        sender_pic:sender_pic,
                        receiver_id:receiver_id,
                        receiver_name:receiver_name,
                        receiver_pic:receiver_pic,
                        msg_text:msg_text },
                success: function(data) {
                    $("#text").val('');
                }
            });
            $('#msg_text').val('');
        });
	});
	function get_msg()
	{
        var sender_id = $("#sender_id").val();
        	var sender_name = $("#sender_name").val();
            var sender_pic = $("#sender_pic").val();

            var receiver_id = $("#receiver_id").val();
            var receiver_name = $("#receiver_name").val();
            var receiver_pic = $("#receiver_pic").val();

            var msg_text = $("#msg_text").val();

        $.ajax({
                url: 'chat/get_msg.php',
                type: 'POST',
                data: { sender_id:sender_id,
        	            sender_name:sender_name,
                        sender_pic:sender_pic,
                        receiver_id:receiver_id,
                        receiver_name:receiver_name,
                        receiver_pic:receiver_pic,
                        msg_text:msg_text },
                success: function(data) {
                	$("#msg").html(data);
                }
            });
	}
	setInterval('get_msg()', 1000);
</script>


<!-- footer -->
<?php include("../include/footer.php"); ?>