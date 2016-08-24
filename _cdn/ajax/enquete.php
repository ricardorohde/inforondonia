<?php

$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setPost = array_map('strip_tags', $getPost);
$Post = array_map('trim', $setPost);
$Now = date('Y-m-d');
$IpUser = $_SERVER['REMOTE_ADDR'];
$IdEnq = $Post['id_enquete'];
$jSon = array();

if (!empty($IdEnq)):
    require '../../_app/Config.inc.php';
    $Read = new Read;
    $Update = new Update;
    $Create = new Create;

    $Read->ExeRead('enquete', "WHERE id = :idenq", "idenq={$IdEnq}");
    $SelEnq = $Read->getResult()[0];

    if ($Post['resp'] === $SelEnq['resp1']):
        $Dados = ['voto1' => $SelEnq['voto1'] + 1, 'total' => $SelEnq['total'] + 1];
    endif;

    if ($Post['resp'] === $SelEnq['resp2']):
        $Dados = ['voto2' => $SelEnq['voto2'] + 1, 'total' => $SelEnq['total'] + 1];
    endif;

    if ($Post['resp'] === $SelEnq['resp3']):
        $Dados = ['voto3' => $SelEnq['voto3'] + 1, 'total' => $SelEnq['total'] + 1];
    endif;

    if ($Post['resp'] === $SelEnq['resp4']):
        $Dados = ['voto4' => $SelEnq['voto4'] + 1, 'total' => $SelEnq['total'] + 1];
    endif;

    $Update->ExeUpdate('enquete', $Dados, "WHERE id = :idenq", "idenq={$IdEnq}");

    if ($Update->getResult()):
        $DadosUser = ['id_enquete' => $IdEnq, 'ip' => $IpUser, 'data' => $Now];
        $Create->ExeCreate('enquete_usuario', $DadosUser);

        if ($Create->getResult()):
            $jSon['success'] = "Registrado com sucesso!";
        else:
            $jSon['error'] = "Não foi possivel votar.";
        endif;
    else:
        $jSon['error'] = "Ocorreu um erro.";
    endif;
endif;

echo json_encode($jSon);




