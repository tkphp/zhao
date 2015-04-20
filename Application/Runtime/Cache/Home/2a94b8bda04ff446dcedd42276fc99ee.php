<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>主页</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/zhao/Public/assets/i/icon.png">
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
  <link rel="stylesheet" href="/zhao/Public/assets/css/app.css">
</head>
<body>
<!-- Header -->
<header data-am-widget="header" class="am-header am-header-default">
  <div class="am-header-left am-header-nav">
    <a href="#left-link" class="">
      <i class="am-header-icon am-icon-home"></i>
    </a>
    <a href="#phone-link" class="">
      <i class="am-header-icon am-icon-phone"></i>
    </a>
  </div>
  <h1 class="am-header-title">Amaze UI</h1>
  <div class="am-header-right am-header-nav">
  	<?php if($_SESSION['is_Login'] == 1 ): echo ($_SESSION['username']); ?> 你好!
	<a href="<?php echo U('User/logout');?>">注销</a>
	<?php else: ?> 
	<a href="#user-link"  data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 390, height: 330}"> <i class="am-header-icon am-icon-user"></i></a><?php endif; ?>
    <a href="#cart-link" class="">
      <i class="am-header-icon am-icon-shopping-cart"></i>
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

		    <label class="am-fl "><input type="checkbox" >下次自动登录</label>
			
			<a class="am-btn am-btn-link am-btn-sm am-fr">忘记密码 ^_^?</a>
		
			
		  <button type="submit" class="am-btn am-btn-primary am-btn-block">登录</button>
		 
			</fieldset>
			
		   <a href="<?php echo U('User/register');?>" class="am-btn am-btn-link am-btn-sm am-fr">立即注册</a>
		</form>
		
		</div>
	  </div>
	</div>

<!-- Menu -->
<nav data-am-widget="menu" class="am-menu  am-menu-offcanvas1" data-am-menu-offcanvas>
  <a href="javascript: void(0)" class="am-menu-toggle">
    <i class="am-menu-toggle-icon am-icon-bars"></i>
  </a>
  <div class="am-offcanvas">
    <div class="am-offcanvas-bar">
      <ul class="am-menu-nav sm-block-grid-1">
        <li class="am-parent">
          <a href="##">公司</a>
          <ul class="am-menu-sub am-collapse  sm-block-grid-2 ">
            <li class="">
              <a href="##">公司</a>
            </li>
            <li class="">
              <a href="##">人物</a>
            </li>
            <li class="">
              <a href="##">趋势</a>
            </li>
            <li class="">
              <a href="##">投融资</a>
            </li>
            <li class="">
              <a href="##">创业公司</a>
            </li>
            <li class="">
              <a href="##">创业人物</a>
            </li>
            <li class="am-menu-nav-channel">
              <a href="##" title="公司">进入栏目 &raquo;</a>
            </li>
          </ul>
        </li>
        <li class="am-parent">
          <a href="##">人物</a>
          <ul class="am-menu-sub am-collapse  sm-block-grid-3 ">
            <li class="">
              <a href="##">公司</a>
            </li>
            <li class="">
              <a href="##">人物</a>
            </li>
            <li class="">
              <a href="##">趋势</a>
            </li>
            <li class="">
              <a href="##">投融资</a>
            </li>
            <li class="">
              <a href="##">创业公司</a>
            </li>
            <li class="">
              <a href="##">创业人物</a>
            </li>
          </ul>
        </li>
        <li class="am-parent">
          <a href="#c3">趋势</a>
          <ul class="am-menu-sub am-collapse am-avg-sm-4">
            <li class="">
              <a href="##">公司</a>
            </li>
            <li class="">
              <a href="##">人物</a>
            </li>
            <li class="">
              <a href="##">趋势</a>
            </li>
            <li class="">
              <a href="##">投融资</a>
            </li>
            <li class="">
              <a href="##">创业公司</a>
            </li>
            <li class="">
              <a href="##">创业人物</a>
            </li>
            <li class="am-menu-nav-channel">
              <a href="#c3" title="趋势">泥煤 &raquo;</a>
            </li>
          </ul>
        </li>
        <li class="am-parent">
          <a href="##">投融资</a>
          <ul class="am-menu-sub am-collapse am-avg-sm-3">
            <li class="">
              <a href="##">公司</a>
            </li>
            <li class="">
              <a href="##">人物</a>
            </li>
            <li class="">
              <a href="##">趋势</a>
            </li>
            <li class="">
              <a href="##">投融资</a>
            </li>
            <li class="">
              <a href="##">创业公司</a>
            </li>
            <li class="">
              <a href="##">创业人物</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="##">创业公司</a>
        </li>
        <li class="">
          <a href="##">创业人物</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Slider -->
