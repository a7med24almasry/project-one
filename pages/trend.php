<?php
session_start();
include "../vendor/config.php";
include "../vendor/functions.php";
include "../layout/header.php";
include "../lang/$_lang.php";
?>
<?php include "../layout/search_bar.php"; ?>
<div class="header_container">
    <h1>TREND</h1>
</div>
<div class="container">
    <div class="row mt-4">
        <?php
        $get_trend = mysqli_query($connect,"SELECT * FROM `trend` GROUP BY `app` ORDER BY COUNT(id) DESC");
        $get_trend_num = mysqli_num_rows($get_trend);
        if($get_trend_num != 0){
            while($row = mysqli_fetch_array($get_trend)){
                $title_app[] = htmlentities($row['app']);
            }
            $title = "'" .implode("','",$title_app) . "'"; 
            print_r($title);
            $most_download = mysqli_query($connect, "SELECT * FROM `application` WHERE `appId` IN ($title) ORDER BY `id` DESC LIMIT 100");
            $most_download_num = mysqli_num_rows($most_download);
        if ($most_download_num != 0) {
            while ($category_apps_row = mysqli_fetch_array($most_download)) {
                $category_apps_title = html_entity_decode($category_apps_row['title_' . $_lang]);
                $category_apps_img = htmlentities($category_apps_row['image']);
                $category_apps_id = htmlentities($category_apps_row['appId']);

        ?>
                <div class="col-lg-2 col-md-3 col-6 app_col" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
                    <a href="store/apps/details.php?id=<?= $category_apps_id ?>">
                        <div class="app_solid">
                            <img src="assets/img/icons/<?= $category_apps_img ?>" alt="<?= $category_apps_title ?>">
                            <h4><?= shortTitle($category_apps_title, 15) ?></h4>
                        </div>
                    </a>
                </div>
        <?php
            }
        }
    }
        ?>
    </div>


</div>
<?php include "../layout/footer.php" ?>