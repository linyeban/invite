<?php
	include("connectdb.php");
	$sqlCollege = "select * from college";
	if($stmt1 = $con->prepare($sqlCollege)){
		$stmt1->execute();
		$stmt1->store_result();
		$stmt1->bind_result($collegeId,$collegeName);
	}	
?>