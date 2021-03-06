<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>小米商城 后台登录</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="{{ asset('admin/assets/css/font-Open-Sans.css') }}" />

		<!-- ace styles -->

		<link rel="stylesheet" href="{{ asset('admin/assets/css/ace.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('admin/assets/css/ace-rtl.min.css') }}" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="admin/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="admin/assets/js/html5shiv.js"></script>
		<script src="admin/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">小米商城后台登录</span>
								</h1>
								<h4 class="blue">&copy; 小米商城</h4>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												请输入管理员信息
											</h4>

											<div class="space-6"></div>

											<form method="post" action="">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Username" />
															<input type="hidden" name="_token" value="{{ csrf_token() }}" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>
													<div class="space"></div>
													@if(session("msg"))
											            <span style="color:red">{{session("msg")}}</span>
											        @endif
											        <div class="row">
											            <label class="col-xs-6 block clearfix">
											              <!-- 验证码框 -->
											              <span class="form-group input-icon input-icon-right">
											                <input type="text" class="form-control" placeholder="Code" name="icode">
											                <i class="icon-th"></i>
											              </span>
											            </label>
											            <span class="col-xs-6">
											              	<!-- 验证码图片 -->
											              	<img id="code" alt="图片验证码"  title="看不清换一张" src="{{ URL('/captcha/time()') }}" onclick="this.src='{{ URL('/captcha') }}/'+Math.random()">
											            </span>
											        </div>
													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															登录
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /widget-main -->
									</div><!-- /widget-body -->
								</div><!-- /login-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->
</body>
</html>
