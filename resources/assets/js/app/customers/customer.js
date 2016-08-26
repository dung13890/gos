$(document).ready(function() {
    $('.cus-tabs .nav > li').click(function() {
        var name = $(this).attr('references');
        $(this).addClass('active');
        $('.cus-tabs .nav > li').removeClass('active');
        $('.cus-data').children().hide();
        $('[name="' + name + '"]').fadeIn(300);
    });
});