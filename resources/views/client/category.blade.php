@extends('client.layouts.master')
@section('title','Danh mục')

@section('content')
	<!-- DANH MỤC SẢN PHẨM -->
	<div class="col-xs-12">
		<section class="category-link">
			<ul>
				@foreach($categoryProdType as $key => $value)
				<li class="btn btn-default"><a href="{{asset('product-type/'.$value->id.'/'.substr($value->prod_type_name, strpos($value->prod_type_name, "-") + 1).'.html')}}">{{substr($value->prod_type_name, strpos($value->prod_type_name, "-") + 1)}}</a></li>
				@endforeach
			</ul>
		</section>
	</div>
	<!--END DANH MỤC SẢN PHẨM -->


	<!-- ĐIỆN THOẠI NỔI BẬT NHẤT -->
	<div class="col-xs-12">

		<h4 class="title-item-sp">{{$category->cate_name}} nổi bật nhất</h4>
		<section class="khoi-sp-noi-bat dtdd-noi-bat">
			@foreach($categoryFeatured as $value)
			<section class="khoi-sp-noi-bat__item" title="{{$value->prod_title}}">
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

		</section>
	</div>
	<!-- </div> -->


	<!-- ĐIỆN THOẠI MỚI NHẤT -->
	<h4 class="title-item-sp">{{$category->cate_name}} mới nhất</h4>
	<div class="col-xs-12">
		<section class="khoi-sp-noi-bat dtdd-noi-bat">
			@foreach($categoryNews as $value)
			<section class="khoi-sp-noi-bat__item" title="{{$value->prod_title}}">
				<a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}" class="">
					<div class="thumbnail">
						<figure>
							<img src="{{asset('layouts/uploads/products/'.$value->prod_img)}}" class="img-responsive">
						</figure>
						<h3>{{$value->prod_title}}</h3>
						<strong>{{number_format($value->prod_price,0,',','.')}}</strong>
						<button class="btn btn-danger"><a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}">Chi tiết</a></button>
					</div>
				</a>
			</section>
			@endforeach
		</section>
	</div>
	<!-- </div> -->

	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<ul class="pagination">
					{{ $categoryNews->render('client.pagination.default') }}
				</ul>
			</div>
		</div>
	</div>

@endsection
