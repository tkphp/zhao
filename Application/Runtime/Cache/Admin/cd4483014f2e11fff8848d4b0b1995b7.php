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
    <strong></strong> <small>后台管理</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
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
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-file"></span> 系统管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">会员列表</strong> <small></small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <a href="<?php echo U('Member/add');?>"><button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button></a>
            <a href=""><input type="submit" onclick="return confirm('你确定要删除所有吗?')" value="删除" class="am-btn am-btn-default am-icon-trash-o"> </a>
          </div>
        </div>
      </div>
      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-form-group">
          <select data-am-selected="{btnSize: 'sm'}">
            <option value="option1">所有类别</option>
            <option value="option2">激活会员</option>
            <option value="option3">禁用会员</option>
          </select>
        </div>
      </div>
      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-input-group am-input-group-sm">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form" action="<?php echo U('Member/delete');?>" method="post">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th><input id="all" type="checkbox" /></th>
                <th>会员姓名</th>
                <th>会员邮箱</th>
                <th>会员手机</th>
                <th>激活状态</th>
                <th>操作</th>
              </tr>
          </thead>
          <tbody>
          <?php if(is_array($members)): foreach($members as $key=>$member): ?><tr>
              <td><input  type="checkbox" /><input type="hidden" value="<?php echo ($memeber["id"]); ?>"></td>
              <td><?php echo ($member["uname"]); ?></td>
              <td><?php echo ($member["email"]); ?></td>
              <td><?php echo ($member["mobile"]); ?></td>
              <td>
              <?php if(member.status == 0 ): ?>激活<?php else: ?> 禁用<?php endif; ?>
              </td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <a href="<?php echo U('Member/edit',array('id'=>$member[id]));?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                    <a onclick="return confirm('你确定要删除用户<?php echo ($member["name"]); ?>吗?')" href="<?php echo U('Member/delete',array('id'=>$member[id]));?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
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
  </div>
  <!-- content end -->
</div>

<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2015</p>
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
<script>
$(function(){
	$("#all").click(function(){    
	    if(this.checked){    
	        $(".am-form :checkbox").attr("checked", true);   
	    }else{    
	        $(".am-form :checkbox").attr("checked", false); 
	    }    
	}); 
});
 
</script>
</body>
</html>