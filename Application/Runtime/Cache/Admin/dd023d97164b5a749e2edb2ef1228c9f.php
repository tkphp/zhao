<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>后台登录</title>
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
<div class="header">
  <div class="am-g">
    <h1>后台管理</h1>
   
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h2>登录</h2>
    <hr>
    <br>
    <br>

    <form action="<?php echo U('User/doLogin');?>" method="post" class="am-form">
      <label for="username">账户:</label>
      <input type="text" name="username" id="username" value="" required>
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="" required>
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox" value="" >
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录"  onclick="saveUserInfo()"  class="am-btn am-btn-primary am-btn-sm am-fl">
        <input type="submit" name="" value="忘记密码 ? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
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