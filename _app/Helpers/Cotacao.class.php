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
        if (!file_get_contents(self::ApiUrl)):
            $this->Error = ["Não foi possivel estabelecer conexão com a API.", WS_ALERT];
            $this->Result = false;
        else:
            $this->Data = file_get_contents(self::ApiUrl);
            $this->Data = json_decode($this->Data, TRUE);
            $this->Result = true;
        endif;
    }

    //Return Array Dolar
    public function Dolar() {
        $cotacao = str_replace('.', ',', $this->Data->dolar->cotacao);
        return array(
            "tipo" => 'dolar',
            "cotacao" => $cotacao,
            "variacao" => self::$content->dolar->variacao,
            "status" => self::getVariation(self::$content->dolar->variacao),
            "atualizado" => self::$content->atualizacao
        );
    }

    //Return Array Euro
    public static function Euro() {
        self::init();
        $cotacao = str_replace('.', ',', self::$content->euro->cotacao);
        return array(
            "tipo" => 'euro',
            "cotacao" => $cotacao,
            "variacao" => self::$content->euro->variacao,
            "status" => self::getVariation(self::$content->euro->variacao),
            "atualizado" => self::$content->atualizacao
        );
    }

    //Return Array Bovespa
    public static function Bovespa() {
        self::init();
        $cotacao = str_replace('.', ',', self::$content->bovespa->cotacao);
        return array(
            "tipo" => 'bovespa',
            "cotacao" => $cotacao,
            "variacao" => self::$content->bovespa->variacao,
            "status" => self::getVariation(self::$content->bovespa->variacao),
            "atualizado" => self::$content->atualizacao
        );
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
    public static function getVariation($variation) {
        if (strpos($variation, "+")):
            return "up";
        else:
            return "down";
        endif;
    }

}
