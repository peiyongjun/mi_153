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
	function Del(id){
		if(confirm("确认删除吗?")){
			var myform = document.myform;
			myform.action = "/admin/link/"+id;
			myform.submit();
		}
	}
</script>
<script type="text/javascript">
	function doUpdate(id){
		var editform = document.editform;
		editform.action = "/admin/link/"+id;
		var username = $("#linkusername"+id).html();
		var addr =$("#linkaddr"+id).html();
		$("#Username").val(username);
		$("#Addr").val(addr);
	}
</script>
<script type="text/javascript">
	//侧边导航选中
	$("#serviceList").addClass("open");
	$("#serviceList").addClass("active");
	$("#serviceList1").addClass("active");
</script>
<div class="col-xs-12">
	<form action="" name="myform" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="delete">
	</form>
	<h3 class="header smaller lighter blue">友情链接</h3>
	<div class="table-responsive">
		<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-12">
							<button class="bn  bigger-120 blue" data-toggle="modal" data-target="#AddModal">
						   		<i class="icon-edit"></i><span style="font-size:13px">添加新链接</span>
							</button>
						<div class="dataTables_filter" id="sample-table-2_filter">
							<form action="" class="form-search">
							<!-- 搜索表单 -->
								<input type="text" placeholder="Search ..." name="name" autocomplete="off">
								<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
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
				<th>编号</th>
				<th>用户名</th>
				<th>链接</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			@foreach($data as $kv)
			<tr id="link{{ $kv->id}}">
				<td id="link{{ $kv->id }}">{{ $kv->id }}</td>
				<td id="linkusername{{ $kv->id }}">{{ $kv->name }}</td>
				<td id="linkaddr{{ $kv->id }}">{{ $kv->linkAdress }}</td>
				<td>
					<a class="blue" onclick="javascript:doUpdate({{ $kv->id }})" data-toggle="modal" data-target="#EditModal">
							<i class="icon-edit bigger-130"></i>
						</a>
							&nbsp;&nbsp;
						<a class="red" href="javascript:Del({{ $kv->id }})">
							<i class="icon-trash bigger-130"></i>
						</a>
				</td>
			</tr>
			@endforeach
			</tbody>
			</table>
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_info">
						
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dataTables_paginate paging_bootstrap">
						<!-- 分页 -->
						{!! $data->appends($where)->render() !!}
						<!-- 分页 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- 模态框 -->
	<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">新增用户</h4>
	            </div>
	            <div class="modal-body">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="widget-main">
						<div>
							<label for="form-field-8">用户名</label>
							<input class="form-control" id="form-field-8" name="name" placeholder="Username">
						</div>
						<hr>
						<div>
							<label for="form-field-9">链接官网</label>
							<input class="form-control limited" id="form-field-9" name="linkAdress" placeholder="Addr 格式如：//+网址">
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">确认提交</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
 <!-- 模态框 -->
	<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post" name="editform">
       		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
       		  <input type="hidden" name="_method" value="patch">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">用户信息修改</h4>
	            </div>
	            <div class="modal-body">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="widget-main">
						<div>
							<label for="form-field-8">用户名</label>
							<input class="form-control" id="Username" name="name">
						</div>
						<hr>
						<div>
							<label for="form-field-9">链接官网</label>
							<input class="form-control limited" id="Addr" name="linkAdress">
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">确认修改</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
@endsection
