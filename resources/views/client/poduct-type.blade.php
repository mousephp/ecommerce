@extends('client.layouts.master')
@section('title','Danh mục')

@section('content')
<div class="col-xs-12">
	<h4 class="title-item-sp">{{substr($prodTypeName->prod_type_name, strpos($prodTypeName->prod_type_name, "-") + 1)}}</h4>
	<section class="khoi-sp-noi-bat dtdd-noi-bat">
		@if(count($productType) > 0)								
			@foreach($productType as $value)
			<section class="khoi-sp-noi-bat__item">
				<a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}" class="">
					<div class="thumbnail">
						<figure>
							<img src="{{asset('layouts/uploads/products/'.$value->prod_img)}}" class="img-responsive">
						</figure>
						<h3>{{$value->prod_title}}</h3>
						<strong>{{number_format($value->prod_price,0,',','.')}}đ</strong>
						<button class="btn btn-danger"><a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}">Chi tiết</a></button>
					</div>
				</a>
			</section>
			@endforeach
		@else
			<div class="jumbotron" style="background: #ea4f4f;margin: auto;">
				<h2><strong>Không có sản phẩm nào</strong></h2>
			</div>
		@endif
	</section>

</div>

<div class="row">
	<div class="col-xs-12 text-center">
		<ul class="pagination">
			{{$productType->render('client.pagination.default')}}
		</ul>
	</div>
</div>
	
@endsection
