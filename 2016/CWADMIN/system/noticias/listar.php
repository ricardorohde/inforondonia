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
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-2 col-md-2">
                            <a href="#" class="btn btn-success btn-new"><span class="fa fa-file"></span></a>
                        </div>
                        <div class="hidden-xs col-md-6"><input type="text" class="form-control"></div>
                        <div class="col-xs-offset-5 col-xs-5 col-md-offset-2 col-md-2 ">
                            <div class="elem-right">
                                <a href="#" class="btn btn-default"><span class="fa fa-list-ul"></span></a>
                                <a href="#" class="btn btn-default"><span class="fa fa-th"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="chart-responsive">
                                        <img class=" img-responsive " src="dist/img/indsp.gif" alt="User profile picture">
                                    </div>
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
                            <div class="col-md-12 col-md-pull-1">
                                <ul class="btn-group">
                                    <a href="#" class="btn btn-success btn-sm"><b>Fotos</b></a>
                                    <a href="#" class="btn btn-default btn-sm"><b>Arquivos</b></a>
                                    <a href="#" class="btn btn-primary btn-sm"><b>Editar</b></a>
                                    <a href="#" class="btn btn-danger btn-sm"><b>Excluir</b></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="chart-responsive">
                                        <img class=" img-responsive " src="dist/img/indsp.gif" alt="User profile picture">
                                    </div>
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
                            <div class="col-md-12 col-md-pull-1">
                                <ul class="btn-group">
                                    <a href="#" class="btn btn-success btn-sm"><b>Fotos</b></a>
                                    <a href="#" class="btn btn-default btn-sm"><b>Arquivos</b></a>
                                    <a href="#" class="btn btn-primary btn-sm"><b>Editar</b></a>
                                    <a href="#" class="btn btn-danger btn-sm"><b>Excluir</b></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="chart-responsive">
                                        <img class=" img-responsive " src="dist/img/indsp.gif" alt="User profile picture">
                                    </div>
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
                            <div class="col-md-12 col-md-pull-1">
                                <ul class="btn-group">
                                    <a href="#" class="btn btn-success btn-sm"><b>Fotos</b></a>
                                    <a href="#" class="btn btn-default btn-sm"><b>Arquivos</b></a>
                                    <a href="#" class="btn btn-primary btn-sm"><b>Editar</b></a>
                                    <a href="#" class="btn btn-danger btn-sm"><b>Excluir</b></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="chart-responsive">
                                        <img class=" img-responsive " src="dist/img/indsp.gif" alt="User profile picture">
                                    </div>
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
                            <div class="col-md-12 col-md-pull-1">
                                <ul class="btn-group">
                                    <a href="#" class="btn btn-success btn-sm"><b>Fotos</b></a>
                                    <a href="#" class="btn btn-default btn-sm"><b>Arquivos</b></a>
                                    <a href="#" class="btn btn-primary btn-sm"><b>Editar</b></a>
                                    <a href="#" class="btn btn-danger btn-sm"><b>Excluir</b></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="box box-default">
                <div class="box-body">
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
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>