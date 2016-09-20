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

                    <div class="row">
                        <div class="col-md-12">
                            <br>
                              <hr>
                            <div class="view-list"> 
                                <ul class="products-list product-list-in-box">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-50x50.gif" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Noticia 1
                                                <span class="label label-warning pull-right">Fulano do Cliclado</span></a>
                                            <span class="product-description">
                                                Homem invade.
                                            </span>
                                        </div>
                                    </li>                                 
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-50x50.gif" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Bicycle
                                                <span class="label label-info pull-right">$700</span></a>
                                            <span class="product-description">
                                                26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                            </div>

                            <div class="view-grid">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">Total</div>
                        <div class="col-md-offset-6 col-md-4">Paginação</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>