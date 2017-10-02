<?php
session_start();
if(isset($_SESSION['admin_id'])){
    header("Location:index.php");
    exit();
}
?>
<script type="text/javascript" src="adjs.js"></script>
<link href="adstyle.css" rel="stylesheet" type="text/css" />
<body>
<div class="admin-ht">
    <div class="adminBord">
        <h1>07150240谢育政</h1>
        <h4>成绩管理系统</h4>
        <form action="logindo.php" method="post">
            <input type="text" name="admin_login" id="admin_name" placeholder="请输入用户名"/><br>
            <input type="password" name="admin_pass" id="admin_pass" placeholder="请输入密码"/><br>
            <input type="text" name="code" id="code" placeholder="请输入验证码"/>
            <img src="code.php" class="codeimg" onClick="return this.src=this.src+'?'+Math.random()"/>
            <input type="submit" name="landing" id="admin_loging" value="登录" <!--onClick="return adminnull()-->"/>
        </form>
    </div>
</div>
</body>
