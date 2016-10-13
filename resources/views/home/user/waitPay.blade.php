@extends("home.user.myOrder")
@section("orderContent")
@section("orderCss")
<style>
    #wait a{
        color:#FF6700;
    }
</style>
@endsection
<!-- 没有订单 -->
<div class="box-bd">
    <div id="J_orderList">
        <p class="empty">
            当前没有交易订单。
        </p>
    </div>
</div>
<!-- 有订单 -->
<div class="box-bd">
    <div id="J_orderList">
        <ul class="order-list">
            <li class="uc-order-item uc-order-item-pay">
                <div class="order-detail">
                    <div class="order-summary">
                        <div class="order-status">
                            等待付款
                        </div>
                        <p class="order-desc J_deliverDesc">
                            21:30前支付，预计明天送达
                            <span class="beta">
                                Beta
                            </span>
                        </p>
                    </div>
                    <table class="order-detail-table">
                        <thead>
                            <tr>
                                <th class="col-main">
                                    <p class="caption-info">
                                        2016年10月12日 15:52
                                        <span class="sep">
                                            |
                                        </span>
                                        qqq
                                        <span class="sep">
                                            |
                                        </span>
                                        订单号：
                                        <a href="//order.mi.com/user/orderView/1161012895800959">
                                            1161012895800959
                                        </a>
                                        <span class="sep">
                                            |
                                        </span>
                                        在线支付
                                    </p>
                                </th>
                                <th class="col-sub">
                                    <p class="caption-price">
                                        订单金额：
                                        <span class="num">
                                            1999.00
                                        </span>
                                        元
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="order-items">
                                    <ul class="goods-list">
                                        <li>
                                            <div class="figure figure-thumb">
                                                <a href="//item.mi.com/1163700022.html" target="_blank">
                                                    <img src="//i1.mifile.cn/a1/pms_1474955798.20758099!80x80.jpg" width="80"
                                                    height="80" alt="小米手机5s 标配全网通版 3GB内存 银色 64GB">
                                                </a>
                                            </div>
                                            <p class="name">
                                                <a target="_blank" href="//item.mi.com/1163700022.html">
                                                    小米手机5s 标配全网通版 3GB内存 银色 64GB
                                                </a>
                                            </p>
                                            <p class="price">
                                                1999元 × 1
                                            </p>
                                        </li>
                                    </ul>
                                </td>
                                <td class="order-actions">
                                    <a class="btn btn-small btn-primary" href="//order.mi.com/buy/confirm.php?id=1161012895800959"
                                    target="_blank">
                                        立即支付
                                    </a>
                                    <a class="btn btn-small btn-line-gray" href="//order.mi.com/user/orderView/1161012895800959">
                                        订单详情
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>
    </div>
    <div id="J_orderListPages">
        <div class="xm-pagenavi">
            <span class="numbers first">
                <span class="iconfont">
                    
                </span>
            </span>
            <span class="numbers current">
                1
            </span>
            <span class="numbers last">
                <span class="iconfont">
                    
                </span>
            </span>
        </div>
    </div>
</div>
@endsection