@extends('admin.layouts.master')
@section('title','sửa Category')
@section('breadcrumb-news','sửa thể loại')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-2">
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
		<form action="{{route('category.update',$cate->id)}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group ">
				<label class=" col-form-label">Name</label>
				<div class="col-sm-10">
				  	<input type="text" name="name" value="{{$cate->cate_name}}" class="form-control" id="" placeholder="Nhập Category">
				  	@if ($errors->has('name'))
						<p class="alert alert-danger">{{ $errors->first('name') }}</p>
					@endif
				</div>				
			</div>
			<div class="form-group ">
	          <label>Trạng thái</label>
	            <div class="col-sm-10">
		          	 <select class="form-control select2" name="status"  style="width: 100%;">
			           <option value="1" @if($cate->cate_status==1)selected @endif >Show</option>
					   <option value="0" @if($cate->cate_status==0)selected @endif >Hide</option>
		          	</select>
				</div>
	        </div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Sửa</button>
			</div>		  
		</form>
	</div>
</div>

@endsection