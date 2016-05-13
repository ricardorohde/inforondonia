<?php

require('../../../_app/Config.inc.php');
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
    if (isset($_GET["delete"]) && $_GET["delete"] == true):
        $name = $_POST["filename"];
        if (file_exists('./uploads/' . $name)):
            unlink('./uploads/' . $name);
            echo json_encode(array("res" => true));
        else:
            echo json_encode(array("res" => false));
        endif;
    else:
        if (isset($dados)):
            require('../../_models/AdminBancoFotos.class.php');
            $dados['foto'] = ($_FILES['file']['tmp_name'] ? $_FILES['file'] : null);
            if (!empty($dados['foto'])):                
                $sendFotos = new AdminBancoFotos;
                $sendFotos->ExeCreate($dados);
                if (!$sendFotos->getResult()):
                    WSErro($sendFotos->getError()[0], $sendFotos->getError()[1]);
                else:
                    WSErro($sendFotos->getError()[0], $sendFotos->getError()[1]);
                endif;
            endif;
        endif;
    endif;
endif;