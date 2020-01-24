function accordion() {
	// Add "inactive" class to all headers.
	$('.accordion-header').toggleClass('accordion-inactive');

	// Add "closed" class to all content divs.
	$('.accordion-content').toggleClass('accordion-closed');


	// The Accordion Effect
	$('.accordion-header').click(function () {
	    if($(this).is('.accordion-inactive')) {
	        $('.accordion-active').toggleClass('accordion-active accordion-inactive').next().slideToggle().toggleClass('accordion-open');
	        $(this).toggleClass('accordion-active accordion-inactive');
	        $(this).next().slideToggle().toggleClass('accordion-open');
	    }

	    else {
	        $(this).toggleClass('accordion-active accordion-inactive');
	        $(this).next().slideToggle().toggleClass('accordion-open');
	    }
	});
}
