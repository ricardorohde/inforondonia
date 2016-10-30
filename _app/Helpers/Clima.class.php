<?php

/**
 * Clima.class [ HELPER ]
 * Classe responável por capturar dados do clima.
 *
 * @copyright (c) 2016 CW DIGITAL
 * @author Gean M S Bertani <gean@cwdigital.com.br>
 */
class Clima {

    private $Data;
    private $Cidade;
    private $Uf;
    private $Atualizado;
    private $Error;
    private $Result;

    //Url da API
    const ApiUrl = 'http://servicos.cptec.inpe.br/XML/cidade/7dias/4439/previsao.xml';
    //Tabela
    const Entity = 'clima_dados';

    /**
     * <b>Iniciar Classe:</b> Captura as informações vinda da API.
     * Armazena no Array $Data.
     * @param STRING $Tipo = Tipo de cotação.
     */
    function __construct() {
        $this->Data = (array) simplexml_load_file(self::ApiUrl);
        if ($this->Data == false):
            $this->Error = ["Não foi possivel estabelecer conexão com a API.", WS_ALERT];
            $this->Result = false;
        else:
            $this->Data = $this->Data;
            $this->Cidade = $this->Data['nome'];
            $this->Uf = $this->Data['uf'];
            $this->Atualizado = $this->Data['atualizacao'];
            $this->Result = true;
        endif;
    }

    /**
     * <b>Obtem Clima:</b> Lê os dados do clima e executa Create.
     */
    public function getClima() {
        if ($this->Result):

            $readSigla = new Read;
            foreach ($this->Data['previsao'] as $previsao):
                $readSigla->ExeRead("clima_sigla", "WHERE sigla = :sigla", "sigla={$previsao->tempo[0]}");
                $Sigla = $readSigla->getResult()[0];

                $this->Data = [
                    'cidade' => $this->Cidade,
                    'uf' => $this->Uf,
                    'data_atualizado' => $this->Atualizado,
                    'data_previsao' => (string) $previsao->dia[0],
                    'id_sigla' => (int) $Sigla['id'],
                    'descricao' => (string) $Sigla['descricao'],
                    'temp_max' => (int) $previsao->maxima[0],
                    'temp_min' => (int) $previsao->minima[0],
                    'iuv' => (int) $previsao->iuv[0]
                ];
                $this->Create();
            endforeach;
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

    //Cadastrar Cotacao
    private function Create() {
        $Create = new Create;
        $Create->ExeCreate(self::Entity, $this->Data);
        if ($Create->getResult()):
            $this->Error = ["Previsão de <b>{$this->Data['data_previsao']}</b> foi inserida com sucesso no sistema!", WS_ACCEPT];
            $this->Result = $Create->getResult();
        endif;
    }

}
