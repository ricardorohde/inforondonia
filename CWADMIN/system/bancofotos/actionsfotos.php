<?php

$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setPost = array_map('strip_tags', $getPost);
$Post = array_map('trim', $setPost);

var_dump($Post);

$Action = $Post['action'];
$jSon = array();
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
endswitch;
