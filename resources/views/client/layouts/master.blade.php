@include('client.layouts.header')
@include('client.layouts.navbar')
@include('client.layouts.slides')

@section('contact') 
@show
<section class="contend"> <!-- contend -->
	<div class="container width-fix"> 
		<div class="row">

			@section('content') 

	        @show

		</div> <!-- end row -->
	</div><!-- end container -->
</section><!--end contend -->

@include('client.layouts.footer')
