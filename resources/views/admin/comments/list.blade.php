@extends('admin.layouts.master')
@section('title','Danh sách comments')
@section('breadcrumb-news','Danh sách comments')

@section('content')
<div class="row">
	<div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Danh sách comments</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>message</th>
                <th>Trạng thái</th>
                <th colspan="2">Tùy chọn</th>
              </tr>
              <tfoot>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>message</th>
                <th>Trạng thái</th>
                <th colspan="2">Tùy chọn</th>
              </tr>
              </tfoot>
              </thead>
              <tbody>
                @foreach($comments as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->com_name}}</td>
                  <td>{{$value->com_email}}</td>
                  <td>{{$value->com_content}}</td>
                  <td>
                    <div class="form-group clearfix">                     
                         <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" @if($value->com_status==1)checked @endif disabled>                           
                        </div>    
                    </div>
                  </td>
                  <td class="text-center">
        					<a href="{{route('comments.edit',$value->id)}}" class="btn btn-warning" title="Sửa {{$value->com_name}}"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
          				</td>
          				<td>
          					<form action="{{route('comments.destroy',$value->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" title="Xóa {{$value->com_name}}"><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></button>	
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

@endsection