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
    $query1 = " SELECT * FROM `like_table` WHERE `user_p`=".$_SESSION['user_id']." AND `connected` = 1 AND `reported` = 0 AND `blocked` = 0 ";
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

        if ($count2 > 0) {
            echo "
                    <li class='person'>
<a href='chat.php?receiver_id=".$la_case2[0]['user_id']."&receiver_name=".$la_case2[0]['fname']."&receiver_pic=".$user_o_pic_profile." '>
                        <div class='user'>
                            <img src='".$url.$user_o_pic_profile."'>
                            <span class='status busy'></span>
                        </div>
                        <p class='name-time'>
                            <span class='name'>".$la_case2[0]['fname']." ".$la_case2[0]['lname']."</span>
                            <span class='time'>15/02/2019</span>
                        </p>
                    </a>
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

<?php 
if(isset($_GET['receiver_id']) && isset($_GET['receiver_name'])) {
    $receiver_id = htmlspecialchars(trim($_GET['receiver_id']));
    $receiver_name = htmlspecialchars(trim($_GET['receiver_name']));
    $receiver_pic = htmlspecialchars(trim($_GET['receiver_pic']));
    // chat box header
    echo "
            <div class='selected-user'>
                <span>To: <span class='name'>".$receiver_name."</span></span>
            </div>
            <div class='chat-container'>
                <ul class='chat-box chatContaineScroll'>
    "; 
?>
    <!-- chat box body -->
    <div id="msg" style="height:300px; overflow-y: scroll"></div>
<?php
    // chat box footer
    echo "
                </ul>
                <div class='form-group mt-3 mb-0'>
                    <input id='sender_id' name='sender_id' value='".$_SESSION['user_id']."' type='hidden' >    
                    <input id='sender_name' name='sender_name' value='".$_SESSION['fname']."' type='hidden' >    
                    <input id='sender_pic' name='sender_pic' value='".$_SESSION['profile_pic']."' type='hidden' >
                    <input id='receiver_id' name='receiver_id' value='".$receiver_id."' type='hidden' >    
                    <input id='receiver_name' name='receiver_name' value='".$receiver_name."' type='hidden' >    
                    <input id='receiver_pic' name='receiver_pic' value='".$receiver_pic."' type='hidden' >
        <div class='form-row'>
            <div class='col-10'>  
                <input id='msg_text' name='msg_text' class='form-control'  placeholder='Type your message here...'>
            </div>
            <div class='col-2'>
                <button id='send' type='submit' name='send' class='btn btn-primary float-right'><i class='fa fa-send'></i>Send</button>
            </div>
        </div>  
                </div>
            </div>
            ";
} 
?>


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