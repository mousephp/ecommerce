$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
//https://laravel.com/docs/8.x/csrf#csrf-x-csrf-token
//giúp lấy mã CSRF-TOKEN giử cho ứng dụng

// ==============================Categories================================== // 
$(document).ready(function(){
	
	$('.edit').click(function(){
		$('.error').hide();
		let id = $(this).data('id');
		$.ajax({
			url : 'admin/category/'+id+'/edit',
			dataType : 'json',
			type : 'get',
			success :function(result){
				$('.name').val(result.cate_name);
				$('.title').text(result.cate_name);	
				if(result.cate_status == 1){
					$('.ht').attr('selected','selected');
				}else{
					$('.kht').attr('selected','selected');
				}	
				console.log(result);
			}
		});

		$('.update').click(function(){
			let name = $('.name').val();
			let status = $('.status').val();		
			$.ajax({
				url : 'admin/category/'+id,
				data : {
					name : name,
					status : status,
					id:id
				},
				type : 'put',
				dataType : 'json',
				success : function(data){
					toastr.success(data.success, 'Thông báo thành công', {timeOut: 5000});
					$('#edit').modal('hide');
					location.reload();
				},				
				error: function(error) {
					var errors = JSON.parse(error.responseText);
					$('.error').show();
					$('.error').text(errors.errors.name);
				}
			});
		});

	});

	//Delete category
	$('.delete').click(function(){		
		let id = $(this).data('id');
		$('.del').click(function(){
			$.ajax({
				url : 'admin/category/'+id,
				dataType : 'json',
				type : 'delete',
				success : function(result){
					toastr.success(result.success, 'Thông báo thành công', {timeOut: 5000});
					$('#delete').modal('hide');
		 			location.reload();
				}
			});
		});
	});

});

$('#checkAll').click(function () {    
     $(':checkbox.checkCate').prop('checked', this.checked);    
});


// ==============================Tags================================== // 
$(document).ready(function(){
	//edit tags
	$('.editTags').click(function(){
		$('.error').hide();
		let id = $(this).data('id');
		$.ajax({
			url : 'admin/tags/'+id+'/edit',
			dataType : 'json',
			type : 'get',
			success :function(result){
				$('.name').val(result.tag_name);
				$('.title').text(result.tag_name);	
				if(result.tag_status == 1){
					$('.ht').attr('selected','selected');
				}else{
					$('.kht').attr('selected','selected');
				}	
				console.log(result);
			}
		});

		$('.updateTags').click(function(){
			let name = $('.name').val();
			let status = $('.status').val();			
			$.ajax({
				url : 'admin/tags/'+id,
				data : {
					name : name,
					status : status,
					id:id
				},
				type : 'put',
				dataType : 'json',
				success : function(data){
					toastr.success(data.success, 'Thông báo thành công', {timeOut: 5000});
					$('#editTags').modal('hide'); 
					location.reload();
					console.log(data);				   	
				},				
				error: function(error) {
					var errors = JSON.parse(error.responseText);
					$('.error').show();
					$('.error').text(errors.errors.name);
				}
			});
		});
	});


	//Delete tags
	$('.deleteTags').click(function(){		
		let id = $(this).data('id');
		//alert(id);
		$('.del').click(function(){
			$.ajax({
				url : 'admin/tags/'+id,
				dataType : 'json',
				type : 'delete',
				success : function(result){
					toastr.success(result.success, 'Thông báo thành công', {timeOut: 5000});
					$('#deleteTags').modal('hide');
		 			location.reload();
				}
			});
		});
	});

});



