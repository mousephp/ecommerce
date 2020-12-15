@extends('admin.layouts.master')
@section('title','Sửa comment')
@section('breadcrumb-news','Sửa comment')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-2">
		<form action="{{route('comments.update',$com->id)}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label class=" col-form-label">Name</label>
				<input type="text" class="form-control" name="name" id="" placeholder="Nhập name" value="{{$com->com_name}}">
				@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
			</div>

			<div class="form-group">
				<label class=" col-form-label">email</label>
				<input type="text" class="form-control" name="email" id="" placeholder="Nhập email" value="{{$com->com_email}}">
				@if ($errors->has('email'))
					<p class="alert alert-danger">{{ $errors->first('email') }}</p>
				@endif
			</div>
			
			<div class="form-group">
				<label class=" col-form-label">Message</label>
				<textarea type='textarea' class="form-control" name="message" row='10' placeholder="Nhập message" >{{$com->com_content}}</textarea>
				@if ($errors->has('message'))
					<p class="alert alert-danger">{{ $errors->first('message') }}</p>
				@endif
			</div>
			
			<div class="form-group ">
	            <label>Trạng thái</label>
	          	<select class="form-control select2" name="status"  style="width: 100%;">
		           <option value="1" @if($com->com_status == 1) selected @endif>Show</option>
				   <option value="0" @if($com->com_status == 0) selected @endif>Hide</option>
		        </select>
	        </div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Sửa</button>
				<button type="reset" class="btn btn-danger">Nhập lại</button>
			</div>		  
		</form>
	</div>
</div>
@endsection