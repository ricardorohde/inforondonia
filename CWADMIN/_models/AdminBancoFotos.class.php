<?php

/**
 * AdminBanner.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os banners no Admin do sistema!
 * 
 * @copyright (c) 2016, Gean Marques - CREATIVE WEBSITES
 */
class AdminBancoFotos {

    private $Data;
    private $Id;
    private $Tipo;
    private $Error;
    private $Result;

    //Tabela do banco dados
    const Entity = 'banco_fotos';

    /**
     * <b>Cadastrar Banners:</b> Envelopa os dados em um array atribuitivo e execute este método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo 
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->Tipo = $this->Data['tipo'];
        $this->checkData();

        if ($this->Data['foto']):
            $ImgName = "tipo-{$this->Tipo}-id-{$this->Id}-" . (substr(md5(time()), 0, 5));
            $upload = new Upload;
            $upload->Image($this->Data['foto'], $ImgName, 640, 'banco_fotos');
        endif;

        if (isset($upload) && $upload->getResult()):
            $this->Data['foto'] = $upload->getResult();
            $this->Create();
        else:
            $this->Error = ['Oppsss, Não foi possivel enviar!', WS_ERROR];
            $this->Result = false;
        endif;
    }

    /**
     * <b>Remover Banner:</b> Informe o ID do registro que deseja remover.
     * @param INT $BannerId = Id da revista
     */
    public function ExeDelete($BannerId) {
        $this->Id = (int) $BannerId;

        $readVideo = new Read;
        $readVideo->ExeRead(self::Entity, "WHERE id = :id", "id={$this->Id}");

        if (!$readVideo->getResult()):
            $this->Error = ['Oppsss, você tentou remover um banner que não existe no sistema!', WS_ERROR];
            $this->Result = false;
        else:
            $this->fotoDelete($this->Id);
            $this->Delete();
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

    //Checa os dados
    private function checkData() {
        if (in_array('', $this->Data)):
            $this->Error = ["Existem campos em branco. Favor preencha todos os campos!", WS_ALERT];
            $this->Result = false;
        else:
            $this->Result = true;
        endif;
    }

    //Excluir a Foto
    private function fotoDelete($Id) {
        $this->Id = (int) $Id;

        $readFoto = new Read;
        $readFoto->ExeRead(self::Entity, "WHERE id = :id", "id={$this->Id}");
        $foto = "../uploads/{$readFoto->getResult()[0]['banner']}";
        if (file_exists($foto) && !is_dir($foto)):
            unlink($foto);
        endif;
    }

    //Cadastrar Banner
    private function Create() {
        $Create = new Create;
        $Create->ExeCreate(self::Entity, $this->Data);
        if ($Create->getResult()):
            $this->Error = ["Foto enviada com sucesso!", WS_ACCEPT];
            $this->Result = $Create->getResult();
        endif;
    }

    //Excluir Banner
    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Entity, "WHERE id = :id", "id={$this->Id}");
        if ($Delete->getResult()):
            $this->Error = ["Banner removido com sucesso do sistema!", WS_ACCEPT];
            $this->Result = true;
        endif;
    }

}
