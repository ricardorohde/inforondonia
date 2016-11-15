<?php

$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Action = $Post['action'];
unset($Post['action']);

if ($Action):
    require '../../../_app/Config.inc.php';
    require('../../_models/AdminNoticia.class.php');
endif;

switch ($Action):
    case 'delete':
        $delete = new AdminNoticia;
        if (!empty($Post['id'])):
            $delete->videoRemove($Post['id']);
            echo $delete->getResult();
        endif;
        break;
endswitch;
