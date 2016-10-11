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
</div>
<script src="{{ asset('home/js/base.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/index.min.js')}}"></script>
<script src="{{ asset('home/js/xmsg_ti.js')}}"></script>
@endsection
