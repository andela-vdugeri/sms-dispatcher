$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#inputMessage').on('keyup', function(){
        var message = $(this).val();
        var messageLength = message.length;
        var numberArray = getNumbers();
        var numberOfMessages;
        var numbers = numberArray.length;
        numberOfMessages = Math.ceil(messageLength/160);

        var messages = numberOfMessages * numbers;
        countMessages(messages);
        $('#logger').empty().append("Messages: "+messages);

    });

    $('#send-messages').click(function(e){
        e.preventDefault();
        var numbers = getNumbers();
        var message = $("#inputMessage").val();

        var numberOfMessages =  Math.ceil((message.length)/160);
        var messages = numberOfMessages * numbers.length;


        $.ajax({
            type: 'post',
            url: '/message/send',
            data: {
                'to': numbers,
                'text': message,
                'units': messages
            },

            success: function(response, status, xhr) {
                toastr["success"]("Message sent!");

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
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
            error: function(response, status, xhr) {
                toastr["error"]("Sorry. But we could not send your message. Please try again")

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
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

    });
});

function getNumbers(){
    var numberArray = [];
    var numberString = $('#inputPhoneNumbers').val();
    var numbers =  numberString.split(',');

    numbers.forEach(function(number){
        var internationalizedNumber = processNumber(number);
        if(!(internationalizedNumber === undefined)) {
            numberArray.push(internationalizedNumber);
        }

    });

    return numberArray;
}

function processNumber(number)
{
    if(!(number.trim() === '')){
        if (number.trim().charAt(0) === '0') {
            return "+234"+number.trim().slice(1, number.length);
        }

        return "+234"+number.trim();
    }
}

function countMessages(numberOfMessages)
{
    return numberOfMessages;
}