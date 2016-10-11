﻿<!doctype html>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta charset="UTF-8"/>
<title>小米商城-小米手机、红米Note、小米笔记本、小米电视正品专卖官方网站(xiaoxin)</title>
<meta name="description" content="小米商城直营小米公司旗下所有产品，囊括小米手机系列小米Max、小米5，红米手机系列红米Pro、红米Note、红米3S，智能硬件，配件及小米生活周边，同时提供小米客户服务及售后支持。"/>
<meta name="keywords" content="小米,小米官网,红米官网,小米手机,小米商城"/>
<meta name="viewport" content="width=1226"/>
<link rel="shortcut icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon"/>
<link rel="icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="/home/css/base.min.css"/>
<link rel="stylesheet" href="/home/css/buy-choose.min.css"/>
<link rel="stylesheet" href="/home/css/category.min.css"/>
<script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
</head>
<body>
<div class="site-topbar">
	<div class="container">
		<div class="topbar-nav">
			<a rel="nofollow" href="//www.mi.com/index.html">小米商城</a><span class="sep">|</span><a rel="nofollow" href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a rel="nofollow" href="http://www.miliao.com/" target="_blank">米聊</a><span class="sep">|</span><a rel="nofollow" href="http://game.xiaomi.com/" target="_blank">游戏</a><span class="sep">|</span><a rel="nofollow" href="http://www.duokan.com/" target="_blank">多看阅读</a><span class="sep">|</span><a rel="nofollow" href="https://i.mi.com/" target="_blank">云服务</a><span class="sep">|</span><a rel="nofollow" href="https://jr.mi.com?from=micom" target="_blank">金融</a><span class="sep">|</span><a rel="nofollow" href="//www.mi.com/c/appdownload/" target="_blank">小米网移动版</a><span class="sep">|</span><a rel="nofollow" href="//static.mi.com/feedback/" target="_blank">问题反馈</a><span class="sep">|</span><a rel="nofollow" href="#J_modal-globalSites" data-toggle="modal">Select Region</a>
		</div>
		<div class="topbar-cart" id="J_miniCartTrigger">
			<a rel="nofollow" class="cart-mini" id="J_miniCartBtn" href="//static.mi.com/cart/">
				<i class="iconfont">&#xe60c;</i>
				购物车
				<span class="cart-mini-num J_cartNum"></span>
			</a>
			<div class="cart-menu" id="J_miniCartMenu">
				<div class="loading">
					<div class="loader">
					</div>
				</div>
			</div>
		</div>
		@if (session('user'))
		<div class="topbar-info" id="J_userInfo">
			<span class="user">
				<a rel="nofollow" class="user-name" href="/user" target="_blank" data-stat-id="fa66db4fed0eb581" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-fa66db4fed0eb581', '//my.mi.com/portal', 'pcpid']);">
					<span class="name" id="username"><?php session_start(); echo $_SESSION['user']; ?></span>
				</a>
			</span>
			<span class="sep">|</span>
			<span class="message">
				<a rel="nofollow" href="/message" data-stat-id="7324b7edba019c56" target="_blank" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-7324b7edba019c56', '//order.mi.com/message/list', 'pcpid']);">消息通知<i class="J_miMessageTotal"></i></a>
			</span>
			<span class="sep">|</span>
			<a rel="nofollow" class="link link-order" href="/myOrder" target="_blank" data-stat-id="a9e9205e73f0742c" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-a9e9205e73f0742c', '//static.mi.com/order/', 'pcpid']);">我的订单</a>
			<span class="sep">|</span>
			<a rel="nofollow" class="link link-order" href="/userlogout" data-stat-id="a9e9205e73f0742c" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-a9e9205e73f0742c', '//static.mi.com/order/', 'pcpid']);">退出</a>
		</div>
		@else
		<div class="topbar-info" id="J_userInfo">			
			<a rel="nofollow" class="link" href="{{ URL('/login') }}" data-needlogin="true">登录</a>
			<span class="sep">|</span>
			<a rel="nofollow" class="link" href="{{ URL('/register') }}">注册</a>
		</div>
		@endif
	</div>
