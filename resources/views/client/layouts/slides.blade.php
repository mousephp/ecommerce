<section class="contend"> <!-- contend -->
	<div class="container width-fix"> 
		<div class="row">
	
			<section class="khoi-slide "> <!-- khoi slide -->
				<div class="col-xs-8">
					<div id="carousel-id" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-id" data-slide-to="0" class=""></li>
							<li data-target="#carousel-id" data-slide-to="1" class=""></li>
							<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
						</ol>
						<div class="carousel-inner">
							@foreach($slide as $key => $value)
							<div class="item active">
								<a href="{{asset('slide/'.$value->id.'/'.$value->slide_slug.'.html')}}">
								<img src="{{asset('layouts/uploads/slides/'.$value->slide_image)}}" class="img-responsive active" style="">
								</a>	
							</div>
							@endforeach	
						</div>
						<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
						<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
				</div>
				<div class="col-xs-4 khoang-padding">
					<div class="khoi-slide__banner">
						<figure>
							<img src="images/slide/baner_sl1.png" class="img-responsive">					
						</figure>
						<figure>
							<img src="images/slide/baner_sl2.png" class="img-responsive">						
						</figure>
					</div>
				</div>
			</section> <!--end khoi slide -->

			<div class="col-xs-12">
				<section class="khoi-baner-qc-n ">	
					<figure>
						<img src="images/banner/banner-n.png" class="img-responsive">
					</figure>
				</section> <!-- end khoi baner qc ngang -->	
			</div>

		</div> <!-- end row -->
	</div><!-- end container -->
</section><!--end contend -->

