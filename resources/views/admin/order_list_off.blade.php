@extends("layout.adminBase")

@section("content")
<script>
	 function doChange(id)
	 {
	 	if(confirm('是否取消该订单?')){
	 		var myform = document.myform;
	 		
	 	}
	 }
</script>
<div class="col-xs-12">
	<h3 class="header smaller lighter blue">待发货订单管理</h3>
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
				<form action="" method="post" name="myform">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="change">
				</form>
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
					收件人姓名/联系方式
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 271px;">
					省-市-地区
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 271px;">
					状态
				</th>
				<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 249px;">操作
				</th>
			</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
			@foreach($list as $v)
			@if($v->order_status == 2)
			<tr class="odd">
				<td class=" ">
				{{ $v->id }}		
				</td>
				<td class=" ">
				{{ $v->username }}
				</td>
				<td class=" ">
				{{ $v->name }}
				</td>
				<td class=" ">
				{{ $v->goods_num }}
				</td>
				<td class=" ">
				{{ $v->del_name }}/{{ $v->phone }}
				</td>
				<td class="hidden-480 ">
				{{ $v->province }}-{{ $v->city }}-{{ $v->district }}
				</td>
				<td class=" ">
					<span class="label label-danger arrowed">待发货</span>
				</td>
				<td class=" ">
					<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
						<a class="blue" href="" data-toggle="modal" data-target="#EditModal" onclick="javascript:doUpdate({{ $v->id }})">
							<i class="icon-edit bigger-130"></i>
						</a>&nbsp;
						<a class="red" href="javascript:doChange({{ $v->id }})">
							<i class="icon-trash bigger-130"></i>
						</a>
					</div>
				</td>
			</tr>
			@endif
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
@endsection