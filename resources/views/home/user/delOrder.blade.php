@extends("home.user.myOrder")
@section("orderContent")
@section("orderCss")
<style>
    #delivery a{
        color:#FF6700;
    }
</style>
@endsection
<!-- 没有订单 -->
@if (!$skus)
<div class="box-bd">
    <div id="J_orderList">
        <p class="empty">
            当前没有交易订单。
        </p>
    </div>
</div>
@else
<!-- 有订单 -->
<div class="box-bd">
    @foreach($order as $v)
    <div id="J_orderList">
        <ul class="order-list">
            <li class="uc-order-item uc-order-item-pay">
                <div class="order-detail">
                    <div class="order-summary">
                        <div class="order-status">
                            等待收货
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
                                        已支付
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
                                    <a class="btn btn-small btn-primary" id="confirmDel" onclick="conDel({{ $v->id }})">
                                        确认收货
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
<script>
   function conDel(id){
        nid = id;
    }
     $("#confirmDel").click(function(){
        if(confirm("确认收货？")){
            location.href = "/delivery/"+nid;
        }
    })
</script>
@endsection
