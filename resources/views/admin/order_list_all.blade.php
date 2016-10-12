@extends("layout.adminBase")
@section("content")
<script type="text/javascript">
	//控制模态框内信息
	function doUpdate(id)
	{
		var editForm = document.editForm;
		editForm.action = "/admin/order_list_all/"+id;
		var number = $("#orderId"+id).html();
		var express = $("#orderExpress"+id).html();
		var name = $("#orderName"+id).html();
		var address =$("#orderAddress"+id).html();
		$("#Number").val(number);
		$("#Express").val(express);
		$("#Username").val(name);
		$("#Address").val(address);
	}	
</script>
<div class="col-xs-12">
	<h3 class="header smaller lighter blue">所有商品订单管理</h3>
	<div class="table-responsive">
		<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row">
				<!-- <div class="col-sm-6">
					<div id="sample-table-2_length" class="dataTables_length">
						<label>Display
						<select size="1" name="sample-table-2_length" aria-controls="sample-table-2">
							<option value="10" selected="selected">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
						 records</label>
					</div>
				</div> -->
				<div class="col-sm-3">
					<div class="dataTables_filter" id="sample-table-2_filter">
						<form action="" class="form-search">
							<!-- 搜索表单 -->
								<input type="text" placeholder="请输入关键字" name="name" autocomplete="off">
								<button type="submit" class="bn  bigger-110 blue">
									<a>
										<i class="icon-search nav-search-icon"></i>
									</a>
								</button>
							</form>
					</div>
				</div>
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
			<thead>
			<tr role="row">
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 260px;">
					订单号
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 260px;">
					订单用户
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 184px;">
					商品名
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending" style="width: 197px;">
					商品数量
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label=" update : activate to sort column ascending" style="width: 287px;">
					收件人姓名--联系方式
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 271px;">
					省-市-地区
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 271px;">
					状态
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 184px;">
				快递商家
				</th>
				<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 249px;">操作
				</th>
			</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
			<!-- 管理所有订单 -->
			@foreach($list as $kk)
			<tr id="order{{ $kk->id }}">
				<td id="orderId{{ $kk->id }}">{{ $kk->id }}</td>
				<td>{{ $kk->username }}</td>
				<td>{{ $kk->name }}</td>
				<td>{{ $kk->goods_num }}</td>
				<td id="orderName{{ $kk->id }}">{{ $kk->del_name }}--{{ $kk->phone }}</td>
				<td id="orderAddress{{ $kk->id }}">{{ $kk->province }}-{{ $kk->city }}-{{ $kk->district }}</td>
				<td>
				@if($kk->order_status == 1)
					<span class="label label-success arrowed-in arrowed-in-right">已发货</span>
					@elseif($kk->order_status == 2)
					<span class="label label-danger arrowed">待发货</span>
					@elseif($kk->order_status == 3)
					<span class="label label-info arrowed-right arrowed-in">已取消订单</span>
				@endif
				</td>
				<td id="orderExpress{{ $kk->id }}">{{ $kk->express }}</td>
				<td>
					<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
					@if($kk->order_status == 2)
						<a class="blue" href="" data-toggle="modal" data-target="#EditModal" onclick="javascript:doUpdate({{ $kk->id }})">
							<i class="icon-edit bigger-130"></i>
						</a>
					@endif
						<a class="green" href="">
							<i class="icon-pencil bigger-130"></i>
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
						Showing 15 entries , total 6666
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dataTables_paginate paging_bootstrap">
						{!! $list->appends($where)->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- 模态框(确认发货信息) -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post" name="editForm">
       			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">请确认发货信息</h4>
	            </div>
	            <div class="modal-body">
					<div class="widget-main">
						<div>
							<label for="form-field-8">快递商家</label>
							<input style="font-weight:bold;" class="form-control" name="Express" id="Express">
						</div>
						<div>
							<label for="form-field-8">收件人地址</label>
							<input style="font-weight:bold;" class="form-control" name="Address" id="Address">
						</div>
						<div>
							<label for="form-field-8">订单号</label>
							<input style="font-weight:bold;" class="form-control" name="Number" id="Number">
						</div>
						<div>
							<label for="form-field-9">收件人姓名及联系方式</label>
							<input style="font-weight:bold;" class="form-control limited" name="Username" id="Username">
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">确认发货</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>		
@endsection