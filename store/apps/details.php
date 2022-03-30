<?php
session_start();
include "../../vendor/config.php";
include "../../vendor/functions.php";
if (isset($_GET['id'])) {
  $id = htmlentities($_GET['id']);
  if (!empty($id)) {
    include "../../layout/header.php";
    include "../../lang/$_lang.php";
    $app = mysqli_query($connect, "SELECT * FROM `application` WHERE `appId`= '$id'");
    $app_num = mysqli_num_rows($app);
    if ($app_num != 0) {
      $row = mysqli_fetch_array($app);
      $app_title = html_entity_decode($row['title_' . $_lang]);
      $date = htmlentities($row['date']);
      $image = htmlentities($row['image']);
      $video = htmlentities($row['video_link']);
      $description = html_entity_decode($row['description_' . $_lang]);
      $category_lang = html_entity_decode($row['Categories_' . $_lang]);
      $content_rating = html_entity_decode($row['content_rating_' . $_lang]);
      $download = htmlentities($row['download']);
      $version = htmlentities($row['version']);
      $size = htmlentities($row['size']);
      $platform_id = htmlentities($row['platform_id']);
      $url = htmlentities($row['url']);
      $rating = htmlentities($row['rating']);
      $appId = htmlentities($row['appId']);
      $user_ip = get_user_ip();
      echo $user_ip;

?>
      <?php include "../../layout/search_bar.php"; ?>
      <div class="header_container">
        <h1><?php if (!empty($app_title)) echo $app_title ?></h1>
      </div>

      <div class="container">
        <div class="row mt-4">
          <div class="content_box">
            <p class="app-date"><?= $date ?></p>
            <img src="assets/img/icons/<?= $image ?>" alt="">
            <h2><?= $app_title ?></h2>
            <div class="download_btn">
              <div class="row ">
                <?php
                if ($platform_id == '1') {
                ?>
                  <div class="col-md-6 d-flex justify-content-center">
                    <div class="download_it">
                      <a href="<?= $url ?>" title="download">
                        <div class="app_store">
                          <div class="app_icon">
                            <i class="fab fa-google-play"></i>
                          </div>
                          <div class="app_text">
                            Google Play
                            <span>Get It Now</span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                <?php
                }
                ?>
                   
                   <div class="col-md-6 d-flex justify-content-center">
                <form action="pages/download.php" method="post" id="form-id">
                <input type="hidden" name="platform" value="<?=$platform_id?>">
                <input type="hidden" name="link" value="<?=$appId?>">
                  <div class="download_it">
                    <button  type="submit" title="download">
                      <div class="app_store">
                        <div class="app_icon">
                          <i class="fas fa-cloud-download-alt"></i>
                        </div>
                        <div class="app_text">
                          download direct link
                          <span>Get It Now</span>
                        </div>
                      </div>
                    </button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
            $screen_shots = mysqli_query($connect, "SELECT * FROM `screenshots` WHERE `appid`='$id'");
            $screen_num = mysqli_num_rows($screen_shots);
            if ($screen_num != 0) {

            ?>
              <div class="screen_shots">
                <div class="owl-carousel">
                  <?php
                  while ($screen_row = mysqli_fetch_array($screen_shots)) {
                    $image_screen = htmlentities($screen_row['img']);

                  ?>
                    <div>
                      <div class="screen_shots_img">
                        <a class="test-popup-link" href="assets/img/screenshots/<?= $image_screen ?>"><img src="assets/img/screenshots/<?= $image_screen ?>" alt="<?= $app_title ?>"></a>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php        }
            if (!empty($video)) {
            ?>
              <div class="app_video">
                <div class="ratio ratio-16x9">
                  <iframe src="<?= $video ?>" title="<?= $app_title ?>" allowfullscreen></iframe>
                </div>
              </div>
            <?php
            }
            ?>
            <div class="description">
              <h3><?= $lang['Description'] ?></h3>
              <?php
              if (!empty($description)) {
                echo $description;
              }
              ?>
            </div>
            <div class="additional-information-area">
              <h2><?= $lang['ADDITIONAL'] ?></h2>
              <div class="grid_items">
                <div class="additional_information_text">
                  <h4><?= $lang['version'] ?></h4>
                  <p><?= $version ?></p>
                </div>

                <div class="additional_information_text">
                  <h4><?= $lang['SIZE'] ?></h4>
                  <p><?= $size ?></p>
                </div>

                <div class="additional_information_text">
                  <h4><?= $lang['INSTALLS'] ?></h4>
                  <p><?= $download ?></p>
                </div>
                <div class="additional_information_text">
                  <h4><?= $lang['content_Rating'] ?></h4>
                  <p><?= $content_rating ?></p>
                </div>
                <div class="additional_information_text">
                  <h4><?= $lang['category'] ?></h4>
                  <p><?= $category_lang ?></p>
                </div>

              </div>
            </div>
          </div>
        </div>
        <style>
          .comment h2 {
            text-align: center;
            color: #fff;
            margin-top: 30px;
          }

          .comment p {
            color: #fff;
            text-align: center;
            font-size: 1.125rem;
          }

          .comment_input input,
          .comment_input textarea {
            height: 3.5rem;
            border-radius: 0.375rem;
            width: 100%;
            margin-bottom: 1.5rem;
            border-width: 2px;
            border-style: solid;
            border-color: rgb(40 29 89 / 1);
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            transition-property: all;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            transition-duration: 150ms;
            background-color: transparent;
            color: white;

          }

          .comment_input input:focus,
          .comment_input textarea:focus {
            outline: none;
          }

          .comment_input input:hover,
          .comment_input textarea:hover {
            border-color: rgb(177 84 240 / 1);
          }

          .comment_input textarea {
            height: 18rem;
          }

          .comment_submit {
            text-align: center;
          }

          .comment_submit button {
            background: #1c1656;
            color: white;
            outline: none;
            border: none;
            width: 200px;
            height: 50px;
            border-radius: 5px;
            border: 1px solid #1c1656;
          }

          .comment_submit button:hover {
            border-color: rgb(177 84 240 / 1);

          }

          .rating_num {
            color: white;
            text-align: center;

          }

          .rating_progress {
            margin-top: 50px;
            color: #fff;
          }

          .rating_num h1 {
            margin-top: 50px;
            font-size: 70px;
          }

          .progress {
            background-color: #1c1656;
            margin-bottom: 15px;
          }

          .progress-bar {
            background-color: #09002a;
            border-radius: 0.25rem;
          }

          .progress {
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: 0.65625rem;
            border-radius: 0.3125rem;
            height: 10px;
            width: 200px;
            margin-left: 2rem
          }

          .progress-bar {
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            color: var(--white);
            text-align: center;
            white-space: nowrap;
            transition: width 0.6s ease;
            border-radius: 0.3125rem;
          }

          .star-rating {
            direction: rtl;
            padding: 20px;
            cursor: default;
            text-align: center;
          }

          .star-rating input[type="radio"] {
            display: none;
          }

          .star-rating label {
            color: #bbb;
            font-size: 18px;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
          }

          .star-rating label:hover,
          .star-rating label:hover~label,
          .star-rating input[type="radio"]:checked~label {
            color: #f2b600;
          }
          #alert_comment{
            display: none;
          }
        </style>
        <div class="rating_area">
          <div class="row">
            <div class="col-md-6">
              <div class="rating_num">
                <?php
                $rating_all_q = mysqli_query($connect,"SELECT * FROM `rating` WHERE `app_id`='$id'");
                $rating_q = mysqli_query($connect,"SELECT AVG(rate) AS `rate` FROM `rating` WHERE `app_id`='$id'");
                $rating_five_q= mysqli_query($connect,"SELECT * FROM `rating` WHERE `app_id`='$id' AND `rate`=5");
                $four = mysqli_query($connect,"SELECT * FROM `rating` WHERE `app_id`='$id' AND `rate`=4");
                $three = mysqli_query($connect,"SELECT * FROM `rating` WHERE `app_id`='$id' AND `rate`=3");
                $two = mysqli_query($connect,"SELECT * FROM `rating` WHERE `app_id`='$id' AND `rate`=2");
                $one = mysqli_query($connect,"SELECT * FROM `rating` WHERE `app_id`='$id' AND `rate`=1");
                $rating_five_num = mysqli_num_rows($rating_five_q);
                $four_num_rows = mysqli_num_rows($four);
                $three_num_rows = mysqli_num_rows($three);
                $two_num_rows = mysqli_num_rows($two);
                $one_num_rows = mysqli_num_rows($one);
                $rating_num = mysqli_num_rows($rating_all_q);
                if($rating_num == 0){
                  $rating_avg = $rating;
                }else{
                $rating_row = mysqli_fetch_array($rating_q);
                $rating_avg = ceil($rating_row['rate']);
             
                }
                function get_percent($num,$rating_num){
                  if($rating_num == 0){
                    $rating_num =1;
                  }
                  $result=$num/$rating_num *100;
                  return $result;
                }
              
                ?>
                <style>
                  .rating_area{
                    border-bottom: 1px solid rgb(40 29 89 / 1);
                    padding-bottom:40px
                  }
                  </style>
                <h1><?=$rating_avg?></h1>
                <h6>Total Votes : <?=$rating_num?></h6>
                <div class="col-auto">
                  <div class="rating_small">
                   <?=Rate_stars($rating_avg)?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 rating_progress">
              <div class="row mb-2 align-items-center justify-content-center">
                <div class="col-auto">
                  <div class="rating_small">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="progress">
                    <div class="progress-bar" id="bar1" data-width="<?=get_percent($rating_five_num_num_rows,$rating_num)?>%" style="width:20%;"></div>
                  </div>
                </div>
                <div class="col-auto">
                  <span><?=$rating_five_num?></span>
                </div>
              </div>
              <div class="row mb-2 align-items-center justify-content-center">
                <div class="col-auto">
                  <div class="rating_small">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star text-muted"></small>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="progress">
                    <div class="progress-bar" id="bar2" data-width="<?=get_percent($four_num_rows,$rating_num)?>%" style="width: 20%;"></div>
                  </div>
                </div>
                <div class="col-auto">
                  <span><?=$four_num_rows?></span>
                </div>
              </div>
              <div class="row mb-2 align-items-center justify-content-center">
                <div class="col-auto">
                  <div class="rating_small">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star text-muted"></small>
                    <small class="fas fa-star text-muted"></small>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="progress">
                    <div class="progress-bar" id="bar3" data-width="<?=get_percent($three_num_rows,$rating_num)?>%" style="width: 20%;"></div>
                  </div>
                </div>
                <div class="col-auto">
                  <span><?=$three_num_rows?></span>
                </div>
              </div>
              <div class="row mb-2 align-items-center justify-content-center">
                <div class="col-auto">
                  <div class="rating_small">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star text-muted"></small>
                    <small class="fas fa-star text-muted"></small>
                    <small class="fas fa-star text-muted"></small>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="progress">
                    <div class="progress-bar" id="bar4" data-width="<?=get_percent($two_num_rows,$rating_num)?>%" style="width: 20%;"></div>
                  </div>
                </div>
                <div class="col-auto">
                  <span><?=$two_num_rows?></span>
                </div>
              </div>
              <div class="row mb-2 align-items-center justify-content-center">
                <div class="col-auto">
                  <div class="rating_small">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star text-muted"></small>
                    <small class="fas fa-star text-muted"></small>
                    <small class="fas fa-star text-muted"></small>
                    <small class="fas fa-star text-muted"></small>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="progress">
                    <div class="progress-bar" id="bar5" data-width="<?=get_percent($one_num_rows,$rating_num)?>%" style="width: 20%;"></div>
                  </div>
                </div>
                <div class="col-auto">
                  <span><?=$one_num_rows?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <style>
          .comment_user{
            display: table;
            table-layout: fixed;
            width: 100%;
            direction: var(--direction);

          }
          .comment_cell{
            display: table-cell;
            vertical-align: top;

          }
          .comment_cell_pic{
            width: 48px;
          }
          .comment_cell_pic h6{
            border-radius: 24px;
            height: 48px;
            margin-top: 10px;
            width: 48px;
            background: #1c1656;
            color:#fff;
            text-align:center;
            line-height: 48px;
          }
          .comment_cell h5{
            color:#fff;
            margin:10px;
            font-size: 16px;
          }
          .comment_Stars{
            font-size: 10px;
            margin: 10px;
            color:#fff;

          }
          .comment_Stars p{
            font-size: 16px;
            word-break: break-all;
          }
          .comment_area{
            padding-top:40px
          }
          .comment_area h4{
            text-align: right;
            color:#fff;
            font-size: 16px;
          }
          .comment_error h4{
            text-align:center;
          }
          </style>
          <div class="comment_area">
            <h4>عدد التعليقات :<?=$rating_num?>  </h4>
            <?php
            if($rating_num == 0){
              ?>
               <div class="comment_error">
            <h4>لم يتم اضافة تعليقات</h4>
          </div>
              <?php
            }else{
              while($comment_row = mysqli_fetch_array($rating_all_q)){
                $comment_name= htmlentities($comment_row['name']);
                $comment_text=html_entity_decode($comment_row['comment']);
                $comment_date=html_entity_decode($comment_row['date']);
                $comment_rate=html_entity_decode($comment_row['rate']);
                $result_comment = substr($comment_name, 0, 2);

              ?>

          <div class="comment_user ">
              <div class="comment_cell comment_cell_pic">
                <h6><?=$result_comment?></h6>
              </div>
              <div class="comment_cell">
              <h5><?=$comment_name?></h5>
              <div class="comment_Stars">
              <span><?=Rate_stars($comment_rate)?></span>
              <span><?=$comment_date?></span> 
              <p><?=$comment_text?></p>         
              </div>
              </div>
          </div>
          
          <?php
              }
            }
            ?>
 
          </div>
         
        <div class="row">
          <div class="col-md-12">
            <div class="comment">
              <h2>GET IN TOUCH</h2>
              <p>leave comment for us</p>
              <input type="hidden" id="hidden" value="<?=$id?>">
              <div id="alert_comment" class="bg-danger col-6 text-center text-white p-1 mb-2 mt-2 mx-auto rounded"></div>
              <div id="alert_done" class="bg-success col-6 text-center text-white p-1 mb-2 mt-2 mx-auto rounded">تم أضافة التعليق بنجاح</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="comment_input">
              <input type="text" name="" id="Name_input" placeholder="Name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="comment_input">
              <input type="email" name="" id="email_input" placeholder="Email">
            </div>
          </div>
          <div class="col-md-12">
            <div class="comment_input">
              <textarea name="" id="textArea" cols="30" rows="10" placeholder="what you want to write ..."></textarea>
            </div>
            <div class="star-rating">
              <input id="star-5" class="starInput" type="radio" name="rating" value="5" />
              <label for="star-5" title="5 stars">
                <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-4" class="starInput" type="radio" name="rating" value="4"/>
              <label for="star-4" title="4 stars">
                <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-3" class="starInput" type="radio" name="rating"  value="3" />
              <label for="star-3" title="3 stars">
                <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-2" class="starInput" type="radio" name="rating" value="2" />
              <label for="star-2" title="2 stars">
                <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-1" class="starInput" type="radio" name="rating" value="1" />
              <label for="star-1" title="1 star">
                <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
            </div>
            <div class="comment_submit">
              <button id="comment_submit">submit</button>
            </div>
          </div>
        </div>
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