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
    public function getCotacao($Tipo) {
        $this->Tipo = (string) $Tipo;
        if ($this->Tipo === 'dolar'):
            $this->setCotacao();
            $cotacao = 'Dólar R$ ' . $this->Data['cotacao'] . ' <i class="' . $this->Data['status'] . ' fa fa-long-arrow-' . $this->Data['status'] . '"></i>';
        elseif ($this->Tipo === 'euro'):
            $this->setCotacao();
            $cotacao = 'Euro R$ ' . $this->Data['cotacao'] . ' <i class="' . $this->Data['status'] . ' fa fa-long-arrow-' . $this->Data['status'] . '"></i>';
        endif;
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
        $var = floatval($variation);
        if ($var < 0):
            return 'down';
        else:
            return 'up';
        endif;
    }

    //Converte a Data de Atualização para dd/mm/aaaa.
    private function setAtualizado() {
        $this->Data['atualizacao'] = explode(' ', $this->Data['atualizacao']);
        $this->Data['atualizacao'] = date('d/m/Y', strtotime(Check::Data($this->Data['atualizacao'][0])));
    }

    //Set Dados Cotacao.
    private function setCotacao() {
        $this->setAtualizado();
        $this->Data[$this->Tipo]['cotacao'] = str_replace('.', ',', $this->Data[$this->Tipo]['cotacao']);
        $this->Data = [
            "tipo" => $this->Tipo,
            "cotacao" => $this->Data[$this->Tipo]['cotacao'],
            "variacao" => $this->Data[$this->Tipo]['variacao'],
            "status" => $this->getVariacao($this->Data[$this->Tipo]['variacao']),
            "atualizado" => $this->Data['atualizacao']
        ];
    }

}
