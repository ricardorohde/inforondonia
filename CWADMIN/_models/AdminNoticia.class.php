<?php

/**
 * AdminNoticia.class [ MODEL ADMIN ]
 * Respnsável por gerenciar as noticias no Admin do sistema!
 *
 * @copyright (c) 2014, Gean Marques - CREATIVE WEBSITES
 */
class AdminNoticia {

    private $Data;
    private $Id;
    private $Tipo;
    private $Error;
    private $Result;

    //Tabela do banco dados
    const Entity = 'noticias';

    /**
     * <b>Cadastrar Noticias:</b> Envelopa os dados em um array atribuitivo e execute este método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->checkData();
        $this->setData();
        if ($this->Data['foto']):
            $upload = new Upload;
            $upload->Image($this->Data['foto'], $this->Data['titulo'], 1024, 'noticias');
        endif;
        if (isset($upload) && $upload->getResult()):
            $this->Data['foto'] = $upload->getResult();
            $this->Create();
        else:
            $this->Data['foto'] = NULL;
            $this->Create();
        endif;
    }

    /**
     * <b>Atualizar Noticias:</b> Envelope os dados em uma array atribuitivo e informe o id de uma
     * noticia para atualiza-la no sistema!
     * @param INT $NoticiaId = Id da noticia
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeUpdate($NoticiaId, array $Data) {
        $this->Id = (int) $NoticiaId;
        $this->Data = $Data;
        $this->checkData();
        $this->setData();
        if (is_array($this->Data['foto'])):
            $this->fotoDelete($this->Id);
            $upload = new Upload;
            $upload->Image($this->Data['foto'], $this->Data['titulo'], 1024, 'noticias');
        endif;
        if (isset($upload) && $upload->getResult()):
            $this->Data['foto'] = $upload->getResult();
            $this->Update();
        else:
            unset($this->Data['foto']);
            $this->Update();
        endif;
    }

    /**
     * <b>Remover Noticia:</b> Informe o ID da noticia que deseja remover.
     * @param INT $NoticiaId = Id da noticia
     */
    public function ExeDelete($NoticiaId) {
        $this->Id = (int) $NoticiaId;

        $readVideo = new Read;
        $readVideo->ExeRead(self::Entity, "WHERE id = :id", "id={$this->Id}");

        if (!$readVideo->getResult()):
            $this->Error = ['Oppsss, você tentou remover uma notícia que não existe no sistema!', WS_ERROR];
            $this->Result = false;
        else:
            $this->fotoDelete($this->Id);
            $this->Delete();
        endif;
    }

    /**
     * <b>Enviar Videos:</b> Envelope os videos múltiplos em um Array
     * @param ARRAY $Videos = Envie um Array com os Videos
     * @param INT $NewsId = Informe o ID da noticia
     */
    public function videoSend(array $Videos, $NewsId) {
        $this->Id = (int) $NewsId;
        $this->Data['url'] = $Videos;

        $ChkNews = new Read;
        $ChkNews->ExeRead(self::Entity, "WHERE id = :id", "id={$this->Id}");

        if (!$ChkNews->getResult()):
            $this->Error = ["Erro ao enviar os videos da notícia. O indice {$this->Id} não foi encontrado no banco de dados!", WS_ERROR];
            $this->getResult = false;
        else:
            $Read = new Read;
            $Create = new Create;
            $Update = new Update;

            foreach ($this->Data['url'] as $key => $video):
                if (!empty($video)):
                    $this->trataVideo($video);
                    $this->Data = ['id_noticia' => $this->Id, 'id_field' => $key, 'video' => $this->Data['video'], 'capa' => $this->Data['capa']];

                    $Read->ExeRead('noticias_videos', "WHERE id_noticia = :idnews AND id_field = :idfield", "idnews={$this->Id}&idfield={$key}");
                    if ($Read->getResult()):
                        $Update->ExeUpdate('noticias_videos', $this->Data, "WHERE id = :id", "id={$Read->getResult()[0]['id']}");
                        if ($Update->getResult()):
                            $this->Error = ["Video Atualizado com sucesso!", WS_ACCEPT];
                            $this->Result = true;
                        endif;
                    else:
                        $Create->ExeCreate('noticias_videos', $this->Data);
                        if ($Create->getResult()):
                            $this->Error = ["Video Cadastrado com sucesso!", WS_ACCEPT];
                            $this->Result = $Create->getResult();
                        endif;
                    endif;
                endif;
            endforeach;

        endif;
    }