</div>
<div class="site-header">
	<div class="container">
		<div class="header-logo">
			<a class="logo ir" href="/" title="小米官网">小米官网</a>
		</div>
		<div class="header-nav">
			<ul class="nav-list J_navMainList clearfix">
				<!-- 全部商品竖向遍历 -->
				<div class="site-category" id="goodsCols" style="margin-left: 29px;margin-top: 13px;"> 
				    <ul id="J_categoryList" class="site-category-list clearfix">
				    	@foreach($list as $v)
				        <li class="category-item">
				            <a class="title" href="#">
				                {{ $v->name }}<i class="iconfont"></i>
				            </a>
				            <div class="children clearfix children-col-3">
				            	<!-- 单列信息 -->
				                <ul class="children-list children-list-col children-list-col-1">
				                	@foreach($data as $vv)
									@if($vv->pid == $v->id && $vv->status == 1)	
				                    <li class="star-goods">
				                        <a class="link" href="{{ URL(('/detail/').($vv->id)) }}">
				                            <img class="thumb" src='{!! asset('Uploads/picture/'."$vv->img") !!}' alt="{{ $vv->name }}" width="40" height="40">
				                            <span class="text">{{ $vv->name }}</span>
				                        </a>
				                        <a class="btn btn-line-primary btn-small btn-buy" href="{{ URL(('/detail/').($vv->id)) }}">
				                            选购
				                        </a>
				                    </li>
				                    @endif
									@endforeach
				                </ul>
				            </div>
				        </li>
				        @endforeach
				    </ul>
				</div>
				<li class="nav-item">
					<a class="link" href="/list">
						<span class="text">
							全部商品
						</span>
						<span class="arrow"></span>
					</a>
				</li>
				<!-- 全部商品横向遍历 -->
				@foreach($list as $v)
				<li class="nav-item">
					<a class="link" href="javascript:void(0);">
						<span class="text">
							{{ $v->name }}
						</span>
						<span class="arrow"></span>
					</a>
					<div class="item-children">
						<div class="container">
							<ul class="children-list clearfix">
							@foreach($data as $vv)
							@if($vv->pid == $v->id && $vv->status == 1)				
								<li class="first">
									<div class="figure figure-thumb">
										<a href="{{ URL(('/detail/').($vv->id)) }}">
											<img src='{!! asset('Uploads/picture/'."$vv->img") !!}' alt="{{ $vv->name }}" width="160" height="110"/>
										</a>
									</div>
									<div class="title">
										<a href="{{ URL(('/detail/').($vv->id)) }}">{{ $vv->name }}</a>
									</div>
									<p class="price">
										 {{ $vv->price }}元起
									</p>
								</li>
							@endif
							@endforeach
							</ul>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="header-search">
			<form id="J_searchForm" class="search-form clearfix" action="/list" method="get">
				<label for="search" class="hide">站内搜索</label>
				<input class="search-text" type="search" id="search" name="s" autocomplete="off"/>
				<input type="submit" class="search-btn iconfont" value="&#xe616;"/>
			</form>
		</div>
	</div>
</div>

