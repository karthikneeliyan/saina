$(document).ready(function(){
  var windowHeight = $(window).innerHeight();
  // Margin-top for Mobile and web
  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
  if (!isMobile) {
    $('.login-container').css('margin-top', windowHeight/6);
  } else {
    $('.login-container').css('margin-top', 40);
  }

  $('#loginBtn').click(function(){
    if ($('#username').val() == '') {
      $('#username').css('border','1px solid #ed1c24');
      $('.errorDivUsername').show();
      setTimeout(function(){
        $('.errorDivUsername').hide();
        $('#username').css('border','1px solid #ccc');
      },2500);
    } else if ($('#password').val() =='') {
      $('#password').css('border','1px solid #ed1c24');
      $('.errorDivPassword').show();
      setTimeout(function(){
        $('.errorDivPassword').hide();
        $('#password').css('border','1px solid #ccc');
      },2500);
    } else if ($('#username').val() != 'admin') {
      $('#username').css('border','1px solid #ed1c24');
      $(".errorDivUsername").show();
      $(".errorDivUsername").text('Please enter valid username.');
      setTimeout(function(){
        $('.errorDivUsername').hide();
        $('#username').css('border','1px solid #ccc');
      },2500);
    } else if ($('#password').val() != 'password') {
      $('#password').css('border','1px solid #ed1c24');
      $(".errorDivPassword").show();
      $(".errorDivPassword").text('Please enter valid password.');
      setTimeout(function(){
        $('.errorDivPassword').hide();
        $('#password').css('border','1px solid #ccc');
      },2500);
    } else if (($("#username").val()) ==  ('admin') && ($("#password").val()) ==  ('password')) {
      window.location.href = "dashboard.html";
    } else{
        $(".errorDivUsername").text('Please enter valid username.');
        $(".errorDivPassword").text('Please enter valid password.');
        $('#username').css('border','1px solid #ed1c24');
        $('.errorDiv').show();
        setTimeout(function(){
          $('.errorDiv').hide();
          $('#username').css('border','1px solid #ccc');
        },2500);
    }
  });


});
// Document ready ends here


wow = new WOW({
  animateClass: 'animated',
  offset:       20,
  mobile:       true,       // trigger animations on mobile devices (default is true)
  live:         true,       // act on asynchronously loaded content (default is true)
  callback:     function(box) {
    // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
  }
}); 
wow.init();
