<link href="adstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="adjs.js"></script>
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
    <div class="bt">

    </div>
    <div class="con">
        <div class="con_ls">
            <p>用户密码修改</p>
        </div>
        <div class="con_con">
            <form action="" method="post">
                <dl>
                    <dt>用户名：</dt>
                    <dd><input type="text" name="al_aduser" id="al_aduser" placeholder="请输入用户名"></dd>
                </dl>
                <dl>
                    <dt>原密码：</dt>
                    <dd><input type="password" name="al_adoldpass" id="al_adoldpass" placeholder="请输入原密码"></dd>
                </dl>
                <dl>
                    <dt>新密码：</dt>
                    <dd><input type="password" name="al_adnewpass" id="al_adnewpass" placeholder="请输入新密码"></dd>
                </dl>
                <dl>
                    <dt>确认新密码：</dt>
                    <dd><input type="password" name="al_adrnewpass" id="al_adrnewpass" placeholder="请再次输入新密码" onBlur="al_adrpas()"></dd>
                    <div id="al_adpasfal"></div>
                </dl>
                <dl>
                    <dt></dt>
                    <dd><input class="con_con_canl" type="submit" name="cancel" value="取消修改"/>
                        <input class="con_con_bing" type="submit" name="bing" value="确认修改" onclick="return us_pasal()"/></dd>
                </dl>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['bing'])) {
    $sql_yz = 'SELECT * FROM admin_inf where admin_login = "' . $_POST['al_aduser'] . '"';
    $r_yz = $conn->query($sql_yz);
    $row_yzcount = mysqli_num_rows($r_yz);
    if ($row_yzcount == 0) {
        echo "<script>alert('用户名不存在');history.back();</script>";
        return false;
    } else {
        $row_mm = mysqli_fetch_assoc($r_yz);
        $almm  = MD5($_POST['al_adoldpass']);
        if ($row_mm['admin_pass'] != $almm) {
            echo "<script>alert('原密码错误！');history.back();</script>";
            return false;
        } else {
            date_default_timezone_set("PRC");
            $date = date("Y-m-d H:i:s");
            $sql_newpass = 'UPDATE admin_inf SET 
            admin_pass = MD5("' . $_POST['al_adnewpass'] . '"),
            mdtime = "' . $date . '"
            WHERE admin_login="' . $_POST['al_aduser'] . '"';
            if ($conn->query($sql_newpass) == TRUE) {
                echo "<script>alert('修改成功');window.location.href='us_pasal.php';</script>";
            } else {
                echo "<script>alert('修改失败');history.back();</script>";
            }
        }
    }
}
if(isset($_POST['cancel'])) {
    echo "<script>window.location.href='us_pasal.php';</script>";
}
?>

