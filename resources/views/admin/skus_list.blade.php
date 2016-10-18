@extends("layout.adminBase")
@section("content")
<script type="text/javascript">
	//侧边导航选中
	$("#goodsList").addClass("open");
	$("#goodsList").addClass("active");
	$("#skusList").addClass("active");
</script>
<div class="col-xs-12">
	<form action="" method="post" name="myform">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="delete">
	</form>
	<h3 class="header smaller lighter blue">商品型号管理管理</h3>
	<div class="table-responsive">
		<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-6">
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
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 160px;">
					型号ID
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 160px;">
					商品ID
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 260px;">
					商品名
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 460px;">
					型号
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 184px;">
					颜色
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending" style="width: 197px;">
					价格
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label=" update : activate to sort column ascending" style="width: 287px;">
					状态
				</th>
				<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 271px;">
					库存
				</th>
				<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 249px;">
				</th>
			</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				@foreach($skus as $sku)
				<tr class="odd" align='center'>
					<td>{{ $sku->id }}</td>
					<td>{{ $goods[$sku->id]->id }}</td>
					<td><a href="/admin/goods_list_all?name={{ $goods[$sku->id]->name }}">{{ $goods[$sku->id]->name }}</a></td>
					<td>{{ $sku->attr }}</td>
					<td>{{ $sku->color }}</td>
					<td>{{ $sku->price}}</td>
					<td>
						@if($sku->status == 1)
							<span class="label label-success arrowed-in arrowed-in-right">上架中</span>
						@elseif($sku->status == 0)
							<span class="label label-danger arrowed">已下架</span>
						@endif
					</td>
					<td id="num{{ $sku->id }}">{{ $sku->num }}</td>
					<td>
						<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
							<a class="blue" onclick="javascript:doUpdate({{$sku->id}})" data-toggle="modal" data-target="#skusModal">
								<i class="icon-edit bigger-130"></i>
							</a>&nbsp;&nbsp;
							@if($sku->status != 0)
								<!-- 下架 -->
								<a class="red" href="skus_list/toggle?id={{$sku->id }}">
									<i class="icon-ban-circle bigger-130"></i>
								</a>
								&nbsp;&nbsp;
							@elseif($sku->status == 0)
								<!-- 上架 -->
								<a class="green" href="skus_list/toggle?id={{$sku->id }}">
									<i class="icon-check bigger-130"></i>
								</a>
								&nbsp;&nbsp;
							@endif
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
			</table>
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_info" id="sample-table-2_info">
						Showing {{ $skus->count() }} entries
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dataTables_paginate paging_bootstrap">
						{!! $skus->render() !!}   
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 模态框（添加商品型号和颜色） -->
<div class="modal fade" id="skusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post" name="skusForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">添加型号</h4>
	            </div>
	            <div class="modal-body">
	       			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	       			<input type="hidden" name="id" value="">
					<div>
						<label for="form-field-9">库存</label>
						<input class="form-control limited"  name="num">
					</div>
					<hr>
					<div>
						<label for="form-field-9">价格</label>
						<input class="form-control limited"  name="price">
					</div>
					<hr>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">确认添加</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script type="text/javascript">
function doUpdate (id){
	$("input[name='id']").val(id);
}
</script>
@endsection 