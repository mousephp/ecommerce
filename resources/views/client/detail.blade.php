@extends('client.layouts.master')
@section('title','Chi tiết sản phẩm')

@section('content')
<div class="wrap-inner">
	<div class="col-xs-3">
		<figure><img src="images/banner/banner-d.png" class="img-responsive" title=""></figure>
	</div>

	<div class="col-xs-9">
		<div class="product-info">
			<div class="row">
				<h3>{{$product->prod_title}}</h3>
				<div class="row">
					<div id="product-img" class="col-xs-5">
						<img src="{{asset('layouts/uploads/products/'.$product->prod_img)}}" class="img-responsive">
					</div>
					<div id="product-details" class="col-xs-7">
						<p>Giá: <span class="price">{{number_format($product->prod_price,0,',','.')}}</span></p>
						<p>Số lượng: {{$product->prod_quantity}}</p> 
						<p>Bảo hành:
							@if($product->prod_warranty == 0)
							 	Không bảo hành
							@elseif($product->prod_warranty == 6)
							6 tháng
							@elseif($product->prod_warranty == 12)
							 	12 tháng
							@endif 
						</p> 
						<p>Phụ kiện:{{$product->prod_accessories}}</p>
						<p>Tình trạng:{{$product->prod_condition}}</p>
						<p>Khuyến mại:{{$product->prod_promotion}}</p>
						<p>Còn hàng: @if($product->prod_status==1)Còn hàng @else Hết hàng @endif </p>
						<button class="btn btn-danger "><a href="{{asset('cart/create/'.$product->id)}}">Đặt hàng online</a></button>
					</div>

					<div class="tagcloud">
		                <a href="{{asset('cate-tags/'.$product->tags->id.'/'.ltrim($product->tags->tag_name,'#').'.html')}}" class="tag-cloud-link">{{$product->tags->tag_name}}</a>
		            </div>
				</div> 			  			
			</div>			
		</div>

<br>
		<div class="product-detail">
			<div class="row">
				<div class="col-xs-12">
					<h3>Chi tiết sản phẩm</h3>
					<p class="text-justify"><p>Phụ kiện: {!! $product->prod_description !!}</p>
				</div>
				
				<!-- FORM COMMENT -->
				<div class="col-xs-12">
					<div class="comment">
						{{-- <h3>Bình luận</h3> --}}
						<h4 class="mb-5">
							@if($countCommentProduct)
								{{$countCommentProduct}} Comments
							@else
								<strong>Bạn hãy là người Comments đầu tiên cho sản phẩm nào</strong>
							@endif
						</h4>

						<!-- COMMENT -->
						<div class="col-xs-12">
							<div class="comment-list">
								@foreach ($CommentProduct as $key => $value)
								<ul>
									<li class="com-title">
										{{$value->com_name}}
										<br>
										<span>{{date('d/m/y H:i',strtotime($value->created_at))}}</span>    
									</li>
									<li class="com-details">
										{{$value->com_content}}
									</li>
								</ul>
								@endforeach
							</div>
						</div>


						<form action="{{--route('comments.store',$product->id)--}}" method="post">
							@csrf
							@method('POST')
							<div class="form-group">
								<label for="name">Tên</label>
								<input type="text" class="form-control" id="name" name="name">
								@if ($errors->has('name'))
									<p class="alert alert-danger">{{ $errors->first('name') }}</p>
								@endif
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input  type="email" class="form-control" id="email" name="email">
								@if ($errors->has('email'))
									<p class="alert alert-danger">{{ $errors->first('email') }}</p>
								@endif
							</div>							
							<div class="form-group">
								<label for="cm">Bình luận</label>
								<textarea  rows="10" id="cm" class="form-control" name="message"></textarea>
								@if ($errors->has('message'))
									<p class="alert alert-danger">{{ $errors->first('message') }}</p>
								@endif
							</div>
							<div class="form-group text-right">
								<button type="submit" class="btn btn-warning">Comments</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
