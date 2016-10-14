@extends('home.user.userbase')
@section("css")
<style>
    #myOrder a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
@section("orderCss")
@show
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box order-list-box">
            <div class="box-hd">
                <h1 class="title">
                    我的订单
                    <small>
                        谨防钓鱼链接或诈骗电话，
                        <a href="//www.mi.com/service/buy/antifraud/" target="_blank" data-stat-id="78d07fef654ba47a"
                        onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-78d07fef654ba47a', '//www.mi.com/service/buy/antifraud/', 'pcpid']);">
                            了解更多&gt;
                        </a>
                    </small>
                </h1>
                <div class="more clearfix">
                    <ul class="filter-list J_orderType">
                        <li class="first" id="valid">
                            <a href="{{ URL('/validOrder') }}" data-type="0" data-stat-id="89d882413195fd4c"
                            onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-89d882413195fd4c', '//static.mi.com/order/#type=0', 'pcpid']);">
                                全部有效订单
                            </a>
                        </li>
                        <li id="wait">
                            <a id="J_unpaidTab" href="{{ URL('/waitPay') }}" data-type="7"
                            data-stat-id="8edf501aa1eca097" onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-8edf501aa1eca097', '//static.mi.com/order/#type=7', 'pcpid']);">
                                待支付
                            </a>
                        </li>
                        <li id="delivery">
                            <a id="J_sendTab" href="{{ URL('/delOrder') }}" data-type="8" data-stat-id="8308bdcf62c72b1b"
                            onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-8308bdcf62c72b1b', '//static.mi.com/order/#type=8', 'pcpid']);">
                                待收货
                            </a>
                        </li>
                        <li id="down">
                            <a href="{{ URL('/down') }}" data-type="5" data-stat-id="d99182d42018ae52"
                            onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-d99182d42018ae52', '//static.mi.com/order/#type=5', 'pcpid']);">
                                已关闭
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
            @yield("orderContent")         
        </div>
    </div>
</div>
@endsection