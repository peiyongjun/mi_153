@extends("home.user.showOrder")
@section("Ccss")
<style>
    #ivC a{
        color:#FF6700;
    }
</style>
@endsection
@section("showOrder")
@if(!$order)
<div class="box-bd">
    <p class="empty">暂时没有符合条件的商品。</p>
</div>
@else
<div class="box-bd">
    @foreach ($order as $v)
    <div id="J_orderList">
        <ul class="order-list">
            <li class="uc-order-item uc-order-item-finish">
                <div class="order-detail">
                    <div class="order-summary">
                        <div class="order-status">
                            评价已失效
                        </div>
                    </div>
                    <table class="order-detail-table">
                        <thead>
                            <tr>
                                <th class="col-main">
                                    <p class="caption-info">
                                        {{ $v->ctime }}
                                        <span class="sep">
                                            |
                                        </span>
                                        {{ $v->del_name }}
                                        <span class="sep">
                                            |
                                        </span>
                                        订单号：
                                        <a href="//order.mi.com/user/orderView/1161012895800959">
                                            {{ $v->id }}
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
                                            {{ ($skus[$v->id]->price)*($v->goods_num) }}
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
                                                <a href="{{ URL(('/detail/').($goods[$skus[$v->id]->id]->id)) }}" target="_blank">
                                                    <img src="//i1.mifile.cn/a1/pms_1474955798.20758099!80x80.jpg" width="80"
                                                    height="80" alt="小米手机5s 标配全网通版 3GB内存 银色 64GB">
                                                </a>
                                            </div>
                                            <p class="name">
                                                <a target="_blank" href="{{ URL(('/detail/').($goods[$skus[$v->id]->id]->id)) }}">
                                                    {{ $goods[$skus[$v->id]->id]->name }} {{ $skus[$v->id]->attr }} {{ $skus[$v->id]->color }}
                                                </a>
                                            </p>
                                            <p class="price">
                                                 {{ $skus[$v->id]->price }} X {{ $v->goods_num }}
                                            </p>
                                        </li>
                                    </ul>
                                </td>
                                <td class="order-actions">
                                    <a class="btn btn-small btn-line-gray" href="{{ URL('/orderDetail/'.$v->id) }}">
                                        评价详情
                                    </a>
                                    <a class="btn btn-small btn-line-gray" href="{{ URL('/orderDetail/'.$v->id) }}">
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
    @endforeach
</div>
@endif
@endsection