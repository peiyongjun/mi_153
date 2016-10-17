<!DOCTYPE HTML>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" >
<meta charset="UTF-8" />
<title>填写订单信息</title>
<meta name="viewport" content="width=1226" />
<link rel="shortcut icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon" />
<link rel="icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="//s01.mifile.cn/css/base.min.css?v2016d35" />
<link rel="stylesheet" type="text/css" href="//s01.mifile.cn/css/checkout.min.css?v=2016080301" />
<script type="text/javascript" src="/home/js/jquery-1.8.3.js"></script>
</head>
<body>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a class="logo " href="//www.mi.com/index.html" title="小米官网"></a>
        </div>
        <div class="header-title" id="J_miniHeaderTitle"></div>
        <div class="topbar-info" id="J_userInfo">
        @if(!session('user'))
        <a class="link" href="//order.mi.com/site/login" data-needlogin="true">登录</a><span class="sep">|</span><a class="link" href="https://account.xiaomi.com/pass/register" >订单中心</a>
        @endif        
        <a class="link" href="//order.mi.com/site/login" data-needlogin="true">{{ session('user')->username }}</a><span class="sep">|</span><a class="link" href="#" >订单中心</a>
        </div>
    </div>
    </div>
<!-- .site-mini-header END -->
<div class="page-main">
    <div class="container">
        <div class="checkout-box">
            <div class="section section-address">
                <div class="section-header clearfix">
                    <h3 class="title">收货地址</h3>
                    <div class="more">
                    </div>
                        </div>
                <div class="section-body clearfix" id="J_addressList">
                    <!-- addresslist begin -->
                    <form action="" name="myform" id="myform" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="del_name" style="width:120px;" placeholder="姓名">
                        <input type="text" name="phone" style="width:120px;" placeholder="电话">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="num" value="">
                    </form>
            <div class="section section-options section-payment clearfix">
            </div>
            <div class="section section-options section-payment clearfix">
                <div class="section-header">
                    <h3 class="title">支付方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="J_optionList options ">
                        <li data-type="pay" class="J_option selected" data-value="1">
                            在线支付<span>
                            （支持微信支付、支付宝、银联、财付通、小米钱包等）</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section section-options section-shipment clearfix">
                <div class="section-header">
                    <h3 class="title">配送方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="clearfix J_optionList options ">
                        <li data-type="shipment" class="J_option selected" data-amount="0" data-value="1">
                            快递(免费)     
                        </li>
                    </ul>

                    <div class="service-self-tip" id="J_serviceSelfTip"></div>
                </div>
            </div>
           <div class="section section-goods">
                <div class="section-header clearfix">
                    <h3 class="title">商品</h3>
                    <div class="more">
                        <!-- <a href="/home/goods/checkout">返回购物车<i class="iconfont">&#xe621;</i></a> -->
                    </div>
                </div>
                <div class="section-body">
                    <ul class="goods-list" id="J_goodsList">
                            <li class="clearfix">
                            <div class="col col-img">
                                <img src="//i1.mifile.cn/a1/pms_1472179276.90178084!30x30.jpg" width="30" height="30">
                            </div>
                            <div class="col col-name">
                                <a href="//item.mi.com/1162900018.html" target="_blank">{{ $Gname->name }} {{ $db->attr }} {{ $db->color }}</a>
                            </div>
                            <div class="col col-price">
                                数量                  
                            </div>
                            <div class="col col-status">
                                <input type="text" style="width:30px;text-align: center;" id="num" value="1">&nbsp;件
                            </div>
                            <div class="col col-total">
                                
                            </div>
                        </li>
                        <li class="clearfix">
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="section section-count clearfix">
                <div class="count-actions" >
                    <!-- 优惠券 -->
                    <div class="coupon-trigger" id="J_useCoupon"><i class=""></i></div>
                    
                    <div class="coupon-box hide" id="J_couponBox">
                        
                        <div class="tab-container">
                                   
                        <div class="tab-content code-content hide">
                                
                        </div>
                        </div>
                    </div>

                    <!-- 购物卡 -->
                    <div class="ecard-trigger" id="J_useEcard" data-type="normal"><i class=""</i></div>
                    <!-- 手机换新券 -->
                    <div class="ecard-trigger hide" id="J_useRecycle" data-type="recycle"><i class="iconfont icon-plus">&#xe609;</i></div>              
                    <div class="ecard-box hide" id="J_ecardBox">
                    <div class="loading">
                    <div class="loader"></div>
                    </div>
                    </div>
                </div>

                <div class="money-box" id="J_moneyBox">
                    <ul>
                        <li class="clearfix">
                            <label>商品件数：</label>
                            <span class="val" id="showNum">1件</span>
                        </li>
                        <li class="clearfix">
                            <label>金额合计：</label>
                            <span class="val" id="showTotal">{{ $db->price }}元</span>
                        </li>
                        <li class="clearfix total-price">
                            <label>应付总额：</label>
                            <span class="val"><em data-id="J_totalPrice"  id="showTotalPrice">{{ $db->price }}</em>元</span>
                        </li>
                    </ul>
                    <div class="fr">
                    <a href="javascript:doSubmit()" class="btn btn-primary">去结算</a>
                    </div>
                </div>
            </div>
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
                
                <dd><a rel="nofollow" href="//www.mi.com/service/account/register/"   target="_blank">账户管理</a></dd>
                
                <dd><a rel="nofollow" href="//www.mi.com/service/buy/buytime/"   target="_blank">购物指南</a></dd>
                
                <dd><a rel="nofollow" href="//www.mi.com/service/order/sendprogress/"   target="_blank">订单操作</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>服务支持</dt>
                
                <dd><a rel="nofollow" href="//www.mi.com/service/exchange"   target="_blank">售后政策</a></dd>
                
                <dd><a rel="nofollow" href="http://fuwu.mi.com/"   target="_blank">自助服务</a></dd>
                
                <dd><a rel="nofollow" href="http://xiazai.mi.com/"   target="_blank">相关下载</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>线下门店</dt>
                
                <dd><a rel="nofollow" href="//www.mi.com/c/xiaomizhijia/"   target="_blank">小米之家</a></dd>
                
                <dd><a rel="nofollow" href="//www.mi.com/static/maintainlocation/"   target="_blank">服务网点</a></dd>
                
                <dd><a rel="nofollow" href="//www.mi.com/static/familyLocation/"   target="_blank">零售网点</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关于小米</dt>
                
                <dd><a rel="nofollow" href="//www.mi.com/about"   target="_blank">了解小米</a></dd>
                
                <dd><a rel="nofollow" href="http://hr.xiaomi.com/"   target="_blank">加入小米</a></dd>
                
                <dd><a rel="nofollow" href="//www.mi.com/about/contact"   target="_blank">联系我们</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关注我们</dt>
                
                <dd><a rel="nofollow" href="http://e.weibo.com/xiaomishouji"   target="_blank">新浪微博</a></dd>
                
                <dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat"   target="_blank">小米部落</a></dd>
                
                <dd><a rel="nofollow" href="#J_modalWeixin" data-toggle="modal" >官方微信</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>特色服务</dt>
                
                <dd><a rel="nofollow" href="//order.mi.com/queue/f2code"   target="_blank">F 码通道</a></dd>
                
                <dd><a rel="nofollow" href="//www.mi.com/mimobile/"   target="_blank">小米移动</a></dd>
                
                <dd><a rel="nofollow" href="//order.mi.com/misc/checkitem"   target="_blank">防伪查询</a></dd>
                
            </dl>
                
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a rel="nofollow" class="btn btn-line-primary btn-small" href="//www.mi.com/service/contact" target="_blank"><i class="iconfont">&#xe600;</i> 24小时在线客服</a>            </div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <span class="logo ir">小米官网</span>
        <div class="info-text">
            <p>小米旗下网站：<a href="//www.mi.com/index.html"  target="_blank">小米商城</a><span class="sep">|</span><a href="http://www.miui.com/"  target="_blank">MIUI</a><span class="sep">|</span><a href="http://www.miliao.com/"  target="_blank">米聊</a><span class="sep">|</span><a href="http://www.duokan.com/"  target="_blank">多看书城</a><span class="sep">|</span><a href="http://www.miwifi.com/"  target="_blank">小米路由器</a><span class="sep">|</span><a href="http://call.mi.com/"  target="_blank">视频电话</a><span class="sep">|</span><a href="http://blog.xiaomi.com/"  target="_blank">小米后院</a><span class="sep">|</span><a href="http://xiaomi.tmall.com/"  target="_blank">小米天猫店</a><span class="sep">|</span><a href="http://shop115048570.taobao.com"  target="_blank">小米淘宝直营店</a><span class="sep">|</span><a href="http://union.mi.com/"  target="_blank">小米网盟</a><span class="sep">|</span><a href="//static.mi.com/feedback/"  target="_blank">问题反馈</a><span class="sep">|</span><a href="#J_modal-globalSites" data-toggle="modal" target="_blank">Select Region</a>            </p>
            <p>&copy;<a href="//www.mi.com/" target="_blank" title="mi.com">mi.com</a> 京ICP证110507号 <a href="http://www.miitbeian.gov.cn/"  target="_blank" rel="nofollow">京ICP备10046444号</a> <a rel="nofollow"  href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank">京公网安备11010802020134号 </a><a rel="nofollow"  href="//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank" rel="nofollow">京网文[2014]0059-0009号</a>

            <br> 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
        </div>s
        <div class="slogan ir">探索黑科技，小米为发烧而生</div>
        <!-- motai -->
