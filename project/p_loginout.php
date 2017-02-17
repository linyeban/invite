<?php
	session_start();
	$_SESSION = array(); //清空session信息
	header("Location:../login.php");
?>
