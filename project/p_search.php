<?php
	include("connectdb.php");
	$searchJob = $_GET['searchJob'];
	$sql = 'select jobId,jobName,needNum,comName,salary,education,releaseTime from job where jobName like \'%'.$searchJob.'%\'';
	if($stmt = $con->prepare($sql)){
		$stmt->execute();
	    $stmt->store_result();
		$stmt->bind_result($jobId,$jobName,$needNum,$comName,$salary,$education,$releaseTime);
	    if($stmt->num_rows > 0){
		    for($i=1; $i<=$stmt->fetch(); $i++){
		        echo '<ul class="listjob jobs">';
		        echo '<li><a href="detail.php?jobId='.$jobId.'">'.$jobName.'</a></li>';
		        echo '<li>'.$needNum.'</li>';
		        echo '<li>'.$comName.'</li>';
		        echo '<li>'.$salary.'</li>';
		        echo '<li>'.$education.'</li>';
		        echo '<li>'.$releaseTime.'</li>';
		        echo '</ul>';
		    }
		}
		else{
			echo '<div><img src="images/notfound.jpg" alt="找不到结果""><p class="lead">sorry，找不到相关的搜索结果，请重新搜索</p></div>';
		}
	}
    $stmt->close();
?>