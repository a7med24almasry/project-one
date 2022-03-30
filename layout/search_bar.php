<div class="nav_menu">
    <div class="container-fluid mt-4">
        <div class="row ">
            <div class="col-md-2">
                <div class="website_logo">
                    <a href=""><img alt="" src="assets/img/website/logo.png"></a>
                </div>

            </div>
            <div class="col-md-7">
                <div class="header_links">
                    <ul>
                        <li><a href="<?=$_lang?>/store/apps/platform/id/android"><i class="fab fa-android"></i> <?=$lang['Android']?></a></li>
                        <li><a href="<?=$_lang?>/store/ios/platform/id/ios"><i class="fab fa-apple"></i> <?=$lang['Ios']?></a></li>
                        <li><a href="<?=$_lang?>/store/apps/platform/id/mac"><i class="fas fa-apple-alt"></i> <?=$lang['Mac']?></a></li>
                        <li><a href="<?=$_lang?>/store/apps/platform/id/windows"><i class="fab fa-windows"></i> <?=$lang['Windows']?></a></li>
                        <li><a href="<?=$_lang?>/pages/trend.php"><i class="fas fa-chart-line"></i> <?=$lang['Trend']?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icons_nav">
                    <div class="search">
                        <form action="pages/search.php" method="GET">
                            <input placeholder="search..." type="text" name="q"> <button type="submit" ><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <label id="toggle_icon" for="toggle_menu"><i class="fas fa-th-list"></i></label>
    <input type="checkbox" name="" id="toggle_menu">
</div>
<div class="slide_menu">
    <div class="website_logo">
        <a href=""><img alt="" src="assets/img/website/logo.png"></a>
    </div>
    <div class="search">
        <form action="vendor/search.php">
            <input name="q" placeholder="search..." type="text"> <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="slide_menu_items">
        <ul>
            <li class="accordion">
                <a class="anchor"><i class="fab fa-android"></i> Android</a>
                <ul class="panel">
                    <li><a href="<?=$_lang?>/store/apps/platform/id/android"><i class="fas fa-globe"></i> All categories</a></li>
                    <?php
                    $category = mysqli_query($connect, "SELECT * FROM `categories` WHERE `platform`='android' ORDER BY `id` DESC ");
                    $category_num = mysqli_num_rows($category);
                    if ($category_num != 0) {
                        while ($category_row = mysqli_fetch_array($category)) {
                            $category_title = html_entity_decode($category_row['title_'.$_lang]);
                            $category_slug = html_entity_decode($category_row['slug']);
                            $category_icon = html_entity_decode($category_row['fa_icon']);
                    ?>
                            <li><a href="<?=$_lang?>/store/apps/category/id/<?=$category_slug?>"><i class="<?= $category_icon ?>"></i> <?= $category_title ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            <li class="accordion"><a class="anchor"><i class="fab fa-apple"></i> Ios</a>
                <ul class="panel">
                    <li><a href="<?=$_lang?>/store/ios/platform/id/ios"><i class="fas fa-globe"></i> All categories</a></li>
                    <?php
                    $category = mysqli_query($connect, "SELECT * FROM `categories` WHERE `platform`='ios' ORDER BY `id` DESC ");
                    $category_num = mysqli_num_rows($category);
                    if ($category_num != 0) {
                        while ($category_row = mysqli_fetch_array($category)) {
                            $category_title = html_entity_decode($category_row['title_'.$_lang]);
                            $category_slug = html_entity_decode($category_row['slug']);
                            $category_icon = html_entity_decode($category_row['fa_icon']);
                    ?>
                            <li><a href="<?=$_lang?>/store/apps/category/id/<?=$category_slug?>"><i class="<?= $category_icon ?>"></i> <?= $category_title ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            <li class="accordion">
                <a class="anchor"><i class="fas fa-apple-alt"></i> Mac</a>
                <ul class="panel">
                    <li><a href="<?=$_lang?>/store/apps/platform/id/mac"><i class="fas fa-globe"></i> All categories</a></li>
                    <?php
                    $category = mysqli_query($connect, "SELECT * FROM `categories` WHERE `platform`='mac' ORDER BY `id` DESC ");
                    $category_num = mysqli_num_rows($category);
                    if ($category_num != 0) {
                        while ($category_row = mysqli_fetch_array($category)) {
                            $category_title = html_entity_decode($category_row['title_'.$_lang]);
                            $category_slug = html_entity_decode($category_row['slug']);
                            $category_icon = html_entity_decode($category_row['fa_icon']);
                    ?>
                            <li><a href="<?=$_lang?>/store/apps/category/id/<?=$category_slug?>"><i class="<?= $category_icon ?>"></i> <?= $category_title ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            <li class="accordion">
                <a class="anchor"><i class="fab fa-windows"></i><?=$lang['Windows']?></a>
                <ul class="panel">
                    <li><a href="<?=$_lang?>/store/apps/platform/id/windows"><i class="fas fa-globe"></i> All categories</a></li>
                    <?php
                    $category = mysqli_query($connect, "SELECT * FROM `categories` WHERE `platform`='windows' ORDER BY `id` DESC ");
                    $category_num = mysqli_num_rows($category);
                    if ($category_num != 0) {
                        while ($category_row = mysqli_fetch_array($category)) {
                            $category_title = html_entity_decode($category_row['title_'.$_lang]);
                            $category_slug = html_entity_decode($category_row['slug']);
                            $category_icon = html_entity_decode($category_row['fa_icon']);
                    ?>
                            <li><a href="<?=$_lang?>/store/apps/category/id/<?=$category_slug?>"><i class="<?= $category_icon ?>"></i> <?= $category_title ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            <li><a href=""><i class="fas fa-chart-line"></i> <?=$lang['Trend']?></a></li>
        </ul>
    </div>
</div>