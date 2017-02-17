//生成验证码模块
var CodeResult = 0;
var CreateCode = function(){
    var code = "";
    CodeResult = 0;
    var x = new Array("+","-");
    var num1 = Math.floor(Math.random()*50);
    var num2 = Math.floor(Math.random()*50);
    var xIndex = Math.floor(Math.random()*2);
    if(x[xIndex] == "-"){
        if(num1 < num2){
            code = num2 + x[xIndex] + num1 + "=?";
            CodeResult = num2 - num1;
        }else{
            code = num1 + x[xIndex] + num2 + "=?";
            CodeResult = num1 - num2;
        }
    }else{
        code = num1 + x[xIndex] + num2 + "=?";
        CodeResult = num1 + num2;
    }
    $(".code").text(code);
    $("#inputCode3").attr("placeholder","计算结果");
}

var checkCode = function(e){
    var mycode = parseInt($("#inputCode3").val());
    if(checkNull()){
        if(CodeResult != mycode){
            alert("验证码错误");
            CreateCode();
            return false;
        }
        else return true;
    }
    else{ alert("用户名或密码不能为空");} 
}
var checkNull = function(){
    if($("#inputEmail3").val() !== "" && $("#inputPassword3").val() !== "" && $("#inputCode3").val() !== "")
        return true;
    else 
        return false;
}

var switchLogin = function(){
	$(".switch_login a").click(function(){
		$(".switch_login a").attr("class","");
    	$(this).attr("class","active"); // Activate this
        var str1 = $(this).attr('id');

		$(".loginContent").hide();
        $(".loginContent").each(function(){
        	var str2 = $(this).attr('id');
        	if(str1.indexOf(str2) > 0){
        		$(this).fadeIn();
        	}
        });
	});
}
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
var UserLogin = function(){
    var XmlUserLogin = CreateXML();
    if(XmlUserLogin){
        var postStr = "email=" + $("#inputEmail3").val();
        postStr += "&pwd=" + $("#inputPassword3").val();
        var url = "project/p_login.php";
        //通过post方式打开链接
        XmlUserLogin.open("POST",url,true);
        XmlUserLogin.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        XmlUserLogin.send(postStr);  //发送post数据
        XmlUserLogin.onreadystatechange = function(){
            if(XmlUserLogin.readyState==4 && XmlUserLogin.status==200){
                var respvalue = XmlUserLogin.responseText;
                switch(respvalue){
                    case "0":
                        alert('邮箱与密码不匹配，请重新登录');
                        CreateCode();
                        break;
                    case "1":
                        alert('登录成功');
                        location.href='index.php';
                        break;
                    case "2":
                        alert("SQL预处理失败，请联系管理员.");
                        break;
                }
            }
        }
    }
}

$(document).ready(function(){
    CreateCode();
    $(".code").click(function(e) {
        CreateCode();
    });

	switchLogin();
    $("#btnOk").click(function(e){
        if(checkCode(e)){
            UserLogin();
        }
    });
});