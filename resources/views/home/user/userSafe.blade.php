@extends('home.user.userInfo')
@section("css2")
<link rel="stylesheet" type="text/css" href="/home/css/bootstrap.css">
@endsection
@section('css')
<style>
    #safe a{
        color:#FF6700;
    }
</style>
<script src = "/home/js/ajax.js"></script>
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/bootstrap-modal.js"></script>
@endsection
@section('content')
<div class="n-frame">
  <div class="title-item title_security_wap">
    <h4 class="title-big dis-inb">
      安全设置
    </h4>
  </div>
  <ul class="device-detail-area">
    <li id="changePassword" class="click-row">
      <div class="font-img-item clearfix">
        <em class="fi-ico fi-ico-lock">
        </em>
        <p class="title-normal dis-inb">
          帐号密码
        </p>
        <p class="font-default">
          用于保护帐号信息和登录安全
        </p>
        <span class="title-normal wap-desc">
          修改
        </span>
        <i class="arrow_r">
        </i>
      </div>
      <div class="ada-btn-area" id="btnUpdatePassword">
        <a href="#" class="n-btn" id="uPwd" data-toggle="modal" data-target="#myModal">
          修改
        </a>
      </div>
    </li>
    <li id="changeEmail" class="click-row">
      <div class="font-img-item clearfix">
        <em class="fi-ico fi-ico-email">
        </em>
        <p class="title-normal dis-inb">
          修改邮箱
        </p>
        @if(empty($user->email))
        <span class="warning-tip">
          &nbsp;
        </span>
        @endif
        <p class="font-default color-active">
          安全邮箱将可用于登录小米帐号和重置密码，建议立即设置
        </p>
        <i class="arrow_r">
        </i>
      </div>
      <div class="ada-btn-area" id="btnUpdateEmail">
        <!--无地址-->
        <a href="#" class="n-btn" id="editInfo" data-toggle="modal" data-target="#emailModal">
          绑定
        </a>
      </div>
    </li>
    <li id="changeMobile" class="click-row">
      <div class="font-img-item clearfix">
        <em class="fi-ico fi-ico-phone">
        </em>
        <p class="title-normal dis-inb">
          安全手机
        </p>
        @if(empty($user->phone))
        <span class="warning-tip">
          &nbsp;
        </span>
        @endif
        <p class="font-default" style='color:#FF6600'>
          安全手机可以用于登录小米帐号，重置密码或其他安全验证
        </p>
        <i class="arrow_r">
        </i>
      </div>
      @if(empty($user->phone))
      <div class="ada-btn-area" id="btnUpdatePhone">
        <a class="n-btn btnBindMobile" href="#" class="n-btn" id="editInfo" data-toggle="modal" data-target="#phoneModal">
          添加
        </a>
      </div>
      @else
      <div class="ada-btn-area" id="btnUpdatePhone">
        <a class="n-btn btnBindMobile" href="#" class="n-btn" id="editInfo" data-toggle="modal" data-target="#upPhoneModal">
          修改
        </a>
      </div>
      @endif
    </li>
    <li id="setMibao" class="click-row">
      <div class="font-img-item clearfix">
        <em class="fi-ico fi-ico-secret">
        </em>
        <p class="title-normal dis-inb">
          密保问题
        </p>
        <p class="font-default color-active">
          密保问题用于安全验证，建议立即设置
        </p>
        <span class="title-normal wap-desc color-active">
          未设置
        </span>
        <i class="arrow_r">
        </i>
      </div>
      <div class="ada-btn-area" id="btnSetMibao">
        <a id="mibao_link" __href="https://sq.id.mi.com/setQuestion?userId=1157822905&amp;_locale=zh_CN"
        class="n-btn">
          设置
        </a>
      </div>
    </li>
  </ul>
