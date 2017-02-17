<?php
	header("Content-type:text/html; charset=utf-8");
	if(defined('SAE_MYSQL_DB'))//判断是否是云平台
		$con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
	else
		$con = new mysqli('127.0.0.1','root','','zhile');
	if($con->connect_errno)
		die("链接数据库失败：".$con->connect_errno);
	mysqli_query($con,'SET NAMES UTF8');
?>