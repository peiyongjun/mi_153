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
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">我的服务单</h1>
                <div class="more clearfix">
                    <!--<ul class="filter-list J_orderType">
                        <li class="active"><a href="">全部有效服务单</a></li>
                        <li><a href="">维修单</a></li>
                        <li><a href="">退货单</a></li>
                        <li><a href="">换货单</a></li>
                    </ul>-->
                </div>
            </div>
            <div class="box-bd">


    <p class="empty">当前没有服务单哦~</p>


            </div>
        </div>
    </div>
</div>
@endsection
