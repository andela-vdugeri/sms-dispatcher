/**
 * Created by Verem on 18/11/15.
 */

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#register-link').click(function(e){
       e.preventDefault();
       BootstrapDialog.show({
           title: "Register on Simple Sms",
           draggable: true,
           message: function(dialog){
               var content = "<div class='form-group'>" +
                   "<input type='text' name='name' placeholder='username' class='form-control'>" +
                   "</div>" +
                   "<div class='form-group'>" +
                   "<input type='email' name='email' placeholder='email'class='form-control'>" +
                   "</div>" +
                   "<div class='form-group'>" +
                   "<input type='password' name='password' placeholder='password' class='form-control'>" +
                   "</div>" +
                   "<div class='form-group'>" +
                   "<input type='password' name='password_confirmation' placeholder='confirm password' class='form-control'>" +
                   "</div>";
                dialog.getButton('reg-button');
               return content;
           },

           buttons: [
               {
                   id : 'close-button',
                   label: 'Close',
                   cssClass: 'btn-primary',
                   action: function(dialog){
                       dialog.close();
                   }
               },
               {
                   id: 'reg-button',
                   label: 'Register',
                   cssClass: 'btn-primary',
                   action: function(dialog){

                       registerUser(dialog);
                   }
               }
           ]
       })
    });
});

function registerUser(dialog)
{
    var name = dialog.getModalBody().find("input[name='name']").val();
    var email = dialog.getModalBody().find("input[name='email']").val();
    var password = dialog.getModalBody().find("input[name='password']").val();
    var password_confirmation = dialog.getModalBody().find("input[name='password_confirmation']").val();

    $.ajax({
        url: '/register',
        type: 'post',
        crossDomain: true,
        data : {
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation
        },

        success: function() {
            dialog.close();
            toastr["success"]("Account created. Please login to continue");

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        },

        error: function(){
            dialog.close();
            toastr["error"]("Error creating account. Please try again.")

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }

    });
}