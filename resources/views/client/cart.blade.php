@extends('client.layouts.master')
@section('title','Đơn hàng')

<script type="text/javascript">	 	
	function updateCart(rowId,quantity){
		var quantity=document.getElementById('quantity').value;
		if(quantity<1){
			alert('Số lượng đơn hàng phải lớn hơn 0');
		}
		$.get(
			'{{asset('cart/update')}}',
			{rowId:rowId,quantity:quantity},
			function(){
				location.reload();
			}
		);
	}
</script>


@section('content')

<div class="col-xs-12">
	<section class="khoi-baner-qc-n ">	
		<figure>
			<img src="images/banner/banner-n1.png" class="img-responsive">
		</figure>
	</section> <!-- end khoi baner qc ngang -->	
</div>

<div id="wrap-inner">
	<div class="col-xs-3">
		<figure><img src="images/banner/banner-d.png" class="img-responsive" title=""></figure>
	</div>

	<div class="col-xs-9">
		<div class="row">
			<div class="col-xs-12">
				<div class="list-cart">
					<h3>Giỏ hàng</h3>
					<form>
						@if(!Cart::isEmpty())
						<table class="table table-bordered  text-center">
							<tbody>
								<tr class="active">
									<td wclassth="11.111%">Ảnh mô tả</td>
									<td wclassth="22.222%">Tên sản phẩm</td>
									<td wclassth="22.222%">Số lượng</td>
									<td wclassth="16.6665%">Đơn giá</td>
									<td wclassth="16.6665%">Thành tiền</td>
									<td wclassth="11.112%">Xóa</td>
								</tr>								
								@foreach($items as $value)
								<tr>
									<td ><img style="height: 150px;"  class="img-responsive" src="{{asset('layouts/uploads/products/'.$value->attributes->img)}}"></td>
									<td>{{$value->name}}</td>
									<td>
										<div class="form-group">
											<input class="form-control" type="number" min="0" oninput="this.value = Math.abs(this.value)" id="quantity" value="{{$value->quantity}}" onchange="updateCart('{{$value->id}}', this.value)">
										</div>
									</td>
									<td><span class="price">{{number_format($value->price,0,',','.')}} đ</span></td>
									<td><span class="price">{{number_format($value->price * $value->quantity,0,',','.')}} đ</span></td>
									<td><a href="{{asset('cart/delete/'.$value->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a></td>
								</tr>
								@endforeach								
						</tbody>
						</table>
						<div class="row total-price" >
							<div class="col-xs-5">
								<p>Tổng thanh toán: <span class="total-price">{{number_format($total,0,',','.')}} đ</span></p>
							</div>
							<div class="col-xs-7">
								
								<a href="#" class="btn btn-info" disabled>Mua tiếp</a>
								<a href="#" class="btn btn-info" disabled>Cập nhật</a>
								<a href="{{asset('cart/delete/all')}}" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng?')" >Xóa giỏ hàng</a>
							</div>
						</div>
						@else
							<div class="jumbotron" style="background: #ea4f4f;margin: auto;">
								<h2><strong>Giỏ hàng của bạn không có sản phẩm nào</strong></h2>
							</div>
						@endif
					</form>                              
				</div>
			</div>


			<div class="col-xs-12">
				<div class="xac-nhan">
					<h3>Xác nhận mua hàng</h3>
					<form>
						<div class="form-group">
							<label for="email">Email address:</label>
							<input required="" type="email" class="form-control" class="email" name="email">
						</div>
						<div class="form-group">
							<label for="name">Họ và tên:</label>
							<input required="" type="text" class="form-control" class="name" name="name">
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại:</label>
							<input required="" type="number" class="form-control" class="phone" name="phone">
						</div>
						<div class="form-group">
							<label for="add">Địa chỉ:</label>
							<input required="" type="text" class="form-control" class="add" name="add">
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-warning">Thực hiện đơn hàng</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection

