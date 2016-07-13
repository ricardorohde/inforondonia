<section class="content-header">
    <h1>
        Add Fotos
        <small>Gestão de Fotos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="painel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Fotos</li>
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
                <div class="box-header"><h3 class="box-title">Fotos da galeria</h3></div>
                <div class="box-body" id="foco">
                    <?php
                    $delFoto = filter_input(INPUT_GET, 'delfoto', FILTER_VALIDATE_INT);
                    if ($delFoto):
                        require_once('_models/AdminBancoFotos.class.php');
                        $delete = new AdminBancoFotos;
                        $delete->ExeDelete($delFoto);

                        WSErro($delete->getError()[0], $delete->getError()[1]);
                    endif;

                    $gbi = 0;
                    $foto = new Read;
                    $foto->ExeRead("banco_fotos", "WHERE id_tipo = :id AND tipo = :tipo", "id={$idTipo}&tipo={$tipo}");
                    if ($foto->getResult()):
                        ?>
                        <div class="row">
                            <?php
                            foreach ($foto->getResult() as $gb):
                                $gbi++;
                                ?>
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <div class="action-image">
                                            <label><input type="checkbox" class="chkimage"> Selecionar</label>
                                            <a class="btn btn-sm btn-danger" href="painel.php?exe=bancofotos/addfotos&id=<?= $idTipo; ?>&tipo=<?= $tipo; ?>&delfoto=<?= $gb['id']; ?>#foco"><b class="fa fa-trash-o"></b> Deletar</a>
                                        </div>
                                        <div class="box-image">
                                            <a href="#"><?= Check::Image('uploads/' . $gb['foto'], $gbi, 320, 180, true); ?></a>
                                            <input type="text" name="legenda" class="form-control" placeholder="Digite a legenda dessa foto" value="<?= !empty($gb['legenda']) ? $gb['legenda'] : '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
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
            url: "system/bancofotos/sendfotos.php",
            addRemoveLinks: false,
            maxFileSize: 10,
            acceptedFles: "image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF",
            dictDefaultMessage: "CLIQUE ou ARRASTE <br> os arquivos que deseja enviar.",
            dictRemoveFile: "Excluir",
            dictMaxFilesExceeded: "Arquivo Maior que 10MB, por favor selecione outro arquivo.",
            dictResponseError: "Desculpe ocorreu um erro!",
            sending: function (file, xhr, formData) {
                formData.append('tipo', '<?= $tipo; ?>');
                formData.append('id_tipo', <?= $idTipo; ?>);
            },
            queuecomplete: function () {
                alert("Arquivos enviados com sucesso!");
                refresh(1000);
            },
            error: function (file) {
                console.log("Erro ao enviar o arquivo: " + file.name);
            },
            removedfile: function (file) {
                var name = file.name;
                $.ajax({
                    type: 'POST',
                    url: "system/bancofotos/sendfotos.php?delete=true",
                    data: "filename=" + name,
                    success: function (data) {
                        var json = JSON.parse(data);
                        if (json.res === true) {
                            var element;
                            (element = file.previewElement) !== null ? element.parentNode.removeChild(file.previewElement) : false;
                            console.log("Arquivo removido: " + file.name);
                        }
                    }
                });
            }
        });

        //Função Refresh
        function refresh(tempo) {
            setTimeout(function () {
                var redireciona = "<?= $url_refresh; ?>";
                $(window.document.location).attr('href', redireciona);
            }, tempo);
        }
        ;
    });
</script>