</div>
<!-- 修改密码 s -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          修改密码
        </h4>
      </div>
      <div class="modal-body">
        <form action="{{ URL('/pwd') }}" method="post" name="reg_testdate">
          <input type='hidden' name='_token' value="{{ csrf_token() }}">  
          <input type='hidden' name='id' value="{{ session()->get('user')['id']}}">
          <div class="wapbox editbasicinfo modify_pwd">
            <ul>
              <li>
                原密码:　
                <label class="labelbox" id="prepwd">
                  <input class="oldPass" name="prePwd" type="password" placeholder="输入原密码" autocomplete="off" disableautocomplete="">
                </label>
              </li>
              <li>
                新密码:　
                <label class="labelbox" id="newpwd">
                  <input class="newPass" name="newpwd" type="password" placeholder="输入新密码" autocomplete="off" disableautocomplete="">
                </label>
                <br>
                确认密码:&nbsp;<label class="labelbox" id="conpwd">
                  <input class="newPass2" name="conpwd" type="password" placeholder="重复新密码" autocomplete="off" disableautocomplete="">
                </label>
              </li>
            </ul>
          </div>
          <div class="tip_btns">
            <input class="btn_tip btn_commom btnOK" name='but' type='submit' value="确定">
            <a class="btn_tip btn_back btnCancel" href="" title="取消">
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
<!-- 修改密码 e -->

<!-- 修改邮箱 s -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          修改邮箱
        </h4>
      </div>
      <div class="modal-body">
        <form action="{{ URL('/email') }}" method="post" name="reg_testdate">
          <input type='hidden' name='_token' value="{{ csrf_token() }}">  
          <input type='hidden' name='id' value="{{ session()->get('user')['id']}}">
          <div class="wapbox editbasicinfo modify_pwd">
            <ul>
              <li>
                邮箱:　
                <label class="labelbox" id="email">
                  <input class="oldPass" name="email" type="text" value="{{ $user->email }}" autocomplete="off" disableautocomplete="">
                </label>
              </li>
            </ul>
          </div>
          <div class="tip_btns">
            <input class="btn_tip btn_commom btnOK" name='con' type='submit' value="确定">
            <a class="btn_tip btn_back btnCancel" href="" title="取消">
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
<!-- 修改邮箱 e -->

<!-- 添加手机号 s -->
<div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          添加手机
        </h4>
      </div>
      <div class="modal-body">
        <form action="{{ URL('/phone') }}" method="post" name="reg_testdate">
          <input type='hidden' name='_token' value="{{ csrf_token() }}">  
          <input type='hidden' name='id' value="{{ session()->get('user')['id']}}">
          <div class="wapbox editbasicinfo modify_pwd">
            <ul>
              <li>
                手机:　
                <label class="labelbox" id="phone">
                  @if(empty($user->phone))
                  <input class="oldPass" name="phone" type="text" value="" autocomplete="off" disableautocomplete="">
                  @else
                  <input class="oldPass" name="phone" type="text" value="{{ $user->phone }}" autocomplete="off" disableautocomplete="">
                  @endif
                </label>
              </li>
            </ul>
          </div>
          <div class="tip_btns">
            <input class="btn_tip btn_commom btnOK" name='pon' type='submit' value="确定">
            <a class="btn_tip btn_back btnCancel" href="" title="取消">
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
<!-- 添加手机号 e -->

<!-- 修改手机号 s -->
<div class="modal fade" id="upPhoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          修改手机
        </h4>
      </div>
      <div class="modal-body">
        <form action="{{ URL('/updatePhone') }}" method="post" name="reg_testdate">
          <input type='hidden' name='_token' value="{{ csrf_token() }}">  
          <input type='hidden' name='id' value="{{ session()->get('user')['id']}}">
          <div class="wapbox editbasicinfo modify_pwd">
            <ul>
              <li>
                手机:　
                <label class="labelbox" id="upphone">
                  @if(empty($user->phone))
                  <input class="oldPass" name="upphone" type="text" value="" autocomplete="off" disableautocomplete="">
                  @else
                  <input class="oldPass" name="upphone" type="text" value="{{ $user->phone }}" autocomplete="off" disableautocomplete="">
                  @endif
                </label>
              </li>
            </ul>
          </div>
          <div class="tip_btns">
            @if(empty($user->phone))
            <input class="btn_tip btn_commom btnOK" name='upon' type='submit' value="确定" disabled='disabled'>
            @else
            <input class="btn_tip btn_commom btnOK" name='upon' type='submit' value="确定">
            @endif
            <a class="btn_tip btn_back btnCancel" href="" title="取消">
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
<!-- 修改手机号 e -->

