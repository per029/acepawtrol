var manageCategoriesTable;

$(document).ready(function() {

	$("#navCategories").addClass('active');

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'fetchCategories.php',
		'order': []
	});

	 $("#addCategoriesModalBtn").unbind('click').bind('click', function() {
	 	$("#submitCategoriesForm")[0].reset();
	 	$(".text-danger").remove();
	 	$(".form-group").removeClass('has-error').removeClass('has-success');

	 	$("#submitCategoriesForm").unbind('submit').bind('submit', function(){
	 		$(".text-danger").remove();
	 		$(".form-group").removeClass('has-error').removeClass('has-success');


	 		var categoriesName = $("#categoriesName").val();
	 		var categoriesStatus = $("#categoriesStatus").val();

	 		if (categoriesName == "") {
	 			$("#categoriesName").after('<p class="text-danger">Categories Name Field is Required</p>');
	 			$("#categoriesName").closest('.form-group').addClass('has-error');	 			
	 		} else {
	 			$("#categoriesName").find('.text-danger').remove();
	 			$("#categoriesName").closest('.form-group').addClass('has-success');
	 		}

	 		if (categoriesStatus == "") {
	 			$("#categoriesStatus").after('<p class="text-danger">Categories Name Field is Required</p>');
	 			$("#categoriesStatus").closest('.form-group').addClass('has-error');	 			
	 		} else {
	 			$("#categoriesStatus").find('.text-danger').remove();
	 			$("#categoriesStatus").closest('.form-group').addClass('has-success');
	 		}

	 		if(categoriesName && categoriesStatus) {
	 			var form = $(this);

	 			$.ajax({
	 				url: form.attr('action'),
	 				type: form.attr('method'),
	 				data: form.serialize(),
	 				dataType: 'json',
	 				success:function(response) {
	 					if(response.success == true) {
	 						manageCategoriesTable.ajax.reload(null, false);

	 						$("#submitCategoriesForm")[0].reset();
	 						$(".text-danger").remove();
	 						$(".form-group").removeClass('has-error').removeClass('has-success');
	 						$("#add-categories-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
								  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> '+	response.messages	+
							'</div>');

	 						

	 					}
	 				}
	 			});
	 		}


	 		return false;
	 	});
	 });

});

function editCategories(categoriesId = null) {
 	if (categoriesId) {

 		

 		$.ajax({
 			url: 'fetchSelectedCategories.php',
 			type: 'post',
 			data: {$categoriesId : $categoriesId},
 			dataType: 'json',
 			success:function(response) {
 				$("#editCategoriesName").val(response.category_name);
 				$("#editCategoriesStatus").val(response.category_active);

 				$(".editCategorieFooter").after('<input type="text" name="editCategoriesId" id="editCategoriesId" value="'+response.categories_id+'" />')


 			}
 		});
 	}
}

function removeCategories(categoriesId = null) {
	if (categoriesId) {
		$("#removeCategoriesBtn").unbind('click').bind('click', function(){
			$.ajax({
				url: 'removeCategories.php',
				type: 'post',
				data: {categoriesId : categoriesId},
				dataType: 'json',
				success:function(response) {
					if (response.success == true) {
						$("#removeCategoriesModal").modal('hide');
						manageCategoriesTable.ajax.reload(null, false);
						$(".remove-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
						  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>'+ response.messages +
						'</div>');
					} else {
						$("#removeCategoriesModal").modal('hide');
						$(".remove-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
						  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						  '<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong>'+ response.messages +
						'</div>');
					}
				}
			});
		});
	}
}