@extends('admin.layouts.master')
@section('title','Danh sách Category')
@section('breadcrumb-news','Danh sách thể loại')

@section('content')
<h2></h2>

<div class="form-group ">
    <a href="{{route('category.create')}}"><button class="btn btn-info">Thêm mới</button></a>
    <label class=" col-form-label">Chọn</label> 
    <label class="btn btn-danger"><input type="checkbox" id="checkAll"> Checked All</label>     
</div>
<div class="row">
	<div class="col-md-8 ">
	    <table id="example1" class="table table-bordered table-striped text-center">
	     <thead>
	          <tr>
                <th>checkbox</th>
	            <th>Stt</th>
                <th>Tên</th>
	            <th>Tên không dấu</th>
                <th>Trạng thái</th>
				<th colspan="2">Tùy chọn</th>	          
			  </tr>
	      </thead>	
          <tfoot>
              <tr>
                <th>check</th>
                <th>Stt</th>
                <th>Tên</th>
                <th>Tên không dấu</th>
                <th>Trạng thái</th>
                <th colspan="2">Tùy chọn</th>             
              </tr>
          </tfoot>
          
          <tbody>
            <form action="{{route('cate-multiple')}}" method="get" id="insert_from">
            @csrf
            {{-- @method('DELETE') --}}
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                 <input type="submit" name="submit" class="btn btn-danger" value="Delete All Data"/>
            </a>
           
            <?php foreach ($categories as $key => $value) { ?>
		      <tr>
                <td class="checkbox">
                  <label><input type="checkbox" value="{{$value->id}}" name="checked[]" title="{{$value->id}}" class="checkCate"></label>
                </td>
		        <td>{{$key+1}}</td>
		        <td>{{$value->cate_name}}</td>
                <td>{{$value->cate_slug}}</td>
                <td>
                    <div class="form-group clearfix">                     
                         <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" @if($value->cate_status==1)checked @endif disabled>   
                        </div>    
                    </div>
                </td>

                <td>
                    <button class="btn btn-primary edit" title="{{ "Sửa ".$value->cate_name }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i>Sửa</button>
                </td>
                <td>
                    <button class="btn btn-danger delete" title="{{ "Xóa ".$value->cate_name }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i>Xóa</button>
                </td>
		      </tr>
            <?php  } ?>
            
            </form>
	      </tbody>	      
	    </table>
        {{ $categories->render('admin.pagination.default') }}
	</div>
</div>


<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa category <span class="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control name" name="name" placeholder="Nhập tên category">
                                <div class="form-group ">
                                <label>Trạng thái</label>
                                    <select class="form-control select2 status" name="status" style="width: 100%;">
                                        <option value="1" class="ht">Show</option>
                                        <option value="0" class="kht">Hide</option>
                                    </select>
                                </div>

                                <span class="error" style="color: red;font-size: 1rem;"></span>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success update">Save</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div> <!-- end Edit Modal-->

<!-- delete Modal-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success del">Có</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>

@endsection