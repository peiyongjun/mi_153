@extends('layout.base')
@section('content')
<style>
		#div1{
	    width:150px;
	    height:200px;
	    background-image:url('./home/Images/1.jpg');
	    position:absolute;
	    left:-150px;}
		b{
	    width:20px;
	    height:100px;
	    line-height:23px;
	    background:#D9B300;
	    position:absolute;
	    right:-20px;
	    top:5px;}
</style>
<link rel="stylesheet" href="/home/css/index.min.css"/>
<div class="home-hero-container container">
	<div class="home-hero">
		<div class="home-hero-slider">
			<div id="J_homeSlider" class="xm-slider" data-stat-title="焦点图轮播">
				<div class="slide" data-bg-set="{'img':'http://i3.mifile.cn/a4/3d43e725-326f-43e1-a373-c49eabf52b21','imgHd':'http://i3.mifile.cn/a4/8ad61f7c-9eae-4b02-9291-5acdb94269e1'}">
					<a href="//item.mi.com/buyphone/note3" data-stat-aid="AA13688" data-stat-pid="2_15_2_68" target="_blank"></a>
				</div>
				<div class="slide" data-bg-set="{'img':'http://i3.mifile.cn/a4/02fe535d-ae04-410b-919d-272cc6e265b2','imgHd':'http://i3.mifile.cn/a4/59e94180-a9d3-4867-9229-af2f97d2bf97'}">
					<a href="//item.mi.com/buyphone/note4" data-stat-aid="AA13694" data-stat-pid="2_15_3_69" target="_blank"></a>
				</div>
				<div class="slide" data-bg-set="{'img':'http://i3.mifile.cn/a4/73af3040-727c-4b5d-846f-6e0d60db86a1','imgHd':'http://i3.mifile.cn/a4/8c371297-22f2-48c6-8ef3-97b2cc3bed2e'}">
					<a href="//www.mi.com/special/phone" data-stat-aid="AA13678" data-stat-pid="2_15_4_70" target="_blank"></a>
				</div>
				<div class="slide" data-bg-set="{'img':'http://i3.mifile.cn/a4/1436ad25-85ae-41bb-9ea8-e0221e30be48','imgHd':'http://i3.mifile.cn/a4/5a64d30e-cd51-44ef-9425-fde57adfc5a9'}">
					<a href="http://hd.mi.com/y/09201d/index.html" data-stat-aid="AA13679" data-stat-pid="2_15_5_71" target="_blank"></a>
				</div>
			</div>
		</div>
		<div class="home-hero-sub row">
			<div class="span4">
				<ul class="home-channel-list clearfix">
					<li class="top left"><a href="//www.mi.com/compare/" data-stat-aid="AA13424" data-stat-pid="2_44_1_250" target="_blank"><i class="iconfont">&#xe901</i>选购手机</a></li>
					<li class="top"><a href="http://qiye.mi.com/" data-stat-aid="AA10868" data-stat-pid="2_44_2_251" target="_blank"><i class="iconfont">&#xe63e;</i>企业团购</a></li>
					<li class="top"><a href="//item.mi.com/re" data-stat-aid="AA10869" data-stat-pid="2_44_3_252" target="_blank"><i class="iconfont">&#xe63b;</i>官翻产品</a></li>
					<li class="left"><a href="//www.mi.com/mimobile/" data-stat-aid="AA11244" data-stat-pid="2_44_4_253" target="_blank"><i class="iconfont"></i>小米移动</a></li>
					<li class=""><a href="http://huanxin.mi.com/product/list" data-stat-aid="AA12084" data-stat-pid="2_44_5_254" target="_blank"><i class="iconfont"></i>以旧换新</a></li>
					<li class=""><a href="http://recharge.10046.mi.com/" data-stat-aid="AA10871" data-stat-pid="2_44_6_255" target="_blank"><i class="iconfont"></i>话费充值</a></li>
				</ul>
			</div>
			<div class="span16" id="J_homePromo" data-stat-title="焦点图下方小图">
				<ul class="home-promo-list clearfix">
					<li class="first">
					<a class="item" href="//item.mi.com/buyphone/hongmi3s" data-stat-aid="AA13660" data-stat-pid="2_16_1_77" target="_blank"><img alt="红米3s" src="home/Picture/9a0a61d9f554478aaf0dd08777cf6eb3.gif" srcset="http://i3.mifile.cn/a4/bef939d6-e8d8-42b8-a36e-59ccf8db17de 2x"/></a>
					</li>
					<li>
					<a class="item" href="//www.mi.com/mimobile/" data-stat-aid="AA13695" data-stat-pid="2_16_2_78" target="_blank"><img alt="小米移动" src="home/Picture/5c803e048d794bce80039218f783fcdc.gif" srcset="http://i3.mifile.cn/a4/d5680ed3-e577-4efe-8841-f8223822e6ef 2x"/></a>
					</li>
					<li>
					<a class="item" href="//www.mi.com/dianfanbao/" data-stat-aid="AA13685" data-stat-pid="2_16_3_79" target="_blank"><img alt="米家压力IH电饭煲" src="home/Picture/da23f64a88d34da3b210e077b1ffafef.gif" srcset="http://i3.mifile.cn/a4/88c7e4f6-d774-40ad-a055-73254a707a2e 2x"/></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 明星单品 -->
	<div class="home-star-goods xm-carousel-container" id="J_homeStar">
		<div class="xm-plain-box">
			<div class="box-hd">
				<h2 class="title">
					小米明星单品
				</h2>
				<div class="more"><!-- 
					<div class="xm-controls xm-controls-line-small xm-carousel-controls">
						<a class="control control-prev iconfont" href="javascript: void(0);">
						</a>
						<a class="control control-next iconfont control-disabled" href="javascript: void(0);">
						</a>
					</div> -->
				</div>
			</div>
			<div class="box-bd">
				<div class="xm-carousel-wrapper" style="height: 340px; overflow: hidden;">
					<ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList"
					style="width: 2480px; margin-left: -1240px; transition: margin-left 0.5s ease;">
						@foreach($stars as $star)
						<li class="rainbow-item-1">
							<a class="thumb" href="{{ URL(('/detail/').($star->id)) }}" target="_blank">
								<img src='{!! asset('Uploads/picture/'."$star->img") !!}' alt="{{ $star->name }}" width="160" height="110">
							</a>
							<h3 class="title">
								<a href="{{ URL(('/detail/').($star->id)) }}">{{ $star->name }}</a>
							</h3>
							<p class="desc">
								明星单品，热卖中~！
							</p>
							<p class="price">{{ $star->price }}元</p>
						</li>
						@endforeach

					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 明星单品 -->








</div>
			<!-- 友情链接 -->
			<div id="div1">
			<b><a href="">友情链接</a></b>
			<center>
			@foreach($link as $kv)
			<a href="{{ $kv->linkAdress }}">{{ $kv->name }}</a><br><br>
			@endforeach
			</center>
			</div>
			<!-- 友情链接 -->

<script type="text/javascript">
	window.onload=function(){
    var odiv=document.getElementById('div1');
   odiv.onmouseover=function ()
   {
     //第一个参数为div,left属性的目标值,第二个为 每次移动多少像素
     startmove(0,10);
       }
  odiv.onmouseout=function ()
  {
     startmove(-150,-10);
      }
    }

    var timer=null;
function startmove(target,speed)
{
    var odiv=document.getElementById('div1');
clearInterval(timer);
     timer=setInterval(function (){

        if(odiv.offsetLeft==target)
        {
            clearInterval(timer);
            }
            else
            {    
        odiv.style.left=odiv.offsetLeft+speed+'px';
            }
        },30)
    }
	</script>
@endsection