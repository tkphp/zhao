<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="zh">
  <meta charset="UTF-8">
  <title>注册用户</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="/zhao/Public/assets/i/icon.png">
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
  <style>
	.am-slider .am-slides img{
	 width:auto;
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

  </h1>
  <div class="am-header-right am-header-nav">
    
  	<?php if($_SESSION['is_Login'] == 1 ): ?><a href="">
		 <li class="am-dropdown" data-am-dropdown>
        <a style="color:#fff;" class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
            <?php echo ($_SESSION['username']); ?>  <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
            <li class="am-dropdown-header"></li>
            <li><a href="#">个人资料</a></li>
            <li><a href="#">购物车</a></li>
            <li><a href="#">我的订单</a></li>
            <li class=""><a href="#">消费记录</a></li>
            <li class="am-divider"></li>
            <li><a href="<?php echo U('User/logout');?>">注销</a></li>
          </ul>
    </li>
	</a>
	<?php else: ?> 
	<a href="#user-link"  data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 390, height: 330}"> <i class="am-header-icon am-icon-user"></i></a><?php endif; ?>
    <a href="#cart-link" id="shopcart" class="">
      <i  class="am-header-icon am-icon-shopping-cart"></i>
    </a>
	 <a href="#right-link" class="">
    </a>
  </div>
</header>
	<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
	  <div class="am-modal-dialog">
		<div class="am-modal-hd">用户登录
		  <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
		</div>
		<div class="am-modal-bd">
		
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

		    <!-- <label class="am-fl "><input type="checkbox" >下次自动登录</label> -->
			
			<a class="am-btn am-btn-link am-btn-sm am-fr">忘记密码?</a>
		
			
		  <button type="submit" class="am-btn am-btn-primary am-btn-block">登录</button>
		 
			</fieldset>
			
		   <a href="<?php echo U('User/register');?>" class="am-btn am-btn-link am-btn-sm am-fr">立即注册</a>
		</form>
		
		</div>
	  </div>
	</div>
<hr>
<form action="<?php echo U('Cart/order');?>" method="post">
<div class="info">
	<div>
		收货地址:
	<select id="s_province" name="s_province"></select>  
    <select id="s_city" name="s_city" ></select>  
    <select id="s_county" name="s_county"></select>
    <input type="text" name="s_id" placeholder="详细地址" required>
    </div>
</div>
<hr>



  <table class="am-table am-text-center">
  <?php if(is_array($cart)): foreach($cart as $key=>$cart): ?><tr>
  		<td><?php echo ($cart["id"]); ?></td>
  		<td><?php echo ($cart["name"]); ?></td>
  		<td><?php echo ($cart["price"]); ?></td>
  		<td><?php echo ($cart["num"]); ?></td>
  	</tr><?php endforeach; endif; ?>
  	<tr>
  		<td></td>
  		<td>共<?php echo ($Num); ?>件商品</td>
  		<td>共计<?php echo ($Price); ?>元</td>
  		<td><input type="submit" class="am-btn am-btn-danger" onclick="return confirm('你确定要提交订单吗?')" value="提交订单"></td>
  	</tr>
  </table>
  </form>






<footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
  <div class="am-footer-switch">
    <span class="am-footer-ysp" data-rel="mobile" data-am-modal="{target: '#am-switch-mode'}"></span>
    <span class="am-footer-divider"></span>
    <a id="godesktop" data-rel="desktop" class="am-footer-desktop"
    href="javascript:"></a>
  </div>
  <div class="am-footer-miscs ">
    <p>
      <a href="http://www.yunshipei.com/" title="诺亚方舟" target="_blank" class=""></a></p>
    <p>©2015</p>
    <p></p>
  </div>
</footer>
<div id="am-footer-modal" class="am-modal am-modal-no-btn am-switch-mode-m am-switch-mode-m-default">
  <div class="am-modal-dialog">
    <div class="am-modal-hd am-modal-footer-hd">
      <a href="javascript:void(0)" data-dismiss="modal" class="am-close am-close-spin "
      data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">您正在浏览的是
      <span class="am-switch-mode-owner">云适配</span>
      <span class="am-switch-mode-slogan">为您当前手机订制的移动网站。</span>
    </div>
  </div>
</div>
<script src="/zhao/Public/area.js"></script>
<script type="text/javascript">_init_area();</script>
<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js"></script>
<script type="text/javascript">
var Gid  = document.getElementById ;
var showArea = function(){
	Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" + 	
	Gid('s_city').value + " - 县/区" + 
	Gid('s_county').value + "</h3>"
							}
Gid('s_county').setAttribute('onchange','showArea()');
</script>
<script>
$(function(){	
		$("#shopcart").hover(
		function(){
			$("#panel").show();
		},
		function(){
			$("#panel").hide();
		});
		$("#panel").hover(
		function(){
			$("#panel").show();
		},
		function(){
			$("#panel").hide();
		});
});

</script>
</body>
</html>