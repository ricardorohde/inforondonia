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

$(function () {
    //Enquete
    $('.j_formajax').submit(function () {
        var enq = $('.main_box_enquete');
        var form = $(this);
        var data = form.serialize();

        $.ajax({
            url: '_cdn/ajax/enquete.php',
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                enq.find('.spinload').slideDown();
                enq.find('.alert').fadeOut(500, function () {
                    $(this).remove();
                });
            },
            success: function (resposta) {
                console.log(resposta);
                if (resposta.error) {
                    enq.find('.trigger-box').html('<div class="alert alert-danger">' + resposta.error + '</div>');
                    enq.find('.alert-danger').fadeIn();
                } else {
                    enq.find('.box_enq_perg').fadeOut();
                    enq.find('.trigger-box').html('<div class="alert alert-success">' + resposta.success + '</div>');
                    enq.find('.alert-success').fadeIn();
                }
                enq.find('.spinload').slideUp();
            }
        });
        return false;
    });
});

//::: Facebook :::
window.fbAsyncInit = function () {
    FB.init({
        appId: '1540165802953123',
        xfbml: true,
        version: 'v2.6'
    });
};
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));