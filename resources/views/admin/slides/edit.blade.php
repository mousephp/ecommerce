@extends('admin.layouts.master')
@section('title','Slide sản phẩm sản phẩm')
@section('breadcrumb-news','Sửa slide sản phẩm')

@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
      <form role="form" method="POST" action="{{route('slides.update',$slide->id)}}"  enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
        <div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Tiêu đề slide</label>
				<input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập sản phẩm" value="{{$slide->slide_title}}" >
				@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
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
	            @if ($errors->has('image'))
					<p class="alert alert-danger">{{ $errors->first('image') }}</p>
				@endif
	         </div>
	         <p><img src="{{asset('layouts/uploads/slides/'.$slide->slide_image)}}" style="width: 200px;height: 200px;object-fit: cover;"></p>

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
		                <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
		                	 {{$slide->slide_content}}
		                </textarea>
		              </div>
		              @if ($errors->has('description'))
						<p class="alert alert-danger">{{ $errors->first('description') }}</p>
					  @endif	            
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
	          	<select class="form-control select2" name="status"  style="width: 100%;">
		           <option value="1" @if($slide->slide_status == 1) selected  @endif>Show</option>
				   <option value="0" @if($slide->slide_status == 0) selected  @endif>Hide</option>
		        </select>
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