$(document).ready(function(){
	$('#payments-table').DataTable({
		ordering: false,
		info: false
	});


	/**
	 * Adjust pricing
	 */
	
	$('#pricing').click(function(){
		id = $(this).data('id');
		BootstrapDialog.show({
			title: "New Price",
		message: $("<div class='form-group'>"+
			"<input type='text' class='form-control' placeholder='new pricing e.g 1.40' name='price' required='required'>"+
			"</div>"),

		draggable:true,

			buttons: [
				{
					id: 'close',
					label: 'Close',
					cssClass: 'btn btn-primary',
					action: function(dialog) {
						dialog.close();
					},

				},

				{
					id: 'submit',
					label: 'Save',
					cssClass: 'btn btn-primary',
					action: function(dialog) {
						pricing = dialog.getModalBody().find("input[name='price']").val();
						adjustPricing(id,pricing, function(response){
							
							if (response.status == '200') {
								dialog.close();
								  swal({
				                        title: "Success",
				                        text: response.message,
				                        type: "success",   
				                        confirmButtonText: "Ok" 
					                });
							}
						});
					} 
				}
			]
		});
	});

	/**
	 * Confirm payment.
	 */
	
	$('#confirm-payment', this).click(function(e){
		e.preventDefault();

		id = $(this).data('id');
		confirmPayment(id, function(response){
				if(response.message) {
					swal({
							title: "Success",
		                    text: response.message,
		                    type: "success",   
		                    confirmButtonText: "Ok" 
					});
				} else {
					swal({
						title: "Error",
	                    text: response.error,
	                    type: "error",   
	                    confirmButtonText: "Ok" 
					})
				}
		});
	});
});


function adjustPricing(id, pricing, callback) {
	$.ajax({
		url: '/pricing/'+id,
		type: 'post',
		data: {pricing: pricing},
	})
	.done(function(response) {
		callback(response);
	})
	.fail(function(response) {
		callback(response);
	})
	.always(function() {
		callback(response);
	});
}


function confirmPayment(id, callback) {
	$.ajax({
		url: '/payment/confirm/'+id,
		type: 'post',
		data: {id: id}
	})
	.done(function(response) {
		callback(response);
	})
	.fail(function(response) {
		callback(response);
	})
	.always(function(response) {
		callback(response);
	});
	
}




