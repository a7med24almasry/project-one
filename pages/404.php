<?php
include "../vendor/config.php";
include "../vendor/functions.php";
include "../layout/header.php";
include "../lang/ar.php";
 include "../layout/search_bar.php"; 
?>
<div class="header_container">
    <h1><?= $lang['ERROR_PAGE'] ?></h1>
</div>
<div class="container">
    <div class="title_404">
        <h3>OPPS...</h3>
        <p>SORRY, this page is not found.</p>
        <div class="error-404 mb-68"><img src="assets/img/website/404.webp" alt=""></div>
        <div class="d-flex  justify-content-center">
            <a href="index.php">
                    Go to Home
                </a>
        </div>
    </div>
</div>
<?php include "../layout/footer.php" ?>