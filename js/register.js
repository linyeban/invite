//空格字符过滤
var rpl = function(id){
	var content = $(id).val();
	content = content.replace(/\s+/g,"");
	$(id).val(content);
	return content;
}
var checkInput = function(e){
	if($("#inputPassword1").val() !== $("#inputPassword2").val()){
		alert("两次密码不一致");
		e.preventDefault(); //禁止页面跳转
	}
}
//生成各种格式的邮箱
var CreateEmail = function(){

	var em = ["@qq.com","@163.com","@126.com","@sina.com","@sohu.com","@yahoo.com","@hotmail.com"];
	var content = rpl("#inputEmail");
	//截取"@"之前的字符
	content.indexOf("@") > -1 ? content = content.substring(content.indexOf("@"),0) : content;
	if(content.length <= 0){
		$("#li_email").css("display","none");
	}
	else{
		$("#li_email").css("display","block");
		for(var i = 0;i < em.length; i++){
			$("#li_em"+i).text(content + em[i]);
		}	
	}
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
//用户名是否已存在检查，因其无法return，所以只能使用到全局变量
var isUserExists = false;
var CheckExistsUsername = function(){
	if($("#inputEmail").val() !== ""){
		var XmlUserCount = CreateXML();
		if(XmlUserCount){
			var postStr = "email=" + $("#inputEmail").val();
			var url = "project/p_checkEmail.php";
			//通过post方式打开链接
			XmlUserCount.open("POST",url,true);
			XmlUserCount.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			XmlUserCount.send(postStr);  //发送post数据
			XmlUserCount.onreadystatechange = function(){
				if(XmlUserCount.readyState==4 && XmlUserCount.status==200){
					if(XmlUserCount.responseText != 0){
						$("#tips").hide();
						isUserExists = true;
					}else{
						$("#tips").show();
						isUserExists = false;
					}
				}
			}
		}
	}
}
var UserRegister = function(){
    var XmlUserLogin = CreateXML();
    if(XmlUserLogin){
        var postStr = "email=" + $("#inputEmail").val();
        postStr += "&username=" + $("#inputUser").val();
		postStr += "&pwd=" + $("#inputPassword1").val();
		postStr += "&sex=" + $('input:radio[name="sex"]:checked').val();
		postStr += "&college=" + $('#allCollege').val();
        var url = "project/p_register.php";
        //通过post方式打开链接
        XmlUserLogin.open("POST",url,true);
        XmlUserLogin.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        XmlUserLogin.send(postStr);  //发送post数据
        XmlUserLogin.onreadystatechange = function(){
            if(XmlUserLogin.readyState==4 && XmlUserLogin.status==200){
                var respvalue = XmlUserLogin.responseText;
                switch(respvalue){
                    case "0":
                        $("#tips").show();
                        break;
                    case "1":
                    	isUserExists = false;
                        alert('注册成功');
                        location.href='index.php';
                        break;
                    case "2":
                        alert("注册失败，请重新注册");
                        break;
                }
            }
            else{ console.log("ddd");}
        }
    }
}

$(document).ready(function(e){
	$("#register").click(function(e){
		checkInput(e);
		CheckExistsUsername();
		UserRegister();
	});
	$("#inputEmail").blur(function(){CheckExistsUsername();});
	$("#inputEmail").keyup(function(){
		CreateEmail(); 
		$("#tips").hide();
	});
	$("#inputEmail").click(function(){
		if($("#inputEmail").val().length > 0){
			CreateEmail();
			$("#tips").hide();
		}
	});
	$("#li_email li").click(function(){
		$("#inputEmail").val($(this).text());
		$("#li_email").css("display","none");
		CheckExistsUsername();
	});
});