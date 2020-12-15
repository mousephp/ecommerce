@extends('admin.layouts.master')
@section('title','Thêm Category')
@section('breadcrumb-news','thêm thể loại')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-2">
		<form action="{{route('category.store')}}" method="POST">
			@csrf
			@method('POST')
			<div class="form-group ">
				<label class=" col-form-label">Name</label>
				<div class="col-sm-10">
				  	<input type="text" name="name" class="form-control" id="" placeholder="Nhập Category">
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
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>		  
		</form>
	</div>
</div>

@endsection



 