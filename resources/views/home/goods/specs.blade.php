@extends('layout.base')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('home/css/detailindex.min.css') }}"/>
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
                <a class="link active" href="{{ URL('/specs/'.$detail->id) }}">参数</a>
                </span>
                <a href="/buy?id={{ $detail->id }}" target="_blank" class="btn btn-primary btn-small J_buyBtn">立即购买</a>
            </div>
        </div>
    </div>
    <div class="bd">
        <center>
            <div id="overall" class="mimax-overall J_visibleSectionContainer">
            <!-- 图片区域 -->
                <img width="1226" src='{!! asset('Uploads/specs/'."$detail->specs") !!}'>
            </div>
        </center>
    </div>
    <div class="fenqi-qa hide" id="J_fenqiQa">
    8月30日早10点-9月6日 ，购小米Max享花呗分期 / 小米钱包 3期免息，每单仅限1台。
        <br>
        <a href="http://www.mi.com/c/payrule/antchecklater/" target="_blank">了解详情 &gt;</a>
        <i class="arrow arrow-a"></i><i class="arrow arrow-b"></i>
    </div>
</div>
<div id="J_modalVideo" class="modal modal-video fade modal-hide">
    <div class="modal-hd">
        <h3 class="title">视频播放</h3>
        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
    </div>
    <div class="modal-bd">
        <div class="loading">
            <div class="loader">
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('home/js/base.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/index.min.js')}}"></script>
<script src="{{ asset('home/js/xmsg_ti.js')}}"></script>
@endsection
