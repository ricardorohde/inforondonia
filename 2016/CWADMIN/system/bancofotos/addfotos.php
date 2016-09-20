<div class="cw-alert"></div>
<section class="content-header">
    <h1>
        Fotos
        <small>Gestão de Fotos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="painel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fotos</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php
            $idTipo = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_STRING);
            $url_refresh = HOME . "/CWADMIN/painel.php?exe=bancofotos/addfotos&id={$idTipo}&tipo={$tipo}";
            ?>
            <!-- Form -->
            <div class="box box-primary">
                <div class="box-header"><h3 class="box-title">Adicionar Mais Fotos</h3></div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div id="dropzone" class="dropzone"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Fotos da galeria</h3>

                    <div class="btn-group bar-action">
                        <div class="btn-group">
                            <a href="" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="fa fa-toggle-down"></span> Selecionar</a>
                            <ul class="dropdown-menu">
                                <li><a href="" class="selectall"><span class="fa fa-check-square-o"></span> Selecionar Todas</a></li>
                                <li><a href="" class="selectnone"><span class="fa fa-square-o"></span> Desselecionar Todas</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-danger deleteall"><span class="fa fa-trash-o"></span> Excluir Selecionadas</button>
                    </div>

                </div>

                <div class="box-body" id="foco">
                    <?php
                    $gbi = 0;
                    $foto = new Read;
                    $foto->ExeRead("banco_fotos", "WHERE id_tipo = :id AND tipo = :tipo ORDER BY ordem ASC", "id={$idTipo}&tipo={$tipo}");
                    if ($foto->getResult()):
                        ?>
                        <div class="row">
                            <ul id="sortable">
                                <?php
                                foreach ($foto->getResult() as $gb):
                                    $gbi++;
                                    ?>
                                    <li class="col-md-3 boxfoto" id="arrayorder_<?= $gb['id']; ?>">
                                        <div class="thumbnail">
                                            <div class="action-image">
                                                <label><input type="checkbox" class="chkimage" name="chkimage[]" value="<?= $gb['id']; ?>"> Selecionar</label>
                                                <button class="btn btn-sm btn-danger delete" id="<?= $gb['id']; ?>"><span class="fa fa-trash-o"></span> Excluir</button>
                                            </div>
                                            <div class="box-image">
                                                <a href="#"><?= Check::Image('uploads/' . $gb['foto'], $gbi, 320, 180, true); ?></a>
                                                <input type="text" name="legenda" id="<?= $gb['id']; ?>" class="form-control legenda" placeholder="Digite a legenda dessa foto" value="<?= !empty($gb['legenda']) ? $gb['legenda'] : '' ?>">
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                        <?php
                    else:
                        WSErro("Não há nenhuma imagem cadastrada!", WS_ERROR);
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        Dropzone.autoDiscover = false;
        $("#dropzone").dropzone({
            url: "system/bancofotos/actionsfotos.php",
            addRemoveLinks: false,
            maxFileSize: 20,
            acceptedFles: "image/*",
            dictDefaultMessage: "CLIQUE ou ARRASTE <br> os arquivos que deseja enviar.",
            dictRemoveFile: "Excluir",
            dictMaxFilesExceeded: "Arquivo Maior que 10MB, por favor selecione outro arquivo.",
            dictResponseError: "Desculpe ocorreu um erro!",
            sending: function (file, xhr, formData) {
                formData.append('action', 'send');
                formData.append('tipo', '<?= $tipo; ?>');
                formData.append('id_tipo', <?= $idTipo; ?>);
            },
            queuecomplete: function () {
                alert("Foi enviado " + this.getAcceptedFiles().length + " arquivos enviados com sucesso!");
                refresh(1000);
            },
            error: function (file) {
                console.log("Erro ao enviar o arquivo: " + file.name);
            }
        });
    });

    // Função Refresh
    function refresh(tempo) {
        setTimeout(function () {
            var redireciona = "<?= $url_refresh; ?>";
            $(window.document.location).attr('href', redireciona);
        }, tempo);
    }
</script>