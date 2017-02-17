<?php
    include("connectdb.php");
    $sql = "select title,dateTime,clock,address,publisher,releaseTime from notice order by releaseTime desc limit 1";
    $stmt = $con->prepare($sql); 
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($title,$dateTime,$clock,$address,$publisher,$releaseTime);
    $stmt->fetch();
    if($stmt->num_rows > 0){
        echo '<h1 class="text-center">'.$title.'</h1>';
        echo '<dl class="dl-horizontal"><dt>日期：</dt><dd>'.$dateTime.'</dd></dl>';
        echo '<dl class="dl-horizontal"><dt>时间：</dt><dd>'.$clock.'</dd></dl>';    
        echo '<dl class="dl-horizontal"><dt>地点：</dt><dd>'.$address.'</dd></dl>';
        echo '<dl class="blockquote-reverse"><dt>发布人</dt><dd>'.$publisher.'</dd></dl>';   
        echo '<dl class="blockquote-reverse"><dt>发布时间</dt><dd>'.$releaseTime.'</dd></dl>';  
    }
    else echo '<h1 class="text-center">无公告</h1>';
    $stmt->close();
?>