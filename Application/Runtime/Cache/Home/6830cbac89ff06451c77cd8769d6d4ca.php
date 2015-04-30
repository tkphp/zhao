<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>登录界面</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<!-- Header -->
<header data-am-widget="header" class="am-header am-header-default">
  <div class="am-header-left am-header-nav">
    <a href="<?php echo U('Index/index');?>" class="">
      <i class="am-header-icon am-icon-home"></i>
    </a>

  </div>
  <h1 class="am-header-title">
		用户登录
  </h1>
  <div class="am-header-right am-header-nav">
	 <a href="#right-link" class="">
    </a>
  </div>
</header>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <hr>
    <br>
    <br>
	 <form action="<?php echo U('User/doLogin');?>" method="post" class="am-form am-form-horizontal">
		  <fieldset>
		  <div class="am-form-group am-form-icon">
			<i class="am-icon-user"></i>
			<input type="text" name="username" class="am-form-field" placeholder="手机/邮箱">
		  </div>

		 <div class="am-form-group am-form-icon">
			<i class="am-icon-lock"></i>
			<input type="password" name="password" class="am-form-field" placeholder="密码">
		  </div>

		     <label class="am-fl "><input id="remember-me" type="checkbox" >下次自动登录</label> 
			
			<a href="<?php echo U('User/forget');?>" class="am-btn am-btn-link am-btn-sm am-fr">忘记密码?</a>
		
			
		  <input type="submit" onclick="saveUserInfo()" class="am-btn am-btn-primary am-btn-block" value="登录">
		 
			</fieldset>
			
		   <a href="<?php echo U('User/register');?>" class="am-btn am-btn-link am-btn-sm am-fr">立即注册</a>
		</form>
    <hr>
    <p>© 2015</p>
  </div>
</div>
<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
//初始化页面时验证是否记住了密码
$(document).ready(function() {
    if ($.cookie("remember-me") == "true") {
        $("#remember-me").attr("checked", true);
        $("#username").val($.cookie("username"));
        $("#password").val($.cookie("password"));
    }
});

function saveUserInfo() {
    if ($("#remember-me").prop("checked") == true) {
        var username = $("#username").val();
        var password = $("#password").val();
        $.cookie("remember-me", "true", { expires: 7 }); // 存储一个带7天期限的 cookie
        $.cookie("username", username, { expires: 7 }); // 存储一个带7天期限的 cookie
        $.cookie("password", password, { expires: 7 }); // 存储一个带7天期限的 cookie
    }
    else {
        $.cookie("remember-me", "false", { expires: -1 });        // 删除 cookie
        $.cookie("username", '', { expires: -1 });
        $.cookie("password", '', { expires: -1 });
    }
}
</script>
</body>
</html>