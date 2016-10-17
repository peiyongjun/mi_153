@extends("layout.adminBase")
@section("content")
<style>
	a:active{
		text-decoration: none;
		color:white;
	}
	a:hover{
		text-decoration: none;
		color:white;
	}
	a{
		color:white;
	}
</style>
<script type="text/javascript">
	//侧边导航选中
	$("#commentsList").addClass("active");
</script>
<div class="col-xs-12">
	<h3 class="header smaller lighter blue">商品售后管理</h3>
	<div class="table-responsive">
		<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-12">
						<div class="dataTables_filter" id="sample-table-2_filter">
							<form action="" class="form-search">
							<!-- 搜索表单 -->
								<input type="text" placeholder="Search ..." name="search" autocomplete="off">
								<button type="submit" class="bn  bigger-110 blue">
									<a><i class="icon-search nav-search-icon"></i></a>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable">
			<thead>
			<tr>
				<th>ID</th>
				<th>用户帐号</th>
				<th>订单号</th>
				<th>商品名</th>
				<th>商品型号</th>
				<th>申请描述</th>
				<th>处理状态</th>
			</tr>
			</thead>
			<tbody>
			@foreach($services as $v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{ $v->username }}</td>
				<th>{{ $v->order_id }}</th>
				<td>{{ $goods[$skus[$order[$v->id]->id]->id]->name }}</td>
				<td>{{ $skus[$order[$v->id]->id]->attr }} {{ $skus[$order[$v->id]->id]->color }}</td>
				<td>{{ $v->description }}</td>
				<td>
					<!-- 处理状态 -->
					<span class="label label-success arrowed">
						<a href="#">已处理</a>
					</span>
				</td>
			</tr>
			@endforeach
			</tbody>
			</table>
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_info">
						本页共 {{ $services->count() }} 条数据
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dataTables_paginate paging_bootstrap">
						<!-- 分页 -->
						{!! $services->render() !!}
						<!-- 分页 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection