<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航</title>
<head>

<style type="text/css">
body{margin:0;padding:0;}
img{border:none;}
*{font-family:'微软雅黑';font-size:12px;color:#626262;}
dl,dt,dd{display:block;margin:0;}
a{text-decoration:none;}

#bg{background-image:url(../images/content/dotted.png);}
.container{width:160px;height:100%;margin:auto;position:fixed;left:0;top:0;z-index:999;}

.logo{font-size:25px;font-weight:bold;color: #FFFFFF;padding-bottom:10px;padding-top:5px}
.headimg img{width:70px;height:70px;border-radius:70px;margin-top:10px;}
.ad_name{font-size:20px;font-weight:bold;color:#FFF;margin:10px}

/*left*/
.leftsidebar_box{width:160px;height:auto !important;overflow:visible !important;position:fixed;height:100% !important;background-color:#3992d0;}
.line{height:2px;width:100%;background-image:url(images/left/line_bg.png);background-repeat:repeat-x;}
.leftsidebar_box dt{padding-left:40px;padding-right:10px;background-repeat:no-repeat;background-position:10px center;color:#f5f5f5;font-size:14px;position:relative;line-height:48px;cursor:pointer;}
.leftsidebar_box dd{background-color:#317eb4;padding-left:40px;}
.leftsidebar_box dd a{color:#f5f5f5;line-height:20px;}
.leftsidebar_box dt img{position:absolute;right:10px;top:20px;}
.system_log dt{background-image:url(images/left/system.png)}
.custom dt{background-image:url(images/left/custom.png)}
.channel dt{background-image:url(images/left/channel.png)}
.app dt{background-image:url(images/left/app.png)}
.cloud dt{background-image:url(images/left/cloud.png)}
.syetem_management dt{background-image:url(images/left/syetem_management.png)}
.source dt{background-image:url(images/left/source.png)}
.statistics dt{background-image:url(images/left/statistics.png)}
.leftsidebar_box dl dd:last-child{padding-bottom:10px;}
</style>

</head>

<body id="bg">

<div class="container">

	<div class="leftsidebar_box">

	    <div class="logo">
	        谢育政
	    </div>
	    <div class="line"></div>
        <div class="headimg">
            <img src="images/headimg.jpg">
        </div>
        <div class="ad_name">
            <?php
            session_start();
            echo $_SESSION['admin_name'];
            ?>
        </div>

		<div class="line"></div>
		<dl class="system_log">
			<dt onClick="changeImage()">学生信息统计<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="index.php">统计</a></dd>
		</dl>
	
		<dl class="custom">
			<dt onClick="changeImage()">学生信息管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="ins_stuinf.php">添加学生信息</a></dd>
			<dd><a href="stuinf.php">学生信息管理</a></dd>
		</dl>
	
		<dl class="channel">
			<dt onClick="changeImage()">学生成绩管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="ins_cj.php">添加成绩</a></dd>
			<dd><a href="cj_inf.php">成绩查询与管理</a></dd>
		</dl>
	

		<dl class="app">
			<dt onClick="changeImage()">科目管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="ins_kminf.php">添加科目</a></dd>
			<dd><a href="km_inf.php">科目查询与管理</a></dd>
		</dl>

		<dl class="app">
			<dt onClick="changeImage()">学院管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="ins_xyinf.php">添加学院</a></dd>
			<dd><a href="xyinf.php">学院查询与管理</a></dd>
		</dl>

	
		<dl class="syetem_management">
			<dt>用户管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="ad_us.php">管理员查询</a></dd>
			<dd><a href="us_pasal.php">修改用户密码</a></dd>
			<dd><a href="ins_admin.php">添加管理员</a></dd>
		</dl>
	</div>

</div>

<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(".leftsidebar_box dt").css({"background-color":"#3992d0"});
$(".leftsidebar_box dt img").attr("src","images/left/select_xl01.png");
$(function(){
	$(".leftsidebar_box dd").hide();
	$(".leftsidebar_box dt").click(function(){
		$(".leftsidebar_box dt").css({"background-color":"#3992d0"})
		$(this).css({"background-color": "#317eb4"});
		$(this).parent().find('dd').removeClass("menu_chioce");
		$(".leftsidebar_box dt img").attr("src","images/left/select_xl01.png");
		$(this).parent().find('img').attr("src","images/left/select_xl.png");
		$(".menu_chioce").slideUp(); 
		$(this).parent().find('dd').slideToggle();
		$(this).parent().find('dd').addClass("menu_chioce");
	});
})
</script>


</body>
</html>
