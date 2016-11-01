<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<meta name="_token" content="{{ csrf_token() }}"/>
	<title>小米帐号 - 注册</title>
	<link type="text/css" rel="stylesheet" href="home/css/reset.css">
	<link type="text/css" rel="stylesheet" href="home/css/layout.css">
	<link type="text/css" rel="stylesheet" href="home/css/registerpwd.css">
	<script type="text/javascript" src='home/js/jquery-1.8.3.js'></script>
</head>
<body class="zh_CN">
	<div class="wrapper">
		<div class="wrap">
			<div class="layout">
				<div class="n-frame device-frame reg_frame" id="main_container">
					<div class="external_logo_area">
						<a class="milogo" href="javascript:void(0)">
						</a>
					</div>
					<div class="title-item t_c">
						<h4 class="title_big30">注册小米帐号</h4>
					</div>
					<div id="register_form">
						<form action="/register" method="post" name='myform'>
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>
							<div class="phone_step1">
								<div class="inputbg">
									<label class="labelbox" id='checkname' for="">
										<input type="tel" name="username" data-type="PH" placeholder="用户名">
									</label>
								</div>
								<div class="inputbg">
									<label class="labelbox" id="checkemail" for="">
										<input type="tel" name="email" data-type="PH" placeholder="请输入邮箱地址">
									</label>
									<a onclick="sendEmail();">发送邮件验证码</a>
								</div>
								
								<div class="inputbg">
									<label class="labelbox" id="checkemail" for="">
										<input type="tel" name="ecode" data-type="PH" placeholder="请输入邮箱验证码">
									</label>
									@if(session('emsg'))
										{{ session('emsg') }}
									@endif
								</div>
								<div class="inputbg">
									<label class="labelbox" id="checkpass" for="">
										<input type="password" name="password" data-type="PH" placeholder="请输入密码">
									</label>
								</div>
								<div class="inputbg">
									<label class="labelbox" id="repass" for="">
										<input type="password" name="repass" data-type="PH" placeholder="再次确认密码">
									</label>
								</div>
								<div class="inputbg inputcode dis_box" id="checkcode">
									<label class="labelbox" for="">
										<input class="code" type="text" name="icode" autocomplete="off" placeholder="图片验证码">
									</label>
									<img id="code" alt="图片验证码" title="看不清换一张" src="{{ URL('/captcha/time()') }}" onclick="this.src='{{ URL('/captcha') }}/'+Math.random()">
								</div>
								@if(session('msg'))
									<p class="login-box-msg" style="color:red;">
										{{ session('msg') }}
									</p>
								@endif
								<div class="err_tip send-left-times">
								</div>
								<div class="fixed_bot mar_phone_dis1">
									<div id='btn'>
										<input class="btn332 btn_reg_1 submit-step" name='but' disabled="disabled" data-to="phone-step2" type="submit" value="立即注册">
									</div>
									<p class="msg">
										点击“立即注册”，即表示您同意并愿意遵守小米
										<a href="#">用户协议</a>和<a href="#">隐私政策</a>
									</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="n-footer">
		<div class="nf-link-area clearfix">
			<ul class="lang-select-list">
				<li>
					<a class="lang-select-li" href="#">简体</a>|
				</li>
				<li>
					<a class="lang-select-li" href="#">繁体</a>|
				</li>
				<li>
					<a class="lang-select-li" href="#">English</a>
				</li>|
				<li>
					<a class="a_critical" href="#">常见问题</a>
				</li>
			</ul>
		</div>
		<p class="nf-intro">
			<span>小米公司版权所有-京ICP备10046444-京公网安备11010802020134号-京ICP证110507号</span>
		</p>
	</div>
</body>
<script type="text/javascript" src='home/js/register.js'></script>
<script type="text/javascript">
	function sendEmail ()
	{
		var email = $("input[name='email'").val();
		$.ajax({
			type:"post",
			data:{email:email},
			headers:{
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
			url:"/sendEmail",
			dataType:'json'
		});
	}
</script>
</html>