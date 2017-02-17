<?php
	include("project/connectdb.php");
	$jobId = $_GET['jobId'];
	if(!isset($jobId)){
		header("Location:job.php");
	}	
	else{
        $sql = "select jobName,needNum,comName,salary,demand,welfare,college,education,address,releaseTime from job where jobId = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('s',$jobId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($jobName,$needNum,$comName,$salary,$demand,$welfare,$college,$education,$address,$releaseTime);        
        $stmt->fetch();  
	}
	echo '<div class="top">
			<h3>'.$jobName.'<span>'.$releaseTime.'</span></h3></div>';
	echo '<div class="first">
			<h4>'.$comName.'</h4>
			<div class="location"><span class="glyphicon glyphicon-map-marker"></span>广东省广州市</div>
			<ul class="welfare">';
			$arr = explode(",",$welfare);
	        for($i=0; $i<count($arr)-1; $i++){
	        	echo "<li>".$arr[$i]."</li>";
	        }
	      	echo '</ul></div>';
	echo '<div class="content">
			<h4>基本要求</h4>
			<ul class="require lump">
				<li>月薪：'.$salary.'</li>
				<li>招聘人数：'.$needNum.'</li>
				<li>学历：'.$education.'</li>
				<li>专业：'.$college.'</li>
				<li>上班地址：<address>'.$address.'</address></li>
			</ul>
		</div>';
	echo '<div class="content">
			<h4>技能要求</h4>
			<ol class="require-list lump">';
			$arr = explode(",",$demand);
	        for($i=0; $i<count($arr)-1; $i++){
	        	echo "<li>".$arr[$i]."</li>";
	        }
	        echo "</ol></div>";
?>
