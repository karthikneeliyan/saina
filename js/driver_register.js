$("#register_driver_form").on('submit', function (e) {
    e.preventDefault();
  
    $('.statusMsg').html('');
    //var post_url = $(this).attr("action"); 
    //var request_method = $(this).attr("method"); 
//     var form_data = $(this).serialize(); 
//    // var myForm = document.getElementById('register_driver_form');
//     var file_data = $('#licensepic').prop('files')[0];   
    
//     var form_data = new FormData();                  
//     form_data.append('file', file_data);
var formData="";
    formData = new FormData(this);
    $.ajax({
        
        url: 'driver_register.php',
        dataType: 'text',
        processData: false,
        contentType: false,
        cache: false,
        data:formData,
      
        
        type: 'POST',
        success: function (msg) {
            let message=JSON.parse(msg);
            $('.statusMsg').html('');
            $('#register_driver_form')[0].reset();
            if (message.code ===1000) {
                $('#register_driver_form')[0].reset();
                $('.statusMsg').html('<span style="font-size:18px;color:green">Registered Successfully.</span>');
            } else {
                $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
            }
        }
    });

});