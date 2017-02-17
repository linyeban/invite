<?php
	include("connectdb.php");
	$jobName = $_POST["jobName"];
	$comName = $_POST['comName'];
	$sqlquery = "select jobName from job where comName = ? and jobName = ?";
	$stmt = $con->prepare($sqlquery);
	$stmt->bind_param('ss',$comName,$jobName);
	$stmt->store_result();
	$stmt->execute();
	if($stmt->fetch() > 0){
		echo 0;		
	}
	else{
		echo 1;
	}
	$stmt->close();
?>