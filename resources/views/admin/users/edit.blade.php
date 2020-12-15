@extends('admin.layouts.master')
@section('title','Thêm user')
@section('breadcrumb-news','thêm user')

@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
      <form role="form" action="{{route('users.update',$user->id)}}" method="POST">
      	@csrf
      	@method('PUT')
        <div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên user" value="{{$user->name}}" readonly>
				@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Nhập email" value="{{$user->email}}" readonly>
				@if ($errors->has('email'))
					<p class="alert alert-danger">{{ $errors->first('email') }}</p>
				@endif
			</div>
			
	         <div class="form-group">
	            <label for="exampleInputEmail1">Nhập Password cũ</label>
	            <input type="password" class="form-control user_password" name="user_password" id="exampleInputEmail1" placeholder="Nhập password" value="{{ old('user_password') }}">
	            @if ($errors->has('user_password'))
	              <p class="alert alert-danger">{{ $errors->first('user_password') }}</p>
	            @endif
	         </div>

	         <div class="form-group">
	            <label for="exampleInputEmail1">Nhập Password mới</label>
	            <input type="password" class="form-control user_password_new" name="user_password_new" id="exampleInputEmail1" placeholder="Nhập Password mới"  value="{{ old('user_password_new') }}">
	            @if ($errors->has('user_password_new'))
	              <p class="alert alert-danger">{{ $errors->first('user_password_new') }}</p>
	            @endif
	         </div>                         

	         <div class="form-group">
	            <label for="exampleInputEmail1">Xác nhận Password mới</label>
	            <input type="password" class="form-control user_password_again" name="user_password_again" id="exampleInputEmail1" placeholder="Nhập Password mới" value="{{ old('user_password_again') }}">
	            @if ($errors->has('user_password_again'))
	              <p class="alert alert-danger">{{ $errors->first('user_password_again') }}</p>
	            @endif
	         </div>
	        <div class="card-footer">
	          <button type="submit" class="btn btn-primary">Sửa</button>
	           <button type="reset" class="btn btn-danger">hủy</button>         
	        </div>
		</div>
      </form>
	</div>
</div>

@endsection