$(document).ready(function(){
	 $(".menu li:has(ul)").click(function (e) {
   		e.preventDefault();
 

		if ($(this).hasClass('activado')) {
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();
		} else {
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
		}

	});

	 $("nav").mouseleave(function (e) {
   		e.preventDefault();
 

		if ($('.menu li:has(ul)').hasClass('activado')) {
			$('.menu li:has(ul)').removeClass('activado');
			$('.menu li:has(ul)').children('ul').slideUp();
		} else {
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
		}

	});

	$('.menu li ul li a').click(function(){
		window.location.href = $(this).attr("href");
	});
});