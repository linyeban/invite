<?php
	date_default_timezone_set('Asia/Shanghai'); //使PHP环境与北京时间一致
	include("connectdb.php");
	$jobName = $_POST["jobName"];
	$comName = $_POST['comName'];
	$sex = $_POST['sex'];
	$needNum = $_POST['needNum'];
	$college = $_POST['college'];
	$majorName = $_POST['majorName'];
	$education = $_POST['education'];
	$address = $_POST['address'];
	$salary = $_POST['salary'];
	$demand = $_POST['demand'];
	$welfare = $_POST['welfare'];

	$releaseTime = date('Y-m-d H:i:s',time());

		$sql = "insert into job (jobName,comName,sex,needNum,college,majorName,education,address,salary,demand,welfare,releaseTime) values(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $con->prepare($sql);
		$stmt->bind_param('sssissssssss',$jobName,$comName,$sex,$needNum,$college,$majorName,$education,$address,$salary,$demand,$welfare,$releaseTime);
		if($stmt->execute()){
			echo 0;
		}
		else{
			echo 1;
		}

	$stmt->close();
?>