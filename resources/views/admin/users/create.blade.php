@extends('admin.layouts.master')
@section('title','Thêm user')
@section('breadcrumb-news','thêm user')

@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
      <form role="form" action="{{route('users.store')}}" method="POST">
      	@csrf
      	@method('POST')
        <div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên user" value="{{ old('name') }}" >
				@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Nhập email" value="{{ old('email') }}" >
				@if ($errors->has('email'))
					<p class="alert alert-danger">{{ $errors->first('email') }}</p>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Password</label>
				<input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Nhập password">
				@if ($errors->has('password'))
					<p class="alert alert-danger">{{ $errors->first('password') }}</p>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Nhập lại Password</label>
				<input type="password" class="form-control" name="password_confirmation" id="exampleInputEmail1" placeholder="Nhập lại password">
				@if ($errors->has('password_confirmation'))
					<p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p>
				@endif
			</div>
	        <div class="card-footer">
	          <button type="submit" class="btn btn-primary">Thêm</button>
	           <button type="reset" class="btn btn-danger">hủy</button>         
	        </div>
		</div>
      </form>
	</div>
</div>

@endsection