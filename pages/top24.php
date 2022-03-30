<?php
session_start();
include "../../vendor/config.php";
include "../../vendor/functions.php";
include "../../layout/header.php";
include "../../lang/ar.php";
?>
<?php include "../../layout/search_bar.php"; ?>
<div class="header_container">
    <h1><?= $lang['top_24'] ?></h1>
</div>
<div class="container">
    <div class="row mt-4">
        <?php
        $most_download = mysqli_query($connect, " SELECT * FROM `application` WHERE `date` > DATE_SUB(CURDATE(), INTERVAL 1 DAY)
        ORDER BY `download` DESC LIMIT 100");
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
        ?>
    </div>


</div>
<?php include "../../layout/footer.php" ?>