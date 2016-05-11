<?php

/**
 * AdminEvento.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os eventos no Admin do sistema!
 * 
 * @copyright (c) 2014, Gean Marques - CREATIVE WEBSITES
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
     * <b>Enviar Galeria:</b> Envelope um $_FILES de um input multiple e envie junto a um postID para executar
     * o upload e o cadastro de galerias!
     * @param ARRAY $Files = Envie um $_FILES multiple
     * @param STRING $Tipo = Informe o Tipo
     * @param INT $TipoId = Informe o ID do tipo
     */
    public function gbSend(array $Images, $Tipo, $TipoId) {
        $this->Id = (int) $TipoId;
        $this->Tipo = (string) $Tipo;
        $this->Data = $Images;

        $ImageName = new Read;
        $ImageName->ExeRead(self::Entity, "WHERE id = :id", "id={$this->Id}");

        if (!$ImageName->getResult()):
            $this->Error = ["Erro ao enviar fotos do evento. O indice {$this->Id} não foi encontrado no banco de dados!", WS_ERROR];
            $this->getResult = false;
        else:
            $ImageName = $ImageName->getResult()[0]['evento'];

            $gbFiles = array();
            $gbCount = count($this->Data['tmp_name']);
            $gbKeys = array_keys($this->Data);

            for ($gb = 0; $gb < $gbCount; $gb++):
                foreach ($gbKeys as $keys):
                    $gbFiles[$gb][$keys] = $this->Data[$keys][$gb];
                endforeach;
            endfor;

            $gbSend = new Upload;
            $i = 0;
            $u = 0;

            foreach ($gbFiles as $gbUpload):
                $i++;
                $ImgName = "tipo-{$this->Tipo}-id-{$this->Id}-" . (substr(md5(time() + $i), 0, 5));
                $gbSend->Image($gbUpload, $ImgName, 640, "banco_fotos");

                if ($gbSend->getResult()):
                    $gbImage = $gbSend->getResult();
                    $gbCreate = ['id_tipo' => $this->Id, 'tipo' => $this->Tipo, 'foto' => $gbImage, 'data' => date('Y-m-d H:i:s')];
                    $insertGb = new Create;
                    $insertGb->ExeCreate('banco_fotos', $gbCreate);
                    $u++;
                endif;
            endforeach;

            if ($u > 1):
                $this->Error = ["Galeria Atualizada: Foram enviadas {$u} imagens para esta galeria!", WS_ACCEPT];
                $this->Result = true;
            endif;
        endif;
    }

    /**
     * <b>Deletar Imagem da galeria:</b> Informe apenas o id da imagem na galeria para que esse método leia e remova
     * a imagem da pasta e delete o registro do banco!
     * @param INT $GbImageId = Id da imagem da galleria
     */
    public function gbRemove($GbImageId) {
        $this->Id = (int) $GbImageId;
        $readGb = new Read;
        $readGb->ExeRead("banco_fotos", "WHERE id = :gb", "gb={$this->Id}");
        if ($readGb->getResult()):
            $Imagem = '../uploads/' . $readGb->getResult()[0]['foto'];
            if (file_exists($Imagem) && !is_dir($Imagem)):
                unlink($Imagem);
            endif;

            $Deleta = new Delete;
            $Deleta->ExeDelete("banco_fotos", "WHERE id = :id", "id={$this->Id}");
            if ($Deleta->getResult()):
                $this->Error = ["A imagem foi removida com sucesso da galeria!", WS_ACCEPT];
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

    

}
