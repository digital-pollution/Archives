var PAGE = {};

PAGE.controller = {
	plugins: function(){
		//$('.accordion-item').niceScroll();
		//$('.accordion-item').getNiceScroll().hide();
	},
	events: function(){
			/* form section */
			$('form').submit(function() {
				$('input[type=submit]').remove();
				$(this).append('<p>Thanks for getting in touch, I\'ll get back asap!</p>');
				return true;
			});

			/* accordian */
			$('.accordion-item h1').on('click', function(e){
				e.preventDefault();
				if($(this).parent('div').hasClass('active')) {
					$('.accordion-item').each(function(){ $(this).removeClass('active').removeClass('not-active'); });
				} else {
					$('.accordion-item').each(function(){ $(this).removeClass('active').addClass('not-active'); });
					$(this).parent('div').removeClass('not-active').addClass('active');
					setTimeout(function(){
		
					}, 500);
				}
				$('.accordion-item').each(function(){
					$('h1', this).animate({ opacity: 0 }, 100);	
				});
				setTimeout(function(){
						PAGE.controller.resizeFont();
				}, 700);
			});

			/* samples section */
			var samples = 0;
			$('#hightlights .item').each(function(){
				samples = samples + parseInt($(this).width());		
			});
			samples = samples + 30;
			$('#hightlights .carousel-inner').css('width', samples+'px');

			$('.carousel-indicators li').on('click', function(e){
				e.preventDefault();
				w = parseInt($('#hightlights .item').width());
				d = $(this).attr('data-slide-to');
				m = -Math.abs(d * w);
				$('#hightlights .carousel-inner').animate({ marginLeft: m +'px'}, 200);
				$('.carousel-indicators li').each(function(){ $(this).removeClass('active'); });
				$(this).addClass('active');
			});

			/* work section */
			wi = 3 * parseInt($('.work-item').width());
			$('#collapse-three .content').css('width', wi+'px');


			console.log($('.work-container').css('margin-left'));
			$('.work-left').on('click', function(e){
				e.preventDefault();
				if($('.work-container').css('margin-left') != '0px'){
					$('.work-container').animate({ marginLeft: -Math.abs(wi) +'px'}, 200);
				}	
			});
			$('.work-right').on('click', function(e){
				e.preventDefault();
				console.log($('.work-container').css('margin-left'));
				if($('.work-container').css('margin-left') != '0px' ){
				//	f = $('.work-container').css('margin-left') + wi; 
				//	$('.work-container').animate({ marginLeft: f +'px'}, 200);
				alert('0!');
				}
			});			
	},
	resizeFont: function(){
				$('.accordion-item').each(function(){
					var t = $(this);
					var itemHeight = parseInt($(this).height());
					var fontHeight = itemHeight * 0.8;
					$('h1', this).css('font-size', fontHeight + 'px');
					setTimeout(function(){
						console.log('this' + t.attr('class'));
						if(!t.hasClass('active')) {
							$('h1', t).animate({ opacity: 0.8 }, 100);	
						}	
					}, 200);	
				});

		
	},
	init: function(){
		
		// set the start size of the title font
		$('.accordion-item').each(function(){
			var itemHeight = parseInt($(this).height());
			var fontHeight = itemHeight * 0.8;
			$('h1', this).css('font-size', fontHeight + 'px');
		});

		this.plugins();
		this.events();
	}	
};

