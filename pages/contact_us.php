<?php
session_start();
include "../vendor/config.php";
include "../vendor/functions.php";
include "../layout/header.php";
include "../lang/$_lang.php";
?>
<?php include "../layout/search_bar.php"; ?>
<div class="header_container">
    <h1>contact Us</h1>
</div>
<div class="container">
<div class="row">
          <div class="col-md-12">
            <div class="comment">
              <h2>GET IN TOUCH</h2>
              <p>If you need help, please contact us</p>
              <div id="alert_comment" class="bg-danger col-6 text-center text-white p-1 mb-2 mt-2 mx-auto rounded"></div>
              <div id="alert_done" class="bg-success col-6 text-center text-white p-1 mb-2 mt-2 mx-auto rounded">تم أرسال رسالتك بنجاح</div>
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
            <div class="comment_submit">
              <button id="submit_contact ">submit</button>
            </div>
          </div>
        </div>
</div>
<?php include "../layout/footer.php" ?>