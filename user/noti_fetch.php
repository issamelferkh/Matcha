<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>

<?php
    if(isset($_POST["noti_fetch"]) && $_POST["noti_fetch"] == "noti_fetch") {
        $sql = " SELECT * FROM `noti` WHERE `receiver_id`=".$_SESSION['user_id']." AND `seen` = 0 ORDER BY `created_at` ASC LIMIT 5";
        $sql = $db->prepare($sql);
        $sql->execute();
        $count = $sql->rowCount();
        $noti = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $i = 0;
        $output = "";
        if ($count == 0)
            $output .="<li>No notifications</li>";
        
        while ($count > $i) {
            $output .= '
                  <li style="border-bottom: 1px solid black;">
                      <strong>'.$noti[$i]['sender_name'].'</strong><br />
                      <small><em>'.$noti[$i]['noti_text'].' at: '.$noti[$i]['created_at'].'</em></small>
                  </li>';

            $query = "UPDATE `noti` SET `seen` = 1 WHERE `noti_id` =".$noti[$i]['noti_id'];
            $query = $db->prepare($query);
            $query->execute();
                        
            $i++;
        }
        print_r($output);
    }

    if(isset($_POST["noti_count"]) && $_POST["noti_count"] == "noti_count") {
        $sql = " SELECT * FROM `noti` WHERE `receiver_id`=".$_SESSION['user_id']." AND `seen` = 0 ORDER BY `created_at` ASC";
        $sql = $db->prepare($sql);
        $sql->execute();
        $count = $sql->rowCount();
        if ($count === 0) {
            echo '<i class="far fa-bell fa-lg" style="color: #cccccc"></i>';
        } else {
            echo '<i class="far fa-bell fa-lg fa-spin" style="color: #cccccc"></i>
            <span id="noti_count" class="badge badge-light">'.$count.'</span>';
        }
    }

?>