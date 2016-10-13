@extends('layout.base')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('home/css/goods-comments.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('home/css/detailindex.min.css') }}"/>
<style type="text/css">
    li{
        list-style:none;
    }
</style>
<div class="xm-product-box">
    <div class="hd nav-bar J_headNav">
        <div class="container">
            <div class="title">
                <h2>
                    {{ $detail->name }}
                </h2>
            </div>
            <div class="nav">
                <span class="nav-switch">
                    <a class="link" href="{{ URL('/detail/'.$detail->id) }}">概述</a>
                    <span class="sep">|</span>
                    <a class="link" href="{{ URL('/specs/'.$detail->id) }}">参数</a>
                    <span class="sep">|</span>
                    <a class="link active" href="{{ URL('/comments/'.$detail->id) }}">评价</a>
                </span>
                <a href="/buy?id={{ $detail->id }}" target="_blank" class="btn btn-primary btn-small J_buyBtn">立即购买</a>
            </div>
        </div>
    </div>
    <div class="bd">
        <div id="overall" class="mimax-overall J_visibleSectionContainer">
            @if($comments->count())
            <!-- 评论内容主体 -->
            <div class="goods-detail-comment J_itemBox hasContent" id="goodsCommentContent" style="display: block;">
                <div class="goods-detail-comment-groom" id="J_recommendComment">
                    <div class="container">
                        <ul class="main-block">
                            <li class="percent">
                                <div class="per-num">
                                    <i>{{ $per }}</i>%
                                </div>
                                <div class="per-title">购买后满意</div>
                                <div class="per-amount"><i>{{ $comments->count() }}</i>名用户投票</div>
                            </li>
                            <!-- 精彩评价 -->
                            @foreach($comments as $comment)
                            @if($comment->useful == 1)
                            <li class="item-rainbow-6 groom-content">
                                <dl>
                                    <dt>
                                        <div class="groom-content-userImage">
                                            <img src='{{URL("home/Photo")}}{{"/".$users[$comment->id]->photo}}' alt="{{ $users[$comment->id]->name}}">
                                        </div>
                                        <div class="groom-content-userName">{{ $users[$comment->id]->name }}</div>
                                    </dt>
                                    <dd>
                                        <i class="iconfont"></i>
                                        {{ $comment->content }}
                                    </dd>
                                </dl>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="goods-detail-comment-content" id="J_commentDetailBlock">
                    <div class="container">
                        <div class="row">
                            <div class="goods-detail-comment-list">
                                <div class="comment-order-title">
                                    <div class="left-title">
                                        <h3 class="comment-name">最新评价</h3>
                                    </div>
                                </div>
                                <ul class="" id="J_supComment">
                                    @foreach($comments as $comment)
                                    <li class="item-rainbow-3" data-id="138030011">
                                        <div class="user-image">
                                            <img src='{{URL("home/Photo")}}{{"/".$users[$comment->id]->photo}}' alt="{{ $users[$comment->id]->name}}">
                                        </div>
                                        <div class="user-name-info">
                                            &nbsp;&nbsp;
                                            <span class="user-name">{{ $users[$comment->id]->name }}</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="user-time">{{ $comment->ctime }}</span>
                                        </div>
                                        <dl>
                                            <p align="left">
                                                {{ $comment->content }}
                                            </p>
                                        </dl>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 没有评价 -->
                <div class="goods-detail-null-content" id="J_commentTipInfo">
                    <div class="container">
                        <h3>暂时还没有评价</h3>
                        <p>期待你分享科技带来的乐趣</p>
                    </div>
                </div>
            </div>
            <!-- 评论内容主体 -->
            @else
            <!-- 没有评价 -->
            <div class="container">
                <hr>
                <h1>暂时还没有评价</h1>
                <h4>期待你分享科技带来的乐趣</h4>
                <hr>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
