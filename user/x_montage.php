<?php
require_once("../config/connection.php");
?>
<?php include '../include/session.php'; ?>

<?php
// mixTwoImage -> for mix two images (pic and filter)
function mixTwoImage($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $pct, $imgURL){ 

    list($src_w, $src_h) = getimagesize($src_im);

    $dst_im = imagecreatefrompng($dst_im);
    $src_im = imagecreatefrompng($src_im);
    $cut = imagecreatetruecolor($src_w, $src_h);

    imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
    imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
    imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
   
    header('Content-Type: image/png');
    imagepng($dst_im, $imgURL);
}

if(isset($_POST["submit"])&& ($_SESSION["token"] === $_POST["token"]) ) {
    if (!($_POST['filter'] == '')) {
        if((!($_POST["imgB64"] == '')) && ($_FILES["imgUpload"]["tmp_name"] == '')) {
            list($imgTYPE, $imgB64) = explode(',', $_POST["imgB64"]);
            $imgB64 = base64_decode($imgB64);
            if ($imgB64){
                $imgName = $_SESSION['user_id']."__".date("Y_m_d_H_i_s").".png";
                $imgURL = "../assets/img/".$imgName;
                file_put_contents($imgURL, $imgB64);

                $imgSrcName = $_SESSION['user_id']."__".date("Y_m_d_H_i_s")."Src.png";
                $imgSrcURL = "../assets/img/".$imgSrcName;
                file_put_contents($imgSrcURL, $imgB64);

                $filterURL = "../assets/img/filter/".$_POST['filter'];

                mixTwoImage($imgURL, $filterURL, 0, 0, 0, 0, 100,$imgURL);

                $query = 'INSERT INTO `post` (`user_id`, `username`, `imgName`, `imgURL`,`imgTYPE`, `imgSrcNAME`, `imgSrcURL`, `filter`) 
                            VALUES (?,?,?,?,?,?,?,?)';
                $query = $db->prepare($query);
                $query->execute([$_SESSION['user_id'],$_SESSION['username'],$imgName,$imgURL,$imgTYPE,$imgSrcName,$imgSrcURL,$_POST['filter']]);

                $msg = 'Your picture is published with succeed.';
                //ft_send_email($_POST['username'], $_POST['email'], $hash); /* Error !!! */
                header("location:montage.php?msg=".$msg."");

            } else {
                $msg = 'No picture !!! Please take a picture or upload it.';
                header("location:montage.php?msg=".$msg."");
            }
        }
        else if ((!($_FILES["imgUpload"]["tmp_name"] == '')) && ($_POST["imgB64"] == '')){
            $imgName = $_SESSION['user_id']."__".date("Y_m_d_H_i_s")."Upload.png";
            $imgURL = "../assets/img/".$imgName;

            $imageFileType = strtolower(pathinfo($imgURL,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
                if($check !== false) {
                    $imgTYPE = $check["mime"];
                    $imgSrcName = $imgName;
                    $imgSrcURL = $imgURL;

                    imagepng(imagecreatefromstring(file_get_contents($_FILES["imgUpload"]["tmp_name"])), $imgURL);

                    $filterURL = "../assets/img/filter/".$_POST['filter'];

                    mixTwoImage($imgURL, $filterURL, 0, 0, 0, 0, 100,$imgURL);

                    $query = 'INSERT INTO `post` (`user_id`, `username`, `imgName`, `imgURL`,`imgTYPE`, `imgSrcNAME`, `imgSrcURL`, `filter`) 
                                VALUES (?,?,?,?,?,?,?,?)';
                    $query = $db->prepare($query);
                    $query->execute([$_SESSION['user_id'],$_SESSION['username'],$imgName,$imgURL,$imgTYPE,$imgSrcName,$imgSrcURL,$_POST['filter']]);

                    $msg = 'Your picture is published with succeed.';
                    //ft_send_email($_POST['username'], $_POST['email'], $hash); /* Error !!! */
                    header("location:montage.php?msg=".$msg."");
                } 
                else 
                {
                    $msg = 'This file is not an image !!!';
                    header("location:montage.php?msg=".$msg."");
                }
            }
        } else if ((!($_FILES["imgUpload"]["tmp_name"] == '')) && (!($_POST["imgB64"] == ''))){
            $msg = 'Sorry you can\'t use Webcam and upload a picture both :( ';
            header("location:montage.php?msg=".$msg."");
        } else {
            $msg = 'No picture !!! Please take a picture or upload it.';
            header("location:montage.php?msg=".$msg."");
        }
    } else {
        $msg = 'No Filter !!! Sorry you can take a picture without filter.';
        header("location:montage.php?msg=".$msg.""); 
    }
}


?>

<?php include '../include/header_user.php'; ?>

<?php include '../include/menu_user.php'; ?>

<!-- start container -->
<?php include '../include/title_user.php'; ?>

        <div class="content" style="text-align: center;">
            <form action="montage.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <h2 class="content-subhead">Montage</h2><br><br><br>
                <?php if(isset($_GET['msg'])) {echo '<h3 class="content-subhead">'.htmlspecialchars($_GET['msg']).'</h3>'; } ?><br>
                <div class="montage-main"><br>
                    <!-- filters -->
                    <div class="pure-g">
                        <div class="pure-u-1-4">
                            <img id="design" style="width: 10vw; height: 10vw;" src="https://10.12.100.163/camagru/assets/img/filter/1.png" alt="">
                            <br>
                            <input type="radio" value="1.png" name="filter" checked> Filter_1
                        </div>
                        <div class="pure-u-1-4">
                            <img id="design" style="width: 10vw; height: 10vw;" src="https://10.12.100.163/camagru/assets/img/filter/2.png" alt="">
                            <br>
                            <input type="radio" value="2.png" name="filter"> Filter_2
                        </div>
                        <div class="pure-u-1-4">
                            <img id="design" style="width: 10vw; height: 10vw;" src="https://10.12.100.163/camagru/assets/img/filter/3.png" alt="">
                            <br>
                            <input type="radio" value="3.png" name="filter"> Filter_3
                        </div>
                        <div class="pure-u-1-4">
                            <img id="design" style="width: 10vw; height: 10vw;" src="https://10.12.100.163/camagru/assets/img/filter/4.png" alt="">
                            <br>
                            <input type="radio" value="4.png" name="filter"> Filter_4
                        </div>
                    </div><hr><br>
                    <!-- video -->
                    <div class="pure-u-1">
                        <video class="montage-video" id="video"></video><br><br>
                        <a type="submit" class="pure-button" id="capture">Capture</a>
                        <input name="imgB64" type="hidden" class="imgInputData" value=""/>
                    </div>
                    <br><br>
                    <div class="pure-u-1">
                        <canvas class="montage-video" id="canvas"></canvas><br><br>
                        <label>Choose a picture:</label>
                        <input type="file" name="imgUpload" accept="image/png, image/jpeg, image/jpg"><br><br>
                        <input name="submit" type="submit" class="pure-button" value="Save"><br><br>
                    </div>
                </div>
                <!-- photo taken   -->
<?
    $query = 'SELECT * FROM `post` WHERE `user_id`="'.$_SESSION['user_id'].'" ORDER BY `post`.`user_id` DESC';
    $query = $db->prepare($query);
    $query->execute();
    $count = $query->rowCount();
    $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
    if ($count) {
        $resulta1 = '<h3>Your Posts</h3>';
        $resulta2="";
        $i = 0;
        while ($count > 0) {
            $user_id = $la_case[$i]['user_id'];
            $post_id = $la_case[$i]['post_id'];
            
            $user_id2 = hash('whirlpool', $la_case[$i]['user_id']+195);
            $post_id2 = hash('whirlpool', $la_case[$i]['post_id']+917);
            $resulta2 = $resulta2."
                        <div class='pure-u-1-2'>
<a href='post.php?user_id=".$user_id."&post_id=".$post_id."&user_id2=".$user_id2."&post_id2=".$post_id2."'><img style='width: 15vw; height: 13vw;' src='".$la_case[$i]['imgURL']."'></a>
                        </div>
                        ";
            $count--;
            $i++;  
        }
    } else {
        $resulta1 = '<label>No post yet!!!</label>';
    }
?>
                <div class="montage-side" >
                <?php if(isset($resulta1)) { echo $resulta1; } ?>
                    <div class="pure-g">
                        <?php if(isset($resulta2)) { echo $resulta2; } ;?>
                    </div>                
                </div>                
                <div class="montage-footer"></div>
                <br><hr>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end container -->

<!-- footer -->
<script src="../assets/js/main.js"></script>
<?php include '../include/footer_user.php'; ?>








