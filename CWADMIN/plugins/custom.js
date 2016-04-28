$(document).ready(function () {
    /*Table de Grid*/
    $('#tableView').dataTable({
        "aaSorting": [[0, 'desc']],
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_  Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Buscar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
    /*Esconde avisos*/
    $('.alert').delay(5000).fadeOut(1000);

    /*Esconde dados de acesso*/
    $('.dadosAcess').hide();
    
    /*Iniciar o DatePicker*/
    $('.datepicker').datepicker({
        language: 'pt-BR'
    });
});

$(function () {
    $("[data-mask]").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/aaaa"});
    $("[datetime-mask]").inputmask("datetime");
    $("[phone-mask]").inputmask("(99) 9999-9999");

    //AutoComplete Menu
    /*
     var json = "includes/inc_retorno_menu_json.php";
     $("#TFilterMenu").autocomplete({
     source: json,
     select: function (event, ui) {
     window.location = ui.item.url;
     }
     });*/
});

//Exibi ou Esconde os dados de acesso
$(function () {
    var chkalt = "input[name='altDadosAcess']";
    $(chkalt).change(function () {
        if ($(chkalt).is(":checked")) {
            $(".dadosAcess").show();
        } else {
            $(".dadosAcess").hide();
        }
        ;
    });
});

//CKEditor
CKEDITOR.replaceAll();