<div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{"directionNav":false}'>
  <ul class="am-slides">
    <li>
      <img src="http://s.cn.bing.net/az/hprichbg/rb/TheLuxorHotel_ZH-CN12121725266_1920x1080.jpg">
    </li>
    <li>
      <img src="http://s.cn.bing.net/az/hprichbg/rb/MovingWalkway_ZH-CN9842297711_1920x1080.jpg">
    </li>
    <li>
      <img src="http://global.bing.com/az/hprichbg/rb/UchisarCastle_EN-US10838608428_1920x1080.jpg">
    </li>
    <li>
      <img src="http://global.bing.com/az/hprichbg/rb/DumbartonOaksGardens_EN-US12360736195_1920x1080.jpg">
    </li>
  </ul>
</div>

<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <!--列表标题-->
  <div class="am-list-news-hd am-cf">
    <!--带更多链接-->
    <a href="###">
      <h2>左图 + 摘要</h2>
      <span class="am-list-news-more am-fr">更多 &raquo;</span>
    </a>
  </div>
  <div class="am-list-news-bd">
    <ul class="am-list">
      <!--缩略图在标题左边-->
      <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
        <div class="am-u-sm-4 am-list-thumb">
          <a href="http://www.douban.com/online/11614662/">
            <img src="http://img5.douban.com/lpic/o636459.jpg" alt="我很囧，你保重....晒晒旅行中的那些囧！"
              />
          </a>
        </div>
        <div class="am-u-sm-8 am-list-main">
          <h3 class="am-list-item-hd">
            <a href="http://www.douban.com/online/11614662/">我很囧，你保重....晒晒旅行中的那些囧！</a>
          </h3>
          <div class="am-list-item-text">囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！</div>
        </div>
      </li>
      <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
        <div class="am-u-sm-4 am-list-thumb">
          <a href="http://www.douban.com/online/11624755/">
            <img src="http://img3.douban.com/lpic/o637240.jpg" alt="我最喜欢的一张画" />
          </a>
        </div>
        <div class="am-u-sm-8 am-list-main">
          <h3 class="am-list-item-hd">
            <a href="http://www.douban.com/online/11624755/">我最喜欢的一张画</a>
          </h3>
          <div class="am-list-item-text">你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片美我最喜欢的画群296795413进群发画，少说多发图，</div>
        </div>
      </li>
      <li class="am-g am-list-item-desced">
        <div class="am-list-main">
          <h3 class="am-list-item-hd">
            <a href="http://www.douban.com/online/11645411/">“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！</a>
          </h3>
          <div class="am-list-item-text">还在苦恼圣诞礼物再也玩儿不出新意？快来抢2013最炫彩的跨国圣诞礼物！【参与方式】1.关注“UniqueWay无二之旅”豆瓣品牌小站http://brand.douban.com/uniqueway/2.上传一张**本人**在旅行中色彩最浓郁、最丰富的照片（色彩包含取景地、周边事物、服装饰品、女生彩妆等等，发挥你们无穷的创意想象力哦！^^）一定要有本人出现喔！3.
            在照片下方，附上一句旅行宣言作为照片说明。 成功参与活动！* 听他们刚才说，上传照片的次</div>
        </div>
      </li>
    </ul>
  </div>
</div>


