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
$sql = "select * from km_inf where km_id =$id";
$result = $conn -> query($sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="bg">
    <div class="con">
        <div class="con_ls">
            <p>修改科目名称</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>新的科目名称：</dt>
                    <dd><input type="text" name="alt_km" value="<?php echo $row['km_name'] ?>"></dd>
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
    $sql_naup = 'UPDATE km_inf SET
    km_name = "'.$_POST['alt_km'].'",
    WHERE km_id='.$id;
    if ($conn->query($sql_naup) == TRUE){
        echo "<script>alert('修改成功');window.location.href='km_inf.php';</script>";
    }else{
        echo "<script>alert('修改失败');history.back();</script>";
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='km_inf.php';</script>";
}
$conn->close();
?>