</body>
        <!-- 获取district内容 -->
      <script type="text/javascript"> 
     function loadDistrict(upid){
        $.ajax({
          url:"{{ URL('buy/district/') }}"+"/"+upid,
          type:"get",
          dataType:"json",
          success:function(data){
            // alert(data);
            if(data.length==0){
              return;
            }
            var select = "<select id='tid' name='dis[]' class='form-contorl'>";
            select +="<option value='-2'>-请选择-</option>";
            for(var i=0;i<data.length;i++){
              select +="<option value='"+data[i].id+"'>"+data[i].name+"</option>";
            }
            select +="</select>";
            $(select).change(function (){
                //清空后面所有的select节点
                $(this).nextAll("select").remove();
                var id = $(this).find("option:selected").val()
                // alert(id);      
                loadDistrict(id);
            }).appendTo('#myform');  
          }
        });
      }
      loadDistrict(0);
          function doSubmit()
            {
            var myform = document.myform;
            myform.action = "/buy/Pay";
            myform.submit();
            // alert('11');
             }

    //控制商品件数
    $("#num").blur(function (){
        if($("#num").val() <= 0){
            alert("商品至少要购买一件")
            $("#num").val(1);
        }
        $("input[name='num']").val($("#num").val());
        $("#showTotal").html($("#num").val()*{{ $db->price }}+'元')
        $("#showNum").html($("#num").val()+'件');
        $("#showTotalPrice").html($("#num").val()*{{ $db->price }}+'元')
    })      
  </script>
  <script>
       
  </script>
</html>

           