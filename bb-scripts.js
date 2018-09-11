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
   });

   // Check if Element Exist in the DOM
   $.fn.exists = function(callback) {
    var args = [].slice.call(arguments, 1);
  
    if (this.length) {
      callback.call(this, args);
    }
  
    return this;
    };

    $('.single-tribe_events').exists( function() {

        console.log('Aqui estoy!');

        var $postImage = $('.tribe-events-event-image').detach();

        $('.entry-content').prepend($postImage);
        
    });

    setTimeout(function() {
        
        $('#tribe-events-bar').exists( function() {
            
            
        
            var $eventsBar = $('.home #tribe-events-bar');
        
            $eventsBar.css('display', 'none');
        
        });

        $('.tribe-events-ical').exists( function() {
            
            $(this).attr('href', '/book-form'); 
            
            $(this).text('Book Now!');
        });

        $('.tribe_get_events_title').text().replace('Locations for', '' );

    }, 250);

});
