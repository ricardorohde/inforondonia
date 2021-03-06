<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Listar Eventos
        <small>Lista os cadastros de eventos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="painel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="painel.php?exe=eventos/listar">Eventos</a></li>
        <li class="active">Listar Eventos</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php
            $acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);
            $acaoId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            require('_models/AdminEvento.class.php');
            $readAcao = new AdminEvento;

            $readMsg = new Read;
            $readMsg->ExeRead('eventos', "WHERE id = :id", "id={$acaoId}");
            switch ($acao):
                case 'cadastrar':
                    $msg = $readMsg->getResult()[0];
                    WSErro("O Evento <b>{$msg['evento']}</b> foi cadastrado com sucesso!", WS_ACCEPT);
                    break;
                case 'editar':
                    $msg = $readMsg->getResult()[0];
                    WSErro("O Evento <b>{$msg['evento']}</b> foi atualizado com sucesso!", WS_ACCEPT);
                    break;
                case 'excluir':
                    $readAcao->ExeDelete($acaoId);
                    WSErro($readAcao->getError()[0], $readAcao->getError()[1]);
                    break;
            endswitch;
            ?>
            <div class="box box-primary">
                <div class="box-body">
                    <table id="tableView" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Evento</th>
                                <th>Cadastrado em</th>
                                <th>Destaque</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $readUser = new Read;
                            $readUser->ExeRead("eventos", "WHERE evento != :e", "e= ''");
                            if (!$readUser->getResult()):

                            else:
                                foreach ($readUser->getResult() as $reg):
                                    ?>
                                    <tr>
                                        <td><?= $reg['id']; ?></td>
                                        <td><?= Check::Words($reg['evento'], 10); ?></td>
                                        <td><?= date('d/m/Y H:m:s', strtotime($reg['data'])); ?></td>
                                        <td><?= $reg['destaque']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="painel.php?exe=bancofotos/addfotos&id=<?= $reg['id']; ?>&tipo=E" class="btn btn-flat btn-sm btn-success "><b class="fa fa-camera"></b> Fotos</a>
                                                <a href="painel.php?exe=eventos/editar&id=<?= $reg['id']; ?>" class="btn btn-flat btn-sm btn-primary "><b class="fa fa-edit"></b> Editar</a>
                                                <a href="painel.php?exe=eventos/listar&acao=excluir&id=<?= $reg['id']; ?>" class="btn btn-flat btn-sm btn-danger "><b class="fa fa-trash-o"></b> Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->