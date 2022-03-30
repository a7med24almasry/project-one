<?php
include "../config.php";
if (isset($_POST['platform']) && isset($_POST['link'])) {
    $platform = htmlentities($_POST['platform']);
    $link = htmlentities($_POST['link']);
    if(!empty($platform) && !empty($link)){
        $app = mysqli_query($connect,"SELECT * FROM `application` WHERE `appId`='$link'");
        $app_num = mysqli_num_rows($app);
        if($app_num !=0){
            $row = mysqli_fetch_array($app);
            $url = html_entity_decode($row['url']);
            $download_url = html_entity_decode($row['download_url']);
        if($platform == 1){
            $html = file_get_html($download_url.'/download');
            $title = $html->find('#detail-download-button',0)->href;   
    }
        else{
                $html = file_get_html($url.'/download');
                $title = $html->find('#detail-download-button',0)->href;   
            }
        }
        echo $title;
    }
}
