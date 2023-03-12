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