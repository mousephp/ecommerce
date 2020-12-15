@extends('admin.layouts.master')
@section('title','Danh sách sản phẩm')
@section('breadcrumb-news','Danh sách sản phẩm')

@section('content')
<h2><a href="{{route('products.create')}}"><button class="btn btn-info">Thêm mới</button></a></h2>
<div class="row">
	<div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Danh sách sản phẩm</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Stt</th>
                <th>Tên Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Trạng thái</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Tags</th>
                <th colspan="2">Tùy chọn</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>Stt</th>
                <th>Tên Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Trạng thái</th>
                <th>Ảnh sản phẩm</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Tags</th>
                <th colspan="2">Tùy chọn</th>
              </tr>
              </tfoot>
              <tbody>
                             
                @foreach($products as $key => $value)
                <tr>               
                  <td>{{$key+1}}</td>
                  <td>{{$value->prod_title}}</td>
                  <td>{{$value->prod_quantity}}</td>
                  <td>{{$value->prod_price}}</td>
                  <td><img src="{{asset('layouts/uploads/products/'.$value->prod_img)}}"  style="width: 150px;height: 150px;object-fit: cover;"></td>
                  <td>
                    <div class="form-group clearfix">                     
                         <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" @if($value->prod_status==1)checked @endif disabled>
                        </div>    
                    </div>
                  </td>
                  <td>{{$value->category->cate_name}}</td>
                  <td>{{$value->productType->prod_type_name}}</td>
                  <td>{{$value->tags->tag_name}}</td>

                  <td>
                    <button class="btn btn-primary editProduct" title="{{ "Sửa ".$value->prod_title }}" data-toggle="modal" data-target="#editProduct" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i>Sửa</button>
                  </td>
                  <td>
                      <button class="btn btn-danger deleteProduct" title="{{ "Xóa ".$value->prod_title }}" data-toggle="modal" data-target="#deleteProduct" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i>Xóa</button>
                  </td>              
                </tr>
                @endforeach

              </tbody>
              
            </table>
             {{ $products->render('admin.pagination.default') }}
          </div>
          <!-- /.card-body -->
        </div>
	</div>
</div>





<!-- Edit Modal-->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa sản phẩm <span class="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row" style="margin: 5px">
                <div class="col-lg-12">
                    <form role="form" id="updateProductForm" action="" method="post" enctype="multipart/form-data">                   
                      <input type="hidden" name="id" class="idProduct">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control name" name="name" id="exampleInputEmail1" placeholder="Nhập sản phẩm">
                        <div class="alert alert-danger errorName"></div>
                      </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Số lượng</label>
                          <input type="number" name="quantity" class="form-control quantity" id="exampleInputEmail1" placeholder="Nhập số lượng" value="">
                          <div class="alert alert-danger errorQuantity"></div>
                      </div>

                       <div class="form-group">
                          <label for="exampleInputPassword1">Giá sản phẩm</label>
                          <input type="number" class="form-control price" name="price" id="exampleInputPassword1" placeholder="Nhập Giá sản phẩm">
                          <div class="alert alert-danger errorPrice"></div>
                       </div>
                       <div class="form-group">
                          <label for="exampleInputFile">Ảnh sản phẩm</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input image" name="image" id="exampleInputFileImg" value="">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                            <div class="alert alert-danger errorImage"></div>
                          </div>
                        </div>
                        <img class="img img-thumbnail imageThum" name="imageThum" width="150" height="150" lign="center">


                      
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phụ kiện</label>
                          <input type="text" name="accessories" class="form-control accessories" id="exampleInputEmail1" placeholder="Nhập Phụ kiện kèm theo">
                          <div class="alert alert-danger errorAccessories"></div>
                        </div>

                        <div class="form-group">
                          <label>Bảo hành</label>
                          <select class="form-control select2 warranty" name="warranty" style="width: 100%;">
                            <option selected="selected" value="6">6 tháng</option>
                            <option value="12">12 tháng</option>
                            <option value="0">Không bảo hành</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Khuyến mãi</label>
                            <input type="text" name="promotion" class="form-control promotion" id="exampleInputEmail1" placeholder="Enter email">
                            <div class="alert alert-danger errorPromotion"></div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Tình trạng</label>
                          <input type="text" name="condition" class="form-control condition" id="exampleInputEmail1" placeholder="Nhập Tình trạng">
                          <div class="alert alert-danger errorCondition"></div>
                        </div>

                        <div class="form-group">
                          <label>Trạng thái</label>
                          <select class="form-control select2 status" name="status"  style="width: 100%;">
                            <option value="1" class="ht">Còn hàng</option>
                            <option value="0" class="kht">Hết hàng</option>
                          </select>
                        </div>

                        <!-- Main content -->
                        <section class="content">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card card-outline card-info">
                                <div class="card-header">
                                  <h3 class="card-title">
                                   Miêu tả                  
                                  </h3>
                                  <!-- tools box -->
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                            title="Collapse">
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
                                    <textarea class="textarea description" id="description" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                                  </div>              
                                </div>
                                <div class="alert alert-danger errorDescription"></div>
                              </div>
                            </div>
                            <!-- /.col-->
                          </div>
                          <!-- ./row -->
                        </section>
                        <!-- /.content -->
                         
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control select2 cateProduct" name="cateId" style="width: 100%;">
                            </select>
                        </div>
                        
                        <div class="form-group">
                          <label>product-types</label>
                          <select class="form-control select2 prodType" name="prodType" style="width: 100%;">
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label>Tags</label>
                          <select class="form-control select2 tagsProduct" name="tags" style="width: 100%;">
                          </select>
                        </div>
                        
                        <div class="form-group ">
                          <label>Sản phẩm nổi bật</label><br>
                          <div class="icheck-primary d-inline">
                            <input type="radio" name="featured" class="featured-ht" id="featured" value="0" >
                            <label for="radioPrimary1">Có</label>
                          </div>
                          <div class="icheck-primary d-inline">
                            <input type="radio" name="featured" class="featured-kht" id="featured" value="1">
                            <label for="radioPrimary2">Không</label>
                          </div> 

                        </div>
                        <div class="card-footer">
                          <input type="submit" class="btn btn-success updateProduct" value="Sửa">
                          <button type="reset" class="btn btn-primary">Nhập Lại</button>
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        </div>                       
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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




{{-- thêm vào sau trang footer.blade.php --}}
@section('ajax')
<script type="text/javascript">

</script>


@endsection
