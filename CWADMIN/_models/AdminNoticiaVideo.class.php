<?php

/**
 * AdminNoticiaVideo.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os videos no Admin do sistema!
 *
 * @copyright (c) 2016, Gean Marques - CREATIVE WEBSITES
 */
class AdminNoticiaVideo {

    private $Data;
    private $Id;
    private $IdNews;
    private $Error;
    private $Result;

    //Tabela do banco de dados
    const Entity = 'noticias_videos';

    /**
     * <b>Cadastrar Video:</b> Envelopa os dados de um video em um array atribuitivo e execute esse método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate($IdNews, $Data) {
        $this->IdNews = (int) $IdNews;
        $this->Data['id_noticia'] = $IdNews;
        $this->Data['video'] = $Data;
        $this->Data['capa'] = null;
        if (!empty($this->Data['video'])):
            $this->Create();
        endif;
    }

    /**
     * <b>Atualizar Video:</b> Envelopa os dados em uma array atribuitivo e informe o id de um
     * usuário para atualiza-lo no sistema!
     * @param INT $VideoId = Id do Video
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeUpdate($VideoId, array $Data) {
        $this->Id = (int) $VideoId;
        $this->Data = $Data;
        if ($this->getResult()):
            $this->Update();
        endif;
    }

    /**
     * <b>Remover Video:</b> Informe o ID do usuário que deseja remover. Este método não permite deletar
     * o próprio perfil ou ainda remover todos os ADMIN'S do sistema!
     * @param INT $VideoId = Id do video
     */
    public function ExeDelete($VideoId) {
        $this->Id = (int) $VideoId;

        $readVideo = new Read;
        $readVideo->ExeRead(self::Entity, "WHERE id = :id", "id={$this->Id}");

        if (!$readVideo->getResult()):
            $this->Error = ['Oppsss, você tentou remover um video que não existe no sistema!', WS_ERROR];
            $this->Result = false;
        else:
            $this->Delete();
        endif;
    }

    /**
     * <b>Remove Video ao Deletar Noticia:</b> Informe o ID da Noticia deseja remover. Este método irá deletar todos os videos
     * vinculados a noticia quando a mesma for deletada.
     * @param INT $IdNews = Id da noticia
     */
    public function ExeDeleteVideos($IdNews) {
        $this->IdNews = (int) $IdNews;

        $readVideo = new Read;
        $readVideo->ExeRead(self::Entity, "WHERE id_noticia = :id", "id={$this->IdNews}");

        if (!$readVideo->getResult()):
            $this->Error = ['Oppsss, você tentou remover um video que não existe no sistema!', WS_ERROR];
            $this->Result = false;
        else:
            $this->DeleteVideos();
        endif;
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não.
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

    //Seta os Dados
    private function setData() {
        $this->trataVideo();
    }

    //Pega dados do video no youtube
    private function trataVideo() {
        $videoId = array();
        preg_match('/(v=)([^&]+)/', $this->Data['video'], $videoId);
        $this->Data['video'] = $videoId[2];
        $this->Data['capa'] = "http://i1.ytimg.com/vi/{$this->Data['video']}/hqdefault.jpg";
    }

    //Cadastra Video
    private function Create() {
        $Create = new Create;
        $this->setData();

        $Create->ExeCreate(self::Entity, $this->Data);
        if ($Create->getResult()):
            $this->Error = ["O video foi cadastrado com sucesso no sistema!", WS_ACCEPT];
            $this->Result = $Create->getResult();
        endif;
    }

    //Atualiza Video
    private function Update() {
        $Update = new Update;
        $this->setData();
        $this->Data['qm_alterou'] = $_SESSION['userlogin']['id'];

        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id = :id", "id={$this->Id}");
        if ($Update->getResult()):
            $this->Error = ["O video foi atualizado com sucesso no sistema!", WS_ACCEPT];
            $this->Result = $Update->getResult();
        endif;
    }

    //Excluir Video
    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Entity, "WHERE id = :id", "id={$this->Id}");
        if ($Delete->getResult()):
            $this->Error = ["Video removido com sucesso do sistema!", WS_ACCEPT];
            $this->Result = true;
        endif;
    }

    //Excluir Video
    private function DeleteVideos() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Entity, "WHERE id_noticia = :id", "id={$this->IdNews}");
        if ($Delete->getResult()):
            $this->Error = ["Videos removidos com sucesso do sistema!", WS_ACCEPT];
            $this->Result = true;
        endif;
    }

}
