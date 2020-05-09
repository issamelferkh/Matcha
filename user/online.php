<!-- connection --> 
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>

<?php
if (isset($_POST["action"])) {
    if($_POST["action"] === "update_time") {
        $query = $db->query("UPDATE `user` SET `lastonline` = NOW() WHERE `user_id` =".$_SESSION['user_id']);
    }
    if($_POST["action"] === "fetch_data") {
        // set user_id
        $user_o = $_POST['user_o'];
        $query2 = 'SELECT * FROM `user` WHERE  lastonline > DATE_SUB(NOW(), INTERVAL 5 SECOND) AND `user_id`="'.$user_o.'"';
        $query2 = $db->prepare($query2);
        $query2->execute(); 
        $la_case2 = $query2->fetchAll(\PDO::FETCH_ASSOC);

        if (isset($la_case2[0]['lastonline'])) {
            echo "<strong class='d-block text-success'>Online</strong>";
        } else {
            echo "<strong class='d-block text-danger'>OffLine</strong>";
        }
    }
}
?>
