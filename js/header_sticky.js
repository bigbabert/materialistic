jQuery(document).ready(function($) {
    $('.material_at_slider').carousel({
  		interval: 5000	
  	});
            var winWidth = $(window).width();
            var navBarHeight = $(".navbar-responsive-collapse").outerHeight() / 2;
            var winHeight = $(window).outerHeight();
            var margTop = $(".navbar-default.sticky_head").outerHeight() / 2;
            $(".material_at_slider").css({"width": winWidth, "height": winHeight - navBarHeight, "margin-top": margTop});                    
});