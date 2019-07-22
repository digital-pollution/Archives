$(document).ready(function() {
	
	//set viewport height
	var viewport = $(window).height();
	viewport = viewport - 138;
	$('.carousel').attr('style', 'height:'+ viewport +'px;');
	$('.carousel .item').attr('style', 'height:'+ viewport +'px;');

	
	// init carousel
	$('.carousel').carousel({
		  interval: 5000,
		  pause: '',
		  wrap: true
	});
	
	// toggle contact form display
	$('a.contact-btn').click(function(e) {
		e.preventDefault();
		$('.footer-contact').slideToggle('slow', 'swing');
	});
});