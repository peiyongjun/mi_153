@extends('layout.base')
@section('content')
<link rel="stylesheet" type="text/css" href="home/css/detailindex.min.css"/>
<div class="xm-product-box">
    <div class="hd nav-bar J_headNav">
        <div class="container">
            <div class="title">
                <h2>
       小米Max
                </h2>
            </div>
            <div class="nav">
                <span class="nav-switch">
                <a class="link active" href="/mimax/">概述</a>
                <span class="sep">|</span>
                <a class="link" href="/mimax/experience/">体验</a>
                <span class="sep">|</span>
                <a class="link" href="/mimax/performance/">性能</a>
                <span class="sep">|</span>
                <a class="link" href="/mimax/miui/">MIUI 8</a>
                <span class="sep">|</span>
                <a class="link" href="/mimax/design/">设计</a>
                <span class="sep">|</span>
                <a class="link" href="/mimax/specs/">参数</a>
                <span class="sep">|</span>
                <a class="link" href="//www.mi.com/service/safe" target="_blank">意外保</a>
                <span class="sep">|</span>
                <a class="link" href="//order.mi.com/queue/f2code" target="_blank">F码通道</a>
                </span>
                <a href="//item.mi.com/buyphone/mimax" target="_blank" class="btn btn-primary btn-small J_buyBtn">立即购买</a>
            </div>
        </div>
    </div>
    <div class="bd">
        <div class="nav-bar nav-bar-hidden J_fixNarBar">
            <div class="container">
                <div class="title">
                    <h2>
       小米Max
                    </h2>
                </div>
                <div class="nav">
                    <span class="nav-switch">
                    <a class="link active" href="/mimax/">概述</a>
                    <span class="sep">|</span>
                    <a class="link" href="/mimax/experience/">体验</a>
                    <span class="sep">|</span>
                    <a class="link" href="/mimax/performance/">性能</a>
                    <span class="sep">|</span>
                    <a class="link" href="/mimax/miui/">MIUI 8</a>
                    <span class="sep">|</span>
                    <a class="link" href="/mimax/design/">设计</a>
                    <span class="sep">|</span>
                    <a class="link" href="/mimax/specs/">参数</a>
                    <span class="sep">|</span>
                    <a class="link" href="//www.mi.com/service/safe" target="_blank">意外保</a>
                    <span class="sep">|</span>
                    <a class="link" href="//order.mi.com/queue/f2code" target="_blank">F码通道</a>
                    </span>
                    <a href="//item.mi.com/buyphone/mimax" target="_blank" class="btn btn-primary btn-small J_buyBtn">立即购买</a>
                </div>
            </div>
        </div>
        <div id="overall" class="mimax-overall J_visibleSectionContainer">
            <!-- 图片区域 -->
        </div>
    </div>
    <div id="J_modalPops" class="modal modal-pops fade modal-hide">
        <div class="modal-hd">
            <span class="title">选择手机</span>
            <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
        </div>
        <div class="modal-bd">
            <table>
            <tr>
                <th>
                    5.7"
                </th>
                <td data-type="2">
                    小米Note
                </td>
                <td data-type="3">
                    三星 GALAXY Note5
                </td>
            </tr>
            <tr>
                <th>
                    5.5"
                </th>
                <td data-type="5">
                    红米Note 3
                </td>
                <td data-type="6">
                    iPhone 6s Plus
                </td>
            </tr>
            <tr>
                <th>
                    5.15"
                </th>
                <td data-type="13" colspan="2">
                    小米5
                </td>
            </tr>
            <tr>
                <th>
                    5"
                </th>
                <td data-type="16" colspan="2">
                    红米3
                </td>
            </tr>
            <tr>
                <th>
                    4.7"
                </th>
                <td data-type="18" colspan="2">
                    iPhone 6s
                </td>
            </tr>
            </table>
            <p>
                更多参照机型，陆续推出。<a href="http://bbs.xiaomi.cn/t-12908764" target="_blank"> 告诉我们你想参照哪款机型？</a>
            </p>
            <div class="actions">
                <button class="btn btn-gray" data-dismiss="modal">取消</button>
                <button class="btn btn-primary J_btnType">确定</button>
            </div>
        </div>
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
<script src="home/js/base.min.js"></script>
<script type="text/javascript" src="home/js/index.min.js"></script>
<script src="home/js/xmsg_ti.js"></script>
@endsection

