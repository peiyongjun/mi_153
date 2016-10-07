@extends('layout.base')
@section('content')
<style type="text/css">
    #J_navCategory a{
        display:none;
    }
</style>
<link rel="stylesheet" href="//s01.mifile.cn/css/base.min.css?v2016d30">
@yield("css")
<link rel="stylesheet" type="text/css" href="//s01.mifile.cn/css/user/main.min.css?v=2016053001">
<div id="J_navMenu" class="header-nav-menu" style="display: none;"><div class="container"><ul class="children-list clearfix">
                                                            <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/hezimini/" data-stat-id="10d5a2f4a9bccc86" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-10d5a2f4a9bccc86', '//www.mi.com/hezimini/', 'pcpid']);"><img src="//c1.mifile.cn/f/i/15/goods/nav/hezimini.png" data-src="//c1.mifile.cn/f/i/15/goods/nav/hezimini.png" srcset="//c1.mifile.cn/f/i/15/goods/nav/hezimini.png 2x" alt="小米盒子mini版" width="160" height="110"></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/hezimini/" data-stat-id="9896a6b18574443d" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9896a6b18574443d', '//www.mi.com/hezimini/', 'pcpid']);">小米盒子mini版</a></div>
                                    <p class="price">199元</p>                                                                    </li>
                                                            <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/hezi3/" data-stat-id="4a6940612a38a852" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4a6940612a38a852', '//www.mi.com/hezi3/', 'pcpid']);"><img src="//c1.mifile.cn/f/i/15/goods/nav/hezi3.png" data-src="//c1.mifile.cn/f/i/15/goods/nav/hezi3.png" srcset="//c1.mifile.cn/f/i/15/goods/nav/hezi3.png 2x" alt="小米盒子3" width="160" height="110"></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/hezi3/" data-stat-id="056fb7e4ea8dd552" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-056fb7e4ea8dd552', '//www.mi.com/hezi3/', 'pcpid']);">小米盒子3</a></div>
                                    <p class="price">249元</p>                                                                    </li>
                                                            <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/hezi3s/" data-stat-id="32a01e59d20f9fa7" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-32a01e59d20f9fa7', '//www.mi.com/hezi3s/', 'pcpid']);"><img src="//c1.mifile.cn/f/i/15/goods/nav/hezi3s!160x110.jpg" data-src="//c1.mifile.cn/f/i/15/goods/nav/hezi3s!160x110.jpg" srcset="//c1.mifile.cn/f/i/15/goods/nav/hezi3s!320x220.jpg 2x" alt="小米盒子3 增强版" width="160" height="110"></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/hezi3s/" data-stat-id="9c415465c2aba107" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9c415465c2aba107', '//www.mi.com/hezi3s/', 'pcpid']);">小米盒子3 增强版</a></div>
                                    <p class="price">399元</p>                                                                    </li>
                                                            <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/tvzj/" data-stat-id="c5c1e9de07b24ca5" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c5c1e9de07b24ca5', '//www.mi.com/tvzj/', 'pcpid']);"><img src="//c1.mifile.cn/f/i/g/2015/cn-index/zhuji!160x110.jpg" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/zhuji!160x110.jpg" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/zhuji!320x220.jpg 2x" alt="小米电视主机" width="160" height="110"></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/tvzj/" data-stat-id="9a31b67eade41359" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9a31b67eade41359', '//www.mi.com/tvzj/', 'pcpid']);">小米电视主机</a></div>
                                    <p class="price">999元</p>                                                                    </li>
                                                            <li>
                                    <div class="figure figure-thumb">
                                        <a href="//item.mi.com/1160800073.html" data-stat-id="0b9699df610dd856" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0b9699df610dd856', '//item.mi.com/1160800073.html', 'pcpid']);"><img src="//c1.mifile.cn/f/i/g/2015/cn-index/jinshuban!160x110.jpg" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/jinshuban!160x110.jpg" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/jinshuban!320x220.jpg 2x" alt="小米家庭音响 金属版" width="160" height="110"></a>
                                    </div>
                                    <div class="title"><a href="//item.mi.com/1160800073.html" data-stat-id="a36ad90018f6e523" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a36ad90018f6e523', '//item.mi.com/1160800073.html', 'pcpid']);">小米家庭音响 金属版</a></div>
                                    <p class="price">899元</p>                                                                    </li>
                                                            <li>
                                    <div class="figure figure-thumb">
                                        <a href="//item.mi.com/1160800074.html" data-stat-id="102cede91d10b78c" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-102cede91d10b78c', '//item.mi.com/1160800074.html', 'pcpid']);"><img src="//c1.mifile.cn/f/i/g/2015/cn-index/putonban!160x110.jpg" data-src="//c1.mifile.cn/f/i/g/2015/cn-index/putonban!160x110.jpg" srcset="//c1.mifile.cn/f/i/g/2015/cn-index/putonban!320x220.jpg 2x" alt="小米家庭音响 标准版" width="160" height="110"></a>
                                    </div>
                                    <div class="title"><a href="//item.mi.com/1160800074.html" data-stat-id="9d7925dc3e0008d1" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-9d7925dc3e0008d1', '//item.mi.com/1160800074.html', 'pcpid']);">小米家庭音响 标准版</a></div>
                                    <p class="price">699元</p>                                                                    </li>
                                                        </ul></div></div></div>


<div class="breadcrumbs">
    <div class="container">
        <a href="//www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid']);">首页</a><span class="sep">&gt;</span><span>个人中心</span>    </div>
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
                                <li id="myOrder"><a href="/myOrder" data-stat-id="8f3d1bffd166dc22" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-8f3d1bffd166dc22', '//static.mi.com/order/', 'pcpid']);">我的订单</a></li>
                                <li id="showOrder"><a href="/showOrder" data-count="comment" data-count-style="bracket" data-stat-id="20db2c68bfa9e4a5" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-20db2c68bfa9e4a5', 'http://order.mi.com/user/comment', 'pcpid']);">评价晒单</a></li>
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
                                <li><a href="https://account.xiaomi.com/" target="_blank" data-stat-id="35eef2fd7467d6ca" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-35eef2fd7467d6ca', 'https://account.xiaomi.com/', 'pcpid']);">个人信息</a></li>
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

