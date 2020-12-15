@extends('admin.layouts.master')
@section('title','Thêm Tags')
@section('breadcrumb-news','thêm Tags')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-2">
		<form action="{{route('tags.store')}}" method="POST">
			@csrf
			@method('POST')
			<div class="form-group">
				<label class=" col-form-label">Tags</label>
				<input type="text" class="form-control" name="name" id="" placeholder="Nhập tags" value="{{ old('name') }}">
				@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
			</div>
			<div class="form-group ">
	            <label>Trạng thái</label>
	          	<select class="form-control select2" name="status"  style="width: 100%;">
		           <option value="1">Show</option>
				   <option value="0">Hide</option>
		        </select>
	        </div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>		  
		</form>
	</div>
</div>
@endsection