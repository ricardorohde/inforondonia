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
    private $Date;
    private $Error;
    private $Result;

    //Url da API
    const ApiUrl = 'http://api.promasters.net.br/cotacao/v1/valores?moedas=USD,EUR&alt=json';
    //Tabela
    const Entity = 'cotacao';

    /**
     * <b>Iniciar Classe:</b> Captura as informações vinda da API.
     * Armazena no Array $Data.
     * @param STRING $Tipo = Tipo de cotação.
     */
    function __construct($Tipo) {
        $this->Data = json_decode($this->getPage(self::ApiUrl), TRUE);
        $this->Tipo = $Tipo;
        if ($this->Data['status'] === FALSE):
            $this->Error = ["Não foi possivel estabelecer conexão com a API.", WS_ALERT];
            $this->Result = false;
        else:
            $this->Data = $this->Data['valores'];
            $this->Result = true;
        endif;
    }

    /**
     * <b>Seta o Tipo:</b> Altera o tipo conforme o valor informando no param.
     * @param STRING $Tipo = Tipo de cotação.
     */
    public function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

    /**
     * <b>Obtem Cotação:</b> Lê a cotação e executa Create.
     */
    public function getCotacao() {
        if ($this->Result):
            $this->Data[$this->Tipo]['valor'] = $this->toReal($this->Data[$this->Tipo]['valor']);
            $this->Data = [
                "tipo" => $this->Tipo,
                "cotacao" => $this->Data[$this->Tipo]['valor'],
                "atualizado" => date('Y-m-d', $this->Data[$this->Tipo]['ultima_consulta'])
            ];
            $this->Create();
        endif;
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

    //Converte cotacao para real
    private function toReal($valor) {
        $convMoeda = number_format($valor, 2, '.', ',');
        return $convMoeda;
    }

    //GetPage
    private function getPage($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        $return = curl_exec($curl);
        curl_close($curl);
        return $return;
    }

    //Cadastrar Cotacao
    private function Create() {
        $Read = new Read;
        $Read->ExeRead(self::Entity, "WHERE tipo =  :tipo", "tipo={$this->Tipo}");
        if (!$Read->getResult()):
            $Create = new Create;
            $Create->ExeCreate(self::Entity, $this->Data);
            if ($Create->getResult()):
                $this->Error = ["Cotação de <b>{$this->Data['tipo']}</b> foi cadastrada com sucesso no sistema!", WS_ACCEPT];
                $this->Result = $Create->getResult();
            endif;
        else:
            $this->Update();
        endif;
    }

    //Atualiza Cotacao
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE tipo = :tipo", "tipo={$this->Tipo}");
        if ($Update->getResult()):
            $this->Error = ["Cotação de <b>{$this->Data['tipo']}</b> foi atualizada com sucesso!", WS_ACCEPT];
            $this->Result = true;
        endif;
    }

}