// ==============================Slides================================== // 
$(document).ready(function(){
	//edit slide
	$('.editSlide').click(function(){		
		$('.error').hide();
		$('.errorName').hide();
		$('.errorDescription').hide();
		let id = $(this).data('id');		
		//Edit
		$.ajax({
			url : 'admin/slides/'+id+'/edit',
			dataType : 'json',
			type : 'get',
			success :function(result){
				$(".name").val(result.slide_title);
				$('.title').text(result.slide_title)
				$('.imageThum').attr('src','layouts/uploads/slides/'+result.slide_image);
				$("#description").summernote("code", result.slide_content);

				if(result.slide_status == 1){
					$('.ht').attr('selected','selected');
				}else{
					$('.kht').attr('selected','selected');
				}				
			}
		});

		$('#updateSlideForm').on('submit',function(event){	
			event.preventDefault();	
			$.ajax({
				url : 'admin/slideEditId/'+id,
				data : new FormData(this),
				contentType : false,
				processData : false,
				cache : false,
				type : 'post',
				dataType : 'json',				
				success : function(data){					
					toastr.success(data.success, 'Thông báo thành công', {timeOut: 5000});
					$('#editSlide').modal('hide'); 
					location.reload();
				},				
				error: function(error) {
					var errors = JSON.parse(error.responseText);
					if (errors.errors.name != '') {
						$('.errorName').show();
						$('.errorName').text(errors.errors.name);
					}
					if(errors.errors.description != '') {
						$('.errorDescription').show();
						$('.errorDescription').text(errors.errors.description);
					} 
				}
			});
		});
	});


	//Delete slide
	$('.deleteSlide').click(function(){		
		let id = $(this).data('id');
		alert(id);
		$('.del').click(function(){
			$.ajax({
				url : 'admin/slides/'+id,
				dataType : 'json',
				type : 'delete',
				success : function(result){
					toastr.success(result.success, 'Thông báo thành công', {timeOut: 5000});
					$('#deleteSlide').modal('hide');
		 			location.reload();
				}
			});
		});
	});

});



// ==============================Users================================== // 



// ==============================Product-type================================== // 
$(document).ready(function(){
	//edit Product-type
	$('.editType').click(function(){	
		$('.error').hide();	
		let id = $(this).data('id');
		$.ajax({
			url : 'admin/product-types/'+id+'/edit',
			dataType : 'json',
			type : 'get',
			success :function(result){
				$('.name').val(result.prodType.prod_type_name);
				$('.title').text(result.prodType.prod_type_name);	
				if(result.prodType.prod_type_status == 1){
					$('.ht').attr('selected','selected');
				}else{
					$('.kht').attr('selected','selected');
				}
	
				var html = '';
				$.each(result.category,function($key,$value){
					if($value['id'] == result.prodType.cate_id){
						html += '<option value='+$value['id']+' selected>';
							html += $value['cate_name'];
						html += '</option>';	
					}else{
						html += '<option value='+$value['id']+'>';
							html += $value['cate_name'];
						html += '</option>';
					}
				});
				$('.category').html(html);
			}
		});

		$('.updateType').click(function(){
			let name = $('.name').val();
			let status = $('.status').val();			
			let category = $('.category').val();			
			$.ajax({
				url : 'admin/product-types/'+id,
				data : {
					name : name,
					status : status,
					category : category,
					id:id
				},
				type : 'put',
				dataType : 'json',
				success : function(data){
					toastr.success(data.success, 'Thông báo thành công', {timeOut: 5000});
					$('#editType').modal('hide'); 
					location.reload();
					console.log(data);				   	
				},				
				error: function(error) {
					var errors = JSON.parse(error.responseText);
					$('.error').show();
					$('.error').text(errors.errors.name);
				}
			});
		});
	});


	//Delete Product-type
	$('.deleteType').click(function(){		
		let id = $(this).data('id');
		alert(id);
		$('.del').click(function(){
			$.ajax({
				url : 'admin/product-types/'+id,
				dataType : 'json',
				type : 'delete',
				success : function(result){
					toastr.success(result.success, 'Thông báo thành công', {timeOut: 5000});
					$('#deleteType').modal('hide');
		 			location.reload();
				}
			});
		});
	});

});




// ==============================Products================================== // 
$('.cateProduct').change(function(){
	let cateId = $(this).val();
	$.ajax({
		url : 'product-type',
		data : {
			cateId : cateId
		},
		type : 'get',
		dataType : 'json',
		success : function(data){
			let html = '';
			$.each(data,function($key,$value){
				html += '<option value='+$value['id']+'>';
				html += $value['prod_type_name'];
				html += '</option>';	
			});
			$('.prodType').html(html);
		}
	});
});


