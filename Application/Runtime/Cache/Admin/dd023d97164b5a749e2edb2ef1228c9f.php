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
  <link rel="alternate icon" type="image/png" href="/zhao/Public/assets/i/favicon.png">
  <link rel="stylesheet" href="/zhao/Public/assets/css/amazeui.min.css"/>
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

    <form action="" method="post" class="am-form">
      <label for="username">账户:</label>
      <input type="text" name="username" id="email" value="" required>
      <br>
      <label for="password">密码:</label>
      <input type="password" name="" id="password" value="" required>
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
        <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
    </form>
    <hr>
    <p>© 2015</p>
  </div>
</div>
</body>
</html>