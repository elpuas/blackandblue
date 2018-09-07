jQuery(document).ready(function($){
 
    console.log("%c Made with  💖 and a lot of  ☕ by el.puas | https://elpuas.com ", "color:#fff;background:#000;");

 if ($(window).width() < 425) {
        $("#aboutHeading").insertAfter("#aboutImage");
     }

 $(window).resize(function() {

   var eventFired = 0;

   if ($(window).width() < 425) {
       $("#aboutHeading").insertAfter("#aboutImage");
      }

   else {
    // Do nothing
    eventFired = 1;
    }

    if ($(document).find('.single-tribe_events').lenght == 0 ) {
        var $postImage = $('.tribe-events-event-image').detach();
		$('.entry-content').append($postImage);
	} else {
		 // Do nothing
	}

    });
})(jQuery)
