<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台首页</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate icon" type="image/png" href="/zhao/Public/assets/i/icon.png">
  <link rel="apple-touch-icon-precomposed" href="/zhao/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
  <link rel="stylesheet" href="/zhao/Public/assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong>后台管理</strong> <small></small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="<?php echo U('User/user');?>"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="<?php echo U('User/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo U('Index/index');?>"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-table"></span> 系统管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav1">
            <li><a href="<?php echo U('User/user');?>" class="am-cf"><span class="am-icon-check"></span> 系统管理员<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
          </ul>
        </li>
        <li><a href="<?php echo U('Member/index');?>"><span class="am-icon-table"></span> 会员管理</a></li>
        <li><a href="<?php echo U('Goods/index');?>"><span class="am-icon-table"></span> 商品管理</a></li>
        <li><a href="<?php echo U('Order/index');?>"><span class="am-icon-table"></span> 订单管理</a></li>
        <li><a href="<?php echo U('User/logout');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。—— Zhao</p>
        </div>
      </div>

    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong>  <small></small></div>
    </div>

    <!-- <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
      <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>新增页面<br/>2300</a></li>
      <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>成交订单<br/>308</a></li>
      <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>昨日访问<br/>8002</a></li>
      <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span><br/>在线用户<br/>3000</a></li>
    </ul>

    <div class="am-g">
      <div class="am-u-sm-12">
         <form class="am-form" action="<?php echo U('Goods/delete');?>" method="post">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th>订单号</th>
                <th>订单日期</th>
                <th>订单总额</th>
                <th>订单状态</th>
                <th>付款状态</th>
                <th>支付方式</th>
                <th>收货地址</th>
                <th>操作</th>
              </tr>
          </thead>
          <tbody>
          <?php if(is_array($orders)): foreach($orders as $key=>$order): ?><tr>
              <input type="hidden" value="<?php echo ($order["id"]); ?>">
              <td><?php echo ($order["order_sn"]); ?></td>
              <td><?php echo (date("y-m-d",$order["order_date"])); ?></td>
              <td>￥<?php echo ($order["deal_price"]); ?></td>
              <td>
              <?php switch($order["order_status"]): case "0": ?>已取消<?php break;?>
              <?php case "2": ?>等待发货<?php break;?>
              <?php case "3": ?>已发货<?php break;?>
              <?php case "4": ?>已完成<?php break;?>
              <?php default: ?>等待付款<?php endswitch;?>
              </td>
              <td>
               <?php switch($order["pay_status"]): case "1": ?>已付款<?php break;?>
              <?php default: ?>未付款<?php endswitch;?>
              </td>
              <td>
              <?php switch($order["pay_type"]): case "1": ?>货到付款<?php break;?>
              <?php default: ?>在线支付<?php endswitch;?>
              </td>
              <td><?php echo ($order["addr"]); ?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <a href="<?php echo U('Goods/edit',array('id'=>$good[id]));?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                    <a onclick="return confirm('你确定要删除商品<?php echo ($good["name"]); ?>吗?')" href="<?php echo U('Goods/delete',array('id'=>$good[id]));?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                  </div>
                </div>
              </td>
            </tr><?php endforeach; endif; ?>


   
   

        
          </tbody>
        </table>
          <div class="am-cf">
         
			  <div class="am-fl">
			   <?php echo ($page); ?>
			  </div>
			</div>
        </form>
      </div>
    </div>
 -->
   
   <table class="am-table">
    <thead>
        <tr>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th colspan="2">网站信息</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
             <td></td>
            <td>操作系统</td>
            <td>CentOS</td>
			<td></td>
        </tr>
        <tr>
        	<td></td>
            <td>服务器</td>
            <td>Apache</td>
			<td></td>
        </tr>
        <tr>
        	<td></td>
            <td>数据库</td>
            <td>MySQL</td>
			<td></td>
        </tr>
        <tr>
        	<td></td>
            <td>开发语言</td>
            <td>PHP</td>
			<td></td>
        </tr>
        <tr>
        	<td></td>
            <td>前台框架</td>
            <td>Amazeui</td>
			<td></td>
        </tr>
        <tr>
        	<td></td>
            <td>后台框架</td>
            <td>Thinkphp</td>
			<td></td>
        </tr>
        <tr>
        	<td></td>
            <td>开发模式</td>
            <td>MVC</td>
			<td></td>
        </tr>
        <tr>
        	<td></td>
            <td>网址</td>
            <td>http://webzhaobei.cc</td>
			<td></td>
        </tr>
         <tr>
         	<td></td>
            <td>时间</td>
            <td>2015/4/30</td>
			<td></td>
        </tr>
    </tbody>
</table>

     

       
 </div>

  <!-- content end -->

</div>

<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-right">© 2015 </p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/zhao/Public/assets/js/polyfill/rem.min.js"></script>
<script src="/zhao/Public/assets/js/polyfill/respond.min.js"></script>
<script src="/zhao/Public/assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="/zhao/Public/assets/js/app.js"></script>
</body>
</html>