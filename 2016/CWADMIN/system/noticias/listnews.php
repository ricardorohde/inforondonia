<?php

$Post = $_REQUEST;
require '../../../_app/Config.inc.php';

$readReg = new Read;
$readReg->FullRead(
        "SELECT n.id, n.titulo, n.contador, n.data, n.destaque, u.nome"
        . " FROM noticias n, usuarios u "
        . "WHERE n.titulo != :l AND n.qm_cadastr = u.id "
        . "ORDER BY n.id DESC", "l= ''"
);
$recordsTotal = $readReg->getRowCount();

$data = [];

if ($readReg->getResult()):
    foreach ($readReg->getResult() as $reg):
        $rowData = [];
        $rowData[] = $reg['id'];
        $rowData[] = $reg['titulo'];
        $rowData[] = $reg['contador'];
        $rowData[] = $reg['data'];
        $rowData[] = $reg['destaque'];
        $rowData[] = $reg['nome'];
        $data = $rowData;
    endforeach;

    $json_data = array(
        "draw" => intval($Post['draw']),
        "recordsTotal" => intval($recordsTotal),
        "recordsFiltered" => intval(0),
        "data" => $data
    );

    echo json_encode($Post);
endif;