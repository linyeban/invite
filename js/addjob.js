
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
var isNull = false;
var checkNull = function(){
    isNull = false;
    $("input[type='text']").each(function(){
        if($(this).val() == ""){
            isNull = true;
        }
    });
}

var isExistJob = false;
var checkJobName = function(){
    var XmlUserLogin = CreateXML();
    if(XmlUserLogin){
        var postStr = "jobName=" + $("#jobName").val();
        postStr += "&comName=" + $("#comName").val();
        var url = "project/p_checkJobname.php";
        //通过post方式打开链接
        XmlUserLogin.open("POST",url,true);
        XmlUserLogin.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        XmlUserLogin.send(postStr);  //发送post数据
        XmlUserLogin.onreadystatechange = function(){
            if(XmlUserLogin.readyState==4 && XmlUserLogin.status==200){
                var respvalue = XmlUserLogin.responseText;
                if(respvalue == "0"){
                	// $("#jobName").focus();
                	$("#nameTip").show();    
                	isExistJob = true;            
                }
                else{
                    $("#nameTip").hide();
                	isExistJob = false;	
                }
            }
        }
    }
}
var addJob = function(){
    var XmlUserLogin = CreateXML();
    if(XmlUserLogin){
        var sex=$('input:radio[name="sex"]:checked').val();
        var education=$('input:radio[name="education"]:checked').val();

        var postStr = "jobName=" + $("#jobName").val();
        postStr += "&comName=" + $("#comName").val();
        postStr += "&sex=" + sex;
        postStr += "&needNum=" + $("#needNum").val();
        postStr += "&college=" + $("#allCollege").val();
        postStr += "&majorName=" + $("#allMajor").val();
        postStr += "&education=" + education;
        postStr += "&address=" + $("#address").val();
        postStr += "&salary=" + $("#salary").val();
        var demandStr = "",welfareStr = "",inputId = "";
        for(var i=1;i<=$("#demand input").length;i++){
        		inputId = "#demand" + i;
        		demandStr = demandStr + $(inputId).val() + ",";
        }
        for(var i=1;i<=$("#welfare input").length;i++){
        		inputId = "#welfare" + i;
        		welfareStr = welfareStr + $(inputId).val() + ",";
        }
        postStr += "&demand=" + demandStr;
        postStr += "&welfare=" + welfareStr;
        console.log(demandStr,welfareStr);
        var url = "project/p_addJob.php";
        //通过post方式打开链接
        XmlUserLogin.open("POST",url,true);
        XmlUserLogin.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        XmlUserLogin.send(postStr);  //发送post数据
        XmlUserLogin.onreadystatechange = function(){
            if(XmlUserLogin.readyState==4 && XmlUserLogin.status==200){
                var respvalue = XmlUserLogin.responseText;
                switch(respvalue){
                    case "0":
                        alert('添加成功,等待审核');
                        $("#jobName").val("");
                        $("#jobName").focus();
                        break;
                    case "1":
                        alert('添加失败');
                        location.href='index.php';
                        break;
                }
            }
        }
    }
}
function loadData(data){
    console.log(data,data[1]);
    $("#allMajor").html("");
    for(i in data){
        $("#allMajor").append("<option>"+data[i]+"</option>");
    }
}

$(document).ready(function(){
    $("#allCollege").change(function(){
        var collegeName = $(this).val();
        $.ajax({url:"project/p_major.php",
            type:"POST",
            dataType:"json",
            data:{collegeName:collegeName},
            success:loadData,
            error:function(){ alert("error");}
        });
    });

	var i = 2,j=2;
	$("#addWelfare").click(function(){
        var welfare = "#welfare"+(i-1);
        if($(welfare).val() !== ""){
    		$("#welfare").append('<input type="text" class="form-control" name="welfare[]" id="welfare'+i+'" placeholder="请输入福利">');
    		i++;
        }
        else{
            $(welfare).focus();
        }
	});
	$("#addDemand").click(function(){
        var demand = "#demand"+(j-1);
        if($(demand).val() !== ""){
    		$("#demand").append('<input type="text" class="form-control" name="demand[]" id="demand'+j+'" placeholder="请输入职位要求">');
    		j++;
        }
        else{
            $(demand).focus();
        }
	});
	$("#jobName").blur(function(){
        if($("#jobName").val()!== "" && $("#comName").val()!== ""){
            checkJobName();
        }
    });
	$("#comName").blur(function(){
		if($("#jobName").val()!== "" && $("#comName").val()!== ""){
            checkJobName();
        }
	});
    $("#btnOk").click(function(){
        checkNull();
        if(isNull){
            alert("文本框内容都不能为空");
        }
        else{
    		checkJobName();
    		if(!isExistJob){
                addJob();	
            }
            
        }
	});
});