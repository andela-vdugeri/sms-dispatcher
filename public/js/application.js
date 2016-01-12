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
					});
				}
		});
	});

	$('#make-payment').click(function(e){

		e.preventDefault();

		var username = $('input[name="username"]').val();
		var description = $('input[name="description"]').val();
		var amount = $('input[name="amount"]').val();

		makePayment(username, description, amount, function(response){
			if (response === "success") {
				$('#confirmModal').trigger('click');
				swal({
					title: "success",
					text: "Payment Confirmed. The admin will be notified.",
					type: "success",
					confirmButtontext:"Ok"
				});
			} else {
				$('#confirmModal').trigger('click');
				swal({
					title: "Error",
					text: "Error confirming payment. Please try again.",
					type: "Error",
					confirmButtontext:"Ok"
				});
			}
		});
	});

	$('#datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		showAnim: 'clip',
		dateFormat: 'yy-mm-dd'
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

function makePayment(username, description, amount, callback) {
	$.ajax({
		url: '/messages/units',
		type: 'post',
		data: {
			username: username, 
			description: description, 
			amount: amount
		},

		success: function(response, status, xhr) {
			callback(status);
		},

		error: function(response, status, xhr) {
			callback(status);
		}
	});
	
}

var div = $('<div></div>');
 $(document).on("click", div, function(e) {
 	
 });



div.on('click', function(){

});






