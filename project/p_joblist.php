<?php
    include("connectdb.php");
    $sql = "select jobId,jobName,needNum,comName,salary,education,releaseTime from job where status = 0  order by releaseTime";
    $stmt = $con->prepare($sql); 
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($jobId,$jobName,$needNum,$comName,$salary,$education,$releaseTime);
    if($stmt->num_rows > 0){
        for($i=1; $i<=$stmt->fetch(); $i++){
            echo '<ul class="listjob listjobs jobs">';
            echo '<li><a href="detail.php?jobId='.$jobId.'">'.$jobName.'</a></li>';
            echo '<li>'.$needNum.'</li>';
            echo '<li>'.$comName.'</li>';
            echo '<li>'.$salary.'</li>';
            echo '<li>'.$releaseTime.'</li>';
            echo '<li>'.$education.'</li>';
            echo '<li><input type="button" class="btn btn-info btnPass" name="'.$jobId.'" value="通过审核"></li>';
            echo '</ul>';
        }
    }
    else echo '<h1 class="text-center">无未审核职位</h1>';
    $stmt->close();
?>