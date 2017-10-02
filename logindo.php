<script type="text/javascript" src="adjs.js"></script>
<?php
header("connect-type:text/html; charset=utf-8");
include 'conn.php';
$admin_login = $_POST['admin_login'];
$admin_pass = $_POST['admin_pass'];
session_start();
$code = $_POST['code'];
$s = $_SESSION['code'];
if ($code != $s) {
    echo "<script>alert('验证码错误');history.back();</script>";
    return false;
}else {
    $sql = "SELECT * FROM admin_inf where admin_login = '$admin_login' and admin_pass = MD5('$admin_pass')";
    $sql_count = "Update count set click_num = click_num+1 where aid =1";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 1) {
        $conn -> query($sql_count);
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_name'] = $row['admin_login'];
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('用户名或密码不正确');window.location.href='login.php';</script>";
    }
}
$conn->close();
?>