/* globals ripples */

$(function (){
    if (ripples) {
        ripples.init(".btn:not(.btn-link), .navbar a, .nav-tabs a, .withripple");
    }

    var initInputs = function() {
        // Add fake-checkbox to material checkboxes
        $(".checkbox > label > input").not(".bs-material").addClass("bs-material").after("<span class=check></span>");

        // Add fake-radio to material radios
        $(".radio > label > input").not(".bs-material").addClass("bs-material").after("<span class=circle></span><span class=check></span>");

        // Add elements for material inputs
        $("input.form-control, textarea.form-control, select.form-control").not(".bs-material").each( function() {
            if ($(this).is(".bs-material")) { return; }
            $(this).wrap("<div class=form-control-wrapper></div>");
            $(this).after("<span class=material-input></span>");
            if ($(this).hasClass("floating-label")) {
                var placeholder = $(this).attr("placeholder");
                $(this).attr("placeholder", null).removeClass("floating-label");
                $(this).after("<div class=floating-label>" + placeholder + "</div>");
            }
            if ($(this).is(":empty") || $(this).val() === null || $(this).val() == "undefined" || $(this).val() === "") {
                $(this).addClass("empty");
            }

            if ($(this).parent().next().is("[type=file]")) {
                $(this).parent().addClass("fileinput");
                var $input = $(this).parent().next().detach();
                $(this).after($input);
            }
        });

    };
    initInputs();

    // Support for "arrive.js" to dynamically detect creation of elements
    // include it before this script to take advantage of this feature
    // https://github.com/uzairfarooq/arrive/
    if (document.arrive) {
        document.arrive("input, textarea, select", function() {
            initInputs();
        });
    }

    $(document).on("change", ".checkbox input", function() {
        $(this).blur();
    });

    $(document).on("keyup change", ".form-control", function() {
        var self = $(this);
        setTimeout(function() {
            if (self.val() === "") {
                self.addClass("empty");
            } else {
                self.removeClass("empty");
            }
        }, 1);
    });
    $(document)
    .on("focus", ".form-control-wrapper.fileinput", function() {
        $(this).find("input").addClass("focus");
    })
    .on("blur", ".form-control-wrapper.fileinput", function() {
        $(this).find("input").removeClass("focus");
    })
    .on("change", ".form-control-wrapper.fileinput [type=file]", function() {
        var value = "";
        $.each($(this)[0].files, function(i, file) {
            console.log(file);
            value += file.name + ", ";
        });
        value = value.substring(0, value.length - 2);
        if (value) {
            $(this).prev().removeClass("empty");
        } else {
            $(this).prev().addClass("empty");
        }
        $(this).prev().val(value);
    });
    
    //Start material-at Customization
    function fullscreen(){
        var width = $(window).width();
        var navHeight =  $("#masthead").outerHeight();
        var height = $(window).height() - navHeight;
        $('#materialistic_Carousel').css({
            width: width,
            height: height
        });
    }
  if ($("body").hasClass("home")) {
    fullscreen();
  }
        // Run the function in case of window resize
        $(window).resize(function() {
        if ($("body").hasClass("home")) {
          fullscreen();
        }
      });

    //Admin Bar margin
    if ($("body").hasClass("admin-bar") && $(".navbar-default").hasClass("sticky_head")) {
        var adminBarH = $("#wpadminbar").height();
        $(".navbar-default.sticky_head").css("margin-top", adminBarH);
    }
    //Stciky Nav Bar main content margin top
    if ($(".navbar-default").hasClass("sticky_head") && !$("body").hasClass("home")) {
        var margTop = $(".sticky_head").outerHeight();
        $(".site-content").css({'margin-top': margTop});
    }
    //Edit content in frontend modal
    $(".toggleModal").find(".post-edit-link").on("click", function (e) {
        e.preventDefault();
    });         
});



    