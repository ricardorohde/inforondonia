/*AutoComplete*/
$(document).ready(function () {
    $('#busca').autocomplete({
        source: 'system/noticias/search.json.php',
        minLength: 3
    });
});

