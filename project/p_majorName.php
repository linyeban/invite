<?php
    include("p_collegeName.php"); 
    for($i = 1; $i <= $stmt1->fetch(); $i++){
        echo '<li title="nav'.$i.'">';
        echo '<span class="glyphicon glyphicon glyphicon-menu-right" aria-hidden="true"></span>';
        echo '<a href="##">'.$collegeName.'</a>';
        echo '<nav class="second_nav" id="nav'.$i.'">';
        $sqlMajor = "select majorName from major where collegeId = ?";
        if($stmt2 = $con->prepare($sqlMajor)){
            $stmt2->bind_param('i',$collegeId);
            $stmt2->execute();
            $stmt2->store_result();
            $stmt2->bind_result($majorName);
        }                        
        for($j = 1; $j <= $stmt2->fetch(); $j++){
            echo '<li><a href="coljobs.php?collegeName='.$collegeName.'&&majorName='.$majorName.'">'.$majorName.'</a></li>';
        }
        echo '</nav></li>';
    }
    $stmt1->close();
    $stmt2->close();
?>