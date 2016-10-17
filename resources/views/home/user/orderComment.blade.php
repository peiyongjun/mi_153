@extends("home.user.showOrder")
@section("Ccss")
<style>
    #waitC a{color:#FF6700;}
    #stars *{margin:0;padding:0;list-style-type:none;}
	body{color:#666;font:12px/1.5 Arial;}
	/* star */
	#stars{position:relative;width:600px;margin:20px auto;height:24px;}
	#stars ul,#stars span{float:left;display:inline;height:19px;line-height:19px;}
	#stars ul{margin:0 10px;}
	#stars li{float:left;width:24px;cursor:pointer;text-indent:-9999px;background:url(home/images/star.png) no-repeat;}
	#stars strong{color:#f60;padding-left:10px;}
	#stars li.on{background-position:0 -28px;}
	#stars p{position:absolute;top:20px;width:159px;height:60px;display:none;background:url(home/images/icon.gif) no-repeat;padding:7px 10px 0;}
	#stars p em{color:#f60;display:block;font-style:normal;}
	.btn_commom {
	    background: #ff6700;
	    border: 1px solid #ff6700;
	    color: #fff;
	}
	.btn_tip {
	    min-width: 100px;
	    width: 100px;
	    height: 33px;
	    margin: 0 2px;
	    padding: 0 10px;
	    line-height: 33px;
	    text-align: center;
	    display: inline-block;
	    vertical-align: middle;
	    cursor: pointer;
	    border-radius: 5px;

	}
</style>
@endsection
@section("showOrder")
@if(!$order)
<div class="box-bd">
	<p class="empty">暂时没有符合条件的商品。</p>
</div>
@else
<div class="box-bd">
	@foreach ($order as $v)
	<div id="J_orderList">
		<ul class="order-list">
			<li class="uc-order-item uc-order-item-pay">
				<div class="order-detail">
					<div class="order-summary">
						<div class="order-status">
							待评价
						</div>
					</div>
					<table class="order-detail-table">
						<thead>
							<tr>
								<th class="col-main">
									<p class="caption-info">
										{{ $v->ctime }}
										<span class="sep">
											|
										</span>
										{{ $v->del_name }}
										<span class="sep">
											|
										</span>
										订单号：
										<a href="//order.mi.com/user/orderView/1161012895800959">
											{{ $v->id }}
										</a>
										<span class="sep">
											|
										</span>
										在线支付
									</p>
								</th>
								<th class="col-sub">
									<p class="caption-price">
										订单金额：
										<span class="num">
											{{ ($skus[$v->id]->price)*($v->goods_num) }}
										</span>
										元
									</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-items">
									<ul class="goods-list">
										<li>
											<div class="figure figure-thumb">
												<a href="{{ URL(('/detail/').($goods[$skus[$v->id]->id]->id)) }}" target="_blank">
													<img src='{!! asset('Uploads/picture')!!}{!! '/'.$goods[$skus[$v->id]->id]->img !!}' width="80"
													height="80">
												</a>
											</div>
											<p class="name">
												<a target="_blank" href="{{ URL(('/detail/').($goods[$skus[$v->id]->id]->id)) }}">
													{{ $goods[$skus[$v->id]->id]->name }} {{ $skus[$v->id]->attr }} {{ $skus[$v->id]->color }}
												</a>
											</p>
											<p class="price">
												 {{ $skus[$v->id]->price }} X {{ $v->goods_num }}
											</p>
										</li>
									</ul>
								</td>
								<td class="order-actions">
									<a class="btn btn-small btn-primary" href="" data-toggle="modal" data-target="#commentModal" onclick="javascript:ModalInfo({{ $goods[$skus[$v->id]->id]->id }},{{ $skus[$v->id]->id }},{{ $v->id }})">
										去评价
									</a>
									<a class="btn btn-small btn-line-gray" href="{{ URL('/orderDetail/'.$v->id) }}">
                                        订单详情
                                    </a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>
		</ul>
	</div>
	@endforeach
</div>
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					订单评价 订单号：
				</h4>
			</div>
			<div class="modal-body">
				<div id="stars">
					<span>评分</span>
					<ul>
						<li><a href="javascript:checkStar(1);">1</a></li>
						<li><a href="javascript:checkStar(2);">2</a></li>
						<li><a href="javascript:checkStar(3);">3</a></li>
						<li><a href="javascript:checkStar(4);">4</a></li>
						<li><a href="javascript:checkStar(5);">5</a></li>
					</ul>
					<span></span>
					<p></p>
				</div><!--star end-->
				<div>评价内容：</div>
				<form action="{{ URL('/addComment') }}" method="post">
					<input type='hidden' name='_token' value="{{ csrf_token() }}">
					<input type='hidden' name='user_id' value="{{ session("user")->id }}">
					<input type='hidden' name='goods_id' value="">
					<input type='hidden' name='order_id' value="">
					<input type='hidden' name='skus_id' value="">
					<input type='hidden' name='star' value="">
					<textarea name="content" cols="85" rows="10"></textarea>
					<br><br><br>
					<div class="commentSub" align="center">
						<input class="btn_tip btn_commom" type="submit" value="提交评价">
						<input class="btn_tip btn_commom" type="reset" data-dismiss="modal" value="关闭">
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>
<script type="text/javascript">
	function ModalInfo (goods_id,skus_id,order_id)
	{
		$("input[name='goods_id']").val(goods_id);
		$("input[name='order_id']").val(order_id);
		$("input[name='skus_id']").val(skus_id);
	}
</script>
<script type="text/javascript"> 
window.onload = function (){

	var oStar = document.getElementById("stars");
	var aLi = oStar.getElementsByTagName("li");
	var oUl = oStar.getElementsByTagName("ul")[0];
	var oSpan = oStar.getElementsByTagName("span")[1];
	var oP = oStar.getElementsByTagName("p")[0];
	var i = iScore = iStar = 0;
	var aMsg = [
				"很不满意|差得太离谱，与商城描述的严重不符，非常不满意！！！",
				"不满意|部分有破损，与商城描述的不符，不满意！！！",
				"一般|质量一般，没有商城描述的那么好，一般般吧！！！",
				"满意|质量不错，与商城描述的基本一致，还是挺满意的！！！",
				"非常满意|质量非常好，与商城描述的完全一致，非常满意！！！"
				]
	
	for (i = 1; i <= aLi.length; i++){
		aLi[i - 1].index = i;
		
		//鼠标移过显示分数
		aLi[i - 1].onmouseover = function (){
			fnPoint(this.index);
			//浮动层显示
			oP.style.display = "block";
			//计算浮动层位置
			oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
			//匹配浮动层文字内容
			oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
		};
		
		//鼠标离开后恢复上次评分
		aLi[i - 1].onmouseout = function (){
			fnPoint();
			//关闭浮动层
			oP.style.display = "none"
		};
		
		//点击后进行评分处理
		aLi[i - 1].onclick = function (){
			iStar = this.index;
			oP.style.display = "none";
			oSpan.innerHTML = "<strong>" + (this.index) + " 分</strong> (" + aMsg[this.index - 1].match(/\|(.+)/)[1] + ")";
			checkStar(this.index);//点击执行表单赋值
		}
	}
	
	//评分处理
	function fnPoint(iArg){
		//分数赋值
		iScore = iArg || iStar;
		for (i = 0; i < aLi.length; i++) {
			aLi[i].className = i < iScore ? "on" : "";
		}
		
	}
	//表单分数赋值
	function checkStar (score)
	{
		$("input[name='star']").val(score);
	}
	

};
</script>
@endif
@endsection