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
            <p>添加学生成绩</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>学号：</dt>
                    <dd><input type="text" name="ins_cjxh" id="ins_cjxh"/></dd>
                </dl>
                <dl>
                    <dt>科目：</dt>
                    <dd>
                        <select name="ins_cjkm" id="ins_cjkm">
                            <?php
                            $sql_xb = "select * from km_inf";
                            $r_xb = $conn -> query($sql_xb);
                            while($row_xb = mysqli_fetch_array($r_xb)){
                                echo '<option value="'.$row_xb['km_id'].'">'.$row_xb['km_name'].'</option>';
                            }
                            ?>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>成绩：</dt>
                    <dd><input type="text" name="ins_cj" id="ins_cj"/></dd>
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
    $sql_cxxh = "select id from stu_inf where stu_xh = " . $_POST['ins_cjxh'];
    $r_cxxh = $conn->query($sql_cxxh);
    $row_cxxh = mysqli_fetch_array($r_cxxh);
    if ($row_cxxh == '') {
        echo "<script>alert('没有这个学生,添加失败');history.back();</script>";
        return false;
    } else {
        $sql_naup = 'INSERT INTO cj_inf VALUES(
    null,
    (select id from stu_inf where stu_xh = "' . $_POST['ins_cjxh'] . '"),
    "' . $_POST['ins_cjxh'] . '",
    ' . $_POST['ins_cj'] . ')';
        if ($conn->query($sql_naup) == TRUE) {
            echo "<script>alert('添加成功');window.location.href='cj_inf.php';</script>";
        } else {
            echo "<script>alert('添加失败');history.back();</script>";
        }
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='cj_inf.php';</script>";
}
$conn->close();
?>