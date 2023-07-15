jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 1){  
        jQuery('header').addClass("sticky-header");
    }
    else{
        jQuery('header').removeClass("sticky-header");
    }
});

jQuery(document).ready(function(){
    jQuery('.home-slider').slick({
      fade: true
      // arrows: false,
    });
  });

// <!-- Sticky Js Included -->
jQuery(".assessment-section").stick_in_parent();