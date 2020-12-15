@extends('admin.layouts.master')
@section('title','Danh sách slides')
@section('breadcrumb-news','Danh sách slides')

@section('content')
<h2><a href="{{route('slides.create')}}"><button class="btn btn-lg btn-info">Thêm mới</button></a></h2>
<div class="row">
	<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Danh sách slides</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Stt</th>
            <th>Tên</th>
            <th>Ảnh sản phẩm</th>
            <th>Trạng thái</th>
            <th colspan="2">Tùy chọn</th>
          </tr>
          </thead> 
          <tfoot>
          <tr>
            <tr>
            <th>Stt</th>
            <th>Tên</th>
            <th>Ảnh sản phẩm</th>
            <th>Trạng thái</th>
            <th colspan="2">Tùy chọn</th>
          </tr>
          </tfoot>
          <tbody>
          @foreach($slides as $key => $value)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->slide_title}}</td>
            <td><img src="{{asset('layouts/uploads/slides/'.$value->slide_image)}}" style="width: 150px;height: 150px;object-fit: cover;"></td>
            <td>
                <div class="form-group clearfix">                     
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" @if($value->slide_status == 1) checked  @endif  disabled>                   
                    </div>    
                </div>
            </td>

            <td>
                <button class="btn btn-primary editSlide" title="{{ "Sửa ".$value->slide_title }}" data-toggle="modal" data-target="#editSlide" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i>Sửa</button>
            </td>
            <td>
                <button class="btn btn-danger deleteSlide" title="{{ "Xóa ".$value->slide_title }}" data-toggle="modal" data-target="#deleteSlide" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i>Xóa</button>
            </td>

               
          </tr>
          @endforeach

          </tbody>             
        </table>
        {{ $slides->render('admin.pagination.default') }}
      </div>
      <!-- /.card-body -->
    </div>
	</div>
</div>



<!-- Edit Modal-->
<div class="modal fade" id="editSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <form role="form" id="updateSlideForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="form-group">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề slide</label>
                            <input type="text" class="form-control name" name="name" id="exampleInputEmail1" placeholder="Nhập sản phẩm" value="">
                            <div class="alert alert-danger errorName"></div>

                          </div>

                          <div class="form-group">
                            <label for="exampleInputFile">Images</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                              </div>
                            </div>
                          </div>
                          <img class="img img-thumbnail imageThum" name="imageThum" width="150" height="150" lign="center">

                          <!-- Main content -->
                          <section class="content">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card card-outline card-info">
                                  <div class="card-header">
                                    <h3 class="card-title">
                                    Nội dung                  
                                    </h3>
                                    <!-- tools box -->
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                      <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                              title="Remove">
                                        <i class="fas fa-times"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body pad">
                                    <div class="mb-3">                                    
                                     <div class="descriptionId">            
                                      <textarea class="textarea summernote" id="description" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">                
                                      </textarea>
                                      </div>
                                    </div>    

                                  </div>
                                </div>
                              </div>
                              <!-- /.col-->
                            </div>
                            <!-- ./row -->
                          </section>
                          <!-- /.content -->

                            <div class="form-group ">
                              <label>Trạng thái</label>
                              <select class="form-control select2 status" name="status"  style="width: 100%;">
                                <option value="1" class="ht">Show</option>
                                <option value="0" class="kht">Hide</option>
                              </select>
                            </div>
                            <span class="error" style="color: red;font-size: 1rem;"></span>
                         

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success updateSlide">Save</button>
                            <button type="reset" class="btn btn-primary">Làm Lại</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          </div>

                        </fieldset>
                      </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div> 
<!-- end Edit Modal-->

<!-- delete Modal-->
<div class="modal fade" id="deleteSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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