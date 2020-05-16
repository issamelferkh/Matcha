<!-- connection -->
<?php require_once("../../config/connection.php"); ?>
<!-- session -->
<?php require_once("../../include/session.php"); ?>
<!-- libft -->
<?php require_once("../../include/libft.php"); ?>

<?php
    // if (empty($_POST))
	// 	ft_putmsg('danger', "Invalid action.", "/index.php");

    if (isset($_POST['msg_text']))
	{
        isset($_POST['sender_id']) ? $sender_id = htmlspecialchars(trim($_POST['sender_id'])) : $sender_id = NULL;
        isset($_POST['sender_name']) ? $sender_name = htmlspecialchars(trim($_POST['sender_name'])) : $sender_name = NULL;
        isset($_POST['sender_pic']) ? $sender_pic = htmlspecialchars(trim($_POST['sender_pic'])) : $sender_pic = NULL;
        isset($_POST['receiver_id']) ? $receiver_id = htmlspecialchars(trim($_POST['receiver_id'])) : $receiver_id = NULL;
        isset($_POST['receiver_name']) ? $receiver_name = htmlspecialchars(trim($_POST['receiver_name'])) : $receiver_name = NULL;
        isset($_POST['receiver_pic']) ? $receiver_pic = htmlspecialchars(trim($_POST['receiver_pic'])) : $receiver_pic = NULL;
        isset($_POST['msg_text']) ? $msg_text = htmlspecialchars(trim($_POST['msg_text'])) : $msg_text = NULL;

        $query = 'INSERT INTO `chat` (`sender_id`,`sender_name`,`sender_pic`,`receiver_id`,`receiver_name`,`receiver_pic`,`msg_text`) 
        VALUES (?,?,?,?,?,?,?)';
		$query = $db->prepare($query);
        $query->execute([$sender_id,$sender_name,$sender_pic,$receiver_id,$receiver_name,$receiver_pic,$msg_text,]);
    }
?>