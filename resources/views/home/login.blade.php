<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="小米帐号能使用小米手机，MIUI，小米云，多看阅读，米聊，小米社区等小米服务。">
<meta name="keywords" content="小米帐号，小米账号，小米注册，注册，Mi Account，Sign in，小米，帐号，账号，小米帐户，登录，登陆，安全令牌，动态口令，小米注册，找回密码">
<link rel="stylesheet" href="./home/css/homeLogin.css">
<script>
	
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>小米帐号 - 登录</title>
</head>
<body class=" zh_cn">
<div class="wrapper">
	<div class="wrap">
		<div class="layout" id="layout">
			<!--表单输入登录-->
			<div class="mainbox" id="login-main">
				<div>
					<a class="ercode" id="qrcode-trigger" href="javascript:void(0)"></a>
				</div>
				<!-- header s -->
				<div class="lgnheader">
					<div class="header_tit t_c">
						<em id="custom_display_1" class="milogo">
						<svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg"><rect width="50" height="50" style="fill:#ef5b00"></rect><rect x="11.25" y="15" width="5" height="20" style="fill:#FFFFFF"></rect><rect x="11.25" y="15" width="12.5" height="5" style="fill:#FFFFFF"></rect><rect x="26.25" y="22.5" width="5" height="12.5" style="fill:#FFFFFF"></rect><rect x="33.75" y="15" width="5" height="20" style="fill:#FFFFFF"></rect><circle cx="23.75" cy="22.5" r="7.5" fill="#FFFFFF"></circle><rect x="16.25" y="20" width="7.5" height="15" style="fill:#ef5b00"></rect><rect x="16.25" y="22.5" width="10" height="12.5" style="fill:#ef5b00"></rect><circle cx="23.75" cy="22.5" r="2.5" fill="#ef5b00"></circle><rect x="18.75" y="22.5" width="5" height="12.5" style="fill:#FFFFFF"></rect></svg>
						</em>
						<h4 class="header_tit_txt" id="login-title">小米帐号登录</h4>
						<div class=" site_info">
						</div>
					</div>
				</div>
				<!-- header e -->
				<div>
					<div class="login_area">
						<form action="/login" method="post" id="login-main-form">
							<input type='hidden' name='_token' value={{ csrf_token() }}>
							<div class="loginbox c_b">
								<!-- 输入框 -->
								<div class="lgn_inputbg c_b">
									<!--验证用户名-->
									<div class="single_imgarea" id="account-info">
										<div class="na-img-area" id="account-avator" style="display:none">
											<div class="na-img-bg-area" id="account-avator-con">
											</div>
										</div>
										<p class="us_name" id="account-displayname">
										</p>
										<p class="us_id">
										</p>
									</div>
									<label id="region-code" class="labelbox login_user c_b" for="">
									<div class="turn_area">
										<a class="btn_turn" id="manual_code" href="javascript:void(0);" title="关闭国家码"></a>
									</div>
									<div class="country_list">
										<div class="animation countrycode_selector" id="countrycode_selector">
											<span class="country_code"><tt class="countrycode-value" id="countrycode_value"></tt><i class="icon_arrow_down"></i></span>
										</div>
									</div>
									<input class="item_account" autocomplete="off" type="text" name="user" id="username" placeholder="用户名">
									</label>
									<div class="country-container" id="countrycode_container" style="display: none;">
									</div>
									<label class="labelbox pwd_panel c_b">
									<div class="eye_panel pwd-visiable">
										<i class="eye pwd-eye">
										<svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
										<path class="eye_outer" d="M0 8 C6 0,14 0,20 8, 14 16,6 16, 0 8 z"></path>
										<circle class="eye_inner" cx="10" cy="8" r="3"></circle>
										</svg>
										</i>
									</div>
									<input type="password" placeholder="密码" autocomplete="off" name="pwd" id="pwd">
									<input type="text" placeholder="密码" autocomplete="off" id="visiablePwd" style="display:none">
									</label>
								</div>
								@if(session("msg"))
						            <span style="color:red">{{session("msg")}}</span>
						        @endif
								<div class="btns_bg">
									<input class="btnadpt btn_orange" id="login-button" type="submit" value="立即登录">
									<span id="custom_display_8" class="sns-default-container sns_default_container" style="display: none;">
									</span>
								</div>
								<!-- 其他登录方式 s -->
								<!--
									 <div style="display: block;" class="other_login_type sns-login-container" id="custom_display_16">
									<fieldset class="oth_type_tit">
										<legend align="center" class="oth_type_txt">其他方式登录</legend>
									</fieldset>
									<div class="oth_type_links">
										<a class="icon_type btn_qq sns-login-link" data-type="qq" href="https://account.xiaomi.com/pass/sns/login/auth?appid=100284651&&callback=http%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttp%253A%252F%252Fwww.mi.com%252Findex.html%26sign%3DNDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ%2C%2C&sid=mi_eshop" title="QQ登录" target="_blank"><i class="btn_sns_icontype icon_default_qq"></i></a>
										<a class="icon_type btn_weibo sns-login-link" data-type="weibo" href="https://account.xiaomi.com/pass/sns/login/auth?appid=2996826273&&callback=http%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttp%253A%252F%252Fwww.mi.com%252Findex.html%26sign%3DNDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ%2C%2C&sid=mi_eshop" title="微博登录" target="_blank"><i class="btn_sns_icontype icon_default_weibo"></i></a>
										<a class="icon_type btn_alipay sns-login-link" data-type="alipay" href="https://account.xiaomi.com/pass/sns/login/auth?appid=2088011127562160&&callback=http%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttp%253A%252F%252Fwww.mi.com%252Findex.html%26sign%3DNDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ%2C%2C&sid=mi_eshop" title="支付宝登录" target="_blank"><i class="btn_sns_icontype icon_default_alipay"></i></a>
										<a class="icon_type btn_weixin sns-login-link" data-type="weixin" href="javascript:void(0)" title="微信登录" style="display: none;"><i class="btn_sns_icontype icon_default_weixin"></i></a>
									</div>
								</div> 
								-->
							</div>
						</form>
					</div>
				</div>
				<!-- 其他登录方式 e -->
				<div class="n_links_area" id="custom_display_64">
					<a class="outer-link" href="/register">注册小米帐号</a><span>|</span>
					<a class="outer-link" href="https://account.xiaomi.com/pass/forgetPassword?callback=http%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttp%253A%252F%252Fwww.mi.com%252Findex.html%26sign%3DNDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ%2C%2C&sid=mi_eshop">忘记密码？</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="custom_display_4" class="n-footer">
	<div class="nf-link-area clearfix">
		<ul class="lang-select-list">
			<li><a href="javascript:void(0)" data-lang="zh_CN" class="lang-select-li current">简体</a>|</li>
			<li><a href="https://account.xiaomi.com/pass/serviceLogin?callback=http%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttp%253A%252F%252Fwww.mi.com%252Findex.html%26sign%3DNDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ%2C%2C&sid=mi_eshop&_locale=zh_TW" data-lang="zh_TW" class="lang-select-li">繁体</a>|</li>
			<li><a href="https://account.xiaomi.com/pass/serviceLogin?callback=http%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttp%253A%252F%252Fwww.mi.com%252Findex.html%26sign%3DNDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ%2C%2C&sid=mi_eshop&_locale=en" data-lang="en" class="lang-select-li">English</a>|</li>
			<li><a href="http://static.account.xiaomi.com/html/faq/faqList.html" target="_blank">常见问题</a></li>
		</ul>
	</div>
	<p class="nf-intro">
		<span>小米公司版权所有-京ICP备10046444-<a class="beian-record-link" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134">京公网安备11010802020134号</a>-京ICP证110507号</span>
	</p>
</div>
</body>
</html>