$(document).ready(function(){
  //edit product
	$('.editProduct').click(function(){   
		$('.error').hide();
		$('.errorName').hide();
		$('.errorQuantity').hide();
		$('.errorPrice').hide();
		$('.errorImage').hide();
		$('.errorDescription').hide();
		$('.errorAccessories').hide();
		$('.errorPromotion').hide();
		$('.errorCondition').hide();

		let id = $(this).data('id');
		$.ajax({
		  url : 'admin/products/'+id+'/edit',
		  dataType : 'json',
		  type : 'get',
		  success :function(result){
		    $('.title').text(result.prod_title);          
		    $('.name').val(result.product.prod_title);
		    $('.quantity').val(result.product.prod_quantity);
		    $('.price').val(result.product.prod_price);
		    $('.imageThum').attr('src','layouts/uploads/products/'+result.product.prod_img);
		    $('.accessories').val(result.product.prod_accessories);
		    $('.promotion').val(result.product.prod_promotion);
		    $('.condition').val(result.product.prod_condition);
		    $('#demo').html(result.product.prod_description);

			$("#description").summernote("code", result.product.prod_description);
		    if(result.product.prod_status == 1){
		      $('.ht').attr('selected','selected');
		    }else{
		      $('.kht').attr('selected','selected');
		    }
		    
		    if(result.product.prod_featured == 1){
		      $('.featured-ht').attr('checked','checked');
		    }else{
		      $('.featured-kht').attr('checked','checked');
		    }

		    let html1 = '';
		    $.each(result.category,function(key,value){
		      if(result.product.cate_id == value['id']){
		        html1 += '<option value="'+value['id']+'" selected>';
		          html1 += value['cate_name'];
		        html1 += '</option>';
		      }else{
		        html1 += '<option value="'+value['id']+'">';
		          html1 += value['cate_name'];
		        html1 += '</option>';
		      }
		    });
		    $('.cateProduct').html(html1);

		    let html2 = '';
		    $.each(result.types,function(key,value){
		      if(result.product.prod_type_id == value['id']){
		        html2 += '<option value="'+value['id']+'" selected>';
		          html2 += value['prod_type_name'];
		        html2 += '</option>';   
		      }else{
		        html2 += '<option value="'+value['id']+'">';
		          html2 += value['prod_type_name'];
		        html2 += '</option>'; 
		      }
		    });
		    $('.prodType').html(html2);

		    let html3 = '';
		    $.each(result.tags,function(key,value){
		      if(result.product.tag_id == value['id']){
		        html3 += '<option value="'+value['id']+'" selected>';
		          html3 += value['tag_name'];
		        html3 += '</option>';   
		      }else{
		        html3 += '<option value="'+value['id']+'">';
		          html3 += value['tag_name'];
		        html3 += '</option>'; 
		      }
		    });
		    $('.tagsProduct').html(html3);
		  }
		});


		$('#updateProductForm').on('submit',function(event){
			//chặn form submit
			event.preventDefault();
			$.ajax({
				url : 'admin/productsEditId/'+id, 
				data : new FormData(this),    
				contentType : false,
				processData : false,
				cache : false,
				dataType : 'json',
				type : 'post',
				success : function(data){       
					console.log(data);
					toastr.success(data.result, 'Thông báo', {timeOut: 5000});
					$('#editProduct').modal('hide');
					window.location.reload();
				},
				error: function(error) {
					var errors = JSON.parse(error.responseText);
					if(errors.errors.name != '') {
						$('.errorName').show();
						$('.errorName').text(errors.errors.name);
					} 
					if(errors.errors.description != '') {
						$('.errorDescription').show();
						$('.errorDescription').text(errors.errors.description);
					} 
					if(errors.errors.quantity != '') {
						$('.errorQuantity').show();
						$('.errorQuantity').text(errors.message.quantity);
					} 
					if(errors.errors.price != '') {
						$('.errorPrice').show();
						$('.errorPrice').text(errors.message.price);
					} 
					if(errors.errors.promotional != '') {
						$('.errorAccessories').show();
						$('.errorAccessories').text(errors.errors.accessories);
					} 
					if(errors.errors.price != '') {
						$('.errorPromotion').show();
						$('.errorPromotion').text(errors.errors.promotion);
					} 
					if(errors.errors.promotional != '') {
						$('.errorCondition').show();
						$('.errorCondition').text(errors.errors.condition);
					} 	         
				}
			});	
		});

	});

	//Delete product
	$('.deleteProduct').click(function(){   
		let id = $(this).data('id');
		//alert(id);
		$('.del').click(function(){
		  $.ajax({
		    url : 'admin/products/'+id,
		    dataType : 'json',
		    type : 'delete',
		    success : function(result){
		      toastr.success(result.success, 'Thông báo thành công', {timeOut: 5000});
		      $('#deleteProduct').modal('hide');
		      location.reload();
		    }
		  });
		});
	});

});







