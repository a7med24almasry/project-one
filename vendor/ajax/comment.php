<?php
include "../config.php";
if(isset($_POST['email']) && $_POST['Name']){
$email = htmlentities($_POST['email']);
$name = htmlentities($_POST['Name']);
$rating_val = htmlentities($_POST['rating_val']);
if($rating_val== '0'){
$rating_val= 1;
}
$_textArea = htmlentities($_POST['textArea']);
$hidden = htmlentities($_POST['hidden']);
$date = date('y/m/d h:i');
$insert_q = mysqli_query($connect,"INSERT INTO `rating`( `name`, `email`, `date`, `comment`, `app_id`,`rate`) VALUES ('$name','$email','$date','$_textArea','$hidden','$rating_val')");
}