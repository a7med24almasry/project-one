<?php
session_start();
include "../vendor/config.php";
include "../vendor/functions.php";
if (isset($_POST['platform']) && isset($_POST['link'])) {
$platform = htmlentities($_POST['platform']);
$link = htmlentities($_POST['link']);
if(!empty($platform) && !empty($link)){
    include "../layout/header.php";
    include "../lang/ar.php";
?>
    <?php include "../layout/search_bar.php"; ?>
    <div class="header_container">
        <h1>صفحة التحميل</h1>
    </div>
    <style>
        .download_page{
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .download_wrap{
            text-align: center;
    width: 200px;
    margin: 0 auto;
    position: relative;
    font-style: normal;
    display: block;
        }
        #cLoaderSVG {
    -webkit-transform: rotate(
-90deg
);
    transform: rotate(
-90deg
);
    width: 200px;
    height: 200px;
    display: block;
}
.cPath {
    stroke-dashoffset: 0;
    stroke-dasharray: 440;
    r: 70;
    cy: 100;
    cx: 100;
    stroke-width: 5px;
    stroke: #0a053d;
    fill: none;
    
}
.cLoader.done {
    stroke: #9e44c9;
}
.cLoader {
    stroke-dashoffset: 440;
    stroke-dasharray: 440;
    -webkit-transition: all 1s linear;
    transition: all 1s linear;
    r: 70;
    cy: 100;
    cx: 100;
    fill: none;
    stroke-width: 5px;
    stroke: #1c1656;
}
.cLoaded {
    width: 180px;
    height: 180px;
    position: absolute;
    right: calc(50% - 90px);
    top: 19px;
    font-size: 70px;
    padding-top: 47px;
    color: #fff;
    -webkit-transform: scale(0);
    transform: scale(0);
    transition: all ease-in-out 200ms;

}
.count_num{
    position: absolute;
    top: 88px;
    right: calc(50% - 33px);
    font-size: 60px;
    font-family: Arial!important;
    display: block;
    margin-bottom: 0px;
    -webkit-transform: scale(0);
    transform: scale(0);
    color: #fff;
    transition: all ease-in-out 200ms;

}
.cLoaded.zoom{
    -webkit-transform: scale(1);
    transform: scale(1);

}
.count_num.zoom{
    -webkit-transform: scale(1);
    transform: scale(1);
    top: 60px;

}
.clink{
    text-decoration: none;
    line-height: 1.5em;
    background: #0a053d !important;
    color: #ffffff;
    font-weight: bold;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    display: inline-block;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    padding: 10px 30px;
    font-size: 22px;
    transition: all ease-in-out 300ms;
}
.clink:hover{
    color: #1d08eb;
}
.clink.disabled {
    background: #1c1656!important;
    color: #999!important;
    pointer-events: none;
}
.click_btn{
    text-align: center;
}
    </style>


    <div class="container">
        <div class="download_page">
            <div class="download_wrap">
            <svg id="cLoaderSVG" width="120" height="120" xmlns="http://www.w3.org/2000/svg"><circle class="cPath" r="70" cy="100" cx="100"></circle><circle class="cLoader " r="70" cy="100" cx="100" style="stroke-dashoffset: 440px;"></circle></svg>
            <i class="fas fa-check cLoaded "></i>
                <div id="seconds-counter" class="count_num">01</div>
            </div>
            <div class="click_btn">
                <a rel="nofollow" class="clink disabled">جاري تجهيز الرابط...</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-12">
                        <div class="new__apps">
                            <h1><?= $lang['NewApps'] ?></h1>
                            <div class="new_apps_container">
                                <div class="row">
                                    <?php
                                    $link_app = mysqli_query($connect,"SELECT * FROM `application` WHERE `appId`='$link'");
                                    $link_app_num = mysqli_num_rows($link_app);
                                    if($link_app_num != 0){
                                        $row = mysqli_fetch_array($link_app);
                                        $title_cat = htmlentities($row['category']);
                                    }
                                    $last_App = mysqli_query($connect, "SELECT * FROM `application` WHERE `category`='$title_cat' ORDER BY RAND() DESC LIMIT 12");
                                    $last_app_num = mysqli_num_rows($last_App);
                                    if ($last_app_num != 0) {
                                        while ($last_App_row = mysqli_fetch_array($last_App)) {
                                            $last_img = htmlentities($last_App_row['image']);
                                            $last_title = html_entity_decode($last_App_row['title_' . $_lang]);
                                            $last_app_id = htmlentities($last_App_row['appId']);
                                            $last_app_rating = floor(htmlentities($last_App_row['rating']));
                                            $last_platform_id = htmlentities($last_App_row['platform_id']);
                                            if ($last_platform_id == 2) {
                                                $last_title = html_entity_decode($last_App_row['title_en']);
                                                $app_type_link = 'ios';
                                            } else {
                                                $app_type_link = 'apps';
                                            }
                                    ?>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                                                <a title="<?= $last_title ?>" href="<?= $_lang ?>/store/<?=$app_type_link ?>/details?id=<?= $last_app_id ?>">
                                                    <div class="app_over" style="background-image: url(assets/img/icons/<?= $last_img ?>);">
                                                        <div class="overlay"><?= $last_app_rating ?> <span class="over_rating"><i class="fas fa-star"></i></span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="app">
                                                    <a title="<?= $last_title ?>" href="<?= $_lang ?>/store/<?=$app_type_link ?>/details?id=<?= $last_app_id ?>"><?php echo shortTitle($last_title, 15) ?></a>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <input type="hidden" value="<?=$link?>" id="link">
    <input type="hidden" value="<?=$platform?>" id="platform">
<?php include "../layout/footer.php";
}else{
    header("location:../404.php");

}
} else {
    header("location:../404.php");
}
?>