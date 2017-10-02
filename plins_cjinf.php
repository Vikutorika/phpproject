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
$id = $_GET['id'];
?>
<div class="bg">
    <div class="con">
        <div class="con_ls">
            <p>批量添加学生信息</p>
        </div>
        <div class="con_con">
            <p style="font-size: 16px; color: #4a87ff">请上传xls / xlsx格式的表格文件</p>
            <form name="frm1" enctype="multipart/form-data" action="" method="post">
                <input name="filename" type="file" style="border:solid 1px #6ac1e2; width: 200px; border-radius: 5px"/>
                <input name="submit" type="submit" value="提交" style="background-color: #e28c8e;border-radius: 5px; font-size: 14px;"/>
            </form>
            <?php
            if(isset($_POST['submit'])) {
                $dir = dirname(__FILE__);
                $dir = str_replace("//", "/", $dir)."/";
                $filename = 'uploadFile.xls';
                $uploadfile = $dir.$filename;
                $r_sc = move_uploaded_file($_FILES['filename']['tmp_name'], $dir.$filename);
                if($r_sc){
                    require_once 'conn.php';
                    mysqli_query($conn,'set names GBK');
                    require_once 'phpexcel/phpexcel.php';
                    require_once 'phpexcel/PHPExcel/IOFactory.php';
                    require_once 'phpexcel/PHPExcel/Reader/Excel5.php';
                    $objReader = PHPExcel_IOFactory::createReader('Excel5');
                    $objPHPExcel = PHPExcel_IOFactory::load($uploadfile);
                    $sheet = $objPHPExcel->getSheet(0);
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();
                    if($highestColumn != 'E'){
                        echo  "<script>alert('Excel表格式有误!');history.back();</script>";
                        return false;
                    }else{
                        $arr_result=array();
                        $strs=array();
                        for($j=2;$j<=$highestRow;$j++) {
                            unset($arr_result);
                            unset($strs);
                            for ($k = 'A'; $k <= $highestColumn; $k++) {
                                $arr_result .= iconv('utf-8', 'gbk', $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue()) . '\\';
                            }
                            $strs = explode("\\", $arr_result);
                            $sql = "INSERT INTO stu_inf VALUES(
                            null,
                            '$strs[0]',
                            '$strs[1]',
                            (select xb_id from xb_inf where stu_xb = '" . $strs[2] . "'),
                            (select xy_id from xy_inf where stu_xy = '" . $strs[3] . "'),
                            '$strs[4]')";
                            $result = $conn->query($sql);
                        }
                        if($result == TURE) {
                            $succ = $highestRow - 1;
                            echo "<script>alert('成功添加" . $succ . "个学生信息！');history.back();</script>";
                            unlink($filename);
                            require_once 'three.php';
                        }else{
                            echo  "