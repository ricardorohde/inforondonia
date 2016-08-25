<?php

$Now = date('Y-m-d');
$Read = new Read;
$Read->ExeRead("cotacao", "WHERE atualizado >= :date LIMIT :limit", "date={$Now}&limit=1");

if (!$Read->getResult()):
    $Dolar = new Cotacao('USD');
    if ($Dolar->getResult()):
        $Euro = clone($Dolar);
        $Euro->setTipo('EUR');

        $Dolar->getCotacao();
        $Euro->getCotacao();
    endif;
endif;