    /**
     * <b>Deletar Video:</b> Informe apenas o id do video para que esse método leia
     * delete o registro do banco!
     * @param INT $VideoId = Id do vídeo.
     */
    public function videoRemove($VideoId) {
        $this->Id = (int) $VideoId;
        $readVideo = new Read;
        $readVideo->ExeRead("noticias_videos", "WHERE id = :id", "id={$this->Id}");
        if ($readVideo->getResult()):
            $Deleta = new Delete;
            $Deleta->ExeDelete("noticias_videos", "WHERE id = :id", "id={$this->Id}");
            if ($Deleta->getResult()):
                $this->Error = ["Video removido com sucesso.", WS_ACCEPT];
                $this->Result = true;
            endif;

        endif;
    }

    /**
     * <b>Deletar Videos da Noticia:</b> Informe apenas o id da noticia para que esse método leia
     * delete o registro do banco!
     * @param INT $NewsId = Id da notícia
     */
    public function videoRemoveAll($NewsId) {
        $this->Id = (int) $NewsId;
        $readVideo = new Read;
        $readVideo->ExeRead("noticias_videos", "WHERE id_noticia = :idnews", "idnews={$this->Id}");
        if ($readVideo->getResult()):
            $Deleta = new Delete;
            $Deleta->ExeDelete("noticias_videos", "WHERE id_noticia = :idnews", "idnews={$this->Id}");
            if ($Deleta->getResult()):
                $this->Error = ["Todos os videos removidos da referida notícia.", WS_ACCEPT];
                $this->Result = true;
            endif;

        endif;
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = True or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com um erro e um tipo.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Checa os dados
    private function checkData() {
        if (in_array('', $this->Data)):
            $this->Error = ["Existem campos em branco. Favor preencha todos os campos!", WS_ALERT];
            $this->Result = false;
        else:
            $this->Result = true;
        endif;
    }

    //Seta os Dados
    private function setData() {
        $capa = $this->Data['foto'];
        $notic = $this->Data['noticia'];
        unset($this->Data['foto'], $this->Data['noticia']);
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
        $this->Data['foto'] = $capa;
        $this->Data['noticia'] = $notic;
        $this->Data['data'] = Check::Data($this->Data['data']);
        $this->Data['data_fslide'] = Check::Data(Check::DataDias($this->Data['data'], $this->Data['data_fslide'], 'data'));
    }

    //Excluir a Foto
    private function fotoDelete($Id) {
        $this->Id = (int) $Id;

        $readFoto = new Read;
        $readFoto->ExeRead(self::Entity, "WHERE id = :id", "id={$this->Id}");
        $foto = "../uploads/{$readFoto->getResult()[0]['foto']}";
        if (file_exists($foto) && !is_dir($foto)):
            unlink($foto);
        endif;
    }

    //Pega dados do video no youtube
    private function trataVideo($videoUrl) {
        $videoId = array();
        preg_match('/(v=)([^&]+)/', $videoUrl, $videoId);
        $this->Data['video'] = $videoId[2];
        $this->Data['capa'] = "http://i1.ytimg.com/vi/{$videoId[2]}/hqdefault.jpg";
    }

    //Cadastrar Notícia
    private function Create() {
        $Create = new Create;
        $this->Data['qm_cadastr'] = $_SESSION['userlogin']['id'];
        $this->Data['url_name'] = Check::Name($this->Data['titulo']);

        $Create->ExeCreate(self::Entity, $this->Data);
        if ($Create->getResult()):
            $this->Error = ["A noticia <b>{$this->Data['titulo']}</b> foi cadastrada com sucesso no sistema!", WS_ACCEPT];
            $this->Result = $Create->getResult();
        endif;
    }

    //Atualiza Notícia
    private function Update() {
        $Update = new Update;
        $this->Data['qm_alterou'] = $_SESSION['userlogin']['id'];

        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id = :id", "id={$this->Id}");
        if ($Update->getResult()):
            $this->Error = ["A noticia <b>{$this->Data['titulo']}</b> foi atualizada com sucesso!", WS_ACCEPT];
            $this->Result = true;
        endif;
    }

    //Excluir Notícia
    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Entity, "WHERE id = :id", "id={$this->Id}");
        if ($Delete->getResult()):
            $this->Error = ["Noticia removida com sucesso do sistema!", WS_ACCEPT];
            $this->Result = true;
        endif;
    }

}
