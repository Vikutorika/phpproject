<?php
session_start();
if(isset($_SESSION['admin_id'])) {
    $_SESSION['admin_id'] = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-3600);
    }
    session_destroy();
}
$home_url = 'login.php';
header('Location:'.$home_url);
