<!DOCTYPE html>
<!-- saved from url=(0068)https://account.xiaomi.com/pass/auth/security/home?userId=1157822905 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>小米帐号 - 帐号安全</title>
<script>
  var userPhoneList=[];
  userPhoneList.push({address:"180******14",key:"ADA1147053FB9328"});
</script>
<link type="text/css" rel="stylesheet" href="/home/css/reset.css">
<link type="text/css" rel="stylesheet" href="/home/css/layout.css">
<link type="text/css" rel="stylesheet" href="/home/css/modacctip.css">
<style type="text/css">
.score_1{color:rgb(255,0,0)}
.score_2{color:rgb(255,102,0)}
.score_3{color:rgb(255,204,0)}
.score_4{color:rgb(51,204,0)}
.score_bg_1{background-color:rgb(255,0,0)}
.score_bg_2{background-color:rgb(255,102,0)}
.score_bg_3{background-color:rgb(255,204,0)}
.score_bg_4{background-color:rgb(51,204,0)}
.score_outer_1 em{color:rgb(255,0,0)}
.score_outer_2 em{color:rgb(255,102,0)}
.score_outer_3 em{color:rgb(255,204,0)}
.score_outer_4 em{color:rgb(51,204,0)}
/*禁用修改头像功能*/
.na-img-area:hover .na-edit{
  display:none;
}
.na-img-area{cursor:default}
/*叹号垂直居中*/
.error-tip{
  line-height: 1.0;
}
/*米号可复制*/
.na-num{
  position: relative;
  z-index: 10;
}
/*解决英文被垂直遮挡*/
.font-img-item{
  height: 42px;
}
/*统一颜色*/
.color-active{
  color:rgb(255,102,0)!important;
}
/*tip additionals*/
/*
.tip, .mod_acc_tip{
  position:fixed;
  top:50%;
  left:50%;
  margin-left:-212px;
  margin-top: -266px;
  z-index:20;
}
*/
.tip_h295{
  margin-top: -152px;
}
.tip_h424{
  margin-top: -218px;
}
.tip_h436{
  margin-top: -224px;
}
/*动态select的布局*/
#popSetMibao .i_currentselected{
  width: auto !important;
}
#popSetMibao .i_selectoption{
  width: 100% !important;
}
#popSetMibao .set_qst li{
  width: 190px;
}
#popSetMibao .set_qst label{
    /*height: 22px;*/
    width: 185px;
}
#popAnswerMibao .set_qst label{
  height: 22px;
  width:175px;
  display: block;
}
#popAnswerMibao .set_qst li{
  height: 60px;
}
/*显示和隐藏备用手机*/
#popManageTokenStatus dd .no_fb_mobile{ 
  display: block;
}
#popManageTokenStatus dd .fb_mobile{
  display: none;
}
#popManageTokenStatus .has_fb_mobile .no_fb_mobile{
  display: none;
}
#popManageTokenStatus .has_fb_mobile .fb_mobile{
  display: block;
}
/*popup的遮层*/
.popup_mask .mod_wrap{
    height: 100%;
    overflow-y: auto;
    position: absolute;
    width: 100%;
    z-index: 1;
}
.popup_mask .mod_acc_tip{
  display:none;
  position:absolute;
  left:50%;
  margin-left:-206px;
  top:50%;
  margin-top:-187px;
  _top: 500px;
}
/*某些要在前面的对话框*/
.callable{
  z-index: 200;
}
/*vertically center*/
#popSetMibao, #popAnswerMibao, #popManageTokenStatus, #popManageTokenKeys{
  top:0;
  margin-top: 0;
}
/*下拉框限高*/
.i_selectoption {
    height: 150px;
}
/*已完成安装*/
#popManageTokenDownload .tip_btns .installed{
  display:inline-block;
}
#popManageTokenDownload .tip_btns .goback{
  display:none;
}
#popManageTokenDownload .token_enabled .installed{
  display:none;
}
#popManageTokenDownload .token_enabled .goback{
  display:inline-block;
}
/*IE6*/
#popUpdatePassword .capt_box{
  display: none;
}
/*sms not sent*/
#sms-unsent{
  width:100%;
  height:100%;
  position:fixed;
  _position:absolute;
  left:0;
  top:0;
  z-index:10000;
  display:none;
}
#sms-unsent .bg{
  width:100%;
  height:100%;
  position:absolute;
  left:0;
  top:0;
  z-index:-1;
  filter:alpha(opacity=70);
  -moz-opacity:.7;
  opacity:.7;
  background-color:#aaa;
}
#sms-unsent .msg-box{
  width:560px;
  height:200px;
  position:absolute;
  left:50%;
  top:50%;
  margin-left:-280px;
  margin-top:-100px;
  background-color:#fff;
}
#sms-unsent .msg-box .text{
  position:absolute;
  text-align:center;
  top:56px;
  font-size:18px;
  color:#585858;
  width:500px;
}
#sms-unsent .msg-box .button{
  position:absolute;
  text-align:center;
  top:100px;
  width:120px;
  height:40px;
  color:#333;
  border:1px solid #dadada;
  left:50%;
  margin-left:-61px;
  cursor:pointer;
  line-height:40px;
  font-size:16px;
  -webkit-border-radius:1px;
  -moz-border-radius:1px;
  border-radius:1px;
}
/*干掉该死的IE6的遮罩问题*/
#loadingMask .bkc{
  _height:2000px;
}
/*wap*/
.bugfix_ie6,
.n-account-area-box{ display:block;}  
/*hide default options*/
.def-opt{
  display: none;
}
#popEnterNewPhone{
  margin-top:-250px;
}
.del-account-deny h4{
  font-size:14px;
  font-weight:normal;
}
.del-account-deny-content{
  list-style:disc;
  font-fize:14px;
}
.del-account-deny-content  li{
  list-style:disc;
  font-fize:14px;
}
</style>
<style type="text/css" media="print">
  .n-logo-area .logout,
  .n-account-area,
  .n-frame,
  .n-main-nav,
  .n-footer{display : none; }
