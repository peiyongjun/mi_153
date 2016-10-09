@extends("layout.adminBase")
@section("content")
<script type="text/javascript">
	//执行删除信息
	function doDel(id)
	{
		if (confirm('确定删除该用户吗?')) {
			var myform = document.myform;
			myform.action = "user_list/"+id;
			myform.submit();
		}
	}

	//控制模态框内信息
	function doUpdate(id)
	{
		var editForm = document.editForm;
		editForm.action = "user_list/"+id;
		var phoneValue = $("#userPhone"+id).html();
		var emailValue = $("#userEmail"+id).html();
		$("#updatePhone").val(phoneValue);
		$("#updateEmail").val(emailValue);
	}
</script>
<div class="col-xs-12">
	<h3 class="header smaller lighter blue">用户信息管理</h3>
	<form action="" method="post" name="myform">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="delete">
	</form>
	<div class="table-responsive">
		<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-6">
						<div id="sample-table-2_length" class="dataTables_length">
							<button class="bn  bigger-120 blue" data-toggle="modal" data-target="#AddModal">
									<i class="icon-edit"></i><span style="font-size:13px">新增管理员</span>
							</button>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="dataTables_filter" id="sample-table-2_filter">
							<form action="" class="form-search">
							<!-- 搜索表单 -->
								<input type="text" placeholder="Search ..." name="name" autocomplete="off">
								<button type="submit" class="bn  bigger-110 blue">
									<a>
										<i class="icon-search nav-search-icon"></i>
									</a>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
			<thead>
			<tr role="row">
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 150px;">
					ID
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 180px;">
					用户名
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 184px;">
					手机
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending" style="width: 230px;">
					邮箱
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 180px;">
					状态
				</th>
				<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 249px;">
				</th>
			</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
			@foreach($info as $v)
			<tr id="user{{ $v->id }}">
				<td id="userId{{ $v->id }}">{{ $v->id }}</td>
				<td id="userName{{ $v->id }}">{{ $v->username }}</td>
				<td id="userPhone{{ $v->id }}">{{ $v->phone }}</td>
				<td id="userEmail{{ $v->id }}">{{ $v->email }}</td>
				<td id=" ">
				@if($v->status == 1)
					<span class="label label-success arrowed-in arrowed-in-right">普通用户</span>
				@elseif($v->status == 0)
					<span class="label label-danger arrowed">禁止登陆</span>
				@elseif($v->status == 9)
					<span class="label label-info arrowed-right arrowed-in">后台管理</span>
				@endif
				</td>
				<td class=" ">
					<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
						<a class="blue" href="" data-toggle="modal" data-target="#EditModal" onclick="javascript:doUpdate({{ $v->id }})">
							<i class="icon-edit bigger-130"></i>
						</a>
						&nbsp;&nbsp;
						@if($v->status != 0)
							<!-- 禁用 -->
							<a class="red" href="user_list/toggle?id={{$v->id }}">
								<i class="icon-ban-circle bigger-130"></i>
							</a>
							&nbsp;&nbsp;
						@elseif($v->status == 0)
							<!-- 启用 -->
							<a class="green" href="user_list/toggle?id={{$v->id }}">
								<i class="icon-check bigger-130"></i>
							</a>
							&nbsp;&nbsp;
						@endif
						<a class="red" href="javascript:doDel({{ $v->id }})">
							<i class="icon-trash bigger-130"></i>
						</a>
					</div>
				</td>
			</tr>
			@endforeach
			</tbody>
			</table>
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_info" id="sample-table-2_info">
						Showing {{ $info->count() }} entries
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dataTables_paginate paging_bootstrap">
						{!! $info->appends($search)->render() !!} 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 模态框（新增管理员） -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">新增管理员</h4>
	            </div>
	            <div class="modal-body">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="widget-main">
						<div>
							<label for="form-field-8">用户名</label>
							<input class="form-control" id="form-field-8" name="username" placeholder="Username">
						</div>
						<hr>
						<div>
							<label for="form-field-9">密码</label>
							<input class="form-control limited" id="form-field-9" name="password" placeholder="Password">
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">提交更改</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 模态框（修改密码） -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post" name="editForm">
       			<input type="hidden" name="_token" value="{{ csrf_token() }}">
       			<input type="hidden" name="_method" value="patch">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">修改用户密码</h4>
	            </div>
	            <div class="modal-body">
					<div class="widget-main">
						<div>
							<label for="form-field-8">手机号</label>
							<input class="form-control" name="phone" id="updatePhone">
						</div>
						<hr>
						<div>
							<label for="form-field-8">E—mail</label>
							<input class="form-control" name="email" id="updateEmail">
						</div>
						<hr>
						<div>
							<label for="form-field-9">新密码</label>
							<input class="form-control limited" name="password" placeholder="Password">
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">提交更改</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
@endsection