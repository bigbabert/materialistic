jQuery(document).ready(function($) {
    $('.material_at_slider').carousel({
  		interval: 5000	
            });
            var winWidth = $(window).width();
            var navBarHeight = $(".navbar-responsive-collapse").outerHeight();
            var winHeight = $(window).outerHeight();
            $(".material_at_slider").css({"width": winWidth, "height": winHeight - navBarHeight});
});