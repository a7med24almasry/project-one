<div class="container-fluid">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                 <div class="news_">
                 <div class="newsletter-wrap">
                        
                        <div class="newsletter-title">
                            <h2><?=$lang['OUR_NEWSLETTER']?></h2>
                        </div>
                        <div class="newsletter-form">
                            <div class="newsletter-form-grp">
                            <i class="far fa-envelope"></i>
                            <input id="email" type="email" name="email" placeholder="<?=$lang['enter_mail']?>">
                            </div>
                            <button id="email_submit" type="submit" name="submit" class=""><?=$lang['SUBSCRIBE']?> <i class="fas fa-paper-plane"></i></button>
                        </div>
                        
                    </div>
                    <div class="alert alert-danger" id="alert" role="alert">
                    </div>
                    <div id="alert_done" class="alert alert-primary" role="alert">
                        <?=$lang['email_done']?>
                </div>
                 </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="footer-logo">
                    <a href="index.php"><img src="assets/img/website/logo.png" alt=""></a>
                    <p><?=$lang['on_scroll']?></p>
                </div>
                <div class="select_filter">
                            <form action=""  method="Get">
                                <select name="lang" onchange="this.form.submit()">  

                                     <option value="en"<?php if($_SESSION['lang']=='en'){echo 'selected';}?> >English</option>
                                    <option value="ar" <?php if($_SESSION['lang']=='ar'){echo 'selected';}?> >Arabic</option>
                                </select>
                            </form>
                        </div>
            </div>
            <div class="col-md-3">
                <div class="menu_footer_items">
                    <p class="menu_footer_text"><?=$lang['TOP_APPS']?></p>
                    <ul class="list_footer">
                    <?php
                        $most_App =mysqli_query($connect,"SELECT * FROM `application` ORDER BY `download` DESC LIMIT 10 ");
                        $most_app_num = mysqli_num_rows($most_App);
                        if($most_app_num != 0){
                            while($most_App_row = mysqli_fetch_array($most_App)){
                                $most_title = html_entity_decode($most_App_row['title_'.$_lang]);
                                $most_app_id = htmlentities($most_App_row['appId']);
										?>
                        <li><a title="<?=$most_title?>" href="store/apps/details.php?id=<?=$most_app_id?>"><?=$most_title?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu_footer_items">
                    <p class="menu_footer_text"><?=$lang['MostRating']?></p>
                    <ul class="list_footer">
                    <?php
                        $most_App =mysqli_query($connect,"SELECT * FROM `application` ORDER BY `rating` DESC LIMIT 10 ");
                        $most_app_num = mysqli_num_rows($most_App);
                        if($most_app_num != 0){
                            while($most_App_row = mysqli_fetch_array($most_App)){
                                $most_title = html_entity_decode($most_App_row['title_'.$_lang]);
                                $most_app_id = htmlentities($most_App_row['appId']);
										?>
                        <li><a title="<?=$most_title?>" href="store/apps/details.php?id=<?=$most_app_id?>"><?=$most_title?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_trend">
                <h4><?=$lang['TODAY_TOP']?></h4>
                    <div class="trend_apps">
                        <?php 
                        $last24hour= mysqli_query($connect,"SELECT * 
                        FROM `application` WHERE `date` > DATE_SUB(CURDATE(), INTERVAL 1 DAY)
                        ORDER BY `download` DESC LIMIT 6");
                        $last24hour_num= mysqli_num_rows($last24hour);
                        if($last24hour_num !=0){
                            while($last_row = mysqli_fetch_array($last24hour)){
                                $image = htmlentities($last_row['image']);
                                $appID = htmlentities($last_row['appId']);
                                $title = html_entity_decode($last_row['title_'.$_lang]);
                                ?>
                            <a title="<?=$title?>" href="store/apps/details.php?id=<?=$appID?>"> <img src="assets/img/icons/<?=$image?>" alt="<?=$title?>"> </a>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- bootstrap
========================================================-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- jquery
========================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- aos
========================================================-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- magnific-popup
========================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- owl.carousel.js
========================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- main script
========================================================-->
<script src="assets/js/main.js"></script>
<!-- main script
========================================================-->
<script src="assets/js/lang.js"></script>
</body>
</html>