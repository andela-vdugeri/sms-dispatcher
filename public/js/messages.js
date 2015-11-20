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

        $('#logger').empty().append("Messages: "+messages);

    });

    $('#send-messages').click(function(e){
        e.preventDefault();

        var numbers = $("#inputPhoneNumbers").val();
        var message = $("#inputMessage").val();

    })
});

function getNumbers(){
    var numberString = $('#inputPhoneNumbers').val();
    return  numberString.split(',');
}