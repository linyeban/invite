<?php
	session_start();
	include("connectdb.php");
	$email = $_POST["email"];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$sex = $_POST['sex'];
	$college = $_POST['college'];

		$sql = "insert into user (email,username,password,college,sex) values(?,?,?,?,?)";
		if($stmt = $con->prepare($sql)){
			$stmt->bind_param('sssss',$email,$username,$pwd,$college,$sex);
			if($stmt->execute()){
				$_SESSION['email'] = $email;
				echo 1;
				//echo "<script>alert('注册成功'); location.href='../index.php'; </script>";
			}
		}
		else{
			echo 2;
			//echo "<script>alert('注册失败，请重新注册'); location.href='../register.php'; </script>";
		}
	
	$stmt->close();
?>