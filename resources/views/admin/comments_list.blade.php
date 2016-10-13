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
			@foreach($comments as $comment)
			<tr>
				<td>{{ $comment->id }}</td>
				<td>{{ $goods[$comment->id]->name }}</td>
				<td>{{ $skus[$comment->id]->attr }} {{ $skus[$comment->id]->color }}</td>
				<td>{{ $users[$comment->id]->username }}</td>
				<td>{{ $comment->content }}</td>
				<td>{{ $comment->ctime }}</td>
				<td>
					@for($i=0; $i<($comment->star); $i++)
					☆
					@endfor
				</td>
				<td>
					<!-- 评价状态 -->
					@if($comment->status == 1)
					<span class="label label-success arrowed">
						<a href="#">有效</a>
					</span>
					@elseif($comment->status == 0)
					<span class="label label-danger arrowed">
						<a href="#">无效</a>
					</span>
					@endif
					@if($comment->useful == 1)
					<span class="label label-warning">
						<a href="#">Useful</a>
					</span>
					@elseif($comment->useful == 0)
					<span>
					</span>
					@endif
				</td>
				<td>
					<!-- 操作按钮 -->
					<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
						@if($comment->useful == 0)
						<a class="blue" href="{{ URL('/admin/comments_list/useful/'.$comment->id) }}">
							<!-- 添加为有用 -->
							<i class="icon-bookmark bigger-130"></i>
						</a>
						@elseif($comment->useful == 1)
						<a class="blue" href="{{ URL('/admin/comments_list/unuseful/'.$comment->id) }}">
							<!-- 取消有用 -->
							<i class="icon-bookmark-empty bigger-130"></i>
						</a>
						@endif
						@if($comment->status == 1)
						<a class="red" href="{{ URL('/admin/comments_list/invalid/'.$comment->id) }}">
							<!-- 失效评论 -->
							<i class="icon-ban-circle bigger-130"></i> 
						</a>
						@elseif($comment->status == 0)
						<a class="green" href="{{ URL('/admin/comments_list/valid/'.$comment->id) }}">
							<!-- 生效评论 -->
							<i class="icon-check bigger-130"></i>
						</a>
						@endif
					</div>
				</td>
			</tr>
			@endforeach
			</tbody>
			</table>
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_info">
						本页共{!! $comments->count() !!}条数据
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