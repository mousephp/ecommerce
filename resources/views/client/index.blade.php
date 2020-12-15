@extends('client.layouts.master')
@section('title','Trang chủ')

@section('content')
<!-- ĐIỆN THOẠI NỔI BẬT NHẤT -->
<div class="col-xs-12">
	<h4 class="title-item-sp">ĐIỆN THOẠI - NỔI BẬT NHẤT</h4>	
	<section class="khoi-sp-noi-bat dtdd-noi-bat">
		<?php $count=0; ?>
		@foreach($product as $key => $value)
			@foreach($cateMobile as $key1 =>  $value1)
				@if($value1->id == $value->cate_id && $count <= 4) 
				<?php $count++; ?>
				<section class="khoi-sp-noi-bat__item" title="{{$value->prod_title}}">
					<a href="{{asset('product-detail/'.$value->id.'/'.$value->prod_slug.'.html')}}">
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
				@endif	
			@endforeach
		@endforeach
    </section>
</div>
<!-- </div> -->


<!-- TABLET - LAPTOP NỔI BẬT NHẤT -->
<div class="col-xs-12">
	<h4 class="title-item-sp">TABLET - LAPTOP NỔI BẬT NHẤT</h4>
	<section class="khoi-sp-noi-bat dtdd-noi-bat">
		<?php $count = 0; ?>
		@foreach($product as $value)
			@foreach($cateLaptop as $value1)
				@if($value1->id == $value->cate_id  && $count <= 4)
				<?php $count++; ?>
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
				@endif	
			@endforeach
		@endforeach
    </section>
</div>


<!-- PHỤ KIỆN GIÁ RẺ -->
<div class="col-xs-12">
	<h4 class="title-item-sp">PHỤ KIỆN - GIÁ RẺ</h4>
	<section class="khoi-sp-noi-bat dtdd-noi-bat">
		<?php $count = 0; ?>
		@foreach($product as $value)
			@foreach($cateAccessories as $value1)
				@if($value1->id == $value->cate_id && $count <= 4)
				<?php $count++; ?>
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
				@endif	
			@endforeach
		@endforeach
    </section>
</div>


<!-- ĐỒNG HỒ NỔI BẬT -->
<div class="col-xs-12">
	<h4 class="title-item-sp">ĐỒNG HỒ - NỔI BẬT</h4>
	<section class="khoi-sp-noi-bat dtdd-noi-bat">
		<?php $count = 0; ?>
		@foreach($product as $value)
			@foreach($cateClock as $value1)
				@if($value1->id == $value->cate_id && $count <= 4)
				<?php $count++; ?>
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
				@endif	
			@endforeach
		@endforeach
    </section>
</div>

@endsection


