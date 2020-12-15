@extends('admin.layouts.master')
@section('title','Thêm sản phẩm')
@section('breadcrumb-news','thêm sản phẩm')

@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
      <form role="form" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('POST')
        <div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Tên sản phẩm</label>
				<input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập sản phẩm" value="{{old('name')}}">
				@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
			</div>

	        <div class="form-group">
	            <label for="exampleInputEmail1">Số lượng</label>
	            <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng" value="{{old('quantity')}}">
	            @if ($errors->has('quantity'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
	        </div>

			<div class="form-group">
				<label for="exampleInputPassword1">Giá sản phẩm</label>
				<input type="number" class="form-control" name="price" id="exampleInputPassword1" placeholder="Nhập Giá sản phẩm" value="{{old('price')}}">
				@if ($errors->has('price'))
					<p class="alert alert-danger">{{ $errors->first('price') }}</p>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputFile">Ảnh sản phẩm</label>
				<div class="input-group">
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" name="image" id="exampleInputFile" value="{{old('image')}}">
				    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
				  </div>
				  <div class="input-group-append">
				    <span class="input-group-text" id="">Upload</span>
				  </div>
				</div>
				@if ($errors->has('image'))
					<p class="alert alert-danger">{{ $errors->first('image') }}</p>
				@endif
			</div>
	        
	        <div class="form-group">
	            <label for="exampleInputEmail1">Phụ kiện</label>
	            <input type="text" name="accessories" class="form-control" id="exampleInputEmail1" placeholder="Nhập Phụ kiện kèm theo" value="{{old('accessories')}}">
	            @if ($errors->has('accessories'))
					<p class="alert alert-danger">{{ $errors->first('accessories') }}</p>
				@endif
	        </div>

	        <div class="form-group">
				<label>Bảo hành</label>
				<select class="form-control select2" name="warranty" style="width: 100%;" value="{{old('warranty')}}">
					<option selected="selected" value="6">6 tháng</option>
					<option value="12">12 tháng</option>
					<option value="0">Không bảo hành</option>
				</select>
	        </div>

	  		<div class="form-group">
	            <label for="exampleInputEmail1">Khuyến mãi</label>
	            <input type="text" name="promotion" class="form-control" id="exampleInputEmail1" placeholder="Nhập huyến mãi" value="{{old('promotion')}}">
	            @if ($errors->has('promotion'))
					<p class="alert alert-danger">{{ $errors->first('promotion') }}</p>
				@endif
	        </div>

	        <div class="form-group">
	            <label for="exampleInputEmail1">Tình trạng</label>
	            <input type="text" name="condition" class="form-control" id="exampleInputEmail1" placeholder="Nhập Tình trạng" value="{{old('condition')}}">
	            @if ($errors->has('condition'))
					<p class="alert alert-danger">{{ $errors->first('condition') }}</p>
				@endif
	        </div>

	 		<div class="form-group">
	          	<label>Trạng thái</label>
	          	<select class="form-control select2" name="status"  style="width: 100%;" value="{{old('status')}}">
		           <option value="1">Còn hàng</option>
				   <option value="0">Hết hàng</option>
	          	</select>
	        </div>

		    <!-- Main content -->
		    <section class="content">
		      <div class="row">
		        <div class="col-md-12">
		          <div class="card card-outline card-info">
		            <div class="card-header">
		              <h3 class="card-title">
		               Miêu tả	                
		              </h3>
		              <!-- tools box -->
		              <div class="card-tools">
		                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
		                        title="Collapse">
		                  <i class="fas fa-minus"></i></button>
		                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
		                        title="Remove">
		                  <i class="fas fa-times"></i></button>
		              </div>
		              <!-- /. tools -->
		            </div>
		            <!-- /.card-header -->
		            <div class="card-body pad">
		              <div class="mb-3">
		                <textarea class="textarea" name="description" value="{{old('description')}}" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
		              </div>	
		              @if ($errors->has('description'))
						<p class="alert alert-danger">{{ $errors->first('description') }}</p>
					  @endif            
		            </div>
		          </div>
		        </div>
		        <!-- /.col-->
		      </div>
		      <!-- ./row -->
		    </section>
		    <!-- /.content -->

	        <div class="form-group">
		          <label>Danh mục</label>
		          <select class="form-control select2 cateProduct" name="cateId" style="width: 100%;">
		            @foreach($categories as $value)
						<option value="{{$value->id}}">{{$value->cate_name}}</option>
					@endforeach
		          </select>
	        </div>
	        <div class="form-group">
		          <label>product-types</label>
		          <select class="form-control select2 prodType" name="prodType" style="width: 100%;">
		          	 @foreach($types as $value)
		           		<option value="{{$value->id}}" >{{$value->prod_type_name}}</option>
					@endforeach
		          </select>
	        </div>
	        
			<div class="form-group">
		          <label>Tags</label>
		          <select class="form-control select2" name="tags" style="width: 100%;" >
		            @foreach($tags as $value)
						<option value="{{$value->id}}">{{$value->tag_name}}</option>
					@endforeach
		          </select>
	        </div>

		 	<div class="form-group ">
			 	<label>Sản phẩm nổi bật</label><br>
				  <div class="icheck-primary d-inline">
				    <input type="radio" name="featured" value="1" id="radioPrimary1" name="r1">
				    <label for="radioPrimary1">Có</label>
				  </div>
				  <div class="icheck-primary d-inline">
				    <input type="radio" name="featured" value="0" id="radioPrimary2" name="r1" checked>
				    <label for="radioPrimary2">Không</label>
				  </div>    
	     	 </div>
        </div>
       
        <div class="card-footer">
          	<button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-danger">hủy</button>         
        </div>
      </form>

	</div>
</div>

@endsection