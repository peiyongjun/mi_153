@extends('layout.base')
@section('content')
<style type="text/css">
    #J_navCategory a{
        display:none;
    }
</style>
<link rel="stylesheet" href="//s01.mifile.cn/css/base.min.css?v2016d26">
@yield("css")
<link rel="stylesheet" type="text/css" href="//s01.mifile.cn/css/user/main.min.css?v=2016053001">
<div style="background-color:#F5F5F5;height:30px">
    <div class="container" style="height:30px">
        <a href="{{ URL('/') }}" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid']);">首页</a>
        <span class="sep">&gt;</span>
        <span>个人中心</span>    
    </div>
</div>
<div class="page-main user-main">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="uc-box uc-sub-box">
                                        <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">订单中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li id="myOrder"><a href="{{ URL('/validOrder') }}" data-stat-id="8f3d1bffd166dc22" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-8f3d1bffd166dc22', '//static.mi.com/order/', 'pcpid']);">我的订单</a></li>
                                <li id="showOrder"><a href="{{ URL('/orderComment') }}" data-count="comment" data-count-style="bracket" data-stat-id="20db2c68bfa9e4a5" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-20db2c68bfa9e4a5', 'http://order.mi.com/user/comment', 'pcpid']);">评价晒单</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li id='userCenter'><a href="/user" data-stat-id="00e076c95d370478" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-00e076c95d370478', 'http://order.mi.com/portal', 'pcpid']);">我的个人中心</a></li>
                                <li id='message'><a href="/message" data-stat-id="33b15449518ae3ec" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-33b15449518ae3ec', 'http://order.mi.com/message/list', 'pcpid']);">消息通知<i class="J_miMessageTotal"></i></a></li>
                                <li  id='like'><a href="/like" data-stat-id="0c25ea23fee92211" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0c25ea23fee92211', 'http://order.mi.com/user/favorite', 'pcpid']);">喜欢的商品</a></li>
                                <li id='address'><a href="/address" data-stat-id="48ecd23c6e6e50ba" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-48ecd23c6e6e50ba', 'http://order.mi.com/user/address', 'pcpid']);">收货地址</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">售后服务</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li id='server'><a href="/server" data-stat-id="cee379f43f5f5fc2" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-cee379f43f5f5fc2', 'http://service.order.mi.com/record/list', 'pcpid']);">服务记录</a></li>
                                <!-- <li id='service'><a href="/service
                                    " data-stat-id="49e8df0584b02364" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-49e8df0584b02364', 'http://service.order.mi.com/apply/fill', 'pcpid']);">申请服务</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">账户管理</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="/userSafe" target="_blank" data-stat-id="35eef2fd7467d6ca" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-35eef2fd7467d6ca', 'https://account.xiaomi.com/', 'pcpid']);">个人信息</a></li>
                                <li><a href="https://account.xiaomi.com/pass/auth/security/home#service=setPassword" target="_blank" data-stat-id="ae5ee0188510f1e6" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ae5ee0188510f1e6', 'https://account.xiaomi.com/pass/auth/security/home#service=setPassword', 'pcpid']);">修改密码</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="span16">

                @yield('userContent')

            </div>

            <div class="protal-content-update hide">
                <div class="protal-username">
                    Hi, 1157822905        </div>
                <p class="msg">我们做了一个小升级：你的用户名可以直接修改啦，去换个酷炫的名字吧。<a href="https://account.xiaomi.com/pass/auth/profile/home" target="_blank" data-stat-id="a7bae9e996d7d321" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a7bae9e996d7d321', 'https://account.xiaomi.com/pass/auth/profile/home', 'pcpid']);"> 立即前往&gt;</a></p>
            </div>
        </div>       
    </div>
</div>

<!-- .modal-globalSites END -->


<script type="text/javascript" async="" src="//c1.mifile.cn/f/i/15/stat//xmst.js"></script><script src="//s01.mifile.cn/js/base.min.js?v2016d30"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        orderSite: 'http://order.mi.com',
        wwwSite: '//www.mi.com',
        cartSite: '//cart.mi.com',
        itemSite: '//item.mi.com',
        assetsSite: '//s01.mifile.cn',
        listSite: '//list.mi.com',
        searchSite: '//search.mi.com',
        mySite: '//my.mi.com',
        damiaoSite: 'http://tp.hd.mi.com/',
        damiaoGoodsId:[],
        logoutUrl: 'http://order.mi.com/site/logout',
        staticSite: '//static.mi.com',
        quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
    };
    MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
    MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
    MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
    MI.miniCart.init();
    MI.updateMiniCart();
})();
</script>

<script type="text/javascript" src="//s01.mifile.cn/js/user/user.min.js?v=2016053002"></script>

<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = '//c1.mifile.cn/f/i/15/stat/js/xmst.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection

