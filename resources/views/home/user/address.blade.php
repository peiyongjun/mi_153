@extends('home.user.userbase')
@section("css")
<style>
    #address a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">收货地址</h1>
                <!--
                <div class="more clearfix">
                    <ul class="filter-list J_addrType">
                        <li class="first active"><a href="http://order.mi.com/user/address?r=66148.1475026749">普通收货地址</a></li>
                        <li class=""><a href="http://order.mi.com/user/address?type=tv&r=66148.1475026749">大型商品收货地址</a></li>
                    </ul>
                </div>
                -->
            </div>
            <div class="box-bd">
                
                <div class="user-address-list J_addressList clearfix">
                    <div class="address-item address-item-new" data-type="" id="J_newAddress">
                        <i class="iconfont"></i>
                        添加新地址
                    </div>
                                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
