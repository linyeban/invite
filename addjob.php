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
	<title>添加职位</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/job.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body class="fullScreen">	
	<header class="header">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="index.php">首页</a></li>
            <li role="presentation"><a href="job.php">所有职位</a></li>
            <li role="presentation"><a href="newjob.php">最新职位</a></li>
            <li role="presentation"><a href="notice.php">公告</a></li>            
            <li role="presentation" style="display:<?php echo $reshow; ?>"><a href="recommend.php">推荐职位</a></li>           
            <li role="presentation" class="active" style="display:<?php echo $jobshow; ?>"><a href="addjob.php">添加职位</a></li>
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
	<section class="container">
        <div class="form-horizontal">
            <div class="form-group">
                <label for="jobName" class="col-sm-3 control-label">职位名称</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" autofocus="autofocus" required="required" name="jobName" id="jobName" placeholder="请输入职位名称">
                    <span id="nameTip" class="lead">该公司已发布过此职位</span>
                </div>
            </div>
            <div class="form-group">
                <label for="comName" class="col-sm-3 control-label">公司名称</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" required="required" name="comName" id="comName" placeholder="请输入公司名称">
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label">公司地址</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" required="required" name="address" id="address" placeholder="请输入公司地址">
                </div>
            </div>
            <div class="form-group">
                <label for="demand1" class="col-sm-3 control-label">职位要求</label>
                <div class="col-sm-9">
                    <div id="demand">
                    <input type="text" class="form-control" required="required" name="demand[]" id="demand1" placeholder="请输入职位要求">
                    </div>
                    <span class="glyphicon glyphicon-plus" id="addDemand">&nbsp;</span>
                    <span>以上职位要求至少输入一项</span>
                </div>
            </div>
            <div class="form-group">
                <label for="welfare1" class="col-sm-3 control-label">福利</label>
                <div class="col-sm-9">
                    <div id="welfare">
                    <input type="text" class="form-control" required="required" name="welfare[]" id="welfare1" placeholder="请输入福利">
                    </div>
                    <span class="glyphicon glyphicon-plus" id="addWelfare">&nbsp;</span>
                    <span>以上福利至少输入一项</span>
                </div>
            </div>
            <div class="form-group">
                <label for="needNum" class="col-sm-3 control-label">招聘人数</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" style="width:auto;" maxlength="10" required="required" name="needNum" id="needNum" value="1" min="1">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">面向学院/专业</label>
                <div class="col-sm-9">
                    <select id="allCollege" name="college">
                        <?php 
                            include("project/p_collegeName.php");                                 
                            for($i = 1; $i <= $stmt1->fetch(); $i++){
                                echo "<option>".$collegeName."</option>";
                            }
                            $stmt1->close();
                            echo "<option>不限</option>";
                        ?>
                    </select>

                    <select id="allMajor" name="major">
                        <option>农学</option>
                        <option>植物保护</option>
                        <option>种子科学与工程</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="salary" class="col-sm-3 control-label">薪资</label>
                <div class="col-sm-9">
                    <select name="salary" id="salary" >
                        <option value="2000以下">2000元以下</option>
                        <option value="2000~4000元">2000~4000元</option>
                        <option value="4000~8000元">4000~8000元</option>
                        <option value="8000以上">8000以上</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputSex1" class="col-sm-3 control-label">性别要求</label>
                <div class="col-sm-9" id="sex">
                  <input type="radio" id="inputSex1" name="sex" value="男" checked="checked">男
                  <input type="radio" id="inputSex2" name="sex" value="女">女
                  <input type="radio" id="inputSex3" name="sex" value="不限">不限
                </div>
            </div>
            <div class="form-group">
                <label for="inputEducation1" class="col-sm-3 control-label">学历要求</label>
                <div class="col-sm-9" id="education">
                  <input type="radio" id="inputEducation1" name="education" value="大专以上">大专以上
                  <input type="radio" id="inputEducation2" name="education" value="本科以上" checked="checked">本科以上
                  <input type="radio" id="inputEducation3" name="education" value="不限">不限
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 btnOk">
                    <button type="submit" class="btn btn-default" id="btnOk">添加</button>
                </div>
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
    <script type="text/javascript" src="js/addjob.js"></script>
</body>
</html>