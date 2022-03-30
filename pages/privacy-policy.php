<?php
session_start();
include "../vendor/config.php";
include "../vendor/functions.php";
include "../layout/header.php";
include "../lang/ar.php";
?>

    <?php include "../layout/search_bar.php"; ?>
  <div class="header_container">
        <h1><?=$lang['privacy-policy']?></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page_privacy">
                    <h4><?=$lang['privacy-policy']?></h4>
                    <p><?=$lang['PrivacyPolicyfor']?> <span><?=$lang['onscroll']?></span> ..... </p>
                    <p><?=$lang['ifyouwant']?> <a href="mailto:<?=$lang['contact@onscroll.com']?>"><span><?=$lang['contact@onscroll.com']?></span></a></p>
                    <p><?=$lang['At']?> <span><?=$lang['onscroll']?></span> <?=$lang['our privacy']?> <span><?=$lang['onscroll']?></span> <?=$lang['andhowitis']?></p>
                    <h5><?=$lang['LogFiles']?></h5>
                    <p><?=$lang['Like many other Web sites']?> <span><?=$lang['onscroll']?></span> <?=$lang['makes use']?></p>
                    <h5><?=$lang['Cookies and Web Beacons']?></h5>
                    <p><span><?=$lang['onscroll']?></span> <?=$lang['does use cookies']?></p>
                    <h5><?=$lang['DoubleClick']?></h5>
                    <p><?=$lang['Google']?> <span><?=$lang['onscroll']?></span></p>
                    <p><?=$lang['Google_use']?>  <span><?=$lang['onscroll']?></span> <?=$lang['and_other']?></p>
                    <p><?=$lang['followingURL']?> <a href="<?=$lang['followingURLLink']?>"><?=$lang['followingURLLink']?></a></p>
                    <p><?=$lang['beacons']?></p>
                    <p><?=$lang['networks']?> <span><?=$lang['onscroll']?></span> <?=$lang['directly']?></p>
                    <p><span><?=$lang['onscroll']?></span> <?=$lang['accessto']?></p>
                    <p><?=$lang['shouldconsult']?></p>
                    <p><?=$lang['onscroll']?><?=$lang['notapply']?></p>
                    <p><?=$lang['cookiemanagement']?></p>
                    
                    <p></p>
                </div>
            </div>
        </div>
    </div>
<?php include "../layout/footer.php";?>