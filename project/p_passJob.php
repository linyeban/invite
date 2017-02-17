<?php
	session_start();
	include("connectdb.php");
	$jobId = $_POST["jobId"];

	$sql = "update job set status = 1 where jobId = ?";
	if($stmt = $con->prepare($sql)){
		$stmt->bind_param('i',$jobId);
		if($stmt->execute()){
			echo 1;
		}
	}
	else{
		echo 2;
	}

	$stmt->close();
?>