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
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/bootstrap-modal.js"></script>
@endsection
@section('content')
<meta name='_token' content="{{ csrf_token() }}">
<div class="n-frame">
  <div class="title-item title_security_wap">
    <h4 class="title-big dis-inb">
      安全等级
    </h4>
    <em class="space6">
    </em>
    <p class="font-normal dis-inb wap_colb2">
      <em class="light-num" style="padding:0">
        <span class="score_1">
          50
        </span>
      </em>
      分
    </p>
    <div class="slider-area dis-inb vert-m" style="width:360px;">
      <div class="slider-bar-bg">
      </div>
      <div class="slider-bar-line score_bg_1" style="width:50%;">
      </div>
      <em class="drag-ico" style="left:50%">
      </em>
    </div>
    <p class="font-normal dis-inb security_level_txt">
      <span class="score_outer_1">
        存在
        <em class="light-num">
          2
        </em>
        项风险
      </span>
    </p>
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
        <a href="#" class="n-btn" id="editInfo" data-toggle="modal" data-target="#myModal">
          修改
        </a>
      </div>
    </li>
    <li id="changeEmail" class="click-row">
      <div class="font-img-item clearfix">
        <em class="fi-ico fi-ico-email">
        </em>
        <p class="title-normal dis-inb">
          安全邮箱
        </p>
        <span class="warning-tip">
          &nbsp;
        </span>
        <span class="title-normal wap-desc">
          <span class="color-active">
            未绑定
          </span>
        </span>
        <p class="font-default color-active">
          安全邮箱将可用于登录小米帐号和重置密码，建议立即设置
        </p>
        <i class="arrow_r">
        </i>
      </div>
      <div class="ada-btn-area" id="btnUpdateEmail">
        <!--无地址-->
        <a __href="/pass/bindAddress?userId=1157822905&amp;type=EM&amp;replace=false&amp;address="
        class="n-btn">
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
        <span class="title-normal wap-desc">
          180******14
          <span class="ph_list_sum phone-list-sum" data-title="等&lt;span class=&#39;ff6&#39;&gt;{phsum}&lt;/span&gt;个">
          </span>
        </span>
        <div class="wap-info">
          180******14
        </div>
        <p class="font-default">
          安全手机可以用于登录小米帐号，重置密码或其他安全验证
        </p>
        <i class="arrow_r">
        </i>
      </div>
      <div class="ada-btn-area" id="btnUpdatePhone">
        <a class="n-btn btnBindMobile" __href="/pass/bindAddress?userId=1157822905&amp;type=PH&amp;replace=false"
        data-mode="add">
          添加
        </a>
        <a class="n-btn btnChangeMobile" __href="/pass/bindUserAddress?userId=1157822905&amp;type=PH"
        data-mode="update">
          修改
        </a>
      </div>
    </li>
    <li id="setMibao" class="click-row">
      <div class="font-img-item clearfix">
        <em class="fi-ico fi-ico-secret">
        </em>
        <p class="title-normal dis-inb">
          密保问题
        </p>
        <span class="warning-tip">
          &nbsp;
        </span>
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
<!-- <div class="modal fade popup_mask" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="bkc"></div>
  <div class="mod_wrap">
    <div id="popUpdatePassword" class="mod_acc_tip" style="display:none;">
      <div class="mod_tip_hd">
        <h4>修改密码</h4>
        <a class="btn_mod_close" href="" title=""><span>关闭</span></a>
      </div>
      <div class="mod_tip_bd">
        <div class="modify_pwd">
          <dl>
            <dt>原密码</dt>
            <dd class="grpOldPass">
              <label class="labelbox">
                <input class="oldPass" type="password" placeholder="输入原密码" autocomplete="off" disableautocomplete="">
              </label>
            </dd>
            <dt>新密码</dt>
            <dd class="grpNewPass">
              <label class="labelbox">
                <input class="newPass" type="password" placeholder="输入新密码" autocomplete="off" disableautocomplete="">
              </label>
              <label class="labelbox">
                <input class="newPass2" type="password" placeholder="重复新密码" autocomplete="off" disableautocomplete="">
              </label>           
            </dd>
          </dl>       
        </div>
        <div class="tip_btns">
          <a class="btn_tip btn_commom btnOK" href="" title="确定">确定</a>
          <a class="btn_tip btn_back btnCancel" href="" title="取消">取消</a>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- 修改密码 e -->

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
                <label class="labelbox">
                  <input class="newPass" type="password" placeholder="输入新密码" autocomplete="off" disableautocomplete="">
                </label>
                <br>
                确认密码:&nbsp;<label class="labelbox">
                  <input class="newPass2" type="password" placeholder="重复新密码" autocomplete="off" disableautocomplete="">
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
<script>
  $("input[name='prePwd']").focus(function(){
    $("input[name='but']").attr('disabled',false);
    $('label[id="prepwd"]').next('span').remove();
  }).blur(function(){
    $('label[id="prepwd"]').next('span').remove();
    var v = $(this).val();
    alert(v);
    if(v == ''){
      $("<span>　原密码不能为空</span>").css('color','red').insertAfter('label[id="prepwd"]');
      $("input[name='but']").attr('disabled',true);
    }
  });
  var v = $("input[name='prePwd']").val();
  // .ajax({
  //   type:'POST',
  //   url:'/pwd',
  //   data:{password:v},
  //   dataType:'json',
  //   header:{
  //     'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
  //   },
  //   success:function(data){
  //     alert('ok');
  //   },
  //   error:function(xhr,type){
  //     alert('error');
  //   }
  // });
</script>
@endsection
