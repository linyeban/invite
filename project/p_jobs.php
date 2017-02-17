<?php
    include("connectdb.php");
    if($pagename === 'all'){
        $sql = "select jobId,jobName,needNum,comName,salary,education,releaseTime from job where status = 1  order by jobName desc";
        $stmt = $con->prepare($sql);        
    }
    else if($pagename === 'new'){
        $sql = "select jobId,jobName,needNum,comName,salary,education,releaseTime from job where status = 1 order by releaseTime desc";
        $stmt = $con->prepare($sql);
    }
    else if($pagename === 'recommend'){
        if(!isset($_SESSION['email']) || $_SESSION['email'] == ''){ 
            echo "<script>alert('请先登录'); location.href = 'index.php'; </script>"; 
        }
        $sql = "select jobId,jobName,needNum,comName,salary,education,releaseTime from job where college = (select college from user where email = ?) and status = 1  order by releaseTime desc;";
        $stmt = $con->prepare($sql);
        $stmt -> bind_param('s',$email);
    }
    else if($pagename === 'coljobs'){
        $sql = "select jobId,jobName,needNum,comName,salary,education,releaseTime from job where college = ? and majorName = ? and status = 1  order by releaseTime desc;";
        $stmt = $con->prepare($sql);
        $stmt -> bind_param('ss',$collegeName,$majorName);
    }
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($jobId,$jobName,$needNum,$comName,$salary,$education,$releaseTime);

    if($stmt->num_rows > 0){
        for($i=0; $i<=$stmt->fetch(); $i++){
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
    else echo '<h1 class="text-center">暂无相关职位信息</h1>';
    $stmt->close();
?>