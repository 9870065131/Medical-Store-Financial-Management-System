<?php
//ini_set('session.use_only_cookies', 0);
//session_set_cookie_params(0);
session_start();
session_destroy();
header('Location: login.php');
exit();
?>