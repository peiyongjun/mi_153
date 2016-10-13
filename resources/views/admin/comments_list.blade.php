@extends("layout.adminBase")
@section("content")
<script type="text/javascript">
	//侧边导航选中
	$("#commentsList").addClass("active");
</script>
<div class="col-xs-12">
	<h3 class="header smaller lighter blue">商品评论管理</h3>
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
				<th>评价ID</th>
				<th>商品名</th>
				<th>商品型号</th>
				<th>用户帐号</th>
				<th>评价内容</th>
				<th>评价时间</th>
				<th>评价分数</th>
				<th>评价状态</th>
				<th>&nbsp;</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>评价id</td>
				<td>商品名</td>
				<td>商品型号</td>
				<td>用户帐号</td>
				<td>评价内容</td>
				<td>评价时间</td>
				<td>☆☆☆☆☆</td>
				<td>
					<!-- 评价状态 -->
					<span class="label label-success arrowed">有效</span>
					<span class="label label-danger arrowed">失效</span>
					<span class="label label-warning">Useful</span>
				</td>
				<td>
					<!-- 操作按钮 -->
					<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
						<a class="blue" href="">
							<!-- 添加为有用 -->
							<i class="icon-bookmark bigger-130"></i>
						</a>
						&nbsp;&nbsp;
						<a class="blue" href="">
							<!-- 取消有用 -->
							<i class="icon-bookmark-empty bigger-130"></i>
						</a>
						&nbsp;&nbsp;
						<a class="red" href="">
							<!-- 失效评论 -->
							<i class="icon-ban-circle bigger-130"></i> 
						</a>
						&nbsp;&nbsp;
						<a class="green" href="">
							<!-- 生效评论 -->
							<i class="icon-check bigger-130"></i>
						</a>
					</div>
				</td>
			</tr>
			</tbody>
			</table>
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_info">
						Showing 8 entries
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dataTables_paginate paging_bootstrap">
						<!-- 分页 -->

						<!-- 分页 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection