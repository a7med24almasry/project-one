<?php
session_start();
include "../../vendor/config.php";
include "../../lang/ar.php";
include "../../vendor/functions.php";
if(isset($_GET['id'])){
$id = htmlentities($_GET['id']);
if(!empty($id)){
include "../../layout/header.php";
    $platform = mysqli_query($connect,"SELECT * FROM `platform` WHERE `slug`='$id'");
    $platform_num = mysqli_num_rows($platform);
    if($platform_num != 0){
    $platform_row =mysqli_fetch_array($platform);
    $platform_id = htmlentities($platform_row['id']);
    $platform_title = html_entity_decode($platform_row['title_'.$_lang]);
    $categories = mysqli_query($connect,"SELECT * FROM `categories` WHERE `platform`='$id'");
    $categories_num = mysqli_num_rows($categories);
    $platform_apps = mysqli_query($connect,"SELECT * FROM `application` WHERE `platform_id`='$platform_id'");
    $platform_apps_num = mysqli_num_rows($platform_apps);
    $platform_download = mysqli_query($connect,"SELECT SUM(download) AS `numbers` FROM `application` WHERE `platform_id`='$platform_id'");
    $platform_download_num = mysqli_fetch_array($platform_download);
    $download_num = $platform_download_num['numbers'];
    $colors =['#df4c21 ','#1de3eb','#b154f0','#ffb300'];


?>
        <?php include "../../layout/search_bar.php"; ?>

<div class="header_container">
    <h1><?=$platform_title  ?></h1>
</div>
<div class="container">
    <div class="row">
       <div class="col-lg-4 col-md-6">
       <div class="counter_div red-color">
            <span class="counter" data-target="<?=$platform_apps_num?>">0</span>
            <p><?=$lang['TotalApps']?></p>
            </div>
            
       </div>
       <div class="col-lg-4 col-md-6">
       <div class="counter_div blue-color">
            <span class="counter" data-target="<?=$categories_num?>">0</span>
            <p><?=$lang['TotalCategory']?></p>
            </div>
       </div>
       <div class="col-lg-4 col-md-6">
       <div class="counter_div purple-color">
            <span class="counter" data-target="<?=$download_num?>">0</span>
            <p><?=$lang['Total_Downloads']?></p>
            </div>
       </div>
    </div>
    <div class="row">
      <?php
      if($categories_num != 0){
            $x=0;
          while($categories_row = mysqli_fetch_array($categories)){
            $categories_title = html_entity_decode($categories_row['title_'.$_lang]);
            $categories_icon = htmlentities($categories_row['fa_icon']);
            $categories_slug = html_entity_decode($categories_row['slug']);
            $x++;

      ?>
       <div class="col-lg-3 col-md-4 col-12 category_card_col">
       <a href="store/ios/category.php?id=<?=$categories_slug?>">
          <div class="category_card"  data-aos="fade-up"   data-aos-easing="linear"
     data-aos-duration="1500">
            <i class="<?=$categories_icon?>" style="color:<?=$colors[$x%4]?>"></i>
            <h4><?=$categories_title?></h4>
          </div>
          </a>
        </div>
        <?php
              }
            }
        ?>
    </div>
</div>
<?php

?>
<?php include "../../layout/footer.php";
 }else{
    header("location:404.php");
 }
}else{
    header("location:404.php");
    }
}else{
    echo 1;

}
?>
