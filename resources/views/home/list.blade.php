@extends('layout.base')
@section('content')
<div class="container">
    <div class="">
        <div class="container">
            <a href="//www.mi.com/index.html" >首页</a>
            <span class="sep">&gt;</span>
            <a href="//list.mi.com/0">所有分类</a>
        </div>
    </div>
    <div class="xm-plain-box category-list">
        @foreach($list as $v)
        <div class="box-hd J_box-hd">
            <h2 class="title">
                 {{ $v->name }}
            </h2>
        </div>
        <div class="box-bd J_box-bd">
            <ul class="clearfix">
                @foreach($data as $vv)
                @if($vv->pid == $v->id && $vv->status == 1)
                <li>
                    <a href="{{ URL(('/detail/').($vv->id)) }}">
                        <img src='{!! asset('Uploads/picture/'."$vv->img") !!}' width="70" height="70" alt="小米5s">
                    </a>
                    <br><br>
                    <a href="{{ URL(('/detail/').($vv->id)) }}" class="category-list-title">
                        {{ $vv->name }}
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection