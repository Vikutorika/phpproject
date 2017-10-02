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
$sql = "select * from cj_inf 
INNER join stu_inf on cj_inf.cj_stuid = stu_inf.id
INNER join km_inf on cj_inf.cj_kmid = km_inf.km_id
where cj_id =$id";
$result = $conn -> query($sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="bg">
    <div class="con">
        <div class="con_ls">
            <p>学生成绩修改</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>学号：</dt>
                    <dd><a style="font-size: 20px; font-weight: bold; color: #5dbaff; margin-top: 5px;"><?php echo $row['stu_xh']; ?></a></dd>
                </dl>
                <dl>
                    <dt>科目：</dt>
                    <dd><a style="font-size: 20px; font-weight: bold; color: #5dbaff;"><?php echo $row['km_name']; ?></a></dd>
                </dl>
                <dl>
                    <dt>成绩：</dt>
                    <dd><input type="text" name="alt_cj" value="<?php echo $row['cj_score'] ?>"></dd>
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
    $sql_naup = 'UPDATE cj_inf SET
    cj_score = '.$_POST['alt_cj'].'
    WHERE cj_id = '.$id;
    if ($conn->query($sql_naup) == TRUE){
        echo "<script>alert('修改成功');window.location.href='cj_inf.php';</script>";
    }else{
        echo "<script>alert('修改失败');history.back();</script>";
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='cj_inf.php';</script>";
}
$conn->close();
?>

