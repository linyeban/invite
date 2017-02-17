<?php
	session_start();
	include("connectdb.php");
	$email = $_POST["email"];
	$pwd = $_POST['pwd'];

	$sql = "select * from user where email = ? and password = ?";
	if($stmt = $con->prepare($sql)){
		$stmt->bind_param('ss',$email,$pwd);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->fetch() > 0){
			$_SESSION['email'] = $email;
			echo 1;
		}
		else{
			echo 0;
		}
	}
	else{
		echo 2;
	}
	$stmt->close();
?>