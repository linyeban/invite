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
	<title>职位详情</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/makisu.js"></script>
    <script type="text/javascript" src="js/detail.js"></script>
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
            <a class="btn btn-info" href="login.php" role="button">登录</a>
            <a class="btn btn-info" href="register.php" role="button">注册</a>
        </div>
    </header>
	<section class="container main row">
			<div class="col-sm-8 col-md-8 col-lg-8 details">
				<?php 
					include("project/p_details.php");
				?>
				<div class="content">
					<h4>联系方式</h4>
					<ul class="aboutus lump">
						<?php 
							include("project/p_comInfo.php");
						?>
					</ul>
				</div>
				<button class="btn btn-info" id="apply">申请职位</button>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4 companyDetail">
				<div class="info">
					<h2>公司信息</h2>
					<p>腾讯成立于1998年11月，是目前中国领先的互联网综合服务提供商之一。成立10多年以来，腾讯一直秉承“一切以用户价值为依归”的经营理念，为亿级海量用户提供稳定优质的各类服务，始终处于稳健发展的状态。2004年6月16日，腾讯控股有限公司在香港联交所主板公开上市（股票代号700）。通过互联网服务提升人类生活品质是腾讯的使命。</p>
				</div>
				 <div class="demo">
			        <dl class="list sashimi">
			            <dt>导航栏</dt>
			            <dd><a href="index.php">首页</a></dd>
			            <dd><a href="job.php">所有职位</a></dd>
			            <dd><a href="newjob.php">最新职位</a></dd>
			            <dd><a href="notice.php">公告</a></dd>
			        </dl>
			        </dl>
			        <a href="#" class="btn btn-info toggle">切换</a>
			    </div>    			
			</div>
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
<?php
	//$stmt->close();  
?>