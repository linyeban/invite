<?php 
    include("project/p_loginCheck.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>注册</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
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
            <a class="btn btn-info" href="login.php" role="button">登录</a>
            <a class="btn btn-info lractive" href="register.php" role="button">注册</a>
        </div>
    </header>
	<section class="container">
		<section class="main row">
			<section class="col-lg-4  col-md-4  col-sm-4"><img src="images/loginLeft.png" alt=""></section>
			<section class="loginInput col-lg-8  col-md-8  col-sm-8">
				<h2>注册</h2>
				<div class="loginContent" id="wlogin">
					<div class="form-horizontal">
					  <div class="form-group">
					    <label for="inputEmail" class="col-sm-3 control-label">邮箱</label>
					    <div class="col-sm-9">
					      <input type="email" class="form-control" name="email" autocomplete="off" required="required" id="inputEmail" placeholder="请输入你的邮箱">
					      <span id="tips">该邮箱已注册，请换个邮箱注册</span>
					      <ul id="li_email">
                            <li id="li_em0"></li>
                            <li id="li_em1"></li>
                            <li id="li_em2"></li>
                            <li id="li_em3"></li>
                            <li id="li_em4"></li>
                            <li id="li_em5"></li>
                            <li id="li_em6"></li>
                        </ul>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputUser" class="col-sm-3 control-label">用户名</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="username" required="required" id="inputUser" placeholder="请输入你的用户名">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword1" class="col-sm-3 control-label">密码</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" name="pwd" required="required" id="inputPassword1" placeholder="请输入你的密码">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword2" class="col-sm-3 control-label">确认密码</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" required="required" id="inputPassword2" placeholder="请输入你的密码">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputSex1" class="col-sm-3 control-label">性别</label>
					    <div class="col-sm-9">
					      <input type="radio" id="inputSex1" name="sex" value="男" checked="checked">男
					      <input type="radio" id="inputSex2" name="sex" value="女">女
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="allCollege" class="col-sm-3 control-label">所在学院</label>
					    <div class="col-sm-9">
					    	<select id="allCollege" name="college">
					    		<?php 
									include("project/p_collegeName.php");									
									for($i = 1; $i <= $stmt1->fetch(); $i++){
										echo "<option>".$collegeName."</option>";
									}
									$stmt1->close();
									echo "<option>其他</option>";
								?>
					    	</select>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="btnOk">
					      <button type="button" class="btn btn-default" id="register">注册</button>
					    </div>
					  </div>
					<!-- </form> -->
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

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
</body>
</html>