<script>
  $("input[name='prePwd']").focus(function(){
    $("input[name='but']").attr('disabled',false);
    $('label[id="prepwd"]').next('span').remove();
  }).blur(function(){
    $('label[id="prepwd"]').next('span').remove();
    var v = $(this).val();
    // alert("{{ csrf_token() }}");
    if(v == ''){
      $("<span>　原密码不能为空</span>").css('color','red').insertAfter('label[id="prepwd"]');
      $("input[name='but']").attr('disabled',true);
    }
  });

  $("input[name='newpwd']").focus(function(){
    $('label[id="newpwd"]').next('span').remove();
    $("input[name='but']").attr('disabled',false);
  }).blur(function(){
    $('label[id="newpwd"]').next('span').remove();
    var v = $(this).val();
    if(v == ''){
      $("<span>　密码不能为空</span>").css('color','red').insertAfter('label[id="newpwd"]');
      $("input[name='but']").attr('disabled',true);
    };
  });

  $("input[name='conpwd']").focus(function(){
    $('label[id="conpwd"]').next('span').remove();
    $("input[name='but']").attr('disabled',false);
  }).blur(function(){
    $('label[id="conpwd"]').next('span').remove();
    var v = $(this).val();
    var nv = $("input[name='newpwd']").val();
    if(v == ''){
      $("<span>　密码不能为空</span>").css('color','red').insertAfter('label[id="conpwd"]');
      $("input[name='but']").attr('disabled',true);
    };
    if(v !== nv){
    	$("<span>　密码不一致</span>").css('color','red').insertAfter('label[id="conpwd"]');
      $("input[name='but']").attr('disabled',true);
    }
  });

  $(function($){
  	if("{{ session()->get('imsg') }}"){
  		$("#uPwd").click();
		$("<span>　{{ session()->get('imsg') }}</span>").css('color','red').insertAfter('label[id="prepwd"]');
		$("input[name='but']").attr('disabled',true);
  		
  	}
  });

  $("input[name='email']").focus(function(){
    $('label[id="email"]').next('span').remove();
    $("input[name='con']").attr('disabled',false);
  }).blur(function(){
    $('label[id="email"]').next('span').remove();
    var v = $(this).val();
    if(v == ''){
      $("<span>　邮箱地址不能为空</span>").css('color','red').insertAfter('label[id="email"]');
      $("input[name='con']").attr('disabled',true);
    }else if(v.match(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/) == null){
      $("<span>　邮箱地址不规范</span>").css('color','red').insertAfter('label[id="email"]');
      $("input[name='con']").attr('disabled',true);
    };
  });

   $("input[name='phone']").focus(function(){
    $('label[id="phone"]').next('span').remove();
    $("input[name='pon']").attr('disabled',false);
  }).blur(function(){
    $('label[id="phone"]').next('span').remove();
    var v = $(this).val();
    if(v == ''){
      $("<span>　手机号不能为空</span>").css('color','red').insertAfter('label[id="phone"]');
      $("input[name='pon']").attr('disabled',true);
    }else if(v.match(/^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/) == null){
      $("<span>　手机号格式不正确</span>").css('color','red').insertAfter('label[id="phone"]');
      $("input[name='pon']").attr('disabled',true);
    };
  });

  $("input[name='upphone']").focus(function(){
    $('label[id="upphone"]').next('span').remove();
    $("input[name='upon']").attr('disabled',false);
  }).blur(function(){
    $('label[id="upphone"]').next('span').remove();
    var v = $(this).val();
    if(v == ''){
       $("<span>　手机号不能为空</span>").css('color','red').insertAfter('label[id="phone"]');
      $("input[name='pon']").attr('disabled',true);
    }else if(v.match(/^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/) == null){
      $("<span>　手机号格式不正确</span>").css('color','red').insertAfter('label[id="upphone"]');
      $("input[name='upon']").attr('disabled',true);
    };
  });

</script>
@endsection
