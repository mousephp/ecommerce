@include('client.layouts.header')
@include('client.layouts.navbar')

<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<section class="khoi-slide-detail">
				<div class="thumbnail thumbnail-slide">
					<h1 class="khoi-slide-detail--title">{{$slide->slide_title}}</h1>
					<span class="khoi-slide-detail--content">
						{{!!$slide->slide_content!!}}					
					</span>
					<p class="khoi-slide-detail--tags">Tags:
						@foreach($tags as $key => $value)	 
						<a href="{{asset('cate-tags/'.$value->id.'/'.ltrim($value->tag_name,'#').'.html')}}">{{$value->tag_name}}</a>
						@endforeach	
					</p>
					</div>
			</section>
		</div>
	</div>
</div>

@include('client.layouts.footer')



