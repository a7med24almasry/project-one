<?php
$db_username= "root";
$db_password= "";
$db_name= "onscroll";
$db_host= "localhost";
$sSQL= 'SET CHARACTER SET utf8'; 
$connect=mysqli_connect($db_host,$db_username,$db_password);
mysqli_select_db($connect,$db_name);
mysqli_query($connect,$sSQL);
?>
<?php
function getRate(){
    
}