@extends('client.layouts.master')
@section('title','Danh mục theo tags')

@section('content')
<!-- Tags: ... -->
<div class="col-xs-12">
	<h4 class="title-item-sp">Tags: {{$tags->tag_name}}</h4>
	<section class="khoi-sp-noi-bat dtdd-noi-bat tags-product">
		@foreach($categoryTags as $value)
		<section class="khoi-sp-noi-bat__item tags-product_item" title="{{$value->prod_title}}">
			<a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}" class="">
				<div class="thumbnail">
					<figure>
						<img src="{{asset('layouts/uploads/products/'.$value->prod_img)}}" class="img-responsive">
					</figure>
					<h3>{{$value->prod_title}}</h3>
					{{-- <span class="tags-product_item--summary" style="font-size: 14px !important;"> {!! substr($value->prod_description,0,50) !!}</span> --}}
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
			{{-- $categoryFeatured->render('client.pagination.default') --}}
		</div>
	</div>
</div>

@endsection









