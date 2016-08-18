//:::::: Banco Fotos ::::::
//SlideOut
function slideout(elemento, velocidade) {
    var el = elemento;
    var ve = velocidade;
    setTimeout(function () {
        $(el).slideUp(ve);
    }, 2000);
}

//Excluir Fotos Unitárias
$(function () {
    $('.delete').click(function () {
        var idfoto = $(this).attr("id");
        var boxfoto = $(this).parents('.boxfoto');
        $.ajax({
            type: 'POST',
            url: 'system/bancofotos/actionsfotos.php',
            data: {'action': 'delete', 'id': idfoto},
            cache: false,
            success: function (resposta) {
                boxfoto.slideUp('slow', function () {
                    $(this).remove();
                });
                $(".cw-alert").html(resposta);
                $(".cw-alert").slideDown('slow');
                slideout(".cw-alert", "slow");

            }
        });
        return false;
    });
});

//Excluir Fotos Múltiplas
$(function () {
    $('.deleteall').click(function () {
        if (confirm("Deseja excluir todas as fotos selecionadas?")) {
            var idfoto = [];
            $('.chkimage:checked').each(function (i) {
                idfoto[i] = $(this).val();
            });
            if (idfoto.length === 0) {
                alert("Por favor, selecione ao menos uma foto!");
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'system/bancofotos/actionsfotos.php',
                    data: {'action': 'deleteall', 'id': idfoto},
                    success: function (resposta) {
                        for (var i = 0; i < idfoto.length; i++) {
                            $('#arrayorder_' + idfoto[i] + '').slideUp('slow', function () {
                                $(this).remove();
                            });
                        }
                        console.log(resposta);
                        $(".cw-alert").html(resposta);
                        $(".cw-alert").slideDown('slow');
                        slideout(".cw-alert", "slow");
                    }
                });
                return false;
            }
        } else {
            return false;
        }
    });
});

//Legenda
$(function () {
    $(".legenda").change(function () {
        var fotoId = $(this).attr("id");
        var fotoLegenda = $(this).val();

        $.post('system/bancofotos/actionsfotos.php', {
            action: 'caption',
            id: fotoId,
            legenda: fotoLegenda
        }, function (resposta) {
            $(".cw-alert").html(resposta);
            $(".cw-alert").slideDown('slow');
            slideout(".cw-alert", "slow");
        });
    });
});

//DragDrop
$(function () {
    $("#sortable").sortable({
        cursor: 'move',
        placeholder: "ui-state-highlight",
        onChange: function () {
            serialEsq = $.SortSerialize('drop-esquerda');
            serialDir = $.SortSerialize('drop-direita');
        },
        update: function () {
            var setPost = $(this).sortable("serialize") + '&action=dragdrop';
            $.post("system/bancofotos/actionsfotos.php", setPost, function (resposta) {
                $(".cw-alert").html(resposta);
                $(".cw-alert").slideDown('slow');
                slideout(".cw-alert", "slow");
            });
        }
    });
    $("#sortable").disableSelection();
});

//Selecionar/Desselecionar All CheckBox
$(function () {
    $('.selectall').click(function () {
        $(':checkbox[class=chkimage]').prop("checked", true);
        return false;
    });
    $('.selectnone').click(function () {
        $(':checkbox[class=chkimage]').prop("checked", false);
        return false;
    });
});
