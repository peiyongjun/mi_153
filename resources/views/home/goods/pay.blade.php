<!DOCTYPE HTML>
<html lang="zh-CN" xml:lang="zh-CN">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta charset="UTF-8" />
        <title>
            选择在线支付方式
        </title>
        <meta name="viewport" content="width=1226" />
        <link rel="shortcut icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon"
        />
        <link rel="icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon"
        />
        <link rel="stylesheet" href="//s01.mifile.cn/css/base.min.css?v2016d35"
        />
        <link rel="stylesheet" type="text/css" href="//s01.mifile.cn/css/pay-confirm.min.css?v=2016081101"/>
    </head>
    <body>
        <div class="site-header site-mini-header">
            <div class="container">
                <div class="header-logo">
                    <a class="logo " href="//www.mi.com/index.html" title="小米官网">
                    </a>
                </div>
                <div class="header-title" id="J_miniHeaderTitle">
                </div>
                <div class="topbar-info" id="J_userInfo">
                    @if(!session("user"))
                    <a class="link" href="//order.mi.com/site/login" data-needlogin="true">
                        登录
                    </a>
                    <span class="sep">
                        |
                    </span>
                    <a class="link" href="#">
                        注册
                    </a>
                    @endif
                    <a class="link" href="//order.mi.com/site/login" data-needlogin="true">
                        {{ session('user')->username }}
                    </a>
                    <span class="sep">
                        |
                    </span>
                    <a class="link" href="https://account.xiaomi.com/pass/register">
                        订单中心
                    </a>
                </div>
            </div>
        </div>
        <!-- .site-mini-header END -->
        <div class="page-main">
            <div class="container confirm-box">
                <form target="_blank" action="#" id="J_payForm" method="post">
                    <div class="section section-order">
                        <div class="order-info clearfix">
                            <div class="fl">
                                <h2 class="title">
                                    订单提交成功！去付款咯～
                                </h2>
                                <p class="order-time" id="J_deliverDesc">
                                    现在支付，预计3-8天送达
                                    <span class="beta">
                                        Beta
                                    </span>
                                </p>
                                <p class="order-time">
                                    请在
                                    <span class="pay-time-tip">
                                        1小时
                                    </span>
                                    内完成支付, 超时后将取消订单
                                </p>
                            </div>
                            <div class="fr">
                                <p class="total">
                                    应付总额：
                                    <span class="money">
                                        <em>
                                            {{ $price }}
                                        </em>
                                        元
                                    </span>
                                </p>
                                <a href="javascript:void(0);" class="show-detail" id="J_showDetail">
                                    地址查询
                                    <i class="iconfont">
                                        &#xe61c;
                                    </i>
                                </a>
                            </div>
                        </div>
                        <i class="iconfont icon-right">
                            &#x221a;
                        </i>
                        <div class="order-detail">
                            <ul>
                                <li class="clearfix">
                                    <div class="content">
                                        <span class="order-num">
                                        </span>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="label">
                                        收货信息：
                                    </div>
                                    <div class="content">
                                        姓名&nbsp;{{ $data['del_name'] }}&nbsp; &nbsp;电话&nbsp;{{ $data['phone']
                                        }}&nbsp;{{ $data['province'] }}&nbsp;{{ $data['city'] }}&nbsp;{{ $data['district']
                                        }}&nbsp;@if(!empty($data['address']))&nbsp; {{ $data['address'] }}&nbsp;
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="section section-payment">
                        <div class="cash-title" id="J_cashTitle">
                            选择以下支付方式付款
                        </div>
                        <!-- <div class="payment-box">
                        <div class="payment-header clearfix">
                        <h3 class="title">最近使用过: </h3>
                        </div>
                        <div class="payment-body">
                        <ul class="clearfix payment-list J_paymentList J_linksign-customize">
                        <li></li>
                        <li></li>
                        </ul>
                        </div>
                        </div> -->
                        <div class="payment-box ">
                            <div class="payment-header clearfix">
                                <h3 class="title">
                                    支付平台
                                </h3>
                                <span class="desc">
                                </span>
                            </div>
                            <div class="payment-body">
                                <ul class="clearfix payment-list J_paymentList J_linksign-customize">
                                    <li>
                                        <img id="tid" src="//c1.mifile.cn/f/i/15/pay/wechat0715.jpg" alt="" style="margin-left: 0;"
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="alipay" value="alipay" />
                                        <img src="//c1.mifile.cn/f/i/15/pay/alipay-0718-1.png" alt="" style="margin-left: 0;"
                                        />
                                    </li>
                                </ul>
                                <div class="event-desc">
                                    <p>
                                        微信支付：关注小米手机微信公众号，支付成功后可领取3-10元电影票红包。
                                    </p>
                                    <p>
                                        支 付 宝：支付宝扫码支付满38元，参与赢取1999元红包
                                    </p>
                                    <p>
                                        银联在线支付：每天10点，银联卡（卡号62开头）付款，每单享6.2折（最高立减30元），数量有限。
                                    </p>
                                    <a href="http://www.mi.com/c/payrule/" class="more" target="_blank">
                                        了解更多&gt;
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="payment-box ">
                            <div class="payment-header clearfix">
                                <h3 class="title">
                                    银行借记卡及信用卡
                                </h3>
                            </div>
                            <div class="payment-body">
                                <ul class="clearfix payment-list payment-list-much J_paymentList J_linksign-customize">
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CMB" value="CMB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_zsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="ICBCB2C" value="ICBCB2C"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_gsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CCB" value="CCB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_jsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="COMM" value="COMM" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_jtyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="ABC" value="ABC" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_nyyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="BOCB2C" value="BOCB2C" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_zgyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="PSBC-DEBIT" value="PSBC-DEBIT"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_youzheng.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="GDB" value="GDB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_gfyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="SPDB" value="SPDB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_pufa.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CEBBANK" value="CEBBANK"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_gdyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="SPABANK" value="SPABANK"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_payh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CIB" value="CIB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_xyyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CMBC" value="CMBC" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_msyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="BOB" value="BOB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_bjyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CITIC" value="CITIC" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_zxyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="SHBANK" value="SHBANK" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_shyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="BJRCB" value="BJRCB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_bjnsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="NBBANK" value="NBBANK" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_nbyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="HZCBB2C" value="HZCBB2C"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_hzyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="SHRCB" value="SHRCB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_shnsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="FDB" value="FDB" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_fcyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_showMore">
                                        <span class="text hide">
                                            查看更多
                                        </span>
                                        <span class="text ">
                                            收起更多
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-box payment-box-last ">
                            <div class="payment-header clearfix">
                                <h3 class="title">
                                    快捷支付
                                </h3>
                                <span class="desc">
                                    （支持以下各银行信用卡以及部分银行借记卡）
                                </span>
                            </div>
                            <div class="payment-body">
                                <ul class="clearfix payment-list  J_paymentList J_linksign-customize">
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CMB-KQ" value="CMB-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_zsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="COMM-KQ" value="COMM-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_jtyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CCB-KQ" value="CCB-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_jsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="ICBCB2C-KQ" value="ICBCB2C-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_gsyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CITIC-KQ" value="CITIC-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_zxyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CEBBANK-KQ" value="CEBBANK-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_gdyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="BOCB2C-KQ" value="BOCB2C-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_zgyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="SRCB-KQ" value="SRCB-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_shncsyyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="JSB-KQ" value="JSB-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_jiangsshuyh.png?ver2015"
                                        alt="" />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CMBC-KQ" value="CMBC-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_msyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="CIB-KQ" value="CIB-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_xyyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="ABC-KQ" value="ABC-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_nyyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="SPABANK-KQ" value="SPABANK-KQ"
                                        />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_payh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="HXB-KQ" value="HXB-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_hyyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="GDB-KQ" value="GDB-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_gfyh.png?ver2015" alt=""
                                        />
                                    </li>
                                    <li class="J_bank">
                                        <input type="radio" name="payOnlineBank" id="BOB-KQ" value="BOB-KQ" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_bjyh.png?ver2015" alt=""
                                        />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section section-installment" id="J_paymentFenqi">
                        <div class="payment-box">
                            <div class="payment-header clearfix">
                                <h3 class="title">
                                    分期付款
                                </h3>
                                <span class="desc">
                                    （支持金额在 600~30000元 的订单）
                                </span>
                            </div>
                            <div class="payment-body">
                                <ul class="clearfix payment-list J_paymentList J_linksign-customize J_tabSwitch">
                                    <li class="J_bank fenqi" id="J_huabeifenqi" data-isinstalment="true">
                                        <input autocomplete="off" type="radio" name="payOnlineBank" id="antinstal"
                                        value="antinstal" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_ant_huabei.png" alt=""
                                        />
                                    </li>
                                    <li class="J_bank fenqi" data-isinstalment="true">
                                        <input autocomplete="off" type="radio" name="payOnlineBank" id="cmbinstal"
                                        value="cmbinstal" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_zsyh.png" alt="" />
                                    </li>
                                    <li class="J_bank fenqi" data-isinstalment="true">
                                        <input autocomplete="off" type="radio" name="payOnlineBank" id="CCB-INSTAL"
                                        value="CCB-INSTAL" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_jsyh.png" alt="" />
                                    </li>
                                    <li class="J_bank fenqi" data-isinstalment="true">
                                        <input autocomplete="off" type="radio" name="payOnlineBank" id="ICBCB2C-INSTAL"
                                        value="ICBCB2C-INSTAL" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_gsyh.png" alt="" />
                                    </li>
                                    <li class="J_bank fenqi" data-isinstalment="true">
                                        <input autocomplete="off" type="radio" name="payOnlineBank" id="ABC-INSTAL"
                                        value="ABC-INSTAL" />
                                        <img src="//s01.mifile.cn/i/banklogo/payOnline_nyyh.png" alt="" />
                                    </li>
                                </ul>
                                <div class="tab-container clearfix isinstalment-box">
                                    <div class="tab-content  clearfix">
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    511.15元 × 3期
                                                </h3>
                                                <p>
                                                    手续费 11.49元/期，费率2.3%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_3"
                                                value="3">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    261.07元 × 6期
                                                </h3>
                                                <p>
                                                    手续费 11.24元/期，费率4.5%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_6"
                                                value="6">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    134.90元 × 12期
                                                </h3>
                                                <p>
                                                    手续费 9.99元/期，费率8.0%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_12"
                                                value="12">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-desc">
                                            分期付款说明：
                                            <br/>
                                            1、选择蚂蚁花呗分期后，如更改分期数或切换其他支付方式遇到问题，推荐您使用小米钱包进行支付。
                                            <br/>
                                            2、每期还款金额是根据你的订单估算得出的金额，实际支付数额请以支付宝账单为准，支付宝有权决定是否接受您的分期付款申请。
                                        </div>
                                    </div>
                                    <div class="tab-content  clearfix">
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    517.65元 × 3期
                                                </h3>
                                                <p>
                                                    手续费 17.99元/期，费率3.6%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_3"
                                                value="3">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    261.83元 × 6期
                                                </h3>
                                                <p>
                                                    手续费 11.99元/期，费率4.8%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_6"
                                                value="6">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    133.91元 × 12期
                                                </h3>
                                                <p>
                                                    手续费 8.99元/期，费率7.2%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_12"
                                                value="12">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-desc">
                                            分期付款说明：
                                            <br/>
                                            每期还款金额是根据你的订单估算得出的金额，实际支付数额请以银行/支付宝账单为准，银行/支付宝有权决定是否接受您的分期付款申请。
                                        </div>
                                    </div>
                                    <div class="tab-content  clearfix">
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    507.16元 × 3期
                                                </h3>
                                                <p>
                                                    手续费 7.5元/期，费率1.5%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_3"
                                                value="3">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    254.83元 × 6期
                                                </h3>
                                                <p>
                                                    手续费 5元/期，费率2%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_6"
                                                value="6">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    129.91元 × 12期
                                                </h3>
                                                <p>
                                                    手续费 5元/期，费率4%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_12"
                                                value="12">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-desc">
                                            分期付款说明：
                                            <br/>
                                            每期还款金额是根据你的订单估算得出的金额，实际支付数额请以银行/支付宝账单为准，银行/支付宝有权决定是否接受您的分期付款申请。
                                        </div>
                                    </div>
                                    <div class="tab-content  clearfix">
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    505.66元 × 3期
                                                </h3>
                                                <p>
                                                    手续费 6元/期，费率1.2%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_3"
                                                value="3">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    254.33元 × 6期
                                                </h3>
                                                <p>
                                                    手续费 4.5元/期，费率1.8%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_6"
                                                value="6">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    129.41元 × 12期
                                                </h3>
                                                <p>
                                                    手续费 4.5元/期，费率3.6%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_12"
                                                value="12">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                            </div>
                                        </div>
                                        <div class="isinstalment-desc">
                                            分期付款说明：
                                            <br/>
                                            每期还款金额是根据你的订单估算得出的金额，实际支付数额请以银行/支付宝账单为准，银行/支付宝有权决定是否接受您的分期付款申请。
                                        </div>
                                    </div>
                                    <div class="tab-content  clearfix">
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    505.66元 × 3期
                                                </h3>
                                                <p>
                                                    手续费 6元/期，费率1.2%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_3"
                                                value="3">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                                <div style="margin-top:4px;font-size: 12px">
                                                    <span>
                                                        农行分期暂只支持K宝/K令支付
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    255.08元 × 6期
                                                </h3>
                                                <p>
                                                    手续费 5.25元/期，费率2.1%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_6"
                                                value="6">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                                <div style="margin-top:4px;font-size: 12px">
                                                    <span>
                                                        农行分期暂只支持K宝/K令支付
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="isinstalment-item  clearfix" style="height:150px;">
                                            <div class="item-header">
                                                <h3>
                                                    129.79元 × 12期
                                                </h3>
                                                <p>
                                                    手续费 4.87元/期，费率3.9%
                                                </p>
                                            </div>
                                            <br/>
                                            <div class="item-footer">
                                                <input type="radio" name="installments" id="installments_cmbinstal_12"
                                                value="12">
                                                <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">
                                                    选择该分期方式
                                                </a>
                                                <div style="margin-top:4px;font-size: 12px">
                                                    <span>
                                                        农行分期暂只支持K宝/K令支付
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="isinstalment-desc">
                                            分期付款说明：
                                            <br/>
                                            每期还款金额是根据你的订单估算得出的金额，实际支付数额请以银行/支付宝账单为准，银行/支付宝有权决定是否接受您的分期付款申请。
                                        </div>
                                    </div>
                                </div>
                                <div class="isinstalment-desc" id="J_isinstalmentPublicDesc">
                                    分期付款说明：
                                    <br>
                                    每期还款金额是根据你的订单估算得出的金额，实际支付数额请以银行/支付宝账单为准，银行/支付宝有权决定是否接受您的分期付款申请。
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="site-footer">
            <div class="container">
                <div class="footer-service">
                    <ul class="list-service clearfix">
                        <li>
                            <a rel="nofollow" href="//www.mi.com/static/fast/" target="_blank">
                                <i class="iconfont">
                                    &#xe634;
                                </i>
                                预约维修服务
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="//www.mi.com/service/exchange#back" target="_blank">
                                <i class="iconfont">
                                    &#xe635;
                                </i>
                                7天无理由退货
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="//www.mi.com/service/exchange#free" target="_blank">
                                <i class="iconfont">
                                    &#xe636;
                                </i>
                                15天免费换货
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="//www.mi.com/service/exchange#mail" target="_blank">
                                <i class="iconfont">
                                    &#xe638;
                                </i>
                                满150元包邮
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="//www.mi.com/static/maintainlocation/" target="_blank">
                                <i class="iconfont">
                                    &#xe637;
                                </i>
                                520余家售后网点
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-links clearfix">
                    <dl class="col-links col-links-first">
                        <dt>
                            帮助中心
                        </dt>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/service/account/register/" target="_blank">
                                账户管理
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/service/buy/buytime/" target="_blank">
                                购物指南
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/service/order/sendprogress/" target="_blank">
                                订单操作
                            </a>
                        </dd>
                    </dl>
                    <dl class="col-links ">
                        <dt>
                            服务支持
                        </dt>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/service/exchange" target="_blank">
                                售后政策
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="http://fuwu.mi.com/" target="_blank">
                                自助服务
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="http://xiazai.mi.com/" target="_blank">
                                相关下载
                            </a>
                        </dd>
                    </dl>
                    <dl class="col-links ">
                        <dt>
                            线下门店
                        </dt>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/c/xiaomizhijia/" target="_blank">
                                小米之家
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/static/maintainlocation/" target="_blank">
                                服务网点
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/static/familyLocation/" target="_blank">
                                零售网点
                            </a>
                        </dd>
                    </dl>
                    <dl class="col-links ">
                        <dt>
                            关于小米
                        </dt>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/about" target="_blank">
                                了解小米
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank">
                                加入小米
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/about/contact" target="_blank">
                                联系我们
                            </a>
                        </dd>
                    </dl>
                    <dl class="col-links ">
                        <dt>
                            关注我们
                        </dt>
                        <dd>
                            <a rel="nofollow" href="http://e.weibo.com/xiaomishouji" target="_blank">
                                新浪微博
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat"
                            target="_blank">
                                小米部落
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="#J_modalWeixin" data-toggle="modal">
                                官方微信
                            </a>
                        </dd>
                    </dl>
                    <dl class="col-links ">
                        <dt>
                            特色服务
                        </dt>
                        <dd>
                            <a rel="nofollow" href="//order.mi.com/queue/f2code" target="_blank">
                                F 码通道
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="//www.mi.com/mimobile/" target="_blank">
                                小米移动
                            </a>
                        </dd>
                        <dd>
                            <a rel="nofollow" href="//order.mi.com/misc/checkitem" target="_blank">
                                防伪查询
                            </a>
                        </dd>
                    </dl>
                    <div class="col-contact">
                        <p class="phone">
                            400-100-5678
                        </p>
                        <p>
                            <span class="J_serviceTime-normal" style="
                            ">
                                周一至周日 8:00-18:00
                            </span>
                            <span class="J_serviceTime-holiday" style="display:none;">
                                2月7日至13日服务时间 9:00-18:00
                            </span>
                            <br>
                            （仅收市话费）
                        </p>
                        <a rel="nofollow" class="btn btn-line-primary btn-small" href="//www.mi.com/service/contact"
                        target="_blank">
                            <i class="iconfont">
                                &#xe600;
                            </i>
                            24小时在线客服
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-info">
            <div class="container">
                <span class="logo ir">
                    小米官网
                </span>
                <div class="info-text">
                    <p>
                        小米旗下网站：
                        <a href="//www.mi.com/index.html" target="_blank">
                            小米商城
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://www.miui.com/" target="_blank">
                            MIUI
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://www.miliao.com/" target="_blank">
                            米聊
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://www.duokan.com/" target="_blank">
                            多看书城
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://www.miwifi.com/" target="_blank">
                            小米路由器
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://call.mi.com/" target="_blank">
                            视频电话
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://blog.xiaomi.com/" target="_blank">
                            小米后院
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://xiaomi.tmall.com/" target="_blank">
                            小米天猫店
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://shop115048570.taobao.com" target="_blank">
                            小米淘宝直营店
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="http://union.mi.com/" target="_blank">
                            小米网盟
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="//static.mi.com/feedback/" target="_blank">
                            问题反馈
                        </a>
                        <span class="sep">
                            |
                        </span>
                        <a href="#J_modal-globalSites" data-toggle="modal" target="_blank">
                            Select Region
                        </a>
                    </p>
                    <p>
                        &copy;
                        <a href="//www.mi.com/" target="_blank" title="mi.com">
                            mi.com
                        </a>
                        京ICP证110507号
                        <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">
                            京ICP备10046444号
                        </a>
                        <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134"
                        target="_blank">
                            京公网安备11010802020134号
                        </a>
                        <a rel="nofollow" href="//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank"
                        rel="nofollow">
                            京网文[2014]0059-0009号
                        </a>
                        <br>
                        违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
                    </p>
                </div>
                <div class="info-links">
                    <a href="//privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&lang=zh-cn"
                    target="_blank">
                        <img src="//privacy-policy.truste.com/privacy-seal/seal?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8"
                        alt="TRUSTe Privacy Certification" />
                    </a>
                    <a href="//search.szfw.org/cert/l/CX20120926001783002010" target="_blank">
                        <img src="//s01.mifile.cn/i/v-logo-2.png" alt="诚信网站" />
                    </a>
                    <a href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&ct=df&pa=461082"
                    target="_blank">
                        <img src="//s01.mifile.cn/i/v-logo-1.png" alt="可信网站" />
                    </a>
                    <a href="http://www.315online.com.cn/member/315140007.html" target="_blank">
                        <img src="//s01.mifile.cn/i/v-logo-3.png" alt="网上交易保障中心" />
                    </a>
                </div>
            </div>
            <div class="slogan ir">
                探索黑科技，小米为发烧而生
            </div>
        </div>
        <script src="//s01.mifile.cn/js/base.min.js?v2016d35">
        </script>
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
                    damiaoSite: 'https://tp.hd.mi.com/',
                    damiaoGoodsId: [],
                    logoutUrl: 'http://order.mi.com/site/logout',
                    staticSite: '//static.mi.com',
                    quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
                };
                MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
                MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
                MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
                MI.miniCart.init();
                //MI.updateMiniCart();
            })();
        </script>
        <script type="text/javascript" src="//s01.mifile.cn/js/payConfirm.min.js?v=2016081101">
        </script>
    </body>
    <script type="text/javascript">
        var tid = document.getElementById('tid');
        tid.onclick = function() {
            if (confirm('确认支付吗?')) {
                window.location.href = "/validOrder/Status?id={{ $ppid }}";
            };
        }
    </script>

</html>