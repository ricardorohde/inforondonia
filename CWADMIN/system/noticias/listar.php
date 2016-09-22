<section class="content-header">
    <h1>
        Listar Notícias
        <small>Lista os cadastros de notícias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="painel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="painel.php?exe=noticias/listar">Notícias</a></li>
        <li class="active">Listar Notícias</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php
            $acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);
            $acaoId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            require('_models/AdminNoticia.class.php');
            $readAcao = new AdminNoticia;

            $readMsg = new Read;
            $readMsg->ExeRead('noticias', "WHERE id = :id", "id={$acaoId}");
            switch ($acao):
                case 'cadastrar':
                    $msg = $readMsg->getResult()[0];
                    WSErro("A Notícia <b>{$msg['titulo']}</b> foi cadastrada com sucesso!", WS_ACCEPT);
                    break;
                case 'editar':
                    $msg = $readMsg->getResult()[0];
                    WSErro("A Notícia <b>{$msg['titulo']}</b> foi atualizada com sucesso!", WS_ACCEPT);
                    break;
                case 'excluir':
                    $readAcao->ExeDelete($acaoId);
                    WSErro($readAcao->getError()[0], $readAcao->getError()[1]);
                    break;
            endswitch;
            ?>
            <div class="box box-primary">
                <!-- == HEADER ==  -->
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-2 col-md-2">
                            <a href="#" class="btn btn-success btn-new"><span class="fa fa-file"></span>  </a>
                        </div>
                        <div class="input-group col-md-3 col-sm-9 col-xs-9">
                            <input type="email" class="form-control" placeholder="Email">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <hr>
                </div>
                <!-- == FIM HEADER ==  -->
                <!-- == BOX CONTEUDO ==  -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-4  col-xs-8 col-xs-offset-2">
                                            <img class="img-responsive" src="dist/img/indsp.gif" alt="User profile picture">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#"><b>Titulo da Noticia cadastrada...</b></a>
                                        <li><a href="#"><b></b>Livia Andrade<span class="pull-right text-green"><i class="fa fa-calendar"></i> 01/01/2016</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0  col-xs-offset-1">
                                        <ul class="btn-block">
                                            <button class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Carregar Fotos"><b class="fa fa-camera"></b></button>
                                            <button class="btn btn-warning"data-toggle="tooltip" data-placement="top" title="Carregar Arquivos"><b class="fa fa-cloud-upload"></b></button>
                                            <button  class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar"><b class="fa fa-pencil"></b></button>
                                            <button  class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><b class="fa fa-trash-o"></b></button>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <!-- == BOX CONTEUDO ==  -->
                <!-- == PAGINAÇÃO ==  -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- == FIM PAGINAÇÃO ==  -->
            </div>
        </div>
    </div>
</section>