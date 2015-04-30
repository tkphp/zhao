<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="zh">
  <meta charset="UTF-8">
  <title>个人中心</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="/zhao/Public/assets/i/icon.png">
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
  <style>
    @media only screen and (min-width: 641px) {
      .am-offcanvas {
        display: block;
        position: static;
        background: none;
      }

      .am-offcanvas-bar {
        position: static;
        width: auto;
        background: none;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
      .am-offcanvas-bar:after {
        content: none;
      }

    }

    @media only screen and (max-width: 640px) {
      .am-offcanvas-bar .am-nav>li>a {
        color:#ccc;
        border-radius: 0;
        border-top: 1px solid rgba(0,0,0,.3);
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
      }

      .am-offcanvas-bar .am-nav>li>a:hover {
        background: #404040;
        color: #fff
      }

      .am-offcanvas-bar .am-nav>li.am-nav-header {
        color: #777;
        background: #404040;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
        text-shadow: 0 1px 0 rgba(0,0,0,.5);
        border-top: 1px solid rgba(0,0,0,.3);
        font-weight: 400;
        font-size: 75%
      }

      .am-offcanvas-bar .am-nav>li.am-active>a {
        background: #1a1a1a;
        color: #fff;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
      }

      .am-offcanvas-bar .am-nav>li+li {
        margin-top: 0;
      }
    }

    .my-head {
      margin-top: 40px;
      text-align: center;
    }

    .my-button {
      position: fixed;
      top: 0;
      right: 0;
      border-radius: 0;
    }
    .my-sidebar {
      padding-right: 0;
      border-right: 1px solid #eeeeee;
    }

    .my-footer {
      border-top: 1px solid #eeeeee;
      padding: 10px 0;
      margin-top: 10px;
      text-align: center;
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
	
<hr class="am-article-divider"/>
<div class="am-g am-g-fixed">
  <div class="am-u-md-10 am-u-md-push-2">
    <div class="am-g">
      <div class="am-u-sm-11 am-u-sm-centered">
        <div class="am-cf am-article">
        
        
          	 <div id="order" class="am-tabs" data-am-tabs>
			  <ul class="am-tabs-nav am-nav am-nav-tabs">
			    <li class="am-active"><a href="#tab1">我的订单</a></li>
			  </ul>
			  <div class="am-tabs-bd">
			    <div class="am-tab-panel am-fade am-in am-active" id="tab1">			   
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
				              <div class="am-dropdown" data-am-dropdown>
				                <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
				                <ul class="am-dropdown-content">
				                  <li><a href="#">支付</a></li>
				                  <li><a href="#">退款</a></li>
				                  <li><a onclick="return confirm('你确定要删除商品<?php echo ($good["name"]); ?>吗?')" href="<?php echo U('Order/delete',array('id'=>$order[id]));?>">删除</a></li>
				                </ul>
				              </div>
				            </td>
				            </tr><?php endforeach; endif; ?>
				
				          </tbody>
				        </table>
				        </form>
				     
			    </div>
			  </div>
			</div>
        
        
        <hr>
         <div id="cart" class="am-tabs" data-am-tabs>
			  <ul class="am-tabs-nav am-nav am-nav-tabs">
			    <li class="am-active"><a href="#tab2">我的购物车</a></li>
			  </ul>
			  <div class="am-tabs-bd">
			    <div class="am-tab-panel am-fade am-in am-active" id="tab2">			   
						<?php if($Num == 0 ): ?><div class="am-panel-bd">
						    <p>您的购物车里还没有商品，快来选购吧</p>
						  </div>
						  
						  <?php else: ?>
						  <form action="<?php echo U('Cart/delete');?>" method="post">
						  <table class="am-table  am-table-striped ">
						  <?php if(is_array($cart)): foreach($cart as $key=>$cart): ?><tr>
						  		<td><?php echo ($cart["id"]); ?><input type="hidden" name="id" value="<?php echo ($cart["id"]); ?>"></td>
						  		<td><?php echo ($cart["name"]); ?></td>
						  		<td><?php echo ($cart["price"]); ?></td>
						  		<td><?php echo ($cart["num"]); ?></td>
						  		<td><input type="submit" class="am-btn am-btn-danger" value="删除"></td>
						  	</tr><?php endforeach; endif; ?>
						  	<tr>
						  		<td></td>
						  		<td></td>
						  		<td><?php echo ($Num); ?>件商品</td>
						  		<td>共计<?php echo ($Price); ?>元</td>
						  		<td><a href="<?php echo U('Cart/index');?>" class="am-btn am-btn-success">结算</a></td>
						  	</tr>
						  </table>
						  </form><?php endif; ?>
			    </div>
			  </div>
			</div>
			
			<hr>
			
			 <div id="person" class="am-tabs" data-am-tabs>
			  <ul class="am-tabs-nav am-nav am-nav-tabs">
			    <li class="am-active"><a href="#tab2">我的资料</a></li>
			  </ul>
			  <div class="am-tabs-bd">
			    <div class="am-tab-panel am-fade am-in am-active" id="tab2">			   
						<form  action="<?php echo U('User/personEdit');?>" method="post" class="am-form am-form-horizontal">
				 		 <input type="hidden" name="id" value="<?php echo ($person["id"]); ?>">
				 		 <div class="am-form-group">
				            <label for="username" class="am-u-sm-3 am-form-label">姓名 </label>
				            <div class="am-u-sm-9">
				              <input type="text" id="username" name="username"  value="<?php echo ($person["uname"]); ?>">
				              <small></small>
				            </div>
				          </div>
				          
				 		  <div class="am-form-group">
				            <label for="password" class="am-u-sm-3 am-form-label">密码 </label>
				            <div class="am-u-sm-9">
				              <input type="password" name="password" id="password" placeholder="密码 ">
				              <small></small>
				            </div>
				          </div>
				          
				          <div class="am-form-group">
				            <label for="useremail" class="am-u-sm-3 am-form-label">电子邮件 </label>
				            <div class="am-u-sm-9">
				              <input type="email" id="useremail" name="useremail"  value="<?php echo ($person["email"]); ?>">
				              <small></small>
				            </div>
				          </div>
				
				          <div class="am-form-group">
				            <label for="userphone" class="am-u-sm-3 am-form-label">手机 </label>
				            <div class="am-u-sm-9">
				              <input type="text" id="userphone" name="userphone" value="<?php echo ($person["mobile"]); ?>">
				            </div>
				          </div>
				
				
				          <div class="am-form-group">
				            <div class="am-u-sm-9 am-u-sm-push-3">
				              <input type="submit" class="am-btn am-btn-primary" value="保存修改">
				            </div>
				          </div>
				        </form>
			    </div>
			  </div>
			</div>
			
			
			
       		
     
        </div>

        
      </div>
    </div>
  </div>
  <div class="am-u-md-2 am-u-md-pull-10 my-sidebar">
    <div class="am-offcanvas" id="sidebar">
      <div class="am-offcanvas-bar">
        <ul class="am-nav">
          <li class="am-nav-header">个人中心</li>
          <li><a href="#order">我的订单</a></li>
          <li><a href="#cart">购物车</a></li>
          <li><a href="#person">我的资料</a></li>
        </ul>
      </div>
    </div>
  </div>
  <a href="#sidebar" class="am-btn am-btn-sm am-btn-success am-icon-bars am-show-sm-only my-button" data-am-offcanvas><span class="am-sr-only">侧栏导航</span></a>
</div>

<footer class="my-footer">
  <p><br><small>© 2015</small></p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/polyfill/rem.min.js"></script>
<script src="assets/js/polyfill/respond.min.js"></script>
<script src="assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js"></script>
<!--<![endif]-->
</body>
</html>