@extends('home.user.userbase')
@section("css")
<style>
    #server a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box order-list-box">
            <div class="box-hd">
                <h1 class="title">
                    我的服务记录
                </h1>
            </div> 
            @if(!$services)
            <!-- 没有服务记录 -->
            <div class="box-bd">
                <div id="J_orderList">
                    <p class="empty">
                        当前没有服务记录
                    </p>
                </div>
            </div>
            @else
            <!-- 有服务记录 -->
            <div class="box-bd">
                @foreach($services as $v)
                <div id="J_orderList">
                    <ul class="order-list">
                        <li class="uc-order-item uc-order-item-pay">
                            <div class="order-detail">
                                <div class="order-summary">
                                    <div class="order-status">
                                        @if($v->status == 0)
                                        售后处理中
                                        @elseif($v->status == 1)
                                        已完成售后处理
                                        @endif
                                    </div>
                                </div>
                                <table class="order-detail-table">
                                    <thead>
                                        <tr>
                                            <th class="col-main">
                                                <p class="caption-info">
                                                        {{ $order[$v->id]->ctime }}
                                                    <span class="sep">
                                                        |
                                                    </span>
                                                        {{ $order[$v->id]->del_name }}
                                                    <span class="sep">
                                                        |
                                                    </span>
                                                    订单号：
                                                    <a href="//order.mi.com/user/orderView/1161012895800959">
                                                        {{ $order[$v->id]->id }}  
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
                                                        {{ ($skus[$order[$v->id]->id]->price)*($order[$v->id]->goods_num) }}
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
                                                            <a href="{{ URL(('/detail/').($goods[$skus[$order[$v->id]->id]->id]->id)) }}" target="_blank">
                                                                <img src='{!! asset('Uploads/picture')!!}{!! '/'.$goods[$skus[$v->id]->id]->img !!}' width="80" height="80">
                                                            </a>
                                                        </div>
                                                        <p class="name">
                                                            <a target="_blank" href="{{ URL(('/detail/').($goods[$skus[$order[$v->id]->id]->id]->id)) }}">
                                                                {{ $goods[$skus[$order[$v->id]->id]->id]->name }} {{ $skus[$order[$v->id]->id]->attr }} {{ $skus[$order[$v->id]->id]->color }}
                                                            </a>
                                                        </p>
                                                        <p class="price">
                                                            {{ $skus[$order[$v->id]->id]->price }} X {{ $order[$v->id]->goods_num }}
                                                        </p>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="order-actions">
                                                <!-- <a class="btn btn-small btn-primary" href="//order.mi.com/buy/confirm.php?id=1161012895800959"
                                                target="_blank">
                                                    立即支付
                                                </a> -->
                                                <a class="btn btn-small btn-line-gray" href="{{ URL('/serverDetail/'.$v->order_id )}}">
                                                    售后详情
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
        </div>
    </div>
</div>
@endsection
