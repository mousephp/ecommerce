@extends('admin.layouts.master')
@section('title','Thêm thương hiệu')
@section('breadcrumb-news','thêm thương hiệu')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-2">
		<form action="{{route('product-types.store')}}" method="POST">
			@csrf
			@method('POST')
			<div class="form-group ">
				<label class=" col-form-label">Name</label>
				<div class="col-sm-10">
				  	<input type="text" name="name" class="form-control" id="" placeholder="Nhập thương hiệu">
				  	@if ($errors->has('name'))
						<p class="alert alert-danger">{{ $errors->first('name') }}</p>
					@endif
				</div>
			</div>
			<div class="form-group ">
	          <label>Trạng thái</label>
	            <div class="col-sm-10">
		          	 <select class="form-control select2" name="status"  style="width: 100%;">
			           <option value="1">Show</option>
					   <option value="0">Hide</option>
		          	</select>
				</div>
	        </div>
	        <div class="form-group ">
	          <label>Category</label>
	            <div class="col-sm-10">
		          	 <select class="form-control select2" name="category"  style="width: 100%;">
		          	   @foreach($categories as $value)
			           <option value="{{$value->id}}">{{$value->cate_name}}</option>
			           @endforeach
		          	</select>
				</div>
	        </div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>		  
		</form>
	</div>
</div>

@endsection