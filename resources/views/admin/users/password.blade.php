@extends('admin.layouts.master')
@section('title','Sửa user password')
@section('breadcrumb-news','Sửa user password')

@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
      <form role="form" action="" method="POST">
      	@csrf
      	@method('POST')
        <div class="card-body">						
		      <div class="form-group">
		        <label for="exampleInputEmail1">Nhập Password cũ</label>
		        <input type="password" class="form-control user_password" name="user_password" id="typepass" placeholder="Nhập password" value="{{ old('user_password') }}" >
		        <a href="javascript:;void(0)" style="position: absolute;top: 17%;right: 30px;color: #333;"><i class="fa fa-eye" id="show-password" onclick="showPassword(this)"></i></a>
		        @if ($errors->has('user_password'))
		          <p class="alert alert-danger">{{ $errors->first('user_password') }}</p>
		        @endif
		      </div>

		      <div class="form-group">
		        <label for="exampleInputEmail1">Nhập Password mới</label>
		        <input type="password" class="form-control user_password_new" name="user_password_new" id="typepass1" placeholder="Nhập Password mới"  value="{{ old('user_password_new') }}">
		          <a href="javascript:;void(0)" style="position: absolute;top: 40%;right: 30px;color: #333;"><i class="fa fa-eye show-password" onclick="showPassword1(this)"></i></a>
		        @if ($errors->has('user_password_new'))
		          <p class="alert alert-danger">{{ $errors->first('user_password_new') }}</p>
		        @endif
		      </div>                         

		      <div class="form-group">
		        <label for="exampleInputEmail1">Xác nhận Password mới</label>
		        <input type="password" class="form-control password_confirmation" name="password_confirmation" id="typepass2" placeholder="Nhập Password mới" value="{{ old('password_confirmation') }}">
		        <a href="javascript:;void(0)" style="position: absolute;top: 63%;right: 30px;color: #333;"><i class="fa fa-eye show-password" onclick="showPassword2(this)"></i></a>
		        @if ($errors->has('password_confirmation'))
		          <p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p>
		        @endif
		      </div>
		      <div class="card-footer">
          		<button type="submit" class="btn btn-primary">Update</button>
           		<button type="reset" class="btn btn-danger">hủy</button>         
	        </div>
		</div>
      </form>

	</div>
</div>
@endsection


<script> 
    //geeksforgeeks.org/show-hide-password-using-javascript/ 
    function showPassword(button) { 
        var temp = document.getElementById("typepass"); 
        if (temp.type === "password") { 
            temp.type = "text"; 
        }else { 
            temp.type = "password"; 
        } 
    } 
	function showPassword1(button) { 
        var temp = document.getElementById("typepass1"); 
        if (temp.type === "password") { 
            temp.type = "text"; 
        }else { 
            temp.type = "password"; 
        } 
    } 
	function showPassword2(button) { 
        var temp = document.getElementById("typepass2"); 
        if (temp.type === "password") { 
            temp.type = "text"; 
        }else { 
            temp.type = "password"; 
        } 
    } 
</script> 