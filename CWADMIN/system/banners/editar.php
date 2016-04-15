<section class="content-header">
    <h1>
        Editar Banner
        <small>Edição de Cadastros de Banners</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="painel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="painel.php?exe=banners/listar">Banners</a></li>
        <li class="active">Editar Banner</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $idEdit = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (isset($dados) && $dados['SendPostForm']):
                $dados['banner'] = ($_FILES['banner']['tmp_name'] ? $_FILES['banner'] : null);
                unset($dados['SendPostForm']);

                require('_models/AdminBanner.class.php');
                $cadastra = new AdminBanner;
                $cadastra->ExeUpdate($idEdit, $dados);

                if (!$cadastra->getResult()):
                    WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
                else:
                    header("Location: painel.php?exe=banners/listar&acao=cadastrar&id={$idEdit}");
                endif;
            else:
                $read = new Read;
                $read->ExeRead("banners", "WHERE id = :id", "id={$idEdit}");
                if (!$read->getResult()):
                    header("Location: painel.php?exe=banners/listar");
                else:
                    $dados = $read->getResult()[0];
                    $dados['data_inicial'] = date('d/m/Y', strtotime($dados['data_inicial']));
                    $dados['data_final'] = date('d/m/Y', strtotime($dados['data_final']));
                endif;
            endif;
            ?>
            <form role="form" name="UserCreateForm" action="" method="post" enctype="multipart/form-data">
                <div class="box box-primary">
                    <div class="box-header"><h3 class="box-title">Dados do Banner</h3></div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="titulo">Titulo</label>
                                            <input type="text" name="titulo" class="form-control" id="titulo" value="<?= isset($dados['titulo']) ? $dados['titulo'] : ''; ?>" placeholder="Informe o titulo da revista">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="link">Link</label>
                                            <input type="text" name="link" class="form-control" id="link" value="<?= isset($dados['link']) ? $dados['link'] : ''; ?>" placeholder="Informe o link da revista">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="tipo">Tipo do Banner</label>
                                            <select name="tipo" class="form-control" id="tipo">
                                                <option value="">Selecione...</option>
                                                <?php
                                                $readTipo = new Read;
                                                $readTipo->ExeRead("banners_tipo", "ORDER BY tipo ASC");
                                                if ($readTipo->getRowCount() >= 1):
                                                    foreach ($readTipo->getResult() as $tip):
                                                        echo "<option ";
                                                        if ($dados['tipo'] == $tip['id_tipo']):
                                                            echo "selected=\"selected\" ";
                                                        endif;
                                                        echo "value=\"{$tip['id_tipo']}\"> &raquo;&raquo; {$tip['tipo']} - {$tip['dimens_w']}x{$tip['dimens_h']}px</option>";
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="data_inicial">Inicio da Exibição em</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="data_inicial" class="form-control" id="data_inicial" value="<?= isset($dados['data_inicial']) ? $dados['data_inicial'] : date('d/m/Y'); ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="data_final">Fim da Exibição em</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="data_final" class="form-control" id="data_final" value="<?= isset($dados['data_final']) ? $dados['data_final'] : '' ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="banner">Banner</label>
                                            <div class="help-image"><img src="../uploads/<?= $dados['banner']; ?>" class="img-thumbnail img-responsive"></div>
                                            <input type="file" name="banner" class="form-control" id="banner">
                                            <p class="help-block">Selecione o Banner.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" name="SendPostForm" value="Editar" class="btn btn-flat btn-primary"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>