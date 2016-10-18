@extends('home.user.userbase')
@section("css")
<html lang="zh-CN" xml:lang="zh-CN"><head><script type="text/javascript" async="" src="//a.stat.xiaomi.com/js/mstr.js?mid=1157822905&amp;phpsessid=&amp;mstuid=1474968511570_2074&amp;muuid=&amp;mucid=&amp;sessionId=622614347&amp;step=59&amp;new_visitor=0&amp;mstprevpid=5eab40056fa03ac0-49e8df0584b02364&amp;mstprev_pid_loc=pcpid&amp;prevtarget=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;lastsource=dzx.com&amp;timestamp=1475027984813&amp;ref=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;domain=.mi.com&amp;screen=1366*768&amp;language=zh-CN&amp;vendor=Google Inc.&amp;platform=Win32&amp;gu=http%3A%2F%2Fservice.order.mi.com%2Frecord%2Flist&amp;pu=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;rf=1&amp;mutid=&amp;muwd=&amp;domain_id=100&amp;pageid=0d0f6bc4d02045a2&amp;curl=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;xmv=1474968511570_2074_1475026577504&amp;v=1.4.10&amp;vuuid=HDKDH9B6OALN14FJ&amp;fs=159&amp;ws=159&amp;ua=531&amp;td=650&amp;type=performance"></script><script type="text/javascript" async="" src="//c1.mifile.cn/f/i/15/stat/js/unjcV2.js"></script><script type="text/javascript" async="" src="//a.stat.xiaomi.com/js/mstr.js?mid=1157822905&amp;phpsessid=&amp;mstuid=1474968511570_2074&amp;muuid=&amp;mucid=&amp;sessionId=622614347&amp;step=58&amp;new_visitor=0&amp;mstprevpid=5eab40056fa03ac0-49e8df0584b02364&amp;mstprev_pid_loc=pcpid&amp;prevtarget=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;lastsource=dzx.com&amp;timestamp=1475027984702&amp;ref=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;domain=.mi.com&amp;screen=1366*768&amp;language=zh-CN&amp;vendor=Google Inc.&amp;platform=Win32&amp;gu=http%3A%2F%2Fservice.order.mi.com%2Frecord%2Flist&amp;pu=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;rf=0&amp;mutid=&amp;muwd=&amp;ldns=0&amp;con=35&amp;res=41&amp;down=13&amp;redi=0&amp;domain_id=100&amp;pageid=0d0f6bc4d02045a2&amp;curl=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;xmv=1474968511570_2074_1475026577504&amp;v=1.4.10&amp;vuuid=HDKDH9B6OALN14FJ"></script><script type="text/javascript" async="" src="//c1.mifile.cn/f/i/15/stat/js/jquery.statData.min.js?d=2016928"></script>
<style>
    #service a{
        color:#FF6700;
    }
</style>
<!-- <link rel="stylesheet" type="text/css" href="/home/css/bootstrap.css"> -->
<link rel="stylesheet" href="http://s01.mifile.cn/css/base.min.css?20160301">
<script src = "/home/js/ajax.js"></script>
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/bootstrap-modal.js"></script>
@endsection
@section('userContent')
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">
                    选择申请方式
                </h1>
                <div class="more clearfix">
                    <!--<ul class="filter-list J_orderType">
                    <li class="active"><a href="">全部有效服务单</a></li>
                    <li><a href="">维修单</a></li>
                    <li><a href="">退货单</a></li>
                    <li><a href="">换货单</a></li>
                    </ul>-->
                </div>
            </div>
            <div class="box-bd">
                <div class="box-bd">
                    <ul class="service-choose-list clearfix">
                        <li style="list-style-type:none">
                            <i class="icon icon-order">
                            </i>
                            <h3>
                                快速申请
                            </h3>
                            <p>
                                小米网 / 小米商城App购买的订单
                                <br>
                                支持通过订单快速申请
                            </p>
                            <a href="{{ URL('/validOrder') }}" class="btn btn-line-green">
                                前往订单
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box-bd">
                    <ul class="service-choose-list clearfix">
                        <li style="list-style-type:none">
                            <i class="icon icon-fill">
                            </i>
                            <h3>
                                填写申请单
                            </h3>
                            <p>
                                其他渠道购买的产品
                                <br>
                                根据产品唯一识别码和购买凭证申请售后
                            </p>
                            <a href="#" id="apply" class="btn btn-line-green btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                申请售后
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="service-box service-main-box" style="margin-top: 14px;">
        <div class="service-content-box">
            <div class="box-bd">
                查看新手指导说明？点击<a href="http://www.mi.com/service/salesupport/" target="_blank" style="color: #ff6700;" data-stat-id="10392e71234935a1" onclick="_msq.push(['trackEvent', 'c0c8086f3fc238df-10392e71234935a1', 'http://www.mi.com/service/salesupport/', 'pcpid']);">申请售后说明</a>
            </div>
        </div>
    </div>
