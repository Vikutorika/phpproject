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
$id = $_GET['id'];
$sql = "select * from admin_inf where id =$id";
$result = $conn -> query($sql);
$row = mysqli_fetch_assoc($result);
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
                    <dd style="font-weight: bold; font-size: 22px; color: #313131"><?php echo $row['admin_login'] ?></dd>
                </dl>
                <dl>
                    <dt>姓名：</dt>
                    <dd><input type="text" name="ad_name" value="<?php echo $row['name'] ?>"></dd>
                </dl>
                <dl>
                    <dt>手机号码：</dt>
                    <dd><input type="text" name="phone" value="<?php echo $row['phone'] ?>"></dd>
                </dl>
                <dl>
                    <dt>邮箱：</dt>
                    <dd><input type="text" name="email" value="<?php echo $row['email'] ?>"></dd>
                </dl>
                <dl>
                    <dt>地址：</dt>
                    <dd><input type="text" name="address" value="<?php echo $row['address'] ?>"></dd>
                </dl>
                <dl>
                    <dt></dt>
                    <dd><input class="con_con_canl" type="submit" name="cancel" value="取消修改">
                        <input class="con_con_bing" type="submit" name="bing" value="确认修改"></dd>
                </dl>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['bing'])){
    date_default_timezone_set("PRC");
    $date = date( "Y-m-d H:i:s");
    $sql_naup = 'UPDATE admin_inf SET 
    name = "'.$_POST['ad_name'].'",
    phone = "'.$_POST['phone'].'",
    email = "'.$_POST['email'].'",
    address = "'.$_POST['address'].'",
    mdtime = "'.$date.'"
    WHERE id='.$id;
    if ($conn->query($sql_naup) == TRUE){
        echo "<script>alert('修改成功');window.location.href='ad_us.php';</script>";
    }else{
        echo "<script>alert('修改失败');history.back();</script>";
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='ad_us.php';</script>";
}
$conn->close();
?>

