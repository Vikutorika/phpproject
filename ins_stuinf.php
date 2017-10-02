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
            <p>添加学生信息</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>学号：</dt>
                    <dd><input type="text" name="ins_stuxh" id="ins_stuxh"/></dd>
                </dl>
                <dl>
                    <dt>姓名：</dt>
                    <dd><input type="text" name="ins_stuxm" id="ins_stuxm"/></dd>
                </dl>
                <dl>
                    <dt>性别：</dt>
                    <dd>
                        <select name="ins_stuxb" id="ins_stuxb">
                            <?php
                            $sql_xb = "select * from xb_inf";
                            $r_xb = $conn -> query($sql_xb);
                            while($row_xb = mysqli_fetch_array($r_xb)){
                                echo '<option value="'.$row_xb['xb_id'].'">'.$row_xb['stu_xb'].'</option>';
                            }
                            ?>
                        </select></dd>

                </dl>
                <dl>
                    <dt>学院：</dt>
                    <dd>
                        <select name="ins_stuxy" id="ins_stuxy">
                            <?php
                            $sql_xy = "select * from xy_inf";
                            $r_xy = $conn -> query($sql_xy);
                            while($row_xy = mysqli_fetch_array($r_xy)){
                                echo '<option value="'.$row_xy['xy_id'].'">'.$row_xy['stu_xy'].'</option>';
                            }
                            ?>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>班级：</dt>
                    <dd><input type="text" name="ins_stubj" id="ins_stubj"/></dd>
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
if(isset($_POST['bing'])){
    $sql_naup = 'INSERT INTO stu_inf VALUES(
    NULL,
    "'.$_POST['ins_stuxh'].'",
    "'.$_POST['ins_stuxm'].'",
    "'.$_POST['ins_stuxb'].'",
    "'.$_POST['ins_stuxy'].'",
    "'.$_POST['ins_stubj'].'")';
    if ($conn->query($sql_naup) == TRUE){
        echo "<script>alert('添加成功');window.location.href='stuinf.php';</script>";
    }else{
        echo "<script>alert('添加失败');history.back();</script>";
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='stuinf.php';</script>";
}
$conn->close();
?>