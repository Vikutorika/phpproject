<script type="text/javascript" src="adjs.js"></script>
<link href="adstyle.css" rel="stylesheet" type="text/css" />
<title>MyKurol管理</title>
<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location:login.php");
    exit();
}
include 'header.php';
include 'leftme.jsp';
include('conn.php');
?>
<div class="bg">
    <div class="con">
        <div class="con_ls">
            <p>管理员用户修改</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>用户名：</dt>
                    <dd><input type="text" name="admin_login" id="in_admin_login"/></dd>
                </dl>
                <dl>
                    <dt>密码：</dt>
                    <dd><input type="password" name="admin_pass" id="in_admin_pass"/></dd>
                </dl>
                <dl>
                    <dt>确认密码:</dt>
                    <dd><input type="password" name="radmin_pass" id="in_radmin_pass" placeholder="请确认输入密码" onBlur="repass()"/></dd>
                    <div id="rpassor"></div>
                </dl>
                <dl>
                    <dt>姓名：</dt>
                    <dd><input type="text" name="ad_name" id="in_ad_name"/></dd>
                </dl>
                <dl>
                    <dt>手机号码：</dt>
                    <dd><input type="text" name="phone" id="in_phone" onBlur="chphone()"/></dd>
                    <div id="cphone"></div>
                </dl>
                <dl>
                    <dt>邮箱：</dt>
                    <dd><input type="text" name="email" id="in_email" placeholder="格式:xxx@xx.com" onBlur="reema()"/></dd>
                    <div id="remor"></div>
                </dl>
                <dl>
                    <dt>地址：</dt>
                    <dd><input type="text" name="address" id="in_address"/></dd>
                </dl>
                <dl>
                    <dt></dt>
                    <dd><input class="con_con_canl" type="submit" name="cancel" value="取消"/>
                        <input class="con_con_bing" type="submit" name="bing" value="确认添加" onClick="return ins_ad()"/></dd>
                </dl>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['bing'])){
    date_default_timezone_set("PRC");
    $date = date( "Y-m-d H:i:s");
    $sql_naup = 'INSERT INTO admin_inf VALUES(
    NULL,
    "'.$_POST['admin_login'].'",
    MD5("'.$_POST['admin_pass'].'"),
    "'.$_POST['ad_name'].'",
    "'.$_POST['phone'].'",
    "'.$_POST['email'].'",
    "'.$_POST['address'].'",
    "'.$date.'")';
    if ($conn->query($sql_naup) == TRUE){
        echo "<script>alert('添加成功');window.location.href='ad_us.php';</script>";
    }else{
        echo "<script>alert('添加失败');history.back();</script>";
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='ad_us.php';</script>";
}
$conn->close();
?>