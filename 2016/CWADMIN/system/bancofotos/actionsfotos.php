<?php

$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Action = $Post['action'];
unset($Post['action']);

if ($Action):
    require '../../../_app/Config.inc.php';
    require('../../_models/AdminBancoFotos.class.php');
    $Update = new Update;
endif;

switch ($Action):
    case 'send':
        $Post['foto'] = ($_FILES['file']['tmp_name'] ? $_FILES['file'] : null);
        if (!empty($Post['foto'])):
            $sendFotos = new AdminBancoFotos;
            $sendFotos->ExeCreate($Post);
        endif;
        break;

    case 'delete':
        $delete = new AdminBancoFotos;
        $delete->ExeDelete($Post['id']);
        echo '<span class="fa fa-trash-o"></span> Foto Removida com sucesso!';
        break;
    case 'deleteall':
        $delete = new AdminBancoFotos;
        foreach ($Post['id'] as $id):
            $delete->ExeDelete($id);
        endforeach;
        echo '<span class="fa fa-trash-o"></span> Fotos selecionadas removidas com sucesso!';
        break;
    case 'caption':
        $dados = ['legenda' => $Post['legenda']];
        $Update->ExeUpdate('banco_fotos', $dados, "WHERE id = :id", "id={$Post['id']}");
        echo '<span class="fa fa-thumbs-up"></span> Legenda atualizada com sucesso!';
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
