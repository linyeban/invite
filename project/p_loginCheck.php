<?php
	session_start();
	include("connectdb.php");
	if(!isset($_SESSION['email']) || $_SESSION['email'] == ''){		
		$welshow01 = 'none';
		$welshow02 = 'block';
		$jobshow = 'none';
		$passshow = 'none';
		$reshow = 'none';
	}
	else{
		$welshow01 = 'block';
		$welshow02 = 'none';
		$email = $_SESSION['email'];		

		$sql = "select username from user where email = ?";
		if($stmt1 = $con->prepare($sql)){
			$stmt1->bind_param('s',$email);
			$stmt1->execute();
			$stmt1->store_result();
			$stmt1->bind_result($username);
			$stmt1->fetch();
		}

		$sqlquery = "select identify from user where email = ?";
		if($stmt2 = $con->prepare($sqlquery)){
			$stmt2->bind_param('s',$email);
			$stmt2->execute();
			$stmt2->store_result();
			$stmt2->bind_result($identity);
			$stmt2->fetch();
			//管理员（教师）
			if($identity == 0){
				$passshow = 'block';
				$jobshow = 'none';
				$reshow = 'none';
			}
			//发布职位（公司hr）
			else if($identity == 2){
				$jobshow = 'block';
				$passshow = 'none';
				$reshow = 'none';
			}
			//浏览（学生）
			else{
				$jobshow = 'none';
				$passshow = 'none';
				$reshow = 'block';
			}
		}
		$stmt1->close();
		$stmt2->close();
	}
	
?>