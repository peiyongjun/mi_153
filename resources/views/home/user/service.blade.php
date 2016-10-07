@extends('home.user.userbase')
@section("css")
<html lang="zh-CN" xml:lang="zh-CN"><head><script type="text/javascript" async="" src="//a.stat.xiaomi.com/js/mstr.js?mid=1157822905&amp;phpsessid=&amp;mstuid=1474968511570_2074&amp;muuid=&amp;mucid=&amp;sessionId=622614347&amp;step=59&amp;new_visitor=0&amp;mstprevpid=5eab40056fa03ac0-49e8df0584b02364&amp;mstprev_pid_loc=pcpid&amp;prevtarget=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;lastsource=dzx.com&amp;timestamp=1475027984813&amp;ref=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;domain=.mi.com&amp;screen=1366*768&amp;language=zh-CN&amp;vendor=Google Inc.&amp;platform=Win32&amp;gu=http%3A%2F%2Fservice.order.mi.com%2Frecord%2Flist&amp;pu=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;rf=1&amp;mutid=&amp;muwd=&amp;domain_id=100&amp;pageid=0d0f6bc4d02045a2&amp;curl=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;xmv=1474968511570_2074_1475026577504&amp;v=1.4.10&amp;vuuid=HDKDH9B6OALN14FJ&amp;fs=159&amp;ws=159&amp;ua=531&amp;td=650&amp;type=performance"></script><script type="text/javascript" async="" src="//c1.mifile.cn/f/i/15/stat/js/unjcV2.js"></script><script type="text/javascript" async="" src="//a.stat.xiaomi.com/js/mstr.js?mid=1157822905&amp;phpsessid=&amp;mstuid=1474968511570_2074&amp;muuid=&amp;mucid=&amp;sessionId=622614347&amp;step=58&amp;new_visitor=0&amp;mstprevpid=5eab40056fa03ac0-49e8df0584b02364&amp;mstprev_pid_loc=pcpid&amp;prevtarget=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;lastsource=dzx.com&amp;timestamp=1475027984702&amp;ref=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;domain=.mi.com&amp;screen=1366*768&amp;language=zh-CN&amp;vendor=Google Inc.&amp;platform=Win32&amp;gu=http%3A%2F%2Fservice.order.mi.com%2Frecord%2Flist&amp;pu=http%3A%2F%2Fstatic.mi.com%2Forder%2F&amp;rf=0&amp;mutid=&amp;muwd=&amp;ldns=0&amp;con=35&amp;res=41&amp;down=13&amp;redi=0&amp;domain_id=100&amp;pageid=0d0f6bc4d02045a2&amp;curl=http%3A%2F%2Fservice.order.mi.com%2Fapply%2Ffill&amp;xmv=1474968511570_2074_1475026577504&amp;v=1.4.10&amp;vuuid=HDKDH9B6OALN14FJ"></script><script type="text/javascript" async="" src="//c1.mifile.cn/f/i/15/stat/js/jquery.statData.min.js?d=2016928"></script>
<style>
    #service a{
        color:#FF6700;
    }