<!-- Gallery -->
<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }">
  <li>
    <div class="am-gallery-item">
      <a href="http://s.cn.bing.net/az/hprichbg/rb/TheLuxorHotel_ZH-CN12121725266_1920x1080.jpg"
         class="">
        <img src="http://s.cn.bing.net/az/hprichbg/rb/TheLuxorHotel_ZH-CN12121725266_1920x1080.jpg"
             alt="远方 有一个地方 那里种有我们的梦想" />
        <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
        <div class="am-gallery-desc">2375-09-26</div>
      </a>
    </div>
  </li>
  <li>
    <div class="am-gallery-item">
      <a href="http://s.cn.bing.net/az/hprichbg/rb/MovingWalkway_ZH-CN9842297711_1920x1080.jpg"
         class="">
        <img src="http://s.cn.bing.net/az/hprichbg/rb/MovingWalkway_ZH-CN9842297711_1920x1080.jpg"
             alt="某天 也许会相遇 相遇在这个好地方" />
        <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
        <div class="am-gallery-desc">2375-09-26</div>
      </a>
    </div>
  </li>
  <li>
    <div class="am-gallery-item">
      <a href="http://global.bing.com/az/hprichbg/rb/UchisarCastle_EN-US10838608428_1920x1080.jpg"
         class="">
        <img src="http://global.bing.com/az/hprichbg/rb/UchisarCastle_EN-US10838608428_1920x1080.jpg"
             alt="不要太担心 只因为我相信" />
        <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>
        <div class="am-gallery-desc">2375-09-26</div>
      </a>
    </div>
  </li>
  <li>
    <div class="am-gallery-item">
      <a href="http://global.bing.com/az/hprichbg/rb/DumbartonOaksGardens_EN-US12360736195_1920x1080.jpg"
         class="">
        <img src="http://global.bing.com/az/hprichbg/rb/DumbartonOaksGardens_EN-US12360736195_1920x1080.jpg"
             alt="终会走过这条遥远的道路" />
        <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
        <div class="am-gallery-desc">2375-09-26</div>
      </a>
    </div>
  </li>
</ul>

<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <!--列表标题-->
  <div class="am-list-news-hd am-cf">
    <!--带更多链接-->
    <a href="###">
      <h2>栏目标题</h2>
    </a>
  </div>
  <div class="am-list-news-bd">
    <ul class="am-list">
      <li class="am-g">
        <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd">我很囧，你保重....晒晒旅行中的那些囧！</a>
      </li>
      <li class="am-g">
        <a href="http://www.douban.com/online/11624755/" class="am-list-item-hd">我最喜欢的一张画</a>
      </li>
      <li class="am-g">
        <a href="http://www.douban.com/online/11645411/" class="am-list-item-hd">“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！</a>
      </li>
    </ul>
  </div>
  <!--更多在底部-->
  <div class="am-list-news-ft">
    <a class="am-list-news-more am-btn am-btn-default" href="###">查看更多 &raquo;</a>
  </div>
</div>

<!-- Navbar -->
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default "
     id="">
  <ul class="am-navbar-nav am-cf am-avg-sm-4">
    <li>
      <a href="tel:123456789">
        <span class="am-icon-phone"></span>
        <span class="am-navbar-label">呼叫</span>
      </a>
    </li>
    <li data-am-navbar-share>
      <a href="###">
        <span class="am-icon-share-square-o"></span>
        <span class="am-navbar-label">分享</span>
      </a>
    </li>
    <li data-am-navbar-qrcode>
      <a href="###">
        <span class="am-icon-qrcode"></span>
        <span class="am-navbar-label">二维码</span>
      </a>
    </li>
    <li>
      <a href="https://github.com/allmobilize/amazeui">
        <span class="am-icon-github"></span>
        <span class="am-navbar-label">GitHub</span>
      </a>
    </li>
    <li>
      <a href="http://amazeui.org/getting-started">
        <span class="am-icon-download"></span>
        <span class="am-navbar-label">下载使用</span>
      </a>
    </li>
    <li>
      <a href="https://github.com/allmobilize/amazeui/issues">
        <span class="am-icon-location-arrow"></span>
        <span class="am-navbar-label">Bug 反馈</span>
      </a>
    </li>
  </ul>
</div>

<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js"></script>
</body>
</html>