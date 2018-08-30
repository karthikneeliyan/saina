$(document).ready(function(){
  var windowHeight = $(window).innerHeight();
  $("#home").height(windowHeight);
  var headerTitle = (windowHeight-50)/2;
  var headerTitleM = (windowHeight)/2;
  
  // Margin-top for Mobile and web
  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
  if (!isMobile) {
    $('.intro-text').css('margin-top',headerTitle);
  } else {
    $('.intro-text').css('margin-top',headerTitleM);
  }

  /*====================================
    Show Menu
  ======================================*/
  $(window).bind('scroll', function(){
    var navHeight = $(window).height()-500;
    if ($(window).scrollTop()>navHeight) {
      $('.navbar-default').addClass('on');
    }else{
      $('.navbar-default').removeClass('on');
    }
  });
  $('body').scrollspy({ 
      target: '.navbar-fixed-top',
      offset: 80
  });

  /*====================================
    Smooth Scroll
  ======================================*/
  $("nav a, .smooth-btn, .page-scroll").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } // End if
  });

  $(function () {
      $('#pickupDateTime').datetimepicker();
  });

});
// Document ready ends here

$(window).load(function(){
  $('#status').delay(500).fadeOut('slow');
  $('#preloader').delay(1000).fadeOut('slow');
});

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



