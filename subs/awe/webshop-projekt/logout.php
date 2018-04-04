<?php
session_start();
setcookie('fname', null, time()-3600);
setcookie('umail', null, time()-3600);
setcookie('lang', null, time()-3600);
session_unset();
session_destroy();
header("location:main.php");
exit();
?>

