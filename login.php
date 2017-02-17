<?php 
    include("project/p_loginCheck.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>登录</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
</head>
<body class="fullScreen">	
	<header class="header">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="index.php">首页</a></li>
            <li role="presentation"><a href="job.php">所有职位</a></li>
            <li role="presentation"><a href="newjob.php">最新职位</a></li>
            <li role="presentation"><a href="notice.php">公告</a></li>            
            <li role="presentation" style="display:<?php echo $reshow; ?>"><a href="recommend.php">推荐职位</a></li>           
            <li role="presentation" style="display:<?php echo $jobshow; ?>"><a href="addjob.php">添加职位</a></li>
            <li role="presentation" style="display:<?php echo $passshow; ?>"><a href="updatejobs.php">管理职位</a></li>
        </ul>
        <div class="hrefLink wel" style="display:<?php echo $welshow01; ?>">
            <span>欢迎你，<?php echo $username;?></span>
            <a href="project/p_loginout.php">注销</a>
        </div>
        <div class="hrefLink" style="display:<?php echo $welshow02; ?>" >
            <a class="btn btn-info lractive" href="login.php" role="button">登录</a>
            <a class="btn btn-info" href="register.php" role="button">注册</a>
        </div>
    </header>
	<section class="container">
		<section class="main row">
			<section class="loginShow col-lg-6  col-md-6  col-sm-6"><img src="images/loginLeft.png" alt=""></section>
			<section class="loginInput col-lg-6  col-md-6  col-sm-6">
				<div class="switch_login">
				  <a href="##" id="switch_wlogin" class="active">账号密码登录</a>
				  <a href="##" id="switch_qlogin" >快捷登录</a>
				</div>
				<div class="loginContent" id="wlogin">
					<div class="form-horizontal">
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" required="required" name="email" id="inputEmail3" placeholder="请输入你的邮箱">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" required="required" name="pwd" id="inputPassword3" placeholder="请输入你的密码">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputCode3" class="col-sm-2 control-label">验证码</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="inputCode3" required="required" placeholder="计算结果">
					      <div class="code"></div>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10 btnOk">
					      <button type="submit" class="btn btn-default" id="btnOk">登录</button>
					    </div>
					  </div>
				</div>
				<div class="loginContent" id="qlogin">
					<img src="images/QR.png" alt="">
				</div>
			</section>
		</section>
	</section>
	
    <footer>
        <ul class="copyright">
            <li>Copyright© 校园招聘网</li>
            <li>仲恺农业工程学院</li>
            <li>白云校区</li>
            <li>海珠校区</li>
        </ul>
    </footer>
</body>
</html>