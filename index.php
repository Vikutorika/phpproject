<link href="adstyle.css" rel="stylesheet" type="text/css" />
<title>成绩管理系统</title>
<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location:login.php");
    exit();
}
include 'header.php';
include 'leftme.jsp';
?>
<div class="bg">
    <div class="con" style="height: 700px;">
        <div class="con_ls">
            <p>统计
                <?php
                include 'conn.php';
                $sql_count = 'select * from count';
                $r_count = $conn -> query($sql_count);
                $row_count = mysqli_fetch_assoc($r_count);
                echo '<a style="font-size: 14px; color: #64bbff; margin-left: 20px;">登录次数：' .$row_count['click_num'].'</a>';
                ?>
                <a href="ins_cj.php" class="ins_inf" style="margin-right: 15px">添加学生成绩</a>
                <a href="ins_stuinf.php" class="ins_inf" style="margin-right: 15px">添加学生信息</a></p>
        </div>
        <div class="con_con">
		    <div class="TuBiao">
                <div class="TuBiao_bt">
                    <p>各学院男女比例</p>
                </div>
                <div class="TuBiao_tu">
                    <?php
                    $dir = "tmp/";
                    if (is_dir($dir)) {
                        if ($dh = opendir($dir)) {
                            while (($file = readdir($dh)) !== false) {
                                if ($file!="." && $file!="..") {
                                    echo '<img src="'.$dir.'/'.$file.'"/>';
                                }
                            }
                            closedir($dh);
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
