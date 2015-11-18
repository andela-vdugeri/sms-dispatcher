/**
 * Created by Verem on 18/11/15.
 */
$(document).ready(function(){

    $('#login-link').on('click', function(){

        BootstrapDialog.show({
            message: function(){
                var content = "<div class='form-group'>" +
                    "<input type='email' name='email' class='form-control' placeholder='example@example.com'></div>" +
                    "<div class='form-group'>" +
                    "<input type='password' name='password' class='form-control' placeholder='password'>" +
                    "</div>";

                return content;

            },
            buttons: [
                {
                    id: 'close-btn',
                    label: 'Cancel',
                    cssClass: 'btn btn-primary',
                    action: function(dialog){
                        dialog.close();
                    }
                },
                {
                    id: 'login-btn',
                    label: 'Login',
                    cssClass: 'btn btn-primary',
                    action: function(dialog){
                        loginUser(dialog);
                    }
                }

            ]
        });
    });
});


function loginUser(dialog)
{
    var email = dialog.getModalBody().find("input[name='email']").val();
    var password = dialog.getModalBody().find("input[name='password']").val();

    $.ajax({
        url: '/login',
        type: 'post',
        data: {
            email: email,
            password: password
        },
        success: function(){
            
        }
    });
}