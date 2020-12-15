@extends('client.layouts.master')
@section('title','Tìm kiếm')

@section('content')
<?php
	function color($str, $keyword){
		return str_replace($keyword,"<span style='color:red'>$keyword</span>",$str);
	}
?>

<!-- Tìm kiếm với từ khóa: Samsung -->
<div class="col-xs-12">

	<h4 class="title-item-sp">Tìm kiếm với từ khóa: {{$keyword}}</h4>
	<section class="khoi-sp-noi-bat dtdd-noi-bat">
		@if(count($itemSearch) > 0)
			@foreach($itemSearch as $value)
			<section class="khoi-sp-noi-bat__item" title="{{$value->prod_title}}">
				<a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}" class="">
					<div class="thumbnail">
						<figure>
							<img src="{{asset('layouts/uploads/products/'.$value->prod_img)}}" class="img-responsive">
						</figure>
						<h3>{!! color($value->prod_title, $keyword) !!}</h3>
						<strong>{{number_format($value->prod_price,0,',','.')}}₫</strong>
						<button class="btn btn-danger"><a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}">Chi tiết</a></button>
					</div>
				</a>
			</section>
			@endforeach
		@else
			<div class="jumbotron" style="background: #ea4f4f;margin: auto;">
				<h2><strong>không tồn tại sản phẩm nào với từ khóa: {{$keyword}}</strong></h2>
			</div>
		@endif

	</section>
</div>
<!-- </div> -->


<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			{{$itemSearch->render('client.pagination.default')}}
		</div>
	</div>
</div>

@endsection









