@extends("layout.adminBase")
@section("content")
<script type="text/javascript">
	//控制修改信息模态框内信息
	function doUpdate(id)
	{
		var editForm = document.editForm;
		editForm.action = "goods_list_all/"+id;
		var name = $("#name"+id).html();
		var num = $("#num"+id).html();
		var price = $("#price"+id).html();
		$("#updateName").val(name);
		$("#UpdateNum").val(num);
		$("#updatePrice").val(price);
	}

	//控制添加型号颜色模态框内信息
	function doSkus(id)
	{
		$("#goods_id").val(id);
	}
</script>
<div class="col-xs-12">
	<form action="" method="post" name="myform">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="delete">
	</form>
	<h3 class="header smaller lighter blue">所有商品管理</h3>
	<div class="table-responsive">
		<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-6">
						<div id="sample-table-2_length" class="dataTables_length">
							<button class="bn  bigger-120 blue" data-toggle="modal" data-target="#AddModal">
									<i class="icon-edit"></i><span style="font-size:13px">新增商品</span>
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
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 260px;">
					ID
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 260px;">
					商品名
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 260px;">
					所属分类
				</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 184px;">
					缩略图
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
				@foreach($data as $v)
				<tr class="odd" align='center'>
					<td><h4>{{ $v->id }}</h4></td>
					<td><h4 id="name{{ $v->id }}">{{ $v->name }}</h4></td>
					<td><h3><b>{{ $type[$v->pid] }}</b></h3></td>
					<td><img height=70 src='{!! asset('Uploads/picture/'."$v->img") !!}'></td>
					<td id="price{{ $v->id }}">{{ $v->price}}</td>
					<td>
						@if($v->status == 1)
							<span class="label label-success arrowed-in arrowed-in-right">上架中</span>
						@elseif($v->status == 0)
							<span class="label label-danger arrowed">已下架</span>
						@elseif($v->status == 9)
							<span class="label label-info arrowed-right arrowed-in">无库存</span>
						@endif
					</td>
					<td id="num{{ $v->id }}">{{ $v->num }}</td>
					<td>
						<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
							<a class="blue" href="" data-toggle="modal" data-target="#skusModal" onclick="doSkus({{ $v->id }})">
								<i class="icon-cogs bigger-130"></i>
							</a>&nbsp;&nbsp;
							<a class="blue" href="{{ URL('detail/'.$v->id) }}">
								<i class="icon-zoom-in bigger-130"></i>
							</a>&nbsp;&nbsp;
							<a class="blue" href="" data-toggle="modal" data-target="#EditModal" onclick="javascript:doUpdate({{ $v->id }})">
								<i class="icon-edit bigger-130"></i>
							</a>&nbsp;&nbsp;
							@if($v->status != 0)
								<!-- 下架 -->
								<a class="red" href="goods_list_all/toggle?id={{$v->id }}">
									<i class="icon-ban-circle bigger-130"></i>
								</a>
								&nbsp;&nbsp;
							@elseif($v->status == 0)
								<!-- 上架 -->
								<a class="green" href="goods_list_all/toggle?id={{$v->id }}">
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
						Showing {{ $data->count() }} entries
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dataTables_paginate paging_bootstrap">
						{!! $data->appends($search)->render() !!}   
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 模态框（新增商品） -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post" enctype="multipart/form-data">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">新增商品</h4>
	            </div>
	            <div class="modal-body">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="widget-main">
						<div>
							<label for="form-field-8">所属分类(不选默认添加新类别)</label>
							<select class="form-control" id="form-field-select-1" name="pid">
								<option value="type">--请选择--</option>
								@foreach($type as $k => $v)
								<option value="{{ $k }}">{{ $v }}</option>
								@endforeach
							</select>
						</div>
						<hr>
						<div>
							<label for="form-field-8">商品名</label>
							<input class="form-control" id="form-field-8" name="name" placeholder="Goodsname">
						</div>
						<hr>
						<div>
							<label for="form-field-9">单价</label>
							<input class="form-control limited" id="form-field-9" name="price" placeholder="price">
						</div>
						<hr>
						<div>
							<label for="form-field-9">库存数量</label>
							<input class="form-control limited" id="form-field-9" name="num" placeholder="stock">
						</div>
						<hr>
						<div>
							<label for="form-field-9">页面标题</label>
							<input class="form-control limited" id="form-field-9" name="goodsTitle" placeholder="Title">
						</div>
						<hr>
						<div>
							<label for="form-field-9">缩略图</label>
							<input class="form-control limited" type="file" name="img">
						</div>
						<div>
							<label for="form-field-9">详情图</label>
							<input class="form-control limited" type="file" name="detail">
						</div>
						<div>
							<label for="form-field-9">参数图</label>
							<input class="form-control limited" type="file" name="specs">
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">确认添加</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 模态框（修改商品信息） -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="" method="post" enctype="multipart/form-data" name="editForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">新增商品</h4>
	            </div>
	            <div class="modal-body">
	       			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	       			<input type="hidden" name="_method" value="put">
					<div class="widget-main">
						<div>
							<label for="form-field-8">所属分类(不选默认不做修改)</label>
							<select class="form-control" id="form-field-select-1" name="pid">
								<option value="type">--请选择--</option>
								@foreach($type as $k => $v)
								<option value="{{ $k }}">{{ $v }}</option>
								@endforeach
							</select>
						</div>
						<hr>
						<div>
							<label for="form-field-8">商品名</label>
							<input class="form-control" id="updateName" name="name">
						</div>
						<hr>
						<div>
							<label for="form-field-9">单价</label>
							<input class="form-control limited" id="updatePrice" name="price">
						</div>
						<hr>
						<div>
							<label for="form-field-9">库存数量</label>
							<input class="form-control limited" id="UpdateNum" name="num">
						</div>
						<hr>
						<div>
							<label for="form-field-9">页面标题</label>
							<input class="form-control limited" id="form-field-9" name="goodsTitle" placeholder="Title">
						</div>
						<hr>
						<div>
							<label for="form-field-9">缩略图</label>
							<input class="form-control limited" type="file" name="img">
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	                <button type="submit" class="btn btn-primary">确认添加</button>
	            </div>
	        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 模态框（添加商品型号和颜色） -->
<div class="modal fade" id="skusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       		<form action="{{ URL('/admin/goods_list_all/skus') }}" method="post" name="skusForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">添加型号</h4>
	            </div>
	            <div class="modal-body">
	       			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	       			<input type="hidden" name="goods_id" id="goods_id" value="">
	       			<div>
						<label for="form-field-8">型号</label>
						<input class="form-control" name="attr">
					</div>
					<hr>
					<div>
						<label for="form-field-9">颜色</label>
						<input class="form-control limited"  name="color">
					</div>
					<hr>
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
@endsection