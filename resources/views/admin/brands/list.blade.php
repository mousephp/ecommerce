@extends('admin.layouts.master')
@section('title','Danh sách  thương hiệu')
@section('breadcrumb-news','Danh sách thương hiệu')

@section('content')
<h2><a href="{{route('product-types.create')}}"><button class="btn btn-info">Thêm mới</button></a></h2>
<div class="row">
	<div class="col-md-8 ">
	    <table id="example1" class="table table-bordered table-striped text-center">
	     <thead>
	          <tr>
	            <th>Stt</th>
                <th>Tên</th>
	            <th>Trạng thái</th>
                <th>Danh mục</th>
				<th colspan="2">Tùy chọn</th>	          
			  </tr>
	      </thead>	
          <tfoot>
              <tr>
                <th>Stt</th>
                <th>Tên</th>
                <th>Trạng thái</th>
                <th>Danh mục</th>
                <th colspan="2">Tùy chọn</th>             
              </tr>
          </tfoot>        
          <tbody>
            <form action="" method="get" id="insert_from">
                 @foreach ($types as $key => $value)
    		      <tr>
    		        <td>{{$key+1}}</td>
    		        <td>{{$value->prod_type_name}}</td>
                    <td>
                        <div class="form-group clearfix">                     
                             <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck1" @if($value->prod_type_status==1)checked @endif disabled>                
                            </div>    
                        </div>
                    </td>
                    <td>{{$value->category->cate_name}}</td>
                    <td>
                        <button class="btn btn-primary editType" title="{{"Sửa ".$value->prod_type_name --}}" data-toggle="modal" data-target="#editType" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i>Sửa</button>
                    </td>
                    <td>
                        <button class="btn btn-danger deleteType" title="{{ "Xóa ".$value->prod_type_name }}" data-toggle="modal" data-target="#deleteType" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i>Xóa</button>
                    </td>                           
    		      </tr>
                @endforeach              
            </form>
	      </tbody>	      
	    </table>
        {{-- {{ $paginator->render('admin.pagination.default') }} --}}
	</div>
</div>



<!-- Edit Modal-->
<div class="modal fade" id="editType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Thương hiệu <span class="title" id="title"></span></h5>
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
                                <div class="form-group ">
                                    <label>Category</label>
                                    <div class="col-sm-10">
                                         <select class="form-control select2 category" name="category"  style="width: 100%;">
                                        </select>
                                    </div>
                                </div>

                                <span class="error" style="color: red;font-size: 1rem;"></span>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateType">Save</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div> <!-- end Edit Modal-->

<!-- delete Modal-->
<div class="modal fade" id="deleteType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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