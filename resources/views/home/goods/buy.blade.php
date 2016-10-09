@extends('layout.base')
@section('content')
<div class="pro-choose-main clearfix container" id="J_chooseMain" style="width:1226px;">
	<div class="pro-view">
		<img src="/Uploads/picture/{{ $info->img }}" alt="小米Max" id="J_proImg"/>
	</div>
	<div class="pro-info">
		<div class="pro-title clearfix">
			<h1>
				<span class="pro-name J_proDesc">购买{{ $info->name }}</span>
				<span class="pro-price J_proPrice">{{ $info->price }}元</span>
			</h1>
			<a href="#" class="pro-more" target="_blank" id="J_proMore">深入了解产品></a>
		</div>
		<div id="J_proStep">
			<div class="pro-choose-step J_step" data-index="1">
				<div class="step-title">
        			1. 选择版本 
					<i class="pro-version-desc-icon">!</i>
					<span class="pro-version-desc J_verDesc" data-index="1">高通骁龙652处理器，双卡双待，支持移动、联通、电信4G/3G/2G网络</span>
				</div>
				<ul class="step-list clearfix J_stepList">
					<li class="J_stepItem active"> 全网通 3GB内存+64GB容量 </li>
					<li class="J_stepItem"> 全网通 3GB内存+32GB容量 </li>
					<li class="J_stepItem"> 全网通 4GB内存+128GB容量 </li>
				</ul>
			</div>
			<div class="pro-choose-step J_step" data-index="2">
				<div class="step-title">
       				2. 选择颜色 
					<i class="pro-version-desc-icon">!</i>
					<span class="pro-version-desc J_verDesc" data-index="2"></span>
				</div>
				<ul class="step-list clearfix J_stepList">
					<li class="J_stepItem"> 金色 </li>
					<li class="J_stepItem"> 银色 </li>
					<li class="J_stepItem"> 浅灰 </li>
				</ul>
			</div>
		</div>
		<div class="choose-result-msg" id="J_chooseResultMsg">
			<span class="msg-tit">您选择了以下产品:</span>
			<p class="msg-bd">
				小米Max 全网通 3GB内存+64GB容量
			</p>
		</div>
		<div class="pro-choose-result hide" id="J_chooseResult">
		</div>
		<div class="pro-choose-result" id="J_chooseResultInit">
			<a href="javascript:void(0);" class="btn btn-large btn-dakeLight" data-stat-id="7326452943dc03b6" onclick="_msq.push(['trackEvent', '2efcf5f85ac0e8de-7326452943dc03b6', 'javascript:void(0);', 'pcpid']);">下一步</a>
			<!-- <span class="next-desc">请选择商品</span> -->
		</div>
	</div>
	<!-- pro-info END -->
</div>
@endsection
