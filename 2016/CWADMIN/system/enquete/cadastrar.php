<section class="content-header">
    <h1>
        Cadastrar Enquete
        <small>Cadastro de Nova Enquete</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="painel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="painel.php?exe=enquete/listar">Videos</a></li>
        <li class="active">Cadastrar Enquete</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (isset($dados) && $dados['SendPostForm']):
                unset($dados['SendPostForm']);

                require('_models/AdminEnquete.class.php');
                $cadastra = new AdminEnquete;
                $cadastra->ExeCreate($dados);

                if (!$cadastra->getResult()):
                    WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
                else:
                    header("Location: painel.php?exe=enquete/listar&acao=cadastrar&id={$cadastra->getResult()}");
                endif;
            endif;
            ?>
            <form role="form" name="UserCreateForm" action="" method="post" enctype="multipart/form-data">
                <div class="box box-primary">
                    <div class="box-header"><h3 class="box-title">Dados da Enquete</h3></div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="pergunta">Pergunta</label>
                                            <input type="text" name="pergunta" class="form-control" id="pergunta" value="<?= isset($dados['pergunta']) ? $dados['pergunta'] : ''; ?>" placeholder="Informe a pergunta da Enquete">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="resp1">Resposta 1</label>
                                            <input type="text" name="resp1" class="form-control" id="resp1" value="<?= isset($dados['resp1']) ? $dados['resp1'] : ''; ?>" placeholder="Informe a resposta 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="resp2">Resposta 2</label>
                                            <input type="text" name="resp2" class="form-control" id="resp2" value="<?= isset($dados['resp2']) ? $dados['resp2'] : ''; ?>" placeholder="Informe a resposta 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="resp3">Resposta 3</label>
                                            <input type="text" name="resp3" class="form-control" id="resp3" value="<?= isset($dados['resp3']) ? $dados['resp3'] : ''; ?>" placeholder="Informe a resposta 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="resp4">Resposta 4</label>
                                            <input type="text" name="resp4" class="form-control" id="resp4" value="<?= isset($dados['resp4']) ? $dados['resp4'] : ''; ?>" placeholder="Informe a resposta 4">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="" <?= ($dados['status'] == '') ? ' selected="selected"' : ''; ?>>Selecione...</option>
                                                <option value="A" <?= ($dados['status'] == 'A') ? ' selected="selected"' : ''; ?>>Ativa</option>
                                                <option value="I" <?= ($dados['status'] == 'I') ? ' selected="selected"' : ''; ?>>Inativa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" name="SendPostForm" value="Cadastrar" class="btn btn-flat btn-primary"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>