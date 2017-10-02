<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'asd2411');
define('DB_DATABASE','db_student');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE) or die("连接数据库服务器失败!".mysqli_connect_error());
mysqli_query($conn,'set names utf8');
?>