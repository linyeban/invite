
var CreateXML = function(){
    var XmlHttpRequest;  
    //不同浏览器获取对象XmlHttpRequest对象方法不同  
    if(window.ActiveXObject){  
        XmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");  
    }else{  
        XmlHttpRequest = new XMLHttpRequest();  
    }  
    return XmlHttpRequest; 
}
var jobId = "";
var updateJob = function(){
    var XmlUserLogin = CreateXML();
    if(XmlUserLogin){
        var postStr = "jobId=" + jobId;
        var url = "project/p_passJob.php";
        //通过post方式打开链接
        XmlUserLogin.open("POST",url,true);
        XmlUserLogin.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        XmlUserLogin.send(postStr);  //发送post数据
        XmlUserLogin.onreadystatechange = function(){
            if(XmlUserLogin.readyState==4 && XmlUserLogin.status==200){
                var respvalue = XmlUserLogin.responseText;
                if(respvalue == "1"){
                    alert("操作成功");
                    location.href = "updatejobs.php";
                }
                else{
                    alert("操作失败");
                }
            }
        }
    }
}
$(document).ready(function(){
	$(".btnPass").click(function(){
       jobId = $(this).attr("name");
       updateJob();
       console.log($("x:eq(1)").html());
	});
});