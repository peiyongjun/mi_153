@extends('home.user.userInfo')
@section("css")
<style>
    #info a{
        color:#FF6700;
    }
</style>
<link rel="stylesheet" type="text/css" href="/home/css/bootstrap.css">
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/bootstrap-modal.js"></script>
@endsection
@section('content')
<div class="n-frame">
	<div class="uinfo c_b">
		<div class="">
			<div class="main_l">
				<div class="naInfoImgBox t_c">
					<div class="na-img-area marauto">
						<!--na-img-bg-area不能插入任何子元素-->
						<div class="na-img-bg-area">
							@if (!empty($user->photo))
							<img src="./home/Photo/{{ $user->photo }}">
							@else
							<img src="./home/Photo/default.jpg">
							@endif
						</div>
						<em class="na-edit">
						</em>
					</div>
					<div class="naImgLink">
						<a class="color4a9" href="" title="设置头像" id="editInfo" data-toggle="modal"
						data-target="#myModal">
							设置头像
						</a>
					</div>
				</div>
			</div>
			<div class="main_r">
				<div class="framedatabox">
					<div class="fdata">
						<a class="color4a9 fr" href='#' title="编辑" id="editInfo" data-toggle="modal"
						data-target="#setModal">
							<i class="iconpencil">
							</i>
							编辑
						</a>
						<h3>
							基础资料
						</h3>
					</div>
					<div class="fdata lblnickname">
						<p>
							<span>
								姓名：
							</span>
							<span class="value" _empty="">
								<span style="color:#999;">
									{{ $user->name }}
								</span>
							</span>
					</div>
					<div class="fdata lblbirthday">
						<p>
							<span>
								生日：
							</span>
							<span class="value">
								{{ $user->birthday }}
							</span>
						</p>
					</div>
					<div class="fdata lblgender">
						<p>
							<span>
								性别：
							</span>
							<span class="value">
								{{ $user->sex?"男":"女" }}
							</span>
						</p>
					</div>
					<div class="btn_editinfo">
						<a id="editInfoWap" class="btnadpt bg_normal" href="">
							编辑基础资料
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="logout_wap">
			<a class="btnadpt bg_white" href="/pass/logout?userId=1157822905&amp;callback=https://account.xiaomi.com">
				退出
			</a>
		</div>
	</div>
</div>
<!-- 编辑个人信息资料 s -->
<div class="modal fade" id="setModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					编辑基础资料
				</h4>
			</div>
			<div class="modal-body">
				<form action="{{ URL('/Info') }}" method="post" name="reg_testdate">
					<input type='hidden' name='_token' value="{{ csrf_token() }}">
					<input type='hidden' name='id' value="{{ session()->get('user')['id']}}">
					<div class="wapbox editbasicinfo">
						<ul class="">
							<li>
								姓名：
								<input class="nickname" type="text" name="nickname" maxlength="20" placeholder="姓名"
								value="{{ $user->name }}">
							</li>
							<br>
							<li>
								生日：
								<select name="YYYY" onChange="YYYYDD(this.value)" id='y' style="width:90px">
									<option value="">
										年
									</option>
								</select>
								<select name="MM" onChange="MMDD(this.value)" id='m' style="width:90px">
									<option value="">
										月
									</option>
								</select>
								<select name="DD" style="width:90px" id='d'>
									<option value="">
										日
									</option>
								</select>
							</li>
							<br>
							<li>
								性别：
								<input type="radio" name="sex" value='1' {{ $user->
								sex ? 'checked':'' }}>男
								<input type="radio" name="sex" value='0' {{ $user->
								sex ? '':'checked' }}>女
							</li>
						</ul>
					</div>
					<div class="tip_btns">
						<!-- <a class="btn_tip btn_commom" href="" title="保存">保存</a> -->
						<input class="btn_tip btn_commom" type="submit" value="保存">
						<a class="btn_tip btn_back" href="" title="取消">
							取消
						</a>
					</div>
				</form>
			</div>
			<!-- <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			<button type="button" class="btn btn-primary">提交更改</button>
			</div> -->
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>
<!-- 编辑个人信息资料 e -->
<!-- 设置头像 s -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					头像设置
				</h4>
			</div>
			<div class="modal-body">
				<form action="{{ URL('/doUpload') }}" method="POST" enctype="multipart/form-data"
				id="photoUploader">
					<input type='hidden' name="_token" value="{{ csrf_token() }}">
					<input type='hidden' name='id' value="{{ session()->get('user')['id'] }}">
					<div class="wapbox accset">
						<dl>
							<dt>
								<strong class="wap_title_big">
									请上传图片：
								</strong>
							</dt>
							<dd>
								<div class="uplode_img">
									<input name="upload" type="file" autocomplete="off" disableautocomplete="">
									<input class="btn_tip btn_commom" type="submit" value="上传头像">
								</div>
								<p>
									jpg 或 png，大小不超过2M
								</p>
							</dd>
						</dl>
					</div>
					<div class="tip_btns">
						<!-- <input class="btn_tip btn_commom" type="submit" value="保存"> -->
						<a class="btn_tip btn_back" href="" title="取消">
							取消
						</a>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>
