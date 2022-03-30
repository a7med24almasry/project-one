<?php
include "../config.php";
if (isset($_GET['link'])) {
$app_id = htmlentities($_GET['link']);
if(!empty($app_id)){
    $app_select = mysqli_query($connect,"SELECT * FROM `application` WHERE `appId`='$app_id'");
    $app_num = mysqli_num_rows($app_select);
    if($app_num != 0){
        $row = mysqli_fetch_array($app_select);
        $download = htmlentities($row['download']);
        $app_q = mysqli_query($connect,"UPDATE `application` SET `download`='$download'+1  WHERE `appId`='$app_id'");

    }
}
}
