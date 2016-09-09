/* DataTable - Lista Noticias */
$(document).ready(function () {
    $('#viewNews').DataTable({
        processing: true,
        serverside: true,
        ajax: {
            url: 'system/noticias/listnews.php',
            type: 'post'
        },
        columns: [
            {data: 'id'},
            {data: 'titulo'},
            {data: 'views'},
            {data: 'autor'},
            {data: 'destaque'},
            {data: 'acao'}
        ],
        responsive: true,
        sorting: [[0, 'desc']],
        language: {
            emptyTable: "Nenhum registro encontrado",
            info: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 até 0 de 0 registros",
            infoFiltered: "(Filtrados de _MAX_ registros)",
            infoPostFix: "",
            infoThousands: ".",
            lengthMenu: "_MENU_  Resultados por página",
            loadingRecords: "Carregando...",
            processing: "Processando...",
            zeroRecords: "Nenhum registro encontrado",
            search: "Buscar",
            paginate: {
                next: "Próximo",
                previous: "Anterior",
                first: "Primeiro",
                last: "Último"
            },
            aria: {
                sortAscending: ": Ordenar colunas de forma ascendente",
                sortDescending: ": Ordenar colunas de forma descendente"
            }
        }
    });
});