<!-- 设置头像 e -->
<script language="JavaScript">
	function YYYYMMDDstart() {
		MonHead = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
		//先给年下拉框赋内容   
		var y = {{$birthday == '111' ? date("Y", time()) : $birthday[0]}};
		for (var i = (y - 30); i < (y + 30); i++) { //以今年为准，前30年，后30年   
			document.reg_testdate.YYYY.options.add(new Option(" " + i + " 年", i));
		}
		//赋月份的下拉框   
		for (var i = 1; i < 13; i++) {
			document.reg_testdate.MM.options.add(new Option(" " + i + " 月", i));
		}
		document.reg_testdate.YYYY.value = y;
		document.reg_testdate.MM.value = {{$birthday == '111' ? date("m", time()) : $birthday[1]}};
		var n = MonHead[new Date().getMonth()];
		if (new Date().getMonth() == 1 && IsPinYear(YYYYvalue)) n++;
		writeDay(n); //赋日期下拉框Author:meizz   
		document.reg_testdate.DD.value = {{$birthday == '111' ? date("d", time()) : $birthday[2]}};
	}
	if (document.attachEvent) window.attachEvent("onload", YYYYMMDDstart);
	else window.addEventListener('load', YYYYMMDDstart, false);

	function YYYYDD(str) //年发生变化时日期发生变化(主要是判断闰平年)   
	{
		var MMvalue = document.reg_testdate.MM.options[document.reg_testdate.MM.selectedIndex].value;
		if (MMvalue == "") {
			var e = document.reg_testdate.DD;
			optionsClear(e);
			return;
		}
		var n = MonHead[MMvalue - 1];
		if (MMvalue == 2 && IsPinYear(str)) n++;
		writeDay(n)
	}

	function MMDD(str) //月发生变化时日期联动   
	{
		var YYYYvalue = document.reg_testdate.YYYY.options[document.reg_testdate.YYYY.selectedIndex].value;
		if (YYYYvalue == "") {
			var e = document.reg_testdate.DD;
			optionsClear(e);
			return;
		}
		var n = MonHead[str - 1];
		if (str == 2 && IsPinYear(YYYYvalue)) n++;
		writeDay(n)
	}

	function writeDay(n) //据条件写日期的下拉框   
	{
		var e = document.reg_testdate.DD;
		optionsClear(e);
		for (var i = 1; i < (n + 1); i++) e.options.add(new Option(" " + i + " 日", i));
	}

	function IsPinYear(year) //判断是否闰平年   
	{
		return (0 == year % 4 && (year % 100 != 0 || year % 400 == 0));
	}

	function optionsClear(e) {
		e.options.length = 1;
	}
</script>
@endsection

