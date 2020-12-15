@extends('admin.layouts.master')
@section('title','Danh sách users')
@section('breadcrumb-news','Danh sách users')

@section('content')
<h2><a href="{{route('users.create')}}"><button class="btn btn-info">Thêm mới</button></a></h2>
<div class="row">
	<div class="col-md-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Danh sách users</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2">Tùy chọn</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2">Tùy chọn</th>
          </tr>
          </tfoot>
          <tbody>

          @foreach($users as $key => $value)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td class="text-center">
              <a href="{{ route('users.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
            </td>
            <td>
              <form action="{{ route('users.destroy',$value->id)}}" method="post">
                <input type="hidden" name="_token" value="">                      <input type="hidden" name="_method" value="DELETE">                     <button type="submit" class="btn btn-danger"><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></button>  
              </form>
            </td>

          </tr>
          @endforeach
    
          </tbody>      
        </table>
      </div>
      <!-- /.card-body -->
    </div>
	</div>
</div>
{{ $users->render('admin.pagination.default') }}

@endsection