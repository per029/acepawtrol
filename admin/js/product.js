var manageProductTable;

$(document).ready(function() {

	$("#navProduct").addClass('active');
	manageProductTable = $("#manageProductTable").DataTable({
		'ajax': 'fetchProduct.php',
		'order': []
	});

	$("#addProductModalBtn").unbind('click').bind('click', function() {

		$("input[type='text']").val("");
		$("select").val("");
		$(".fileinput-remove-button").click();

		$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

		$(".text-danger").remove();
		$(".form-group").removeClass('has-error').removeClass('.has-success');

		
	$("productImage").fileinput({
	    overwriteInitial: true,
	    maxFileSize: 1500,
	    showClose: false,
	    showCaption: false,
	    browseLabel: '',
	    removeLabel: '',
	    browseIcon: '<i class="glypicon glypicon-folder-open"></i>',
	    removeIcon: '<i class="glypicon glypicon-remove"></i>',
	    removeTitle: 'Cancel or reset changes', 
	    elErrorContainer: '#kv-avatar-errors-1',
	    msgErrorClass: 'alert alert-block alert-danger',
	    defaultPreviewContent: '<img src="assets/images/photo_default.png" alt="Your Avatar style="width:160px">',
	    layoutTemplates: {main2: '{preview} {remove} {browse}'},
	    allowedFileExtensions: ["jpg", "png", "gif"]
		});		

		$("#submitProductForm").unbind('submit').bind('submit', function(){



			var productImage = $("#productImage").val();
			var productName = $("#productName").val();
			var quantity = $("#quantity").val();
			var rate = $("#rate").val();
			var brandName = $("#brandName").val();
			var categoryName = $("#categoryName").val();
			var productStatus = $("#productStatus").val();

			if (productImage == "") {
	 			$("#productImage").after('<p class="text-danger">Categories Name Field is Required</p>');
	 			$("#productImage").closest('.form-group').addClass('has-error');	 			
	 		} else {
	 			$("#productImage").find('.text-danger').remove();
	 			$("#productImage").closest('.form-group').addClass('has-success');
	 		}

				if(productName == "") {
				$("#productName").after('<p class="text-danger"> The product name field is required</p>');
				$("#productName").clost('.form-group').addClass('has-error');
			} else {
				$("#productName").find('.text-danger').remove();
				$("#productName").closest('.form-group').addClass('has-success');
			}

			if(quantity == "") {
				$("#quantity").after('<p class="text-danger"> The quantity field is required</p>');
				$("#quantity").clost('.form-group').addClass('has-error');
			} else {
				$("#quantity").find('.text-danger').remove();
				$("#quantity").closest('.form-group').addClass('has-success');
			}

				if(rate == "") {
				$("#rate").after('<p class="text-danger"> The rate field is required</p>');
				$("#rate").clost('.form-group').addClass('has-error');
			} else {
				$("#rate").find('.text-danger').remove();
				$("#rate").closest('.form-group').addClass('has-success');
			}

				if(brandName == "") {
				$("#brandName").after('<p class="text-danger"> The brand name field is required</p>');
				$("#brandName").clost('.form-group').addClass('has-error');
			} else {
				$("#brandName").find('.text-danger').remove();
				$("#brandName").closest('.form-group').addClass('has-success');
			}

				if(categoryName == "") {
				$("#categoryName").after('<p class="text-danger"> The category name field is required</p>');
				$("#categoryName").clost('.form-group').addClass('has-error');
			} else {
				$("#categoryName").find('.text-danger').remove();
				$("#categoryName").closest('.form-group').addClass('has-success');
			}

			if(productStatus == "") {
				$("#productStatus").after('<p class="text-danger"> The product status field is required</p>');
				$("#productStatus").clost('.form-group').addClass('has-error');
			} else {
				$("#productStatus").find('.text-danger').remove();
				$("#productStatus").closest('.form-group').addClass('has-success');
			}

			if(productImage && productName && quantity && rate && brandName && categoryName && productStatus) {

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {
						if(response.success == true) {


							$("input[type='text']").val("");
							$("select").val("");
							$(".fileinput-remove-button").click();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

							$("#add-product-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
								  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+response.messages+
							'</div>');

							$(".text-danger").remove();
							$(".form-group").removeClass('has-error').removeClass('.has-success');


							manageProductTable.ajax.reload(null, true);

							

						}
					}
				});
			}


			return false;

		});
	
	});

	
}); 


