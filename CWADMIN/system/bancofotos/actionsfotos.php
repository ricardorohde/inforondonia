<?php

$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Action = $Post['action'];
unset($Post['action']);

if ($Action):
    require '../../../_app/Config.inc.php';
    $Update = new Update;
endif;

switch ($Action):
    case 'caption':
        $dados = ['legenda' => $Post['legenda']];
        $Update->ExeUpdate('banco_fotos', $dados, "WHERE id = :id", "id={$Post['id']}");
        break;

    case 'dragdrop':
        $array = $Post['arrayorder'];
        $count = 1;
        foreach ($array as $idval) :
            $Update->ExeUpdate('banco_fotos', ['ordem' => $count], "WHERE id = :id", "id={$idval}");
            $count ++;
        endforeach;
        echo '<span class="fa fa-thumbs-up"></span> Ordem Alterada com sucesso!';
        break;
endswitch;
