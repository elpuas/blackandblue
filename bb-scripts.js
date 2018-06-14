jQuery(document).ready(function($){
 console.log("%c Made with  💖 and a lot of  ☕ by el.puas | https://elpuas.com ", "color:#fff;background:#000;");

 $(window).resize(function() {
   var eventFired = 0;

   if ($(window).width() < 425) {
       console.log('Less than 425');
       $("#aboutHeading").insertAfter("#aboutImage");
       /*
       $( ".bb__home--about-grid" ).each(function() {
         $("#aboutHeading").insertAfter("#aboutImage");
      });

      */

   }
   else {
       console.log('More than 425');
       eventFired = 1;
   }

});



});

(function ($) {

var mn_index = 0; //Starting index
var mn_visible = 3;
var mn_end_index = 0;

function mn_next_slide(item) {
        mn_end_index = ( item.length / mn_visible ) - 1; //End index

        if (mn_index < mn_end_index ) {
            mn_index++;
            item.animate({'left':'-=100vw'}, 1000);
        }
}

function mn_previous_slide(item) {
        if (mn_index > 0) {
             mn_index--;
             item.animate({'left':'+=100vw'}, 1000);
        }
}

function mn_first_slide(item) {
        if (mn_index > 0) {
             var move_vw = (100 * mn_index);
             item.animate({'left':'+='+move_vw+'vw'}, 1000);
             mn_index = 0;
        }
}

function mn_set_visible() {
    if ($(window).width() < 480) {
        mn_visible = 1;
    } else if ($(window).width() < 1025) {
        mn_visible = 3;
    }
}

function mn_carousel_init() {
    mn_set_visible();

    var item = $('.ds-carousel-module');

    $('#ds-arrow-right').click(function() {
        mn_next_slide(item);
    });

    $('#ds-arrow-left').click(function() {
        mn_previous_slide(item);
    });

    $(window).resize(function() {
        mn_set_visible();
        mn_first_slide(item);
    });

}

$(document).ready(function() {
    mn_carousel_init();
});

})(jQuery)
