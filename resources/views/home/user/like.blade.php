@extends('home.user.userbase')
@section("css")
<style>
    #like a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">喜欢的商品</h1>
                <div class="more clearfix hide">
                    <ul class="filter-list J_addrType">
                        <li class="first active"><a href="http://order.mi.com/user/favorite?r=97065.1475026121" data-stat-id="bb5f4704448262e5" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-bb5f4704448262e5', 'http://order.mi.com/user/favorite', 'pcpid']);">喜欢的商品</a></li>
                        <li><a href="http://order.mi.com/user/favorite?is_sale=0&amp;r=97065.1475026121" data-stat-id="ca8474002200309a" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-ca8474002200309a', 'http://order.mi.com/user/favorite', 'pcpid']);">已下架的商品</a></li>
                    </ul>
                </div>
            </div>
            <div class="box-bd">
                <p class="empty">您暂未收藏任何商品。</p>
                <div class="xm-pagenavi"></div>
            </div>
        </div>
    </div>
</div>
@endsection
