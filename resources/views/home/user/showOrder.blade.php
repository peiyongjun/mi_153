@extends('home.user.userbase')
@section("css")
<style>
    #showOrder a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
@section("Ccss")
@show
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box order-list-box">
            <div class="box-hd">
                <h1 class="title">
                    商品评价
                </h1>
                <div class="more clearfix">
                    <ul class="filter-list J_orderType">
                        <li class="first" id="waitC">
                            <a href="{{ URL('/orderComment') }}">
                                待评价订单
                            </a>
                        </li>
                        <li id="alC">
                            <a id="J_unpaidTab" href="{{ URL('/alreadyC') }}">
                                已评价订单
                            </a>
                        </li>
                        <li id="ivC">
                            <a id="J_sendTab" href="{{ URL('/invalidC') }}">
                                评价失效订单
                            </a>
                        </li>
                    </ul>
                    <form id="J_orderSearchForm" class="search-form clearfix" action="#" method="get">
                        <label for="search" class="hide">
                            站内搜索
                        </label>
                        <input class="search-text" type="search" id="J_orderSearchKeywords" name="keywords"
                        autocomplete="off" placeholder="输入商品名称、商品编号、订单号">
                        <input type="submit" class="search-btn iconfont" value="">
                    </form>
                </div>
            </div>
            @yield("showOrder")         
        </div>
    </div>
</div>
@endsection