$(document).ready(function() {
	PAGE.controller.init();
});	





	

	
		
	
/*	var windowHeight = $(window).height();
	var startHeight = $(window).height() / 5;
	
	var headingSpacing = startHeight * 0.15;
	var headingSize = startHeight * 0.6;
	
	$('.container .accordion-item').css('height', startHeight);
	
	$('.container').unwrap();
	
	$('.accordion-item > h1').each(function(){
		$(this).css('margin', '' + headingSpacing + 'px auto');
		$(this).css('font-size', '' + headingSize + 'px');
	});
	
	$('.accordion-item').click(function(e) {
			
		var thisHeight = $(this).children('div').outerHeight();
		var elseHeight = (windowHeight - thisHeight) / 4;
		
		
		
		if( thisHeight > windowHeight ) {
			thisHeight = windowHeight - (windowHeight * 0.2);
			elseHeight = (windowHeight - thisHeight) / 4;
		} else {
		}		
		
			if($(this).hasClass('open')) {
				if($(e.target).is('.accordion-item.open')){  
					$('.accordion-item').animate({
					    height: startHeight
					  }, 1000, function() {  
					    $(this).removeClass('open');
					});
					
					$( 'div', this ).animate({
						 opacity: 0 
					}, 1000, function(){
					
					});
					$('.accordion-item > h1').each(function(){
						$(this).animate({
						  	fontSize: headingSize,
						  	margin: headingSpacing + 'px auto',
						  	opacity: '0.4'
						  }, 1000, function() {
							  $(this).css('opacity', '');
						  });
					});
				}
				
			} else {
				
				$('.accordion-item').not(this).animate({
					    height: elseHeight
					  }, 1000, function() {
					    $(this).removeClass('open');
					    
				});				
				$('.accordion-item div').not($(this).parent()).animate({
					opacity: 0 
				}, 1000); 
				
				$(this).animate({
				    height: thisHeight
				  }, 1000, function() {
					  $(this).addClass('open');
				});
				
				$(this).children('h1').animate({
				  	fontSize: '0px',
				  	margin: '0px',
				  	opacity: '0'
				  }, 1000, function() {
					 
				});
				
				$('.accordion-item').not($(this)).children('h1').animate({
				  	fontSize: elseHeight * 0.6,
				  	margin: ''+ elseHeight * 0.15 +'px 0 0 0',
				  	opacity: '0.4'
				  }, 1000, function() {
					  $(this).css('opacity', '');
				  });
				
				$( 'div', this ).animate({
					 opacity: 1 
				}, 1000, function(){
					
				});
				
			} 
 	});
	
	 (function() {
		// initializes touch and scroll events
		        var supportTouch = $.support.touch,
		                scrollEvent = "touchmove scroll",
		                touchStartEvent = supportTouch ? "touchstart" : "mousedown",
		                touchStopEvent = supportTouch ? "touchend" : "mouseup",
		                touchMoveEvent = supportTouch ? "touchmove" : "mousemove";

		 // handles swipeup and swipedown
		        $.event.special.swipeupdown = {
		            setup: function() {
		                var thisObject = this;
		                var $this = $(thisObject);

		                $this.bind(touchStartEvent, function(event) {
		                    var data = event.originalEvent.touches ?
		                            event.originalEvent.touches[ 0 ] :
		                            event,
		                            start = {
		                                time: (new Date).getTime(),
		                                coords: [ data.pageX, data.pageY ],
		                                origin: $(event.target)
		                            },
		                            stop;

		                    function moveHandler(event) {
		                        if (!start) {
		                            return;
		                        }

		                        var data = event.originalEvent.touches ?
		                                event.originalEvent.touches[ 0 ] :
		                                event;
		                        stop = {
		                            time: (new Date).getTime(),
		                            coords: [ data.pageX, data.pageY ]
		                        };

		                        // prevent scrolling
		                        if (Math.abs(start.coords[1] - stop.coords[1]) > 10) {
		                            event.preventDefault();
		                        }
		                    }

		                    $this
		                            .bind(touchMoveEvent, moveHandler)
		                            .one(touchStopEvent, function(event) {
		                        $this.unbind(touchMoveEvent, moveHandler);
		                        if (start && stop) {
		                            if (stop.time - start.time < 1000 &&
		                                    Math.abs(start.coords[1] - stop.coords[1]) > 30 &&
		                                    Math.abs(start.coords[0] - stop.coords[0]) < 75) {
		                                start.origin
		                                        .trigger("swipeupdown")
		                                        .trigger(start.coords[1] > stop.coords[1] ? "swipeup" : "swipedown");
		                            }
		                        }
		                        start = stop = undefined;
		                    });
		                });
		            }
		        };

		//Adds the events to the jQuery events special collection
		        $.each({
		            swipedown: "swipeupdown",
		            swipeup: "swipeupdown"
		        }, function(event, sourceEvent){
		            $.event.special[event] = {
		                setup: function(){
		                    $(this).bind(sourceEvent, $.noop);
		                }
		            };
		        });

		    })();
	 $('a.work-left').click(function (){
		 if ( $( ".work-container" ).css('marginLeft') == '0px' ) {
		 } else if (!$(this).hasClass('busy')) {
			 $(this).addClass('busy');
			 $( ".work-container" ).animate({ "margin-left": "+=250px" }, "slow", function(){
				 $('a.work-left').removeClass('busy');
			 });
		 }
	 });
	 $('a.work-right').click(function (){
		 if ( $( ".work-container" ).css('marginLeft') == '-1250px' ) {
		 } else if (!$(this).hasClass('busy')) {
			 $(this).addClass('busy');
			 $( ".work-container" ).animate({ "margin-left": "-=250px" }, "slow", function(){
				 $('a.work-right').removeClass('busy');
			 });
		 }
	 });

}); */