<!-- jQuery -->
<script src="layouts/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="layouts/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="layouts/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="layouts/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="layouts/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="layouts/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="layouts/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="layouts/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="layouts/admin/plugins/moment/moment.min.js"></script>
<script src="layouts/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="layouts/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="layouts/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="layouts/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="layouts/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="layouts/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="layouts/admin/dist/js/demo.js"></script>







<script src="layouts/admin/js/ajax.js"></script>
<script type="text/javascript" src="layouts/admin/plugins/toastr/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="layouts/admin/plugins/toastr/toastr.min.css">
<link rel="stylesheet" type="text/css" href="layouts/admin/plugins/toastr/toastr.css">

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

@yield('ajax')


</body>
</html>
