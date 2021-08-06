$(document).ready(function() {
  function setHeight() {
    windowHeight = $(window).innerHeight();
    $('#wrapper').css('min-height', windowHeight);
  };
  setHeight();
  
  $(window).resize(function() {
    setHeight();
  });
});

$(document).ready(function() {
	
	$('[data-toggle="tooltip"]').tooltip();
	
    $('#slidemenu').append($('<div id="navbar-height-col"></div>'));
	
	var toggler = '.menu-icon-button';
    var pagewrapper = '#doc-width';
    var navigationwrapper = '#slidemenu';
    var slidewidth = '250px';
    var slideneg = '-250px';

    $(document).on("click", toggler, function(e) {
		e.preventDefault();
		var selected = $(this).hasClass('slide-active');
		$(this).toggleClass('slide-active', !selected);
		$('#doc-width, #slidemenu, footer ').toggleClass('slide-active');
		$('.nav-link svg').toggleClass('fs-24 text-center');
    });
	
});! function($) {
    "use strict";

    var Sidemenu = function() {
        this.$body = $("body"),
            this.$openLeftBtn = $(".open-left"),
            this.$menuItem = $("#sidebar-menu a")
    };
    Sidemenu.prototype.openLeftBar = function() {
            $("#wrapper").toggleClass("enlarged");
            $("#wrapper").addClass("forced");

            if ($("#wrapper").hasClass("enlarged") && $("body").hasClass("fixed-left")) {
                $("body").removeClass("fixed-left").addClass("fixed-left-void");
            } else if (!$("#wrapper").hasClass("enlarged") && $("body").hasClass("fixed-left-void")) {
                $("body").removeClass("fixed-left-void").addClass("fixed-left");
            }

            if ($("#wrapper").hasClass("enlarged")) {
                $(".left ul").removeAttr("style");
            } else {
                $(".subdrop").siblings("ul:first").show();
            }

            toggle_slimscroll(".slimscrollleft");
            $("body").trigger("resize");
        },
        //menu item click
        Sidemenu.prototype.menuItemClick = function(e) {
            if (!$("#wrapper").hasClass("enlarged")) {
                if ($(this).parent().hasClass("has_sub")) {
                    e.preventDefault();
                }
                if (!$(this).hasClass("subdrop")) {
                    // hide any open menus and remove all other classes
                    $("ul", $(this).parents("ul:first")).slideUp(350);
                    $("a", $(this).parents("ul:first")).removeClass("subdrop");
                    $("#sidebar-menu .pull-right i").removeClass("md-remove").addClass("md-add");

                    // open our new menu and add the open class
                    $(this).next("ul").slideDown(350);
                    $(this).addClass("subdrop");
                    $(".pull-right i", $(this).parents(".has_sub:last")).removeClass("md-add").addClass("md-remove");
                    $(".pull-right i", $(this).siblings("ul")).removeClass("md-remove").addClass("md-add");
                } else if ($(this).hasClass("subdrop")) {
                    $(this).removeClass("subdrop");
                    $(this).next("ul").slideUp(350);
                    $(".pull-right i", $(this).parent()).removeClass("md-remove").addClass("md-add");
                }
            }
        },

        //init sidemenu
        Sidemenu.prototype.init = function() {
            var $this = this;
            //bind on click
            $(".open-left").click(function(e) {
                e.stopPropagation();
                $this.openLeftBar();
            });

            // LEFT SIDE MAIN NAVIGATION
            $this.$menuItem.on('click', $this.menuItemClick);

            // NAVIGATION HIGHLIGHT & OPEN PARENT
            $("#sidebar-menu ul li.has_sub a.active").parents("li:last").children("a:first").addClass("active").trigger("click");
        },

        //init Sidemenu
        $.Sidemenu = new Sidemenu, $.Sidemenu.Constructor = Sidemenu

}(window.jQuery);

$(window).on("load resize", function(){
	var wh = $(window).height();
	var cc = wh - 65;
	initscrolls(cc);
});
function initscrolls(x) {	
    $('.slimscrollleft').slimScroll({
        height: x,
        position: 'right',
        size: "5px",
        color: '#dcdcdc',
        wheelStep: 5
    });
}

function toggle_slimscroll(item) {
    if ($("#wrapper").hasClass("enlarged")) {
        //$(item).css("overflow", "visible").parent().css("overflow", "visible");
        //$(item).siblings(".slimScrollBar").css("visibility", "hidden");
		
    } else {
        //$(item).css("overflow", "hidden").parent().css("overflow", "hidden");
        //$(item).siblings(".slimScrollBar").css("visibility", "visible");
		//$('.side-menu').css("overflow", "hidden");
		//$(item).css("width", "240px").parent().css("width", "240px");
    }
}

var w, h, dw, dh;
var changeptype = function() {
    w = $(window).width();
    h = $(window).height();
    dw = $(document).width();
    dh = $(document).height();

    if (jQuery.browser.mobile === true) {
        $("body").addClass("mobile").removeClass("fixed-left");
    }

    if (!$("#wrapper").hasClass("forced")) {
        if (w > 990) {
            $("body").removeClass("smallscreen").addClass("widescreen");
            $("#wrapper").removeClass("enlarged");
        } else {
            $("body").removeClass("widescreen").addClass("smallscreen");
            $("#wrapper").addClass("enlarged");
            $(".left ul").removeAttr("style");
        }
        if ($("#wrapper").hasClass("enlarged") && $("body").hasClass("fixed-left")) {
            $("body").removeClass("fixed-left").addClass("fixed-left-void");
        } else if (!$("#wrapper").hasClass("enlarged") && $("body").hasClass("fixed-left-void")) {
            $("body").removeClass("fixed-left-void").addClass("fixed-left");
        }

    }
    toggle_slimscroll(".slimscrollleft");
}


var debounce = function(func, wait, immediate) {
    var timeout, result;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) result = func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) result = func.apply(context, args);
        return result;
    };
};

//$(window).load(debounce(changeptype, 100));
//$(window).resize(debounce(changeptype, 100));

$(window).on("load resize", debounce(changeptype, 100));

$.Sidemenu.init();

$(window).on("load resize", function(){
	var ww = $(window).width();
	if(ww > 767) {
		$('body').removeClass('smallscreen');
	}
	else {
		$('body').addClass('smallscreen');
	}
});