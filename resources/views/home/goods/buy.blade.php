@extends('layout.base')
@section('content')
<div class="container">
	<div class="pro-choose-main clearfix container" id="J_chooseMain" style="">
		<div class="pro-view">
			<img src="/Uploads/picture/{{ $info->img }}" alt="小米Max" id="J_proImg"/>
		</div>
		<div class="pro-info">
			<div class="pro-title clearfix">
				<h1>
					<span class="pro-name J_proDesc">购买{{ $info->name }}</span>
					<span class="pro-price J_proPrice">{{ $info->price }}元</span>
				</h1>
				<a href="{{ URL('/detail/'.$info->id) }}" class="pro-more" target="_blank" id="J_proMore">深入了解产品></a>
			</div>
			<div id="J_proStep" style="height: 450px">
				<div class="pro-choose-step J_step" data-index="1">
					<div class="step-title">
	        			1. 选择版本 <i class="pro-version-desc-icon">!</i>
					</div>
					<ul class="step-list clearfix J_stepList">
						<!-- 选中在class加active -->
						@foreach($attr as $v)
						<li class="J_stepItem"> {{ $v }} </li>
						@endforeach
					</ul>
				</div>
				<div class="pro-choose-step J_step" data-index="2">
					<div class="step-title">
	       				2. 选择颜色 
						<i class="pro-version-desc-icon">!</i>
						<span class="pro-version-desc J_verDesc" data-index="2"></span>
					</div>
					<ul class="step-list clearfix J_stepList">
						<!-- 选中在class加active -->
						@foreach($color as $v)
						<li class="J_stepItem"> {{ $v }} </li>
						@endforeach
					</ul>
				</div>
			</div>
			<!-- 当前选择产品显示 -->
			<!-- <div class="choose-result-msg" id="J_chooseResultMsg">
				<span class="msg-tit">您选择了以下产品:</span>
				<p class="msg-bd">
					小米Max 全网通 3GB内存+64GB容量
				</p>
			</div> -->
			<div class="pro-choose-result hide" id="J_chooseResult">
			</div>
			<div class="pro-choose-result" id="J_chooseResultInit">
				<a href="javascript:void(0);" class="btn btn-large btn-primary btn-dakeLight">加入购物车</a>
				<!-- 按钮变色在class加btn-primary -->
				<a href="javascript:void(0);" class="btn btn-large btn-dakeLight">下一步</a>
				<!-- <span class="next-desc">请选择商品</span> -->
			</div>
		</div>
		<!-- pro-info END -->
	</div>
	<hr>
	<div class="main-pro-box" id="J_proDetailBox">
		<img src="/Uploads/specs/{{ $info->specs }}">
	</div>
</div>
@endsection