@yield('content')

	<div class="site-footer">
		<div class="container">
			<div class="footer-service">
				<ul class="list-service clearfix">
					<li><a rel="nofollow" href="//www.mi.com/static/fast/" target="_blank"><i class="iconfont">&#xe634;</i>预约维修服务</a></li>
					<li><a rel="nofollow" href="//www.mi.com/service/exchange#back" target="_blank"><i class="iconfont">&#xe635;</i>7天无理由退货</a></li>
					<li><a rel="nofollow" href="//www.mi.com/service/exchange#free" target="_blank"><i class="iconfont">&#xe636;</i>15天免费换货</a></li>
					<li><a rel="nofollow" href="//www.mi.com/service/exchange#mail" target="_blank"><i class="iconfont">&#xe638;</i>满150元包邮</a></li>
					<li><a rel="nofollow" href="//www.mi.com/static/maintainlocation/" target="_blank"><i class="iconfont">&#xe637;</i>520余家售后网点</a></li>
				</ul>
			</div>
			<div class="footer-links clearfix">
				<dl class="col-links col-links-first">
					<dt>帮助中心</dt>
					<dd><a rel="nofollow" href="//www.mi.com/service/account/register/" target="_blank">账户管理</a></dd>
					<dd><a rel="nofollow" href="//www.mi.com/service/buy/buytime/" target="_blank">购物指南</a></dd>
					<dd><a rel="nofollow" href="//www.mi.com/service/order/sendprogress/" target="_blank">订单操作</a></dd>
				</dl>
				<dl class="col-links ">
					<dt>服务支持</dt>
					<dd><a rel="nofollow" href="//www.mi.com/service/exchange" target="_blank">售后政策</a></dd>
					<dd><a rel="nofollow" href="http://fuwu.mi.com/" target="_blank">自助服务</a></dd>
					<dd><a rel="nofollow" href="http://xiazai.mi.com/" target="_blank">相关下载</a></dd>
				</dl>
				<dl class="col-links ">
					<dt>线下门店</dt>
					<dd><a rel="nofollow" href="//www.mi.com/c/xiaomizhijia/" target="_blank">小米之家</a></dd>
					<dd><a rel="nofollow" href="//www.mi.com/static/maintainlocation/" target="_blank">服务网点</a></dd>
					<dd><a rel="nofollow" href="//www.mi.com/static/familyLocation/" target="_blank">零售网点</a></dd>
				</dl>
				<dl class="col-links ">
					<dt>关于小米</dt>
					<dd><a rel="nofollow" href="//www.mi.com/about" target="_blank">了解小米</a></dd>
					<dd><a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank">加入小米</a></dd>
					<dd><a rel="nofollow" href="//www.mi.com/about/contact" target="_blank">联系我们</a></dd>
				</dl>
				<dl class="col-links ">
					<dt>关注我们</dt>
					<dd><a rel="nofollow" href="http://e.weibo.com/xiaomishouji" target="_blank">新浪微博</a></dd>
					<dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank">小米部落</a></dd>
					<dd><a rel="nofollow" href="#J_modalWeixin" data-toggle="modal">官方微信</a></dd>
				</dl>
				<dl class="col-links ">
					<dt>特色服务</dt>
					<dd><a rel="nofollow" href="//order.mi.com/queue/f2code" target="_blank">F 码通道</a></dd>
					<dd><a rel="nofollow" href="//www.mi.com/mimobile/" target="_blank">小米移动</a></dd>
					<dd><a rel="nofollow" href="//order.mi.com/misc/checkitem" target="_blank">防伪查询</a></dd>
				</dl>
				<div class="col-contact">
					<p class="phone">
						400-100-5678
					</p>
					<p>
						<span class="J_serviceTime-normal" style=" ">周一至周日 8:00-18:00</span>
						<span class="J_serviceTime-holiday" style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br>
						（仅收市话费）
					</p>
					<a rel="nofollow" class="btn btn-line-primary btn-small" href="//www.mi.com/service/contact" target="_blank"><i class="iconfont">&#xe600;</i> 24小时在线客服</a>
				</div>
			</div>
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="logo ir">
				小米官网
			</div>
			<div class="info-text">
				<p class="sites">
					<a rel="nofollow" href="//www.mi.com/index.html" target="_blank">小米商城</a><span class="sep">|</span><a rel="nofollow" href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a rel="nofollow" href="http://www.miliao.com/" target="_blank">米聊</a><span class="sep">|</span><a rel="nofollow" href="http://www.duokan.com/" target="_blank">多看书城</a><span class="sep">|</span><a rel="nofollow" href="http://www.miwifi.com/" target="_blank">小米路由器</a><span class="sep">|</span><a rel="nofollow" href="http://call.mi.com/" target="_blank">视频电话</a><span class="sep">|</span><a rel="nofollow" href="http://blog.xiaomi.com/" target="_blank">小米后院</a><span class="sep">|</span><a rel="nofollow" href="http://xiaomi.tmall.com/" target="_blank">小米天猫店</a><span class="sep">|</span><a rel="nofollow" href="http://shop115048570.taobao.com" target="_blank">小米淘宝直营店</a><span class="sep">|</span><a rel="nofollow" href="http://union.mi.com/" target="_blank">小米网盟</a><span class="sep">|</span><a rel="nofollow" href="//static.mi.com/feedback/" target="_blank">问题反馈</a><span class="sep">|</span><a rel="nofollow" href="#J_modal-globalSites" data-toggle="modal">Select Region</a>
				</p>
				<p>
					&copy;<a href="//www.mi.com/" target="_blank" title="mi.com">mi.com</a> 京ICP证110507号 京ICP备10046444号 <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank">京公网安备11010802020134号 </a><a rel="nofollow" href="//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank" rel="nofollow">京网文[2014]0059-0009号</a>
					<br>
					 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
				</p>
			</div>
			<div class="info-links">
				<a rel="nofollow" href="//privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&lang=zh-cn" target="_blank"><img rel="nofollow" src="{{  asset('home/Picture/0fa32abd71d7434c81f2c9589d6201a4.gif') }}" alt="TRUSTe Privacy Certification"/></a>
				<a rel="nofollow" href="//search.szfw.org/cert/l/CX20120926001783002010" target="_blank"><img rel="nofollow" src="{{  asset('home/Picture/v-logo-2.png') }}" alt="诚信网站"/></a>
				<a rel="nofollow" href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&ct=df&pa=461082" target="_blank"><img rel="nofollow" src="{{  asset('home/Picture/v-logo-1.png') }}" alt="可信网站"/></a>
				<a rel="nofollow" href="http://www.315online.com.cn/member/315140007.html" target="_blank"><img rel="nofollow" src="{{  asset('home/Picture/v-logo-3.png') }}" alt="网上交易保障中心"/></a>
			</div>
		</div>
		<div class="slogan ir">
			探索黑科技，小米为发烧而生
		</div>
	</div>
	<!-- .xm-dm-error END -->
	<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
		<div class="modal-hd">
			<a class="close" data-dismiss="modal"><i class="iconfont">&#xe602;</i></a>
			<span class="title">Select Region</span>
		</div>
		<div class="modal-bd">
			<h3>Welcome to Mi.com</h3>
			<p class="modal-globalSites-tips">
				Please select your country or region
			</p>
			<p class="modal-globalSites-links clearfix">
				<a href="//www.mi.com/index.html">Mainland China</a>
				<a href="http://www.mi.com/hk/">Hong Kong</a>
				<a href="http://www.mi.com/tw/">Taiwan</a>
				<a href="http://www.mi.com/sg/">Singapore</a>
				<a href="http://www.mi.com/my/">Malaysia</a>
				<a href="http://www.mi.com/ph/">Philippines</a>
				<a href="http://www.mi.com/in/">India</a>
				<a href="http://www.mi.com/id/">Indonesia</a>
				<a href="http://br.mi.com/">Brasil</a>
				<a href="http://www.mi.com/en/">Global Home</a>
				<a href="http://www.mi.com/mena/"> MENA</a>
			</p>
		</div>
	</div>
	<!-- .modal-globalSites END -->
	<script src="/home/js/base.min.js"></script>
	<script>
		(function() {
		    MI.namespace('GLOBAL_CONFIG');
		    MI.GLOBAL_CONFIG = {
		        orderSite: '//order.mi.com',
		        wwwSite: '//www.mi.com',
		        cartSite: '//cart.mi.com',
		        itemSite: '//item.mi.com',
		        assetsSite: '//s01.mifile.cn',
		        listSite: '//list.mi.com',
		        searchSite: '//search.mi.com',
		        mySite: '//my.mi.com',
		        damiaoSite: '//tp.hd.mi.com/',
		        damiaoGoodsId:["2160400006","2160400007","2160700029","2150100003","2154700014","2160400010","2161600033","2162100004","2162800010","1162700001","2155300001","2162900002","2162000035","2162100006","2161400001","2155300002","2163500025","2163500026","2163500027","2163400004","2162900014","2160700028","2163800009","2163800008","2163800007","2163800006","2163800005","2163700032","2162900013","2162900015"],
		        logoutUrl: '//order.mi.com/site/logout',
		        staticSite: '//static.mi.com',
		        quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
		    };
		})();
	</script>
	<script src="/home/js/home.min.js"></script>
	<script src="/home/js/xmsg_ti.js"></script>
	<script>
		var _msq = _msq || [];
		_msq.push(['setDomainId', 100]);
		_msq.push(['trackPageView']);
		(function() {
		    var ms = document.createElement('script');
		    ms.type = 'text/javascript';
		    ms.async = true;
		    ms.src = '//c1.mifile.cn/f/i/15/stat/js/xmst.js';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(ms, s);
		})();
	</script>
</body>
</html>