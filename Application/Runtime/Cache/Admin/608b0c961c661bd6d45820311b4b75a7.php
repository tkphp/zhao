<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>商品编辑</title>
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
      <div class="am-fl am-cf"><a href="<?php echo U('Goods/index');?>"><strong class="am-text-primary am-text-lg">商品列表</strong></a> <small></small></div>
    </div>

    <div class="am-g">
	<form action="<?php echo U('Goods/doEdit');?>" method="post" enctype="multipart/form-data">
      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" src="/zhao/Uploads/<?php echo ($good["img"]); ?>" alt=""/>
              </div>
              <div class="am-u-md-8">
                  <div class="am-form-group">
                    <input type="file" id="img" value="<?php echo ($good["img"]); ?>" name="img">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>
            
             <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" src="/zhao/Uploads/<?php echo ($good["img1"]); ?>" alt=""/>
              </div>
              <div class="am-u-md-8">
                  <div class="am-form-group">
                    <input type="file" id="img1" value="<?php echo ($good["img1"]); ?>" name="img1">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>
            
             <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" src="/zhao/Uploads/<?php echo ($good["img2"]); ?>" alt=""/>
              </div>
              <div class="am-u-md-8">
                  <div class="am-form-group">
                    <input type="file" id="img2" value="<?php echo ($good["img2"]); ?>" name="img2">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>
            
             <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" src="/zhao/Uploads/<?php echo ($good["img3"]); ?>" alt=""/>
              </div>
              <div class="am-u-md-8">
                  <div class="am-form-group">
                    <input type="file" id="img3" value="<?php echo ($good["img3"]); ?>" name="img3">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>
            
             <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" src="/zhao/Uploads/<?php echo ($good["img4"]); ?>" alt=""/>
              </div>
              <div class="am-u-md-8">
                  <div class="am-form-group">
                    <input type="file" id="img4" value="<?php echo ($good["img4"]); ?>" name="img4">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
        <div class="am-form am-form-horizontal">
          <div class="am-form-group">
            <label for="name" class="am-u-sm-3 am-form-label">商品名称 </label>
            <div class="am-u-sm-9">
              <input type="text" id="name" name="name" placeholder="商品名称 " value="<?php echo ($good["name"]); ?>" required>
              <small></small>
            </div>
          </div>
          
 		  <div class="am-form-group">
            <label for="password" class="am-u-sm-3 am-form-label">商品类别 </label>
            <div class="am-u-sm-9">
              <input type="text" name="password" id="password" placeholder="商品类别" value="default" required>
              <small></small>
            </div>
          </div>
          
          <div class="am-form-group">
            <label for="price" class="am-u-sm-3 am-form-label">商品价格 </label>
            <div class="am-u-sm-9">
              <input type="text" id="price" name="price" placeholder="商品价格" value="<?php echo ($good["price"]); ?>" required>
              <small></small>
            </div>
          </div>

          <div class="am-form-group">
            <label for="num" class="am-u-sm-3 am-form-label">库存量 </label>
            <div class="am-u-sm-9">
              <input type="text" id="num" name="num" placeholder="库存量" value="<?php echo ($good["num"]); ?>" required>
            </div>
          </div>


          <div class="am-form-group">
            <label for="description" class="am-u-sm-3 am-form-label">商品描述</label>
            <div class="am-u-sm-9">
              <textarea class="" rows="5" id="description" name="description" placeholder="商品描述" required><?php echo ($good["description"]); ?></textarea>
              <small></small>
            </div>
          </div>

          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <input type="submit" class="am-btn am-btn-primary" value="保存">
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- content end -->

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
</body>
</html>