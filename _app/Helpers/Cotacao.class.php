<?php

/**
 * Contacao.class [ HELPER ]
 * Classe responável por capturar a contação do dolar e euro!
 * 
 * @copyright (c) 2016, Gean M S Bertani CREATIVE WEBSITES
 */
class Cotacao {

    private $Data;
    private $Tipo;
    private $Error;
    private $Result;

    //Url da API
    const ApiUrl = 'http://developers.agenciaideias.com.br/cotacoes/json';
    //Tabela 
    const Entity = 'cotacao';

    /**
     * <b>Inciar Dados:</b> Iniciar GET dos dados!
     */
    function __construct() {
        $this->Data = file_get_contents(self::ApiUrl);
        if (!$this->Data):
            $this->Error = ["Não foi possivel estabelecer conexão com a API.", WS_ALERT];
            $this->Result = false;
        else:
            $this->Data = json_decode($this->Data, TRUE);
            $this->Result = true;
        endif;
    }

    //Get Dados DOLAR
    public function getDolar() {
        $this->setDolar();
        $cotacao = 'Dólar R$ ' . $this->Data['cotacao'] . ' <i class="' . $this->Data['status'] . ' fa fa-long-arrow-' . $this->Data['status'] . '"></i>';
        return $cotacao;
    }

    //Get Dados EURO
    public function getEuro() {
        $this->setEuro();
        $cotacao = 'Euro R$ ' . $this->Data['cotacao'] . ' <i class="' . $this->Data['status'] . ' fa fa-long-arrow-' . $this->Data['status'] . '"></i>';
        return $cotacao;
    }

    //Get Dados Bovespa
    public function getBovespa() {
        $this->setBovespa();
        $cotacao = 'Bovespa R$ ' . $this->Data['cotacao'] . ' <i class="' . $this->Data['status'] . ' fa fa-long-arrow-' . $this->Data['status'] . '"></i>';
        return $cotacao;
    }

    /**
     * <b>Verificar Dados:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = True or False
     */
    function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com um erro e um tipo.
     * @return ARRAY $Error = Array associatico com o erro
     */
    function getError() {
        return $this->Error;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Obtem a variação down ou up.
    private function getVariacao($variation) {
        if (strpos($variation, "+")):
            return "up";
        else:
            return "down";
        endif;
    }

    //Converte contação para real
    private function setCotacao($cotacao) {
        $convMoeda = (str_replace('.', ',', $cotacao));
        return $convMoeda;
    }

    //Converte a Data de Atualização para dd/mm/aaaa.
    private function setAtualizado() {
        $this->Data['atualizacao'] = explode(' ', $this->Data['atualizacao']);
        $this->Data['atualizacao'] = date('d/m/Y', strtotime(Check::Data($this->Data['atualizacao'][0])));
    }

    //Set Dados DOLAR.
    private function setDolar() {
        $this->Data['dolar']['cotacao'] = $this->setCotacao($this->Data['dolar']['cotacao']);
        $this->Tipo = 'dolar';
        $this->setAtualizado();
        $this->Data = [
            "tipo" => $this->Tipo,
            "cotacao" => $this->Data['dolar']['cotacao'],
            "variacao" => $this->Data['dolar']['variacao'],
            "status" => $this->getVariacao($this->Data['dolar']['variacao']),
            "atualizado" => $this->Data['atualizacao']
        ];
    }

    //Set Dados EURO.
    private function setEuro() {
        $this->Data['euro']['cotacao'] = $this->setCotacao($this->Data['euro']['cotacao']);
        $this->Tipo = 'euro';
        $this->setAtualizado();
        $this->Data = [
            "tipo" => $this->Tipo,
            "cotacao" => $this->Data['euro']['cotacao'],
            "variacao" => $this->Data['euro']['variacao'],
            "status" => $this->getVariacao($this->Data['euro']['variacao']),
            "atualizado" => $this->Data['atualizacao']
        ];
    }

    //Set Dados BOVESPA.
    private function setBovespa() {
        $this->Data['bovespa']['cotacao'] = $this->setCotacao($this->Data['bovespa']['cotacao']);
        $this->Tipo = 'bovespa';
        $this->setAtualizado();
        $this->Data = [
            "tipo" => $this->Tipo,
            "cotacao" => $this->Data['bovespa']['cotacao'],
            "variacao" => $this->Data['bovespa']['variacao'],
            "status" => $this->getVariacao($this->Data['bovespa']['variacao']),
            "atualizado" => $this->Data['atualizacao']
        ];
    }

}