</style>
<link rel="stylesheet" href="http://s01.mifile.cn/css/base.min.css?20160301">
<link rel="stylesheet" href="http://s01.mifile.cn/css/user/main.min.css?20160301">
<link rel="stylesheet" type="text/css" href="/service/css/main.min.css?20160420">
@endsection
@section('userContent')
<div class="span16">
    <div class="service-box service-main-box">
        <div class="service-content-box">
            <div class="box-hd">
                <h1 class="title">申请售后服务</h1>
            </div>
            <div class="box-bd">
                <div class="service-progress">
                    <ol class="service-progress-list service-progress-list-col-3 clearfix">
                        <li class="step step-first step-active">
                            <div class="progress"><span class="text">选择产品和服务</span></div>
                        </li>
                        <li class="step">
                            <div class="progress"><span class="text">填写申请单</span></div>
                        </li>
                        <li class="step step-last">
                            <div class="progress"><span class="text">完成申请</span></div>
                        </li>
                    </ol>
                </div>

                <form id="J_fillForm" action="#" method="post">
                    <input type="hidden" name="selectedOrg" value="">
                    <div class="service-section">
                        <div class="section-hd">
                            <h2 class="section-title">填写商品信息</h2>
                        </div>
                        <div class="section-bd">
                            <h3 class="label-title">产品型号</h3>
                            <ul class="service-label-list clearfix J_labelList J_productInfoCategoryList" data-step="1">
                                                                        <li data-toggle="step"><label><input type="radio" name="product_category" value="10000001">移动通讯</label></li>
                                                                        <li data-toggle="step"><label><input type="radio" name="product_category" value="10000003">智能家庭</label></li>
                                                                        <li data-toggle="step"><label><input type="radio" name="product_category" value="10000004">办公数码</label></li>
                                                            </ul>
                            <div id="J_categoryWrapper" class="step-container hide" data-step="2">
                                <h3 class="label-title">产品类别</h3>
                                <div class="form-row clearfix">
                                    <fieldset class="form-section">
                                        <div class="xm-select">
                                            <div class="dropdown">
                                                <label class="iconfont" for="J_categoryDepth1"></label>
                                                <select id="J_categoryDepth1" name="category_depth_1" data-placeholder="请选择大分类">
                                                    <option value="">请选择大分类</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-section">
                                        <div class="xm-select">
                                            <div class="dropdown">
                                                <label class="iconfont" for="J_categoryDepth2"></label>
                                                <select id="J_categoryDepth2" name="category_depth_2" data-placeholder="请选择小分类">
                                                    <option value="">请选择小分类</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="serial-section">
                                    <div class="serial-section-imei J_serialSection hide" data-serial-type="IMEI">
                                        <h3 class="label-title">IMEI号 <i class="icon icon-help"></i></h3>
                                        <fieldset class="form-section">
                                            <label class="input-label hide" for="imei">IMEI</label>
                                            <input class="input-text" type="text" id="imei" name="imei" data-valid="off" data-valid-type="required">
                                            <span class="input-tip">手机输入*#06#或查看包装盒底部</span>
                                        </fieldset>
                                    </div>
                                    <div class="serial-section-sn J_serialSection hide" data-serial-type="SN">
                                        <h3 class="label-title">SN号 <i class="icon icon-help"></i></h3>
                                        <fieldset class="form-section">
                                            <label class="input-label hide" for="sn">SN</label>
                                            <input class="input-text" type="text" id="sn" name="sn" data-valid="off" data-valid-type="required">
                                            <span class="input-tip">查看机器背部或包装盒</span>
                                        </fieldset>
                                    </div>
                                    <div class="serial-section-sn J_serialSection hide" data-serial-type="NA">
                                        <h3 class="label-title">数量 <i class="icon icon-help"></i></h3>
                                        <fieldset class="form-section">
                                            <label class="input-label hide" for="num">数量</label>
                                            <div class="amount-controller" data-module="amount-controller">
                                                <span class="handle" data-toggle="minus"><i class="iconfont"></i></span>
                                                <input class="input-num" type="text" id="num" name="num" value="1" data-valid="off" data-valid-type="num">
                                                <span class="handle" data-toggle="plus"><i class="iconfont"></i></span>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <input type="hidden" id="J_serialType" name="serialType">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-section hide" data-step="3">
                        <div class="section-hd">
                            <h2 class="section-title">发票信息</h2>
                        </div>
                        <div class="section-bd">
                            <ul class="service-label-list clearfix J_labelList J_invoiceToggle">
                                <li><label class="active"><input type="radio" name="invoice" value="1" checked="">有发票</label></li>
                                <li><label><input type="radio" name="invoice" value="0">无发票</label></li>
                            </ul>
                            <div class="invoice-info J_invoiceInfo">
                                <h3 class="label-title">发票日期</h3>
                                <fieldset class="form-section">
                                    <label class="input-label hide" for="invoice_date">发票日期</label>
                                    <input class="input-text J_inputDate" type="text" id="invoice_date" name="invoice_date" data-date-end-date="0d" data-valid="date">
                                </fieldset>
                                <h3 class="label-title label-title-row">上传发票照片（不超过3MB，支持jpg、png、gif格式）</h3>
                                <fieldset class="form-section">
                                    <div id="invoiceImgContainer" class="uploader clearfix">
                                        <a id="invoiceImgUploader" class="btn-uploader J_btnUploader" href="javascript: void(0);" data-uploader-name="invoiceImg" data-biz-name="invoice" data-stat-id="b33ab8455a9eb16a" onclick="_msq.push(['trackEvent', '0d0f6bc4d02045a2-b33ab8455a9eb16a', 'javascript:void(0);', 'pcpid']);" style="position: relative; z-index: 1;">添加图片</a>
                                    <p class="result hide"></p><div id="html5_1atn89o8s1j501s665ud12ijrl43_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;"><input id="html5_1atn89o8s1j501s665ud12ijrl43" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" multiple="" accept="image/jpeg,.jpg,image/png,.png,image/gif,.gif"></div></div>
                                    <input type="hidden" name="invoiceImgUrl" data-valid="">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="service-section hide" data-step="3">
                        <input class="btn btn-primary" type="submit" value="确认选择">
                        <p class="msg msg-error"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
   var _allCategoryInfo = '{"0":{"10000001":{"id":10000001,"name":"\u79fb\u52a8\u901a\u8baf","level":1,"parentId":0},"10000003":{"id":10000003,"name":"\u667a\u80fd\u5bb6\u5ead","level":1,"parentId":0},"10000004":{"id":10000004,"name":"\u529e\u516c\u6570\u7801","level":1,"parentId":0}},"10000001":{"20000001":{"id":20000001,"name":"\u624b\u673a\/\u5e73\u677f","level":2,"parentId":10000001},"20000002":{"id":20000002,"name":"\u8fd0\u8425\u5546\u5408\u7ea6\u673a","level":2,"parentId":10000001}},"10000003":{"20000007":{"id":20000007,"name":"\u5927\u5bb6\u7535","level":2,"parentId":10000003},"20000008":{"id":20000008,"name":"\u751f\u6d3b\u667a\u80fd","level":2,"parentId":10000003},"20000011":{"id":20000011,"name":"\u7f51\u7edc\u914d\u4ef6","level":2,"parentId":10000003}},"10000004":{"20000014":{"id":20000014,"name":"\u667a\u80fd\u8bbe\u5907","level":2,"parentId":10000004}},"20000001":{"30000001":{"id":30000001,"name":"\u624b\u673a","level":3,"parentId":20000001,"serialType":"IMEI"},"30000002":{"id":30000002,"name":"\u5e73\u677f","level":3,"parentId":20000001,"serialType":"SN"}},"20000002":{"30000003":{"id":30000003,"name":"\u5408\u7ea6\u673a","level":3,"parentId":20000002,"serialType":"IMEI"}},"20000007":{"30000023":{"id":30000023,"name":"\u7535\u89c6","level":3,"parentId":20000007,"serialType":"SN"},"30000024":{"id":30000024,"name":"\u97f3\u7bb1\/\u97f3\u54cd","level":3,"parentId":20000007,"serialType":"SN"},"30000025":{"id":30000025,"name":"\u5bb6\u5ead\u97f3\u54cd","level":3,"parentId":20000007,"serialType":"SN"}},"20000008":{"30000026":{"id":30000026,"name":"\u7a7a\u6c14\u51c0\u5316\u5668","level":3,"parentId":20000008,"serialType":"SN"},"30000027":{"id":30000027,"name":"\u51c0\u6c34\u5668","level":3,"parentId":20000008,"serialType":"SN"},"30000029":{"id":30000029,"name":"\u7535\u996d\u7172","level":3,"parentId":20000008,"serialType":"SN"},"30000086":{"id":30000086,"name":"\u7535\u6c34\u58f6","level":3,"parentId":20000008,"serialType":"SN"}},"20000011":{"30000039":{"id":30000039,"name":"\u76d2\u5b50","level":3,"parentId":20000011,"serialType":"SN"},"30000040":{"id":30000040,"name":"\u8def\u7531\u5668","level":3,"parentId":20000011,"serialType":"SN"}},"20000014":{"30000048":{"id":30000048,"name":"\u5e73\u8861\u8f66","level":3,"parentId":20000014,"serialType":"SN"},"30000050":{"id":30000050,"name":"\u513f\u7ae5\u667a\u80fd\u624b\u8868","level":3,"parentId":20000014,"serialType":"IMEI"}},"20000027":{"30000092":{"id":30000092,"name":"\u7b14\u8bb0\u672c","level":3,"parentId":20000027,"serialType":"SN"}}}';
</script>
<script type="text/javascript" src="/service/js/main.min.js?20160420"></script>
<script type="text/javascript" src="/service/js/plugin/plupload.full.min.js?20160420"></script>
<script type="text/javascript" src="/service/js/plugin/plupload.zh-CN.min.js?20160420"></script>
<script type="text/javascript" src="/service/js/uploader.min.js?20160809"></script>
<script type="text/javascript" src="/service/js/applyFill.min.js?20160420"></script>
@endsection
