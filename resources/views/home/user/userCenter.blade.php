@extends('home.user.userbase')
@section("css")
<style>
    #userCenter a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
<div class="span16">
    <div class="protal-content-update hide">
        <p class="msg">我们做了一个小升级：你的用户名可以直接修改啦，去换个酷炫的名字吧。<a href="https://account.xiaomi.com/pass/auth/profile/home" target="_blank" data-stat-id="a7bae9e996d7d321" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a7bae9e996d7d321', 'https://account.xiaomi.com/pass/auth/profile/home', 'pcpid']);"> 立即前往&gt;</a></p>
    </div>
    <div class="uc-box uc-main-box">
        <div class="uc-content-box portal-content-box">
            <div class="box-bd">
                <div class="portal-main clearfix">
                    <div class="user-card">
                        <h2 class="username">{{ $user->username }}</h2>
                        <p class="tip">您好</p>
                        <a class="link" href="{{ URL('/userSafe') }}" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4b099f76f8f470d2', 'https://account.xiaomi.com/pass/userInfo', 'pcpid']);" target="blank">修改个人信息 &gt;</a>
                        @if (!empty($user->photo))
                          <img class="avatar" src="./home/Photo/{{ $user->photo }}" width="150" height="150">
                        @else
                          <img class="avatar" src="./home/Photo/default.jpg" width="150" height="150">
                        @endif
                       <!--  <img class="avatar" src="https://account.xiaomi.com/static/img/passport/photo.jpg" width="150" height="150" alt="1157822905"> -->
                    </div>
                    <div class="user-actions">
                        <ul class="action-list">
                            <li>账户安全：<span class="level level-2">
                                @if ($user->phone && $user->email)
                                较高
                                @elseif ($user->phone || $user->email)
                                普通
                                @else
                                较低
                                @endif
                            </span></li>
                            @if($user->phone)
                            <li>绑定手机：<span class="tel"><?php  $a = $user->phone;for($i=3;$i<9;$i++){$a[$i]='*';};echo $a; ?></span></li> 
                            @else
                            <li>
                                绑定手机：<span class="tel"></span>
                                <a class="btn btn-small btn-primary" href="{{ URL('/userSafe') }}" target="_blank" data-stat-id="f51e486b2c529448" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f51e486b2c529448', 'https://account.xiaomi.com/pass/userInfo', 'pcpid']);">绑定</a>
                            </li>
                            @endif 
                            <li>
                                @if($user->email)
                                绑定邮箱：<span class="tel"><?php  $b = $user->email;for($i=1;$i<strpos($b,"@")-1;$i++){$b[$i]='*';};echo $b; ?></span>
                                @else
                                绑定邮箱：<span class="tel"></span>
                                <a class="btn btn-small btn-primary" href="{{ URL('/userSafe') }}" target="_blank" data-stat-id="f51e486b2c529448" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f51e486b2c529448', 'https://account.xiaomi.com/pass/userInfo', 'pcpid']);">绑定</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="portal-sub">
                    <ul class="info-list clearfix">
                        <li>
                            <h3>待支付的订单：<span class="num">{{ $order->count() }}</span></h3>
                            <a href="{{ URL('/waitPay') }}" data-stat-id="dd6496f77a167a5d" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-dd6496f77a167a5d', '//static.mi.com/order/', 'pcpid']);">查看待支付订单<i class="iconfont"></i></a>
                            <img src="//s01.mifile.cn/i/user/portal-icon-1.png" alt="">
                        </li>
                        <li>
                            <h3>待收货的订单：<span class="num">{{ $orders->count() }}</span></h3>
                            <a href="{{ URL('/delOrder') }}" data-stat-id="92fa860987c1c734" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-92fa860987c1c734', '//static.mi.com/order/', 'pcpid']);">查看待收货订单<i class="iconfont"></i></a>
                            <img src="//s01.mifile.cn/i/user/portal-icon-2.png" alt="">
                        </li>
                        <li>
                            <h3>待评价商品数：<span class="num">{{ $Order->count() }}</span></h3>
                            <a href="{{ URL('/orderComment') }}" data-stat-id="b4a31da3923196c8" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b4a31da3923196c8', 'http://order.mi.com/user/comment', 'pcpid']);">查看待评价商品<i class="iconfont"></i></a>
                            <img src="//s01.mifile.cn/i/user/portal-icon-3.png" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection