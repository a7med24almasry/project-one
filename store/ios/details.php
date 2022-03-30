<?php
session_start();
include "../../vendor/config.php";
include "../../lang/ar.php";
include "../../vendor/functions.php";
if(isset($_GET['id'])){
$id = htmlentities($_GET['id']);
if(!empty($id)){
include "../../layout/header.php";
 $app = mysqli_query($connect,"SELECT * FROM `application` WHERE `appId`= '$id'");
 $app_num=mysqli_num_rows($app);
 if($app_num != 0){
  $row = mysqli_fetch_array($app);
  $app_title = html_entity_decode($row['title_en']);
  $date = htmlentities($row['date']);
  $image = htmlentities($row['image']);
  $video = htmlentities($row['video_link']);
  $description = html_entity_decode($row['description_en']);
  $category_lang = html_entity_decode($row['Categories_en']);
  $content_rating =html_entity_decode($row['content_rating_en']);
  $download = htmlentities($row['download']);
  $version = htmlentities($row['version']);
  $size = htmlentities($row['size']);
?>
  <?php include "../../layout/search_bar.php"; ?>
<div class="header_container">
    <h1><?php if (!empty($app_title)) echo $app_title?></h1>
</div>

<div class="container">
  <div class="row mt-4">
    <div class="content_box">
        <p class="app-date"><?= $date?></p>
        <img src="assets/img/icons/<?=$image?>" alt="">
        <h2><?=$app_title?></h2>
        <?php 
        $screen_shots= mysqli_query($connect,"SELECT * FROM `screenshots` WHERE `appid`='$id'");
        $screen_num = mysqli_num_rows($screen_shots);
        if($screen_num !=0){

        ?>
        <div class="screen_shots">
        <div class="owl-carousel">
								<?php
                while($screen_row = mysqli_fetch_array($screen_shots)){
                  $image_screen= htmlentities($screen_row['img']);
                
                ?>
										<div>
										<div class="screen_shots_img">
                    <a class="test-popup-link" href="assets/img/screenshots/<?=$image_screen?>"><img src="assets/img/screenshots/<?=$image_screen?>" alt="<?=$app_title?>"></a>
                    </div>
										</div>
									<?php } ?>
									</div>
        </div>
        <?php        }
        if(!empty($video)){
          ?>
          <div class="app_video">
          <div class="ratio ratio-16x9">
            <iframe src="<?=$video?>" title="<?=$app_title?>" allowfullscreen></iframe>
          </div>
          </div>
          <?php
        }
        ?>
        <div class="description">
            <h3><?=$lang['Description']?></h3>
            <?php
              if(!empty($description)){
                echo $description;
              }
            ?>
        </div>
        <div class="additional-information-area">
          <h2><?=$lang['ADDITIONAL']?></h2>
          <div class="grid_items">
              <div class="additional_information_text">
              <h4><?=$lang['version']?></h4>
              <p><?=$version?></p>
            </div>
   
            <div class="additional_information_text">
              <h4><?=$lang['SIZE']?></h4>
              <p><?=$size?></p>
            </div>

            <div class="additional_information_text">
              <h4><?=$lang['INSTALLS']?></h4>
              <p><?=$download?></p>
            </div>
          <div class="additional_information_text">
              <h4><?=$lang['content_Rating']?></h4>
              <p><?=$content_rating?></p>
            </div>
            <div class="additional_information_text">
              <h4><?=$lang['category']?></h4>
              <p><?=$category_lang?></p>
            </div>

          </div>
        </div>
    </div>
  </div>
</div>

<?php include "../../layout/footer.php";
 }else{
    header("location:404.php");
 }
}else{
  header("location:404.php");
}
}else{
    header("location:404.php");

}
?>