//edit product
function editProduct(productId = null) {
	if(productId) {
		//remove product id
		$("#productId").remove();
		$(".text-danger").remove();
		$(".form-group").removeClass('has-error').removeClass('.has-success');
		$("#edit-product-messages").html("");


		$.ajax({
			url: 'fetchSelectedProduct.php',
			type: 'post',
			data: {productId: productId},
			dataType: 'json',
			success:function(response) {

				$("#getProductImage").attr('src', 'stock/'+response.product_image);

				$("editProductImage").fileinput({
				    overwriteInitial: true,
				    maxFileSize: 1500,
				    showClose: false,
				    showCaption: false,
				    browseLabel: '',
				    removeLabel: '',
				    browseIcon: '<i class="glypicon glypicon-folder-open"></i>',
				    removeIcon: '<i class="glypicon glypicon-remove"></i>',
				    removeTitle: 'Cancel or reset changes', 
				    elErrorContainer: '#kv-avatar-errors-1',
				    msgErrorClass: 'alert alert-block alert-danger',
				    defaultPreviewContent: '<img src="assets/images/photo_default.png" alt="Your Avatar style="width:160px">',
				    layoutTemplates: {main2: '{preview} {remove} {browse}'},
				    allowedFileExtensions: ["jpg", "png", "gif"]
					});	

				$("#editProductName").val(response.product_name);
				$("#editQuantity").val(response.quantity);
				$("#editRate").val(response.rate);
				$("#editBrandName").val(response.brand_id);
				$("#editCategoryName").val(response.categories_id);
				$("#editProductStatus").val(response.active);


				$(".editProductFooter").append('<input type="hidden" name=""productId" id="productId" value="'+response.product_id+'" />');
				$(".editProductPhotoFooter").append('<input type="hidden" name=""productId" id="productId" value="'+response.product_id+'" />');

				$("#updateProductImageForm").unbind('submit').bind('submit', function(){
					
						$(".text-danger").remove();
						$(".form-group").removeClass('has-error').removeClass('has-success');
					var productImage = $("#editProductImage").val();

					if (productImage == "") {
						$("#editProductImage").closest('.center-block').after('<p class="text-danger">The product image field is required</p>');
						$("#editProductImage").closest('.form-group').addClass('has-error');

					} else {
						$("#editProductImage").find('.text-danger').remove();
						$("#editProductImage").closest('.form-group').addClass('has-success');
					}

					if (productImage) {
						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								if (response.success == true) {

									$(".text-danger").remove();
									$(".form-group").removeClass('has-error').removeClass('has-success');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

									$("#edit-productPhoto-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
										 '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									 	 '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+response.messages+
										'</div>');

									manageProductTable.ajax.reload(null, true);

									$(".fileinput-remove-button").click();

									$.ajax({
										url: 'fetchProductImageUrl.php?i='+productId,
										type: 'post',
										success:function(response) {
											$("#getProductImage").attr('src', response);
											

											
										}
									});
								}
							}
						});
					}

					return false;
				});


				//update the product
				$("#editProductForm").unbind('submit').bind('submit', function() {
					//form validation
					$(".text-danger").remove();
					$(".form-group").removeClass('has-error').removeClass('.has-success');


					var productName = $("#editProductName").val();
					var quantity = $("#editQuantity").val();
					var rate = $("#editRate").val();
					var brandName = $("#editBrandName").val();
					var categoryName = $("#editCategoryName").val();
					var productStatus = $("#editProductStatus").val();


						if(productName == "") {
						$("#editProductName").after('<p class="text-danger"> The product name field is required</p>');
						$("#editProductName").clost('.form-group').addClass('has-error');
					} else {
						$("#editProductName").find('.text-danger').remove();
						$("#editProductName").closest('.form-group').addClass('has-success');
					}

					if(quantity == "") {
						$("#editQuantity").after('<p class="text-danger"> The quantity field is required</p>');
						$("#editQuantity").clost('.form-group').addClass('has-error');
					} else {
						$("#editQuantity").find('.text-danger').remove();
						$("#editQuantity").closest('.form-group').addClass('has-success');
					}

						if(rate == "") {
						$("#editRate").after('<p class="text-danger"> The rate field is required</p>');
						$("#editRate").clost('.form-group').addClass('has-error');
					} else {
						$("#editRate").find('.text-danger').remove();
						$("#editRate").closest('.form-group').addClass('has-success');
					}

						if(brandName == "") {
						$("#editBrandName").after('<p class="text-danger"> The brand name field is required</p>');
						$("#editBrandName").clost('.form-group').addClass('has-error');
					} else {
						$("#editBrandName").find('.text-danger').remove();
						$("#editBrandName").closest('.form-group').addClass('has-success');
					}

						if(categoryName == "") {
						$("#editCategoryName").after('<p class="text-danger"> The category name field is required</p>');
						$("#editCategoryName").clost('.form-group').addClass('has-error');
					} else {
						$("#editCategoryName").find('.text-danger').remove();
						$("#editCategoryName").closest('.form-group').addClass('has-success');
					}

					if(productStatus == "") {
						$("#editProductStatus").after('<p class="text-danger"> The product status field is required</p>');
						$("#editProductStatus").clost('.form-group').addClass('has-error');
					} else {
						$("#editProductStatus").find('.text-danger').remove();
						$("#editProductStatus").closest('.form-group').addClass('has-success');
					}

					if (productName && quantity && rate && brandName && categoryName && productStatus) {
						var form = $(this);

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success.function(response) {
								if (response.success == true) {


									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

									$("#edit-product-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
								  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+response.messages+
									'</div>');

									//reload the product table
									
								}
							}
						});
					}


					return false;
				}); // update the product


			} //success
		});
	}
}




function removeProduct(productId = null) {
	if(productId) {
		//remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'removeProduct.php',
				type: 'post',
				data: {productId: productId},
				dataType: 'json',
				success:function(response) {
					if (response.success == true) {

						//close the product modal
						$("#removeProductModal").modal('hide');


						
						//update the table
						manageProductTable.ajax.reload(null, false);
						//remove success message

						$(".remove-messages").html('<div class="alert alert-success">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');


					} else {
						$(".remove-messages").html('<div class="alert alert-warning">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
							'</div>');

					}
				}
			}); //ajax
		}); //remove product button clicked
	}
}