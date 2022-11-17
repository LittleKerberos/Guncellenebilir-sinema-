/*
-- 'a' click for page slide
*/
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 800);
        return false;
      }
    }
  });
});


/*
-- mobile-menu 
*/

$('.open-menu').click(function(){
	$('.mobile-menu').addClass('mobile-menu-active');
})
$('.close-menu').click(function(){
	$('.mobile-menu').removeClass('mobile-menu-active');
})


/*
-- addClass
*/

$(window).scroll(function (){
	if ($(document).scrollTop() > 50) {
			$('.navbar-wrap').addClass('sticky-navbar');
      $('.nav-logo').addClass('logo-b');
      $('.nav-logo').removeClass('logo-w');
	}
	else{
		$('.navbar-wrap').removeClass('sticky-navbar');
    $('.nav-logo').removeClass('logo-b');
    $('.nav-logo').addClass('logo-w');
	}
});




/* 
-- Slider 
*/


$(document).ready(function(){
      $('.slider-t').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		});
    });