</style>
@yield("css")
</head>
<body class="zh_CN" style="overflow-y: scroll;">
  <div class="popup_mask" style="display: none;" id="loadingMask">
    <div class="bkc"></div>
    <div class="mod_wrap loadingmask">
      
    </div>
  </div>
  <div class="wrapper blockimportant">
  <div class="wrap">
<div class="layout bugfix_ie6 dis_none">
  <div class="n-logo-area clearfix">
    <a href="https://account.xiaomi.com/" class="fl-l">
      <img src="/home/Images/n-logo.png">
    </a>
    <script>
    setTimeout(function(){
      if(location.hostname === 'account.xiaomi.com'){return;}
      var link = document.getElementById('logoutLink');
      if(link){
        var href = link.getAttribute('href');
        var a = document.createElement('a');
        a.setAttribute('href','/');
        var homeURL = a.href;
        href = href.replace(/\&callback\=.*$/, '&callback=' + homeURL);
        link.setAttribute('href', href);
        a = null;
      }
    },100);
    </script>
    
  </div>
  
    <!--头像 名字-->
  <div class="n-account-area-box">
    <div class="n-account-area clearfix">
      <div class="na-info">
      <p class="na-num"><?php session_start(); echo $_SESSION['user'] ?></p>
      </div>
      <div class="na-img-area fl-l">
      <!--na-img-bg-area不能插入任何子元素-->
      <div class="na-img-bg-area"></div>
      </div>
    </div>
  </div>
  
</div>

  <div id="sms-unsent">
    <div class="bg"></div>
    <div class="msg-box">
      <div class="text">短信发送失败，请稍后再试！ </div>
      <div class="button">确定</div>
    </div>
  </div>
  <div class="layout">
      <div class="n-main-nav clearfix">
        <ul>
          <li id="safe">
            <a href="/userSafe" title="帐号安全">帐号安全</a>
          </li>
          <li id='info'>
            <a href="/Info" title="个人信息">个人信息</a>
          </li>
          <!--<li>
            <a href="">登录设备</a>
            <em class="n-nav-corner"></em>
          </li>-->
        </ul>
      </div>

      @yield('content')

      </div>
    </div>
    </div>
    <div class="n-footer">
  <div class="nf-link-area clearfix">
  <ul class="lang-select-list">
    <li><a class="lang-select-li current" href="javascript:void(0)" data-lang="zh_CN">简体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_TW">繁体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="en">English</a></li>
    
      |<li><a class="a_critical" href="http://static.account.xiaomi.com/html/faq/faqList.html" target="_blank"><em></em>常见问题</a></li>
    
  </ul>
  </div>
  <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134"><span><img src="/home/Images/ghs.png"></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
