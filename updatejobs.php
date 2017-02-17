<?php 
    include("project/p_loginCheck.php");
    if(!isset($_SESSION['email']) || $_SESSION['email'] == ''){     
       echo "<script>alert('请先登录'); location.href = 'index.php'; </script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>管理职位</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/job.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/updatejob.js"></script>
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
            <li role="presentation" class="active" style="display:<?php echo $passshow; ?>"><a href="updatejobs.php">管理职位</a></li>
        </ul>
        <div class="hrefLink wel" style="display:<?php echo $welshow01; ?>">
            <span>欢迎你，<?php echo $username;?></span>
            <a href="project/p_loginout.php">注销</a>
        </div>
        <div class="hrefLink" style="display:<?php echo $welshow02; ?>" >
            <a class="btn btn-info" href="login.php" role="button">登录</a>
            <a class="btn btn-info" href="register.php" role="button">注册</a>
        </div>
    </header>
	<section class="container">        
		<section class="main">
    	    <ul class="listjob listjobs title">
                <li>职位</li>
                <li>招聘人数</li>
                <li>公司名称</li>
                <li>薪资</li>
                <li>发布日期</li>
                <li>学历</li>
                <li>操作</li>
            </ul>
            <?php
                include("project/p_joblist.php");
            ?>
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