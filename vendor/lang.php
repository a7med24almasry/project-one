<?php
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = htmlentities($_POST['lang']);
    $_lang = $_SESSION['lang'];
    if ($_SESSION['lang'] == '') {
        $_lang = 'en';
    }
} else {
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = explode('/', $actual_link);
if (strlen($actual_link[3]) > 0) {
    if ($actual_link[3] == 'ar') {
        $_SESSION['lang'] = 'ar';
    } elseif ($actual_link[3] == 'en') {
        $_SESSION['lang'] = 'en';
    }
} else{
    $_SESSION['lang'] = 'en';
}
}
$_lang= $_SESSION['lang'];
header('Cache-Control: no cache');
$app_type_link = 'apps';
