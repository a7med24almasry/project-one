<?php
session_start();
include "../../vendor/config.php";
include "../../lang/ar.php";
include "../../vendor/functions.php";
if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
    if (!empty($id)) {
        include "../../layout/header.php";
        $category = mysqli_query($connect, "SELECT * FROM `categories` WHERE `slug`='$id'");
        $category_num = mysqli_num_rows($category);
        if ($category_num != 0) {
            $category_row = mysqli_fetch_array($category);
            $category_id = htmlentities($category_row['id']);
            $category_name = html_entity_decode($category_row['title_'.$_lang]);
            $category_apps = mysqli_query($connect, "SELECT * FROM `application` WHERE `category` = '$category_id'");
            $category_apps_num  = mysqli_num_rows($category_apps);
            $category_download = mysqli_query($connect, "SELECT SUM(download) AS app_down FROM `application` WHERE `category` = '$category_id'");
            $category_fetch = mysqli_fetch_array($category_download);
            $category_download_num = $category_fetch['app_down'];
            $adjacent = 1;
            $page_query = mysqli_query($connect, "SELECT COUNT(*) AS `num` FROM `application` WHERE `category` = '$category_id'");
            $total_pages = mysqli_fetch_array($page_query);
            $total_pages = $total_pages['num'];
            if (isset($_GET['page']) && $_GET['page'] != "") {
                $page_num = htmlentities($_GET['page']);
            } else {
                $page_num = 1;
            }
            $total_record = 100;
            $offset = ($page_num - 1) * $total_record;
            $total_num_of_pages = ceil($total_pages / $total_record);
            $category_apps = mysqli_query($connect, "SELECT * FROM `application` WHERE `category` = '$category_id' LIMIT $offset,  $total_record");
            $link = 'store/apps/category.php?id=' . $id;
?>
            <?php include "../../../layout/search_bar.php"; ?>
            <div class="header_container">
                <h1><?= $category_name ?></h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class=" col-md-6">
                        <div class="counter_div red-color">
                            <span class="counter" data-target="<?= $category_apps_num ?>"><?= $category_apps_num ?></span>
                            <p><?=$lang['TotalApps']?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="counter_div blue-color">
                            <span class="counter" data-target="<?= $category_download_num ?>"><?= $category_download_num ?></span>
                            <p><?=$lang['Total_Downloads']?></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <?php
                    if ($category_apps_num != 0) {
                        while ($category_apps_row = mysqli_fetch_array($category_apps)) {
                            $category_apps_title = html_entity_decode($category_apps_row['title_' . $_lang]);
                            $category_apps_img = htmlentities($category_apps_row['image']);
                            $category_apps_id = htmlentities($category_apps_row['appId']);

                    ?>
                            <div class="col-lg-2 col-md-3 col-6 app_col" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
                                <a href="ar/store/apps/details.php?id=<?= $category_apps_id ?>">
                                    <div class="app_solid">
                                        <img src="assets/img/icons/<?= $category_apps_img ?>" alt="<?= $category_apps_title ?>">
                                        <h4><?= shortTitle($category_apps_title, 8) ?></h4>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <ul class="pagination">
                   <?php
                  echo  pagination($page_num,$link,$adjacent,$total_num_of_pages)
                   ?>
                </ul>

            </div>





<?php include "../../layout/footer.php";
        } else {
            header("location:pages/404.php");
        }
    } else {
        header("location:pages/404.php");
    }
} else {
    header("location:pages/404.php");
}
?>