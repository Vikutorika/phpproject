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
$sql = "select * from stu_inf where id =$id";
$result = $conn -> query($sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="bg">
    <div class="con">
        <div class="con_ls">
            <p>学生信息修改</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>学号：</dt>
                    <dd><input type="text" name="alt_stuxh" value="<?php echo $row['stu_xh'] ?>"></dd>
                </dl>
                <dl>
                    <dt>姓名：</dt>
                    <dd><input type="text" name="alt_stuxm" value="<?php echo $row['stu_xm'] ?>"></dd>
                </dl>
                <dl>
                    <dt>性别：</dt>
                    <dd>
                        <select name="alt_stuxb" id="alt_stuxb">
                            <?php
                                $sql_xb = "select * from xb_inf";
                                $r_xb = $conn -> query($sql_xb);
                                while($row_xb = mysqli_fetch_array($r_xb)){
                                    echo '<option value="'.$row_xb['xb_id'].'">'.$row_xb['stu_xb'].'</option>';
                                }
                            ?>
                        </select>
                        <script>
                            document.getElementById("alt_stuxb").value = "<?php echo $row['xb_id']; ?>"
                        </script>
                    </dd>
                </dl>
                <dl>
                    <dt>学院：</dt>
                    <dd>
                        <select name="alt_stuxy" id="alt_stuxy">
                            <?php
                            $sql_xy = "select * from xy_inf";
                            $r_xy = $conn -> query($sql_xy);
                            while($row_xy = mysqli_fetch_array($r_xy)){
                                echo '<option value="'.$row_xy['xy_id'].'">'.$row_xy['stu_xy'].'</option>';
                            }
                            ?>
                        </select>
                        <script>
                            document.getElementById("alt_stuxy").value = "<?php echo $row['xy_id']; ?>"
                        </script>
                    </dd>
                </dl>
                <dl>
                    <dt>班级：</dt>
                    <dd><input type="text" name="alt_stubj" value="<?php echo $row['stu_bj'] ?>"></dd>
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
    $sql_naup = 'UPDATE stu_inf SET
    stu_xh = "'.$_POST['alt_stuxh'].'",
    stu_xm = "'.$_POST['alt_stuxm'].'",
    xb_id= "'.$_POST['alt_stuxb'].'",
    xy_id = "'.$_POST['alt_stuxy'].'",
    stu_bj = "'.$_POST['alt_stubj'].'"
    WHERE id='.$id;
    if ($conn->query($sql_naup) == TRUE){
        echo "<script>alert('修改成功');window.location.href='stuinf.php';</script>";
    }else{
        echo "<script>alert('修改失败');history.back();</script>";
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='stuinf.php';</script>";
}
$conn->close();
?>

