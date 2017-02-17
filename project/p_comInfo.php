<?php
	$sql = 'select hrName,phoneNum,hrEmail,comAddress from company where comName = ?';
	if($stmt = $con->prepare($sql)){
		$stmt->bind_param("s",$comName);
		$stmt->execute();
	    $stmt->store_result();
		$stmt->bind_result($hrName,$phoneNum,$hrEmail,$comAddress);
		$stmt->fetch();
	    if($stmt->num_rows > 0){
	        echo '<li>联系人：'.$hrName.'</li>';
	        echo '<li>联系电话：'.$phoneNum.'</li>';
	        echo '<li>邮箱：'.$hrEmail.'</li>';
	        echo '<li>地址：'.$comAddress.'</li>';
		}
	}
    //$stmt->close();
?>