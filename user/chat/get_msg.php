<?php require_once("../../config/connection.php"); ?>
<?php require_once("../../include/session.php"); ?>
<?php require_once("../../include/libft.php"); ?>

<?php
    // if (empty($_POST))
	// 	ft_putmsg('danger', "Invalid action.", "/index.php");

    if (isset($_POST))	{
        isset($_POST['sender_id']) ? $sender_id = htmlspecialchars(trim($_POST['sender_id'])) : $sender_id = NULL;
        isset($_POST['sender_name']) ? $sender_name = htmlspecialchars(trim($_POST['sender_name'])) : $sender_name = NULL;
        isset($_POST['sender_pic']) ? $sender_pic = htmlspecialchars(trim($_POST['sender_pic'])) : $sender_pic = NULL;
        isset($_POST['receiver_id']) ? $receiver_id = htmlspecialchars(trim($_POST['receiver_id'])) : $receiver_id = NULL;
        isset($_POST['receiver_name']) ? $receiver_name = htmlspecialchars(trim($_POST['receiver_name'])) : $receiver_name = NULL;
        isset($_POST['receiver_pic']) ? $receiver_pic = htmlspecialchars(trim($_POST['receiver_pic'])) : $receiver_pic = NULL;
        isset($_POST['msg_text']) ? $msg_text = htmlspecialchars(trim($_POST['msg_text'])) : $msg_text = NULL;

        $chat_body = "";
        $query3 = " SELECT * FROM `chat` WHERE 
                    (`sender_id`=".$_SESSION['user_id']." AND `receiver_id`=".$receiver_id.")  
                    OR
                    (`receiver_id`=".$_SESSION['user_id']." AND `sender_id`=".$receiver_id.") 
                    ORDER BY `created_at` ASC ";
        $query3 = $db->prepare($query3);
        $query3->execute();
        $count3 = $query3->rowCount();
        $chat = $query3->fetchAll(\PDO::FETCH_ASSOC);
        $i3 = 0;
        while ($count3 > $i3) {
            if ($chat[$i3]['sender_id'] === $_SESSION['user_id']){ 
                $chat_body = $chat_body."                            
                                        <li class='chat-right'>
                                            <div class='chat-hour'>".$chat[$i3]['created_at']."&nbsp;<span class='fa fa-check-circle'></span></div>
                                            <div class='chat-text'><p style='white-space: pre-wrap;'>".$chat[$i3]['msg_text']."</p></div>
                                            <div class='chat-avatar'>
                                                <img src='".$url.$chat[$i3]['sender_pic']."'>
                                                <div class='chat-name'>".$chat[$i3]['sender_name']."</div>
                                            </div>
                                        </li>
                                    ";
            } else if ($chat[$i3]['receiver_id'] === $_SESSION['user_id']) {
                $chat_body = $chat_body."                            
                                        <li class='chat-left'>
                                            <div class='chat-avatar'>
                                                <img src='".$url.$chat[$i3]['sender_pic']."'>
                                                <div class='chat-name'>".$chat[$i3]['sender_name']."</div>
                                            </div>
                                            <div class='chat-text'><p style='white-space: pre-wrap;'>".$chat[$i3]['msg_text']."</p></div>
                                            <div class='chat-hour'>".$chat[$i3]['created_at']. "&nbsp;<span class='fa fa-check-circle'></span></div>
                                        </li>
                                    ";
            }
            $i3++;
        }
        echo $chat_body;
    }
?>


