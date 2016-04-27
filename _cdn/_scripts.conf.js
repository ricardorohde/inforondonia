//::: Funções :::
$(function () {
    //Menu Mobile
    $('.mobmenu').click(function () {
        $('.main_header_menu ul').slideToggle();
        $(this).toggleClass('active');
        return false;
    });
    //Debug Images
    $('.debug').each(function () {
        $(this).after('<p style="color: #fff; background: #333; padding: 10px">' + $(this).width() + 'px</p>');
    });
});

//::: Facebook :::
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));