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
                    订单详情
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
                    <div class="actions" id="cancel">
                        <a id="cancelOrder" class="btn btn-small btn-line-gray" title="取消订单">
                            取消订单
                        </a>
                        <a id="J_payOrder" class="btn btn-small btn-primary" title="立即支付" href="http://order.mi.com/buy/confirm?id=1161013915301208"
                        target="_blank">
                            立即支付
                        </a>
                    </div>
                </div>
            </div>
            <div class="box-bd" id="finish">
                <div class="uc-order-item uc-order-item-pay">
                    <div class="order-detail">
                        <div class="order-summary">
                            <div class="order-status">
                                @if ($order->order_status == 0)
                                等待付款
                                @elseif ($order->order_status == 1)
                                已关闭
                                @elseif ($order->order_status == 2 || $v->order_status == 2)
                                等待收货
                                @elseif ($order->order_status == 3)
                                等待收货
                                @elseif ($order->order_status == 4)
                                退货中
                                @elseif ($order->order_status == 5)
                                交易完成
                                @elseif ($order->order_status == 6)
                                退货完成
                                @elseif ($order->order_status == 7)
                                待评价
                                @endif
                            </div>
                        </div>
                        <table class="order-items-table">
                            <tbody>
                                <tr>
                                    <td class="col col-thumb">
                                        <div class="figure figure-thumb">
                                            <a target="_blank" href="{{ URL(('/detail/').($goods->id)) }}">
                                                <img src="//i1.mifile.cn/a1/pms_1474955798.20758099!80x80.jpg" width="80" height="80"
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
                                    <td class="col col-price">
                                        <p class="price">
                                            {{ $skus->price }}元 X {{ $order->goods_num }}
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
                            收货信息
                        </h3>
                        <table class="info-table">
                            <tbody>
                                <tr>
                                    <th>
                                        姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：
                                    </th>
                                    <td>
                                        {{ $order->del_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        联系电话：
                                    </th>
                                    <td>
                                        {{ $order->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        收货地址：
                                    </th>
                                    <td>
                                        {{ $order->province }} {{ $order->city }} {{ $order->district }} {{ $order->address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="editTime" class="order-detail-info">
                        <h3>
                            支付方式及送货时间
                        </h3>
                        <table class="info-table">
                            <tbody>
                                <tr>
                                    <th>
                                        支付方式：
                                    </th>
                                    <td>
                                        在线支付
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        送货时间：
                                    </th>
                                    <td>
                                        不限送货时间
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        送达时间：
                                    </th>
                                    <td>
                                        <p class="J_deliverDesc">
                                            21:30前支付，预计明天送达
                                            <span class="beta">
                                                Beta
                                            </span>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="order-detail-info">
                        <h3>
                            发票信息
                        </h3>
                        <table class="info-table">
                            <tbody>
                                <tr>
                                    <th>
                                        发票类型：
                                    </th>
                                    <td>
                                        个人电子发票
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        发票内容：
                                    </th>
                                    <td>
                                        购买商品明细
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        发票抬头：
                                    </th>
                                    <td>
                                        个人
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="order-detail-total">
                        <table class="total-table">
                            <tbody>
                                <tr>
                                    <th>
                                        商品总价：
                                    </th>
                                    <td>
                                        <span class="num">
                                            {{ ($skus->price)*($order->goods_num) }}
                                        </span>
                                        元
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：
                                    </th>
                                    <td>
                                        <span class="num">
                                            0
                                        </span>
                                        元
                                    </td>
                                </tr>
                                <tr>
                                    <th class="total">
                                        实付金额：
                                    </th>
                                    <td class="total">
                                        <span class="num">
                                            {{ ($skus->price)*($order->goods_num) }}
                                        </span>
                                        元
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
