<?php
include "../config.php";
if(isset($_POST['email']) && $_POST['Name']){
$email = htmlentities($_POST['email']);
$name = htmlentities($_POST['Name']);
$_textArea = htmlentities($_POST['textArea']);
$date = date('y/m/d h:i');
$insert_q = mysqli_query($connect,"INSERT INTO `contact`( `name`, `email`, `date`, `text`) VALUES ('$name','$email','$date','$_textArea')");
}