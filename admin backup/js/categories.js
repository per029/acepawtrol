var manageCategoriesTable;

$(document).ready(function() {
	$("#navCategories").addClass('active');

	manageCategoriesTable = $("#manageCategoriesTable").DataTable({
		'ajax' : 'fetchCategories.php',
		'order' : []
	});
});
function addCategories(){
	$("#submitCategoriesForm")[0].reset(); 
	$(".text-danger").remove();
	$(".form-group").removeClass('has-error').removeClass('has-success');
	$("#submitCategoriesForm").unbind('submit').bind('submit', function(){
		var categoriesName = $("#categoriesName").val();
		var categoriesStatus = $("#categoriesStatus").val();
		if(categoriesName == ""){
			$("#categoriesName").after('<p class="text-danger">Categories Name field is required</p>');
			$("#categoriesName").closest('.form-group').addClass('has-error');
		} else {
			$("#categoriesName").find('text-danger').remove();
			$("#categoriesName").closest('.form-group').addClass('has-success');
		}
		if(categoriesStatus == ""){
			$("#categoriesStatus").after('<p class="text-danger">Categories Status field is required</p>');
			$("#categoriesStatus").closest('.form-group').addClass('has-error');
		} else {
			$("#categoriesStatus").find('text-danger').remove();
			$("#categoriesStatus").closest('.form-group').addClass('has-success');
		}
 		if(categoriesName && categoriesStatus) {
 			var form = $(this);
 			$("#createCategoriesBtn").button('loading');
 		$.ajax({
 			url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					$("#createCategoriesBtn").button('reset');
				if (response.success == true) {
					manageCategoriesTable.ajax.reload(null, false);
					$("#submitCategoriesForm")[0].reset();
					$(".text-danger").remove();
					$(".form-group").removeClass('has-error').removeClass('has-success');
					$("#add-categories-messages").html('<div class="alert alert-success">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');
					$(".alert-success").delay(500).show(10, function(){
						$(this).delay(3000).hide(10, function(){
								$(this).remove();
							}); 
					});
				}

			}
 		});
 		}
		return false;
	});
}
function editCategories(categoriesId = null) {
	if(categoriesId) {
		$("#categoriesId").remove();
		$("#editCategoriesForm")[0].reset();
		$(".text-danger").remove();
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".editCategoriesFooter").after('<input type="hidden" name="categoriesId" id="categoriesId" value="'+categoriesId+'" />');
		$.ajax({
			url: 'fetchSelectedCat.php',
			type: 'post', 
			data: {categoriesId : categoriesId},
			dataType: 'json',
			success:function(response) {
				$("#editCategoriesName").val(response.categories_name);
				$("#editCategoriesStatus").val(response.categories_active);
		$("#editCategoriesForm").unbind('submit').bind('submit', function(){
		$(".text-danger").remove();
		$(".form-group").removeClass('has-error').removeClass('has-success');
		var categoriesName = $("#editCategoriesName").val();
		var categoriesStatus = $("#editCategoriesStatus").val();
		if(categoriesName == ""){
			$("#editCategoriesName").after('<p class="text-danger">Categories Name field is required</p>');
			$("#editCategoriesName").closest('.form-group').addClass('has-error');
		} else {
			$("#editCategoriesName").find('text-danger').remove();
			$("#editCategoriesName").closest('.form-group').addClass('has-success');
		}
		if(categoriesStatus == ""){
			$("#editCategoriesStatus").after('<p class="text-danger">Categories Status field is required</p>');
			$("#editCategoriesStatus").closest('.form-group').addClass('has-error');
		} else {
			$("#editCategoriesStatus").find('text-danger').remove();
			$("#editCategoriesStatus").closest('.form-group').addClass('has-success');
		}
 		if(categoriesName && categoriesStatus) {
 			var form = $(this);
 			//$("#createBrandBtn").button('loading');
 		$.ajax({
 			url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					//$("#createBrandBtn").button('reset');
				if (response.success == true) {
					manageCategoriesTable.ajax.reload(null, false);
					$(".text-danger").remove();
					$(".form-group").removeClass('has-error').removeClass('has-success');
					$("#edit-categories-messages").html('<div class="alert alert-success">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');
					$(".alert-success").delay(500).show(10, function(){
						$(this).delay(3000).hide(10, function(){
								$(this).remove();
							}); 
					});
				}

			}
 		});

 		}

		return false;
	});				
			}
		});
	}
}

	function removeCategories(categoriesId = null) {
		if(categoriesId) {
			$("#removeCategoriesBtn").unbind('click').bind('click', function(){
				$.ajax({
					url: 'removeCategories.php',
					type: 'post',
					data: {categoriesId : categoriesId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {

							$("#removeCategoriesModal").modal('hide');

							manageCategoriesTable.ajax.reload(null, false);

							$(".remove-messages").html('<div class="alert alert-success">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');

						$(".alert-success").delay(500).show(10, function(){
							$(this).delay(3000).hide(10, function(){
								$(this).remove();
							});
						});
						}
					}
				});
			}); 
		}
	}