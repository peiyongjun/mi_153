@extends("home.user.myOrder")
@section("orderContent")
@section("orderCss")
<style>
    #valid a{
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
            @if($v->order_status != 5 && $v->order_status != 7)
            <li class="uc-order-item uc-order-item-pay">
            @elseif($v->order_status == 5)
            <li class="uc-order-item uc-order-item-finish">
            @elseif($v->order_status == 7)
            <li class="uc-order-item uc-order-item-finish">
            @endif
                <div class="order-detail">
                    <div class="order-summary">
                        <div class="order-status">
                            @if ($v->order_status == 0)
                            等待付款
                            @elseif ($v->order_status == 2)
                            等待发货
                            @elseif ($v->order_status == 3)
                            等待收货
                            @elseif ($v->order_status == 4)
                            售后处理中
                            @elseif ($v->order_status == 5)
                            已完成
                            @elseif ($v->order_status == 7)
                            待评价
                            @endif
                        </div>
                        @if($v->order_status != 5 && $v->order_status != 7 && $v->order_status !=4)
                        <p class="order-desc J_deliverDesc">
                            21:30前支付，预计明天送达
                            <span class="beta">
                                Beta
                            </span>
                        </p>
                        @endif
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
                                                    <img src='{!! asset('Uploads/picture')!!}{!! '/'.$goods[$skus[$v->id]->id]->img !!}' alt="{{ $goods[$skus[$v->id]->id]->name }}" width="80"
                                                    height="80">
                                                </a>
                                            </div>
                                            <p class="name">
                                                <a target="_blank" href="{{ URL('/detail').'/'.$goods[$skus[$v->id]->id]->id }}">
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
                                    @if ($v->order_status == 0)
                                    <a class="btn btn-small btn-primary" href="javascript:doPay({{ $v->id }})" target="_blank">
                                        立即支付
                                    </a>
                                    @elseif ($v->order_status == 3)
                                    <a class="btn btn-small btn-primary" id="confirmDel" onclick="conDel({{ $v->id }})">
                                        确认收货
                                    </a>
                                    @elseif ($v->order_status == 7)
                                    <a class="btn btn-small btn-line-gray" id="{{ $v->id }}" class="btn btn-line-green btn-primary btn-lg" data-toggle="modal" data-target="#{{ $v->id }}Modal">
                                        申请售后
                                    </a>
                                     @elseif ($v->order_status == 5)
                                    <a class="btn btn-small btn-line-gray" id="{{ $v->id }}" class="btn btn-line-green btn-primary btn-lg" data-toggle="modal" data-target="#{{ $v->id }}Modal" >
                                        申请售后
                                    </a>
                                    @endif
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
<!-- 申请售后模态框 -->
<div class="modal fade" id="{{ $v->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
               <form action="{{ URL('/fastApply') }}" method="post" name="reg_testdate">
                    <input type='hidden' name='_token' value="{{ csrf_token() }}">
                    <table align="center">
                        <tr>
                            <td><dt>订单号</dt></td>
                            <td>
                                <input type="text" name="order_id" value="{{ $v->id }}">
                            </td>
                        </tr>
                        <tr>
                            <td><dt>商品名称</dt></td>
                            <td>
                                <input type="text" name="goods_name" value="{{ $goods[$skus[$v->id]->id]->name }}">
                            </td>
                        </tr>
                        <tr>
                            <td><dt>型号</dt></td>
                            <td>
                                <input type="text" name="goods_type" value="{{ $skus[$v->id]->attr }} {{ $skus[$v->id]->color }}">
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
                                <button type="submit" id="but" class="btn btn-primary">
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
@endforeach
</div>
@endif
<script>
    function conDel(id){
        if(confirm("确认收货？")){
            location.href = "/delivery/"+id;
        }
    }
    function doPay (id){
        if (confirm('确认支付吗?')) {
            window.location.href = "/validOrder/Status?id="+id;
        } 
    }
</script>
@endsection
