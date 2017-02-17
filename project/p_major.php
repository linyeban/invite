<?php
	include("connectdb.php");
	$collegeName = $_POST['collegeName'];
	$sqlMajor = "select majorName from major where collegeId = (select collegeId from college where collegeName = ?)";
	if($stmt1 = $con->prepare($sqlMajor)){
		$stmt1->bind_param('s',$collegeName);
		$stmt1->execute();
		$stmt1->bind_result($majorName);
	}	
	$arr = array();
	for($i = 1; $i <= $stmt1->fetch(); $i++){
        $arr[$i] = $majorName; 
    }
    echo json_encode($arr);
    $stmt1->close();
?>