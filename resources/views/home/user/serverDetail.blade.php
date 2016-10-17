@extends('home.user.userbase')
@section("css")
<style>
    #myOrder a{
        color:#FF6700;
    }
</style>
<script type="text/javascript" src="/home/js/jquery-1.8.3.js"></script>
@endsection
@section('userContent')
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box order-view-box">
            <div class="box-hd">
                <h1 class="title">
                    售后详情
                    <small>
                        请谨防钓鱼链接或诈骗电话，
                        <a href="http://bbs.xiaomi.cn/thread/index/tid/11508301" target="_blank"
                        data-stat-id="b027715c015d6e08" onclick="_msq.push([&#39;trackEvent&#39;, &#39;f4b7f6b8926ce27a-b027715c015d6e08&#39;, &#39;http://bbs.xiaomi.cn/thread/index/tid/11508301&#39;, &#39;pcpid&#39;]);">
                            了解更多&gt;
                        </a>
                    </small>
                </h1>
                <div class="more clearfix">
                    <h2 class="subtitle">
                        订单号：{{ $order->id }}
                        <span class="tag tag-subsidy">
                        </span>
                    </h2>
                    <!-- <div class="actions" id="cancel">
                        <a id="cancelOrder" class="btn btn-small btn-line-gray" title="取消订单">
                            取消订单
                        </a>
                        <a id="J_payOrder" class="btn btn-small btn-primary" title="立即支付" href="http://order.mi.com/buy/confirm?id=1161013915301208"
                        target="_blank">
                            立即支付
                        </a>
                    </div> -->
                </div>
            </div>
            <div class="box-bd" id="finish">
                <div class="uc-order-item uc-order-item-pay">
                    <div class="order-detail">
                        <div class="order-summary">
                            <div class="order-status">
                                @if ($service->status == 0)
                                售后处理中
                                @elseif ($service->status == 1)
                                已完成售后处理
                                @endif
                            </div>
                        </div>
                        <table class="order-items-table">
                            <tbody>
                                <tr>
                                    <td class="col col-thumb">
                                        <div class="figure figure-thumb">
                                            <a target="_blank" href="{{ URL(('/detail/').($goods->id)) }}">
                                                <img src='{!! asset('Uploads/picture')!!}{!! '/'.$goods->img !!}' width="80" height="80"
                                                alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col col-name">
                                        <p class="name">
                                            <a target="_blank" href="{{ URL(('/detail/').($goods->id)) }}">
                                               {{ $goods->name }} {{ $skus->attr }} {{ $skus->color }}
                                            </a>
                                        </p>
                                    </td>
                                    <td class="col col-actions">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="editAddr" class="order-detail-info">
                        <h3>
                            买家申请描述：
                        </h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function($){
        // alert({{ $order->order_status }});
        if({{ $order->order_status }} == 1 ){
            $("#finish :first-child").removeClass("uc-order-item uc-order-item-pay").addClass("uc-order-item uc-order-item-finish");
            $("#cancel").remove();
        }
    })

    $("#cancelOrder").click(function(){
        if(confirm("确定要取消订单吗？")){
            location.href = "/cancelOrder/{{ $order->id }}";
        }
    })
</script>
@endsection
