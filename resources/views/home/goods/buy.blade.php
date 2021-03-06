@extends('layout.base')
@section('content')
<link rel="stylesheet" href="/home/css/buy-choose.min.css"/>
<div class="container">
	<div class="pro-choose-main clearfix container" id="J_chooseMain" style="">
		<div class="pro-view">
			<img src="/Uploads/picture/{{ $info->img }}" alt="小米Max" id="J_proImg"/>
		</div>
		<div class="pro-info">
			<div class="pro-title clearfix">
				<h1>
					<span class="pro-name J_proDesc">购买{{ $info->name }}</span>
					<span class="pro-price J_proPrice" id="skusPrice"></span>
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
						<li onclick="selectAttr(this)"> {{ $v }} </li>
						@endforeach
					</ul>
				</div>
				<div class="pro-choose-step J_step" data-index="2">
					<div class="step-title">
	       				2. 选择颜色 
						<i class="pro-version-desc-icon">!</i>
						<span class="pro-version-desc J_verDesc" data-index="2"></span>
					</div>
					<ul class="step-list clearfix J_stepList" id="chooseColor">
						<!-- 选中在class加active -->
						
					</ul>
				</div>
			</div>
			<!-- 当前选择产品显示 -->
			<div class="choose-result-msg" id="J_chooseResultMsg">
				<span class="msg-tit">您选择了以下产品:</span>
				<p class="msg-bd" id="msg">
					<span id="attr"></span>
					<span id="color"></span>
				</p>
			</div>
			<div class="pro-choose-result hide" id="J_chooseResult">
			</div>
			<div class="pro-choose-result" id="J_chooseResultInit">
				<a href="" class="btn btn-large btn-primary btn-dakeLight" id="cart">加入购物车</a>
				<!-- 按钮变色在class加btn-primary -->
				<a disabled href="" class="btn btn-large btn-dakeLight" id="next">下一步</a>
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
<script type="text/javascript">
	function selectAttr (attr)
	{
		$("li").removeClass("active");
		$(attr).toggleClass("active");
		$('#attr').html($(attr).html());//当前选择框内容
		$('#color').html('');
		checkSkus();
		var a = $('#attr').html();
		var b = {{ $info->id }};
		$("#chooseColor li").remove();
		$.ajax({
			type:"get",
			data:{attr:a,gid:b},
			url:"/getSkus",
			dataType:'json',
			success:function(data)
            {
            	for (var i = 0; i < data.length; i++) {
            		$("#chooseColor").append('<li class="color" id="+data[i].color+" onclick="selectColor(this)">'+data[i].color+"</li>");
            	};
            },
            error:function()
            {
            },     
		});	
	}
	function selectColor (color)
	{
		if ($('#attr').html()){
			$(".color").removeClass("active");
			$(color).toggleClass("active");
			$('#color').html($(color).html());//当前选择框内容
			checkSkus();
		};
		var a = $("#attr").html();
		var b = $("#color").html();
		var c = {{ $info->id }};
		$.ajax({
			url:"/getSkusId",
			type:"get",
			data:{a:a,b:b,c:c},
			dataType:"json",
			success:function(data)
			{
				var c = data[0];
				$("#skusPrice").html(data[1]+"元")
				$("#next").attr('href',"/buy/checkout/"+c);//给href属性赋值
				$("#cart").attr('href',"/buy/cart/"+c);//给href属性赋值			
			},
			error:function(data)
			{
				alert("库存不足");
				$("#next").removeClass("btn-primary");
				$("#next").attr('disabled',true);
			}
		});

	}
	function checkSkus ()
	{
		if ($("#attr").html() && $("#color").html()) {
			$("#next").addClass("btn-primary");
			$("#next").attr('disabled',false);

		}else{
			$("#next").removeClass("btn-primary");
			$("#next").attr('disabled',true);
		}
	}
	
</script>
@endsection
