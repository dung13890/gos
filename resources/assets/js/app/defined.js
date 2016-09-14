
/**
 * Keep modal to display when submit form
 *
 * @return void
 */
function keepModalWhenSubmit() {
    var modal = getCookie('modal');

    if (modal != undefined || modal == null) {
        $(modal).modal({show: true, backdrop: 'static', keyboard: false});
    }

    $('[data-toggle="modal"]').click(function () {
        var selector = $(this).attr('references');
        document.cookie = "modal=" + selector;
        $(selector).modal({show: true, backdrop: 'static', keyboard: false});
    });

    $('[data-dismiss="modal"]').click(function() {
        document.cookie = 'modal=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    });
}

/**
 * Scroll to top of page
 *
 * @return void
 */
function scrollTop() {
    $('#scrollTop').click(function() {
        $(this).css('text-decoration', 'none');
        $('html, body').animate({"scrollTop": 0}, 500);
    });
}

/**
 * Make input that must be required
 *
 * return void
 */
function makeInputRequired() {
    $('.form-required, .form-required-sm').focus(function(){
        $(this).parent().children().eq(1).show();
    });

    $('.form-required, .form-required-sm').focusout(function(){
        $(this).parent().children().eq(1).hide();
    });
}

/**
 * Toggle content of widget
 *
 * @param string className Class name of button toggle
 * @param number ms the miniseconds of event
 * @return void
 */
function toggleContent(className, ms) {
    if (className === undefined) {
        className = 'toggle-content';
    }

    if (ms === undefined) {
        ms = 300;
    }

    $('.' + className).click(function() {
        var selector = $(this).attr('references');
        var element = $(selector);
        var display = $(this).attr('display');

        if (display == 1) {
            element.slideUp(ms);
            $(this).attr('display', 0);
            $(this).html('<i class="fa fa-angle-right"></i>');
        } else {
            element.slideDown(ms);
            $(this).attr('display', 1);
            $(this).html('<i class="fa fa-angle-down"></i>');
        }
    });
}

/**
 * Get cookie value by cookie name
 *
 * @return mixed
 */
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

// Toggle menu mobile when display on mobile
function toggleMenuMobile() {
    var menuSystem = $('header nav.menu[references="menu-system"]').html();
    $('#menuMobile > nav[references="menu-system"]').html(menuSystem);
    var menuTasks = $('#tasks nav.menu[references="menu-tasks"]').html();
    $('#menuMobile > nav[references="menu-tasks"]').html(menuTasks);

    $('#menuMobileToggle').click(function() {
        if ($(window).width() < 768) {
            $('#menuMobile').css('height', $(window).height());
            if ($(this).attr('data-display') == 0) {
                $('#menuMobile').animate({left: 0}, 350);
                $(this).attr('data-display', 1);
            } else {
                $('#menuMobile').animate({left: - $('#menuMobile').width()}, 350);
                $(this).attr('data-display', 0);
            }
        }
    });

    $(window).resize(function() {
        var width  = $(this).width();
        var height = $(this).height();
        if (width < 767) {
            $('#menuMobile').css('height', height).show();
        } else {
            $('#menuMobile').hide();
        }
    });
}
