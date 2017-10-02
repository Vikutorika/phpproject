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
            <p>添加新学院</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>新学院名称：</dt>
                    <dd><input type="text" name="ins_xy" id="ins_xy"/></dd>
                </dl>
                <dl>
                    <dt></dt>
                    <dd><input class="con_con_canl" type="submit" name="cancel" value="取消"/>
                        <input class="con_con_bing" type="submit" name="bing" value="确认添加"/></dd>
                </dl>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['bing'])) {
    if ($_POST['ins_xy'] == '') {
        echo "<script>alert('学院名称不能为空,添加失败');history.back();</script>";
        return false;
    } else {
        $sql_naup = 'INSERT INTO xy_inf VALUES(
        null,
        "' . $_POST['ins_xy'] . '")';
        if ($conn->query($sql_naup) == TRUE) {
            echo "<script>alert('添加成功');window.location.href='xyinf.php';</script>";
        } else {
            echo "<script>alert('添加失败');history.back();</script>";
        }
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='xyinf.php';</script>";
}
$conn->close();
?>