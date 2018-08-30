var delete_id = "";
var update_user_id = "";
var requestType = "Round Trip";
var currentAddressTab = "round_trip_autocomplete";
var total_errors = [
    "update_customerName",
    "pickupDateTime",
    "update_contact",
    //"update_emailID",
    // "update_localty"
];

var updateValidation = {
    "update_customerName": false,
    "pickupDateTime": false,
    "update_contact": false,
};
var autocompleteId = "";
initValidationFields(updateValidation);


$('#cabRequest').click(function () {
    var vallidationFlag = true;
    //to check the validation creteria throughout all fields of updation
    for (var key in errors) {
        if (errors.hasOwnProperty(key)) {
            {
                if (errors[key] == false) {
                    vallidationFlag = false;
                    break;
                }
            }
        }
    }

    if (vallidationFlag) {
        var updated_data = {
            "update_customerName": "",
            "pickupDateTime": "",
            "update_contact": "",
            "update_emailID": "",
            "address": "",
            "requestType": "",
            "carType": "",
            "destinationAddress": ""
        };

        updated_data.update_customerName = $('#update_customerName').val();
        updated_data.pickupDateTime = $('#pickupDateTime').val();
        updated_data.update_contact = $('#update_contact').val();
        updated_data.update_emailID = $('#update_emailID').val();
        if ("Round Trip" === requestType) {
            updated_data.address = $('#round_trip_autocomplete').val();
        } else {
            updated_data.address = $('#pickup_oneWay').val();
            updated_data.destinationAddress = $('#destination_oneWay').val();
        }
        updated_data.carType = $('#carType').val();
        updated_data.requestType = requestType;

        if ("1" === updated_data.carType) {
            $('#cartypr-error').show();

        } else {

           

            $.ajax({
                type: "POST",
                url: "customer_register.php",
                data: ({
                    'updated_data': updated_data,
                    "isCabrequest": true
                }),
                success: function (msg) {
                    $('#booking_form')[0].reset();
                    $('#success_text').html('');
                    $('#success_text').html('<p>Dear  ' + updated_data.update_customerName + ' .</br>Thank you for your request.Our team will get in touch with you shortly.</br> Incase of any complaints please call us @ 044-48677666 </p>');
                    $('#add_college_success').modal({
                        show: true
                    });

                    $('#updateCollege').modal('toggle');
                    //alert( "Data Saved: " + msg );
                }
            });
            $.ajax({
                type: "POST",
                url: 'send_mail.php',
                data: ({
                    'updated_data': updated_data,
                    "isCabrequest": true
                }),
                dataType: 'json'
            });
        }
    } else {
        for (var key in errors) {
            if (errors.hasOwnProperty(key)) {

                if (errors[key] == false) {
                    showError(key);
                } else {
                    hideError(key);
                }

            }
        }
    }


});

$('.addressInput').blur(function () {
    currentAddressTab = this.id;
    console.log(currentAddressTab);
})

$('#carType').change(function()
{
    let flag=$('#carType').val();
    if(flag==="1")
    {
        $('#cartypr-error').show();

    }
    else{
        $('#cartypr-error').hide();
        
    }
})