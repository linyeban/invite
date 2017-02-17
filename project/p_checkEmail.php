<?php
	include("connectdb.php");
	$email = $_POST["email"];
	$sqlquery = "select * from user where email = ?";
	$stmt = $con->prepare($sqlquery);
	$stmt->bind_param('s',$email);
	$stmt->store_result();
	$stmt->execute();
	if($stmt->fetch() > 0){
		echo 0;
	}
	else{ echo 1;}
	$stmt->close();
?>