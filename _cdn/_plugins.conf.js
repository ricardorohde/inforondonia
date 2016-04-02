$(function () {
    $('.mobmenu').click(function () {
        $('.main_header_menu ul').slideToggle();
        $(this).toggleClass('active');
        return false;
    });

    $('.debug').each(function () {
        $(this).after('<p style="color: #fff; background: #333; padding: 10px">' + $(this).width() + 'px</p>');
    });
});