</div>
<script src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/placeholder.js"></script>
<script>
$(function(){
  //语言部分
  var locale="zh_CN";
  if(locale!=='zh_CN' && locale!=='zh_TW' && locale!=='en'){
    locale=locale.indexOf("zh")!==-1?"zh_TW":"en";
  }
  var list=$(".lang-select-li");
  list.each(function(index,item){
    if($(this).data("lang")===locale){
      $(this).addClass("current");
    }
  });
  list.bind("click",function(){
    var selectLocale=$(this).data("lang");
    var params=location.search.substring(1).split("&");
    if(locale!==selectLocale){
      for(var i=0;i<params.length;i++){
        if(params[i].indexOf("_locale=")===0){
          params.splice(i,1);i--;
        }
      }
      params.push("_locale="+selectLocale);
      location.href=("//"+location.host+location.pathname+"?"+params.join("&")+location.hash);
    }
  });
  /*不知道是什么功能部分
  if($(window).innerWidth() <= 640 && (!/AppName\/[0-9\.]+$/.test(navigator.userAgent) || navigator.standalone)){
    $('.n-footer').show();
  }*/
  /*备案链接上的图片*/
  var recordLink=$('.beian-record-link');
  var beianRecordLink="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134";
  var default1px_gif="data:image/gif;base64,R0lGODlhAQABAJEAAAAAAP///////wAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==";
  if(recordLink.length && beianRecordLink){
    recordLink[0].href=beianRecordLink;
  }
  var _img=new Image();
  var _span=$('.beian-record-link span');
  if(_span){
    _img.onload=_img.oncomplete=function(){
      _img._loaded=true;
      _span.append(_img);
    }
    setTimeout(function(){
      if(!_img._loaded && default1px_gif){
        _img.src=default1px_gif;
      }
    },1000);
  }

  /*url 转义*/
  function  encodeURLparam(links,param){
    $(links).each(function(index,item){
      if((item.search+"").indexOf(param)!==-1){
        //分解参数，encode value
        var params=item.search.substring(1).split("&");
        for(var i=0;i<params.length;i++){

          if( (params[i]+"").indexOf(param+"=")===0 ){

            params.splice(i,1, param+"="+encodeURIComponent( (params[i]+"").substring(param.length+1) ) );

            item.search=params.join("&")
          }

        }
      }
    })
  }
  encodeURLparam(document.links,'externalId')
});
var JSP_VAR={
  deviceType:'PC',
  dataCenter:'lg',
  locale:"zh_CN",
  region:"CN",
  callback:"",
  sid:"",
  qs:"",
  hidden:"",
  "_sign":"",
  serviceParam :'',
  privacyLink:'http://www.miui.com/res/doc/privacy/cn.html'
};
</script>
<style>
  .btn-action-go{ display:none;}
</style>
<script>
/*MIUI  客户端和  authSDK 客户端*/
  
  var webviewDisableTip="";
  var closeStatus="";
  var webviewDisableTip2="";
  var webviewDisableBtn="";

  function isWebview(){
    var result=false;
    var ua=navigator.userAgent;
    
    var authSDK=/passport\/oauthsdk\/([\d.]+)/i.test(ua)? parseFloat(RegExp.$1) : false ;
    var miuiClient=/passport\/oauthmiui/i.test(ua);
    var weixinClient=/micromessenger/i.test(ua);
    var miAccountClient=/passportsdk\/notificationwebview/i.test(ua);
    var miuiYellowPageClient=/miuiyellowpage/i.test(ua);
    if(authSDK || miuiClient || weixinClient || miAccountClient || miuiYellowPageClient){
      result={
        authSDK:authSDK,
        miuiClient:miuiClient,
        weixinClient:weixinClient,
        miAccountClient:miAccountClient,
        miuiYellowPageClient:miuiYellowPageClient
      }
    }
    return result;
  }
  
  var webviewDisabled= "";
  var popContainer= '<div style="display:block;" class="popup_mask fixed pchide">'+
                      '<div class="bkc"></div>'+
                      '<div class="mod_wrap">'+
                        '<div style="display:block;" class="mod_acc_tip">'+
                          '<div class="wap_frame">'+
                            '<div class="icon_around"></div>'+
                            '<div class="around_txt">'+
                              '<h4>'+webviewDisableTip+'</h4><p>'+webviewDisableTip2+
                              '</p><p class="pt20 t_c copy-link">'+location.href+'</p>'+
                            '</div>'+
                            '<a class="btn_tip btn_back wap_btn_abs btn-action-go" href="javascript:void(0)">'+webviewDisableBtn+'</a>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
  if(isWebview()){
    $(".n-footer").hide();
    $(".n-logo-area").hide();
    $(".logout_wap").hide();
  }
  
  if(webviewDisabled==='true'){
    $('body').append(popContainer);
  }
  if(!isWebview() && closeStatus==='true'){
    $('.btn-action-go').show();
  }
  $('.btn-action-go').bind('click',function(){
    $(this).closest('.popup_mask').hide();
    return false;
  });
</script>
</body></html>