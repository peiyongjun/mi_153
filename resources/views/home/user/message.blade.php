@extends('home.user.userbase')
@section("css")
<style>
    #message a{
        color:#FF6700;
    }
</style>
@endsection
@section('userContent')
<div class="span16">
    <div class="span16">
        <div class="span16 J_o_m message-wrap">
            <div class="uc-box uc-main-box">
                <div class="uc-content-box">
                    <div class="box-hd">
                        <h1 class="title">消息通知</h1>
                        <div class="more clearfix">
                            <ul class="filter-list J_addrType">
                                <li class="first active">
                                <a href="#category=all" data-stat-id="a1586e17d467508d" onclick="_msq.push(['trackEvent', '450aa89699906dba-a1586e17d467508d', '#category=all', 'pcpid']);">全部消息<span class="m-num"></span></a>
                                </li>
                                <li>
                                <a href="#category=express" data-stat-id="86a07ccd3e40c1d2" onclick="_msq.push(['trackEvent', '450aa89699906dba-86a07ccd3e40c1d2', '#category=express', 'pcpid']);">物流动态</a>
                                </li>
                                <!--   <li>
                                <a href="#category=comment">商品评价</a>
                                </li>
                                 -->
                                <li>
                                <a href="#category=activity" data-stat-id="61be8dd2eb358a56" onclick="_msq.push(['trackEvent', '450aa89699906dba-61be8dd2eb358a56', '#category=activity', 'pcpid']);">特惠活动</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-main">
                <div class="message-list J_mList" id="J_msgList" data-stat-title="aaa">
                    <div class="no-data">
                        暂无数据
                    </div>
                </div>
                <div class="J_mPager">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
