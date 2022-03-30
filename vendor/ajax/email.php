<?php
include "../config.php";
if(isset($_POST['input_val'])){
$input_val = htmlentities($_POST['input_val']);
$date = date('y/m/d h:i');
$mysql_q = mysqli_query($connect,"INSERT INTO `newsletter`(`email`, `date`) VALUES ('$input_val','$date')");
}