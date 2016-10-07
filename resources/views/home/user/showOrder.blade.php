@extends('home.user.userbase')
@section("css")
<style>
    #showOrder a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">商品评价</h1>
                <div class="more clearfix">
                    <ul class="filter-list J_addrType">
                        <li class="first active"><a href="http://order.mi.com/user/comment?filter=1&amp;r=27008.1474986637" data-stat-id="b3c689cd9b84db0f" onclick="_msq.push(['trackEvent', '815ce971591f749c-b3c689cd9b84db0f', 'http://order.mi.com/user/comment', 'pcpid']);">待评价商品</a></li>
                        <li><a href="http://order.mi.com/user/comment?filter=2&amp;r=27008.1474986637" data-stat-id="f37aa1a4345d9e39" onclick="_msq.push(['trackEvent', '815ce971591f749c-f37aa1a4345d9e39', 'http://order.mi.com/user/comment', 'pcpid']);">已评价商品</a></li>
                        <li><a href="http://order.mi.com/user/comment?filter=3&amp;r=27008.1474986637" data-stat-id="80ca0056e3d4948a" onclick="_msq.push(['trackEvent', '815ce971591f749c-80ca0056e3d4948a', 'http://order.mi.com/user/comment', 'pcpid']);">评价失效商品</a></li>
                    </ul>
                </div>
            </div>
            <div class="box-bd">
                            <p class="empty">暂时没有符合条件的商品。</p>
                        </div>
        </div>
    </div>
</div>
@endsection