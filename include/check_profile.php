<?php
    require_once("libft.php");
        if (isset($_SESSION['username']))  {
        // check profile informations
        $q_checkprofile = 'SELECT * FROM `user` WHERE `user_id`="'.$_SESSION['user_id'].'"';
        $q_checkprofile = $db->prepare($q_checkprofile);
        $q_checkprofile->execute(); 
        $count1 = $q_checkprofile->rowCount();
        $profile = $q_checkprofile->fetchAll(\PDO::FETCH_ASSOC);
        $flag = 0;
        if ($count1 > 0) {
            if ($profile[0]['username'] === NULL) $flag = 1 ;
            if ($profile[0]['password'] === NULL) $flag = 1 ;
            if ($profile[0]['fname']    === NULL) $flag = 1 ;
            if ($profile[0]['lname']    === NULL) $flag = 1 ;
            if ($profile[0]['email']    === NULL) $flag = 1 ;
            if ($profile[0]['gender']   === NULL) $flag = 1 ;
            if ($profile[0]['sex_pre']  === NULL) $flag = 1 ;
            if ($profile[0]['tag1']     === NULL) $flag = 1 ;
            if ($profile[0]['bio']      === NULL) $flag = 1 ;
            if ($profile[0]['age']      === NULL) $flag = 1 ;
        } else {
            $flag = 1;
        }

        // check profile picture
        $query = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'" AND `asProfile` = 1';
        $query = $db->prepare($query);
        $query->execute();
        $pic = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (!(isset($pic[0]['imgURL']))) {
            $flag = 1;
        } 

        if ($flag) {
            ft_putmsg('danger','Please complete your profile!','/user/profile.php');
        }
    }
?>