</div>
<!-- 申请售后 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    填写申请单
                </h4>
            </div>
            <div class="modal-body">
               <form action="{{ URL('/service') }}" method="post" name="reg_testdate">
                    <input type='hidden' name='_token' value="{{ csrf_token() }}">
                    <table align="center">
                        <tr>
                            <td><dt>订单号</dt></td>
                            <td>
                                <input type="text" name="order_id">
                            </td>
                        </tr>
                        <tr>
                            <td><dt>商品名称</dt></td>
                            <td>
                                <input type="text" name="goods_name">
                            </td>
                        </tr>
                        <tr>
                            <td><dt>型号</dt></td>
                            <td>
                                <input type="text" name="goods_type">
                            </td>
                        </tr>
                        <tr>
                            <td><dt>描述</dt></td>
                            <td>
                                <textarea name="content" rows="7" cols="20"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>　　</td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" id="but" class="btn btn-primary">
                                    提交
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    关闭
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>
<script type="text/javascript" src="/service/js/main.min.js?20160420"></script>
<script type="text/javascript" src="/service/js/plugin/plupload.full.min.js?20160420"></script>
<script type="text/javascript" src="/service/js/plugin/plupload.zh-CN.min.js?20160420"></script>
<script type="text/javascript" src="/service/js/uploader.min.js?20160809"></script>
<script type="text/javascript" src="/service/js/applyFill.min.js?20160420"></script>
<script>  
    $("#but").click(function(){
        if($("input[name='username']").val() != '' && $("input[name='order_id']").val() != '' && $("input[name='goods_name']").val() != '' && $("input[name='goods_type']").val() != ''){
            $("#but").attr({type:"submit"});
        }else{
            $("#but").attr({type:"button"});
            $("input[name='username']").next('span').remove();
            $("input[name='order_id']").next('span').remove();
            $("input[name='goods_name']").next('span').remove();
            $("input[name='goods_type']").next('span').remove();
            if($("input[name='username']").val() == ''){
                $("<span>　信息不完整</span>").css('color','red').insertAfter("input[name='username']");
            }
            if($("input[name='order_id']").val() == ''){
                $("<span>　信息不完整</span>").css('color','red').insertAfter("input[name='order_id']");
            }
            if($("input[name='goods_name']").val() == ''){
                $("<span>　信息不完整</span>").css('color','red').insertAfter("input[name='goods_name']");
            }
            if($("input[name='goods_type']").val() == ''){
                $("<span>　信息不完整</span>").css('color','red').insertAfter("input[name='goods_type']");
            }
        }
    });

    $(function($){
        if("{{ session()->get('orderMsg') }}"){
            $("#apply").click();
            $("<span>　{{ session()->get('orderMsg') }}</span>").css('color','red').insertAfter("input[name='order_id']");
            $("input[name='but']").attr('disabled',true);   
        }
        if("{{ session()->get('reOrder') }}"){
            $("#apply").click();
            $("<span>　{{ session()->get('reOrder') }}</span>").css('color','red').insertAfter("input[name='order_id']");
            $("input[name='but']").attr('disabled',true);   
        }
  });
</script>
@endsection
