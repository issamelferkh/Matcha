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
            if ($profile[0]['username'] === NULL) ft_putmsg('danger','Please complete your profile! Add Username','/user/profile.php');
            if ($profile[0]['password'] === NULL) ft_putmsg('danger','Please complete your profile! Add Password','/user/profile.php');
            if ($profile[0]['fname']    === NULL) ft_putmsg('danger','Please complete your profile! Add First Name','/user/profile.php');
            if ($profile[0]['lname']    === NULL) ft_putmsg('danger','Please complete your profile! Add Last Name','/user/profile.php');
            if ($profile[0]['email']    === NULL) ft_putmsg('danger','Please complete your profile! Add Email','/user/profile.php');
            if ($profile[0]['gender']   === NULL) ft_putmsg('danger','Please complete your profile! Add Gender','/user/profile.php');
            if ($profile[0]['sex_pre']  === NULL) ft_putmsg('danger','Please complete your profile! Add Sexual Preference','/user/profile.php');
            if ($profile[0]['tag1']     === NULL) ft_putmsg('danger','Please complete your profile! Add Interest Tag','/user/profile.php');
            if ($profile[0]['bio']      === NULL) ft_putmsg('danger','Please complete your profile! Add Biography','/user/profile.php');
        } else {
            $flag = 1;
        }

        // check profile picture
        $query = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'" AND `asProfile` = 1';
        $query = $db->prepare($query);
        $query->execute();
        $pic = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (!(isset($pic[0]['imgURL']))) {
            ft_putmsg('danger','Please complete your profile! Add Profile Picture','/user/profile.php');
        } 

        if ($flag) {
            ft_putmsg('danger','Please complete your profile!','/user/profile.php');
        } else {
            $query = "UPDATE `user` SET `complete_profile` = 1 WHERE `user_id`=".$_SESSION['user_id'] ;
            $query = $db->prepare($query);
            $query->execute();
        }
    }
?>