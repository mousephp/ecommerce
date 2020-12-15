<!-- FOOTER -->
<footer class="footer ">
	<div class="container width-fix"> 
		<div class="row">
			<div class="col-xs-4 ">			
				<ul class="footer__colfoot footer-left">
					<li><a title="Hướng dẫn mua trả góp" >Tìm hiểu về mua trả góp</a></li>
					<li><a title="Tìm trung tâm bảo hành">Chính sách bảo hành</a></li>
					<li><a title="Chính sách đổi trả">Chính sách đổi trả</a></li>
					<li><a title="Giao hàng &amp; Thanh toán">Giao hàng &amp; Thanh toán</a></li>
					<li class=""><a title="Nội quy cửa hàng">Nội quy cửa hàng</a></li>
					<li class=""><a title="Chất lượng phục vụ">Chất lượng phục vụ</a></li>
					<li class=""><a title="Thông tin trao thưởng">Thông tin trao thưởng</a></li>
				</ul>		
			</div>

			<div class="col-xs-4 ">
				<ul class="footer__colfoot footer-center">
					<li><a title="Giới thiệu công ty" >Giới thiệu công ty </a></li>
					<li><a title="Tuyển dụng">Tuyển dụng</a></li>
					<li><a title="Gửi góp ý, khiếu nại">Gửi góp ý, khiếu nại</a></li>
					<li><a title="Tìm siêu thị (1825  shop)">Tìm siêu thị <span>(1825 shop)</span></a></li>
					<li>
						<a class="" title="Xem bản mobile">Xem bản mobile</a>
					</li>
				</ul>			
			</div>

			<div class="col-xs-4 ">		
				<ul class="footer__colfoot footer-right">
					<li>
						<p>Gọi mua hàng <a >1800.1060</a> (7:30 - 22:00)</p>
						<p>Gọi khiếu nại &nbsp; <a >1800.1062</a> (8:00 - 21:30)</p>
						<p>Gọi bảo hành &nbsp; <a >1800.1064</a> (8:00 - 21:00)</p>
						<p>Hỗ trợ kỹ thuật <a >1800.1763</a> (7:30 - 22:00)</p>
					</li>
				</ul>	
			</div>

		</div>
	</div>
</footer>
<!--END FOOTER -->



<script type="text/javascript" src="{{asset('layouts/admin/plugins/toastr/toastr.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('layouts/admin/plugins/toastr/toastr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('layouts/admin/plugins/toastr/toastr.css')}}">
<script type="text/javascript">
	@if(Session::has('message'))
	var type = "{{ Session::get('alert-type', 'success') }}";
	switch(type){
		case 'info':
		toastr.info("{{ Session::get('message') }}",{timeOut: 2000});		
		break;

		case 'warning':
		toastr.warning("{{ Session::get('message') }}");
		break;

		case 'success':
		toastr.success("{{ Session::get('message') }}");
		break;

		case 'error':
		toastr.error("{{ Session::get('message') }}");
		break;
	}
	@endif

	@if(Session::has('error'))
	var type = "{{ Session::get('alert-type', 'warning') }}";
	switch(type){
		case 'info':
		toastr.info("{{ Session::get('error') }}",{timeOut: 2000});
		
		break;

		case 'warning':
		toastr.warning("{{ Session::get('error') }}");
		break;

		case 'success':
		toastr.success("{{ Session::get('error') }}");
		break;

		case 'error':
		toastr.error("{{ Session::get('error') }}");
		break;
	}
	@endif
</script>
</body>
</html>



