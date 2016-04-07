<?php

/**
 * Contacao.class [ HELPER ]
 * Classe responável por capturar a contação do dolar e euro!
 * 
 * @copyright (c) 2014, Gean M S Bertani CREATIVE WEBSITES
 */
class Cotacao {

    private static $apiUrl = "http://developers.agenciaideias.com.br/cotacoes/json";
    private static $content;

    //Iniciar GET dos dados
    public static function init() {
        self::$content = file_get_contents(self::$apiUrl);
        self::$content = json_decode(self::$content);
    }

    //Return Array Dolar
    public static function Dolar() {
        self::init();
        $cotacao = str_replace('.', ',', self::$content->dolar->cotacao);
        return array(
            "cotacao" => $cotacao,
            "variacao" => self::$content->dolar->variacao,
            "status" => self::getVariation(self::$content->dolar->variacao),
            "atualizado"=>self::$content->atualizacao
        );
    }

    //Return Array Bovespa
    public static function Bovespa() {
        self::init();
        $cotacao = str_replace('.', ',', self::$content->bovespa->cotacao);
        return array(
            "cotacao" => $cotacao,
            "variacao" => self::$content->bovespa->variacao,
            "status" => self::getVariation(self::$content->bovespa->variacao)
        );
    }

    //Return Array Euro
    public static function Euro() {
        self::init();
        $cotacao = str_replace('.', ',', self::$content->euro->cotacao);
        return array(
            "cotacao" => $cotacao,
            "variacao" => self::$content->euro->variacao,
            "status" => self::getVariation(self::$content->euro->variacao)
        );
    }

    //Return Return getVariation
    public static function getVariation($variation) {
        if (strpos($variation, "+")):
            return "up";
        else:
            return "down";
        endif;
    }
}
