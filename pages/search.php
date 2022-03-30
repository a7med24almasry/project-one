<?php
session_start();
include "../../vendor/config.php";
include "../../vendor/functions.php";
include "../../layout/header.php";
include "../../lang/ar.php";
if (isset($_GET['q'])) {
    $search_text = htmlentities($_GET['q']);
    include "../../layout/header.php";

?>
    <?php include "../../layout/search_bar.php"; ?>
    <div class="header_container">
        <h1><?=$lang['searchpage']?></h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (!empty($search_text)) {
                if (isset($_GET['type'])) {
                    $type = htmlentities($_GET['type']);
                    $search_q = mysqli_query($connect, "SELECT * FROM `application` WHERE `title_en` LIKE '%$search_text%' AND `platform_id`='$type' LIMIT 40");
                } else {
                    $search_q = mysqli_query($connect, "SELECT * FROM `application` WHERE `title_en` LIKE '%$search_text%'  LIMIT 40");
                }
                $search_q_num = mysqli_num_rows($search_q);
                if ($search_q_num != 0) {
            ?>
                    <div class="col-12">
                        <div class="select_filter">
                            <form action="ar/pages/search.php" method="GET">
                                <input type="hidden" name="q" value="<?= $search_text ?>">
                                <select onchange="this.form.submit()" name="type" id="">
                                    <option value="1"><?=$lang['Android']?></option>
                                    <option value="2"><?=$lang['Ios']?></option>
                                    <option value="3"><?=$lang['Windows']?></option>
                                    <option value="4"><?=$lang['Mac']?></option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <?php
                    while ($search_row = mysqli_fetch_array($search_q)) {
                        $title = html_entity_decode($search_row['title_' . $_lang]);
                        $img = htmlentities($search_row['image']);
                        $rating = htmlentities($search_row['rating']);

                    ?>
                        <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                            <div class="search_app">
                                <div class="search_img">
                                    <a href="">
                                        <img src="assets/img/icons/<?= $img ?>" alt="<?= $title ?>">
                                    </a>
                                </div>
                                <div class="search_text">
                                    <h3><a href=""><?= $title ?></a></h3>
                                    <div class="stars">
                                        <?= Rate_stars($rating) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="no_search">
                        <h2><?=$lang['sorryYoursearchfor']?> " <?= $search_text ?> " <?=$lang['didnotreturnanyresults']?>
                        </h2>
                        <form action="" method="get">
                            <div class="newsletter-form">
                                <div class="newsletter-form-grp search_form">
                                    <i class="fas fa-search"></i>
                                    <input type="text" name="q" placeholder="<?=$lang['Enter_your_words']?>">
                                </div>
                                <button type="submit" class=""><?=$lang['search']?> <i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="no_search">
                    <h2>Please enter the word you want to search for

                    </h2>
                    <form action="" method="get">
                        <div class="newsletter-form">
                            <div class="newsletter-form-grp search_form">
                                <i class="fas fa-search"></i>
                                <input type="text" name="q" placeholder="Enter your words...">
                            </div>
                            <button type="submit" class="">SUBSCRIBE <i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php include "../../layout/footer.php";
} else {
    header("location:../404.php");
}
?>