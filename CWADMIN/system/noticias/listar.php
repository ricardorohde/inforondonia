<?php
//Configurações
$exe = filter_input(INPUT_GET, 'exe');
$case = explode('/', $exe);
$tipo = ['N', 'Notícias'];
?>
<section class="content-header">
    <h1>
        <?= 'Listar ' . $tipo[1] ?>
        <small>Lista os Cadastros de <?= $tipo[1] ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="painel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="painel.php?exe=<?= $exe; ?>"><?= $tipo[1]; ?></a></li>
        <li class="active"><?= 'Listar ' . $tipo[1] ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php
            $acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);
            $acaoId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            require('_models/AdminNoticia.class.php');
            require('_models/AdminNoticiaVideo.class.php');
            $readClass = new AdminNoticia;
            $readVideos = new AdminNoticiaVideo;

            $readRows = new Read;
            $readRows->ExeRead('noticias', "WHERE id = :id", "id={$acaoId}");
            switch ($acao):
                case 'cadastrar':
                    $msg = $readRows->getResult()[0];
                    WSErro("A Notícia <b>{$msg['titulo']}</b> foi cadastrada com sucesso!", WS_ACCEPT);
                    break;
                case 'editar':
                    $msg = $readRows->getResult()[0];
                    WSErro("A Notícia <b>{$msg['titulo']}</b> foi atualizada com sucesso!", WS_ACCEPT);
                    break;
                case 'excluir':
                    $readVideos->ExeDeleteVideos($acaoId);
                    $readClass->ExeDelete($acaoId);
                    WSErro($readClass->getError()[0], $readClass->getError()[1]);
                    break;
            endswitch;
            ?>
            <div class="box box-primary">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-2 col-md-2">
                            <a href="painel.php?exe=<?= $case[0]; ?>/cadastrar" class="btn btn-success btn-new"><span class="fa fa-file"></span>  </a>
                        </div>
                        <div class="col-xs-10 col-md-6 col-md-offset-4">
                            <?php
                            $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
                            $searchSubmit = filter_input(INPUT_POST, 'searchSubmit', FILTER_DEFAULT);
                            if (!empty($search)):
                                $search = strip_tags(trim(urlencode($search)));
                                header("Location: painel.php?exe={$exe}&search={$search}");
                            else:
                                if (!empty($searchSubmit)):
                                    //Redireciona quando não for pesquisado nada.
                                    header("Location: painel.php?exe={$exe}");
                                endif;
                            endif;
                            $getSearch = filter_input(INPUT_GET, 'search', FILTER_DEFAULT);
                            ?>
                            <form name="FrmBusca" method="POST">
                                <div class="input-group">
                                    <input type="text" name="s" id="busca" class="form-control" placeholder="Faça a busca dos registros">
                                    <span class="input-group-btn">
                                        <button type="submit" name="searchSubmit" value="Buscar" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        $linkPage = !empty($getSearch) ? "painel.php?exe={$exe}&search={$getSearch}&page=" : "painel.php?exe={$exe}&page=";
                        $getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
                        $Pager = new Pager($linkPage);
                        $Pager->ExePager($getPage, 12);

                        if (!empty($getSearch)):
                            //Listagem de Rows
                            $WhereRows = " WHERE n.titulo != :t AND (titulo LIKE '%' :link '%') ORDER BY n.id DESC LIMIT :limit OFFSET :offset";
                            $TermosRows = "t=''&link={$getSearch}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}";
                            //Paginação
                            $WherePag = " WHERE n.titulo != :t AND (titulo LIKE '%' :link '%') ORDER BY n.id DESC";
                            $TermosPag = "t=''&link={$getSearch}";
                        else:
                            //Listagem de Rows
                            $WhereRows = " WHERE n.titulo != :t ORDER BY n.id DESC LIMIT :limit OFFSET :offset";
                            $TermosRows = "t=''&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}";
                            //Paginação
                            $WherePag = " WHERE n.titulo != :t ORDER BY n.id DESC";
                            $TermosPag = "t=''";
                        endif;
                        $readRows->FullRead(
                                "  SELECT n.id, n.url_name, n.foto, n.titulo, n.data, n.coluna, n.destaque, n.contador, u.nome, u.sexo"
                                . "  FROM noticias n "
                                . "  LEFT JOIN usuarios u ON n.qm_cadastr=u.id"
                                . " {$WhereRows}", "{$TermosRows}");
                        if (!$readRows->getResult()):
                            WSErro('Ainda não há nenhum registro...', WS_INFOR);
                        else:
                            foreach ($readRows->getResult() as $reg):
                                ?>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="box box-default">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <?php
                                                    if ($reg['destaque'] === 'sim'):
                                                        echo '<div class="star" data-toggle="tooltip" data-placement="top" title="Destaque"><i class="fa fa-star fa-2x"></i></div>';
                                                    endif;
                                                    ?>

                                                    <span class="label label-default"><i class="fa fa-eye"></i> <?= isset($reg['contador']) ? $reg['contador'] : 0; ?></span>
                                                    <a href="<?= HOME . '/noticia/' . $reg['url_name']; ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Ver no site">
                                                        <?php
                                                        if (!empty($reg['foto'])):
                                                            ?>
                                                            <img class="img-responsive" src="<?= HOME . "/tim.php?src=uploads/" . $reg['foto'] . "&w=380&h=150"; ?>" alt="<?= $reg["titulo"]; ?>">
                                                        <?php else: ?>
                                                            <img class="img-responsive" src="<?= HOME . "/tim.php?src=CWADMIN/dist/img/indsp.gif&w=380&h=150"; ?>" alt="<?= $reg["titulo"]; ?>">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <ul class = "list-group">
                                                <li class="list-group-item titreg"><?= Check::Words($reg['titulo'], 9); ?></li>
                                                <li class="list-group-item"><i class="fa fa-user"></i> <?= Check::Words($reg['nome'], 1); ?> <span class="pull-right text-green"><i class="fa fa-calendar"></i> <?= date('d/m/Y', strtotime($reg['data'])); ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <ul>
                                                    <a href="painel.php?exe=bancofotos/addfotos&id=<?= $reg['id']; ?>&tipo=<?= $tipo[0]; ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Carregar Fotos"><i class="fa fa-camera"></i></a>
                                                    <a href="painel.php?exe=bancofiles/addfiles&id=<?= $reg['id']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Carregar Arquivos"><i class="fa fa-cloud-upload"></i></a>
                                                    <a href="painel.php?exe=<?= $case[0]; ?>/editar&id=<?= $reg['id']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a>
                                                    <a href="painel.php?exe=<?= $exe; ?>&acao=excluir&id=<?= $reg['id']; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash-o"></i></a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-5">
                            <p>Mostrando de <b>1</b> até <b>12</b> de <b>3000</b> registros</p>
                        </div>
                        <div class="col-md-7">
                            <?php
                            $Pager->ExePaginator("noticias n", $WherePag, $TermosPag);
                            echo $Pager->getPaginator();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>