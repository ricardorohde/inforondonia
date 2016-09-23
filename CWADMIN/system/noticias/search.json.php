<?php

$filtro = "%" . filter_input(INPUT_GET, 'term') . "%";
if (!empty($filtro)):
    require('../../../_app/Config.inc.php');
    $Read = new Read;
    $Read->FullRead("SELECT n.titulo FROM noticias n WHERE n.titulo LIKE :filtro ORDER BY titulo ASC", "filtro={$filtro}");

    if ($Read->getResult()):
        foreach ($Read->getResult() as $reg):
            $data[] = $reg['titulo'];
        endforeach;
        echo json_encode($data);
    endif;
endif;