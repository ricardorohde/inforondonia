<?php

/**
 * Contacao.class [ HELPER ]
 * Classe responável por capturar a contação do dolar e euro!
 * 
 * @copyright (c) 2016, Gean M S Bertani CREATIVE WEBSITES
 */
class Cotacao {

    private $Data;
    private $Error;
    private $Result;

    //Url da API
    const ApiUrl = 'http://developers.agenciaideias.com.br/cotacoes/json';

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

    //Return Array Dolar
    public function Dolar() {
        $this->Data['dolar']['cotacao'] = str_replace('.',',',$this->Data['dolar']['cotacao']);
        $this->Data['atualizacao'] = explode(' ', $this->Data['atualizacao']);
        $this->Data['atualizacao'] = $this->Data['atualizacao'][0];
        $this->Data = [
            "tipo" => 'dolar',
            "cotacao" => $this->Data['dolar']['cotacao'],
            "variacao" => $this->Data['dolar']['variacao'],
            "status" => $this->getVariation($this->Data['dolar']['variacao']),
            "atualizado" => $this->Data['atualizacao']
        ];
        return $this->Data;
    }

    //Return Array Euro
    public function Euro() {
        $this->Data['euro']['cotacao'] = str_replace('.',',',$this->Data['euro']['cotacao']);
        $this->Data = [
            "tipo" => 'euro',
            "cotacao" => $this->Data['euro']['cotacao'],
            "variacao" => $this->Data['euro']['variacao'],
            "status" => $this->getVariation($this->Data['euro']['variacao']),
            "atualizado" => $this->Data['atualizacao']
        ];
        return $this->Data;
    }

    //Return Array Bovespa
    public function Bovespa() {
         $this->Data['bovespa']['cotacao'] = str_replace('.',',',$this->Data['bovespa']['cotacao']);
        $this->Data = [
            "tipo" => 'bovespa',
            "cotacao" => $this->Data['bovespa']['cotacao'],
            "variacao" => $this->Data['bovespa']['variacao'],
            "status" => $this->getVariation($this->Data['bovespa']['variacao']),
            "atualizado" => $this->Data['atualizacao']
        ];
        return $this->Data;
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

    //Return Return getVariation
    private function getVariation($variation) {
        if (strpos($variation, "+")):
            return "up";
        else:
            return "down";
        endif;
    }
    
    private function setMoeda($moeda){
        $convMoeda = (str_replace('.', ',', $moeda));
        $rMoeda = round($convMoeda,2);
        return $rMoeda;
    }

}
