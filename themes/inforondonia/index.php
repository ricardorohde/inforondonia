<main class="content">
    <span class="main_contacao">
        <?php
        $ReadMain = new Read;

        $data_atual = date('Y-m-d');
        $Cotacao = $ReadMain;
        $Cotacao->ExeRead('cotacao');
        echo '<b>' . CIDADE . ' - ' . UF . ',  ' . Check::DataExt($data_atual);
        if ($Cotacao->getResult()):
            foreach ($Cotacao->getResult() as $cot):
                $tipo = $cot['tipo'] == 'USD' ? 'Dólar' : 'Euro';
                echo ' - ' . $tipo . ' R$ ' . $cot['cotacao'];
            endforeach;
        endif;
        echo '</b>';
        ?>
    </span>
    <div class="main_content">
        <div class="main_left">
            <div class="slide_content">
                <section id="slide">
                    <section id="buttons">
                        <a href="#" class="prev">&laquo;</a>
                        <a href="#" class="next">&raquo;</a>
                    </section>
                    <ul>
                        <?php
                        $ReadMain->ExeRead("noticias", "WHERE data_fslide >= :datafim AND titulo != :tit AND destaque = :dest AND destaque_tipo = :desttipo ORDER BY data DESC LIMIT :limit OFFSET :offset", "datafim={$data_atual}&tit=''&dest=sim&desttipo=slide&limit=5&offset=0");
                        if ($ReadMain->getResult()):
                            foreach ($ReadMain->getResult() as $sNews):
                                ?>
                                <li>
                                    <a href="<?= HOME . '/noticia/' . $sNews['url_name']; ?>" title="<?= $sNews['titulo']; ?>">
                                        <span><?= $sNews['titulo']; ?></span>
                                        <img src="<?= HOME . '/tim.php?src=uploads/' . $sNews['foto'] . '&w=890&h=380'; ?>" title="<?= $sNews['titulo']; ?>" alt="<?= $sNews['titulo']; ?>">
                                    </a>
                                </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </section>
            </div>
            <?php
            //Banner Capa 1
            $banners->setPlaces("idtipo=4");
            if ($banners->getResult()):
                ?>
                <div class="banner_mainleft_full cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                    <?php
                    foreach ($banners->getResult() as $bnr):
                        echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                        echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=887&h=140&zc=0\" class=\"banner\" />";
                        echo "</a>";
                    endforeach;
                    ?>
                </div>
                <?php
            endif;
            ?>
            <div class="main_blc_lastnews">
                <?php
                $ReadMain->ExeRead("noticias", "WHERE titulo != :tit AND destaque = :dest AND destaque_tipo = :desttipo ORDER BY data DESC LIMIT :limit OFFSET :offset", "tit=''&dest=sim&desttipo=smallnews&limit=3&offset=0");
                if ($ReadMain->getResult()):
                    foreach ($ReadMain->getResult() as $nDest):
                        $nDest['categoria'] = strtoupper($nDest['categoria']);
                        $nDest['titulo'] = Check::Words($nDest['titulo'], 14);
                        $nDest['data'] = date('d/m/Y H:i', strtotime($nDest['data']));
                        ?>
                        <div class="main_box_lastnews">
                            <a href="<?= HOME . '/noticia/' . $nDest['url_name']; ?>" title="<?= $nDest['titulo']; ?>">
                                <div class="main_box_lastnews_img">
                                    <img src="<?= HOME . '/tim.php?src=uploads/' . $nDest['foto'] . '&w=425&h=175'; ?>" title="<?= $nDest['titulo']; ?>" alt="<?= $nDest['titulo']; ?>"></div>
                                <div class="main_box_lastnews_cat"><b><?= $nDest['categoria']; ?></b></div>
                                <div class="main_box_lastnews_tit"><?= $nDest['titulo']; ?></div>
                                <div class="main_box_lastnews_dat"><i class="fa fa-clock-o"></i>  <?= $nDest['data']; ?> hrs</div>
                            </a>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="main_right">
            <?php
            //Banner Capa Lateral 1
            $banners->setPlaces("idtipo=8");
            if ($banners->getResult()):
                ?>
                <div class="banner_border">
                    <div class="banner_mainright_full cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                        <?php
                        foreach ($banners->getResult() as $bnr):
                            echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                            echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=346&h=438&zc=0\" />";
                            echo "</a>";
                        endforeach;
                        ?>
                    </div>
                </div>
                <?php
            endif;
            ?>
            <div class="likebox_facebook"><div class="fb-page" data-href="https://www.facebook.com/inforondonia" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/inforondonia"><a href="https://www.facebook.com/inforondonia">InfoRondonia</a></blockquote></div></div></div>
        </div>
    </div>
    <div class="main_content">
        <div class="main_blc_outnews">
            <header>
                <hgroup>
                    <h1>NOTÍCIAS</h1>
                    <h2>Veja outras notícias</h2>
                </hgroup>
                <a href="<?= HOME . '/noticias'; ?>" class="btn_mais btn_maisnoticias">Mais Notícias</a>
            </header>
            <div class="main_grp_outrasnoticias">
                <?php
                $OutrasNews = new Read;
                $OutrasNews->ExeRead('noticias', "WHERE titulo != :tit AND coluna = :col ORDER BY data DESC LIMIT :limit OFFSET :offset", "tit=''&col=nao&limit=13&offset=0");
                if ($OutrasNews->getResult()):
                    foreach ($OutrasNews->getResult() as $nOutras):
                        $nOutras['titulo'] = Check::Words($nOutras['titulo'], 20);
                        $nOutras['data'] = date('d/m/Y H:i', strtotime($nOutras['data']));
                        ?>
                        <div class="main_box_outrasnoticias">
                            <a href="<?= HOME . '/noticia/' . $nOutras['url_name']; ?>" title="<?= $nOutras['titulo']; ?>">
                                <div class="main_box_outrasnoticias_ico"><i class="fa fa-newspaper-o"></i></div>
                                <div class="main_box_outrasnoticias_inf">
                                    <div class="main_box_outrasnoticias_dat"><i class="fa fa-clock-o"></i> <?= $nOutras['data']; ?> hrs</div>
                                    <div class="main_box_outrasnoticias_tit"><?= $nOutras['titulo']; ?></div>
                                </div>
                            </a>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="main_rightblc">
            <?php
            //Banner Lateral 2
            $banners->setPlaces("idtipo=9");
            if ($banners->getResult()):
                ?>
                <div class="banner_mainright_meio cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                    <?php
                    foreach ($banners->getResult() as $bnr):
                        echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                        echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=722&h=130&zc=0\" class=\"banner\" />";
                        echo "</a>";
                    endforeach;
                    ?>
                </div>
                <?php
            endif;
            ?>
            <div class="main_blc_eventos">
                <header>
                    <hgroup>
                        <h1>EVENTOS</h1>
                        <h2>Cobertura de Eventos</h2>
                    </hgroup>
                    <a href="<?= HOME . '/eventos'; ?>" class="btn_mais btn_maiseventos">Mais Eventos</a>
                </header>
                <div class="main_grp_eventos">
                    <?php
                    $ReadMain->ExeRead("eventos", "WHERE evento != :evento AND destaque = :dest ORDER BY data DESC LIMIT 8", "evento=''&dest=sim");
                    if ($ReadMain->getResult()):
                        foreach ($ReadMain->getResult() as $eventos):
                            $eventos['evento'] = Check::Words($eventos['evento'], 20);
                            $eventos['data'] = date('d/m/Y', strtotime($eventos['data']));
                            ?>
                            <div class="main_box_eventos">
                                <a href="<?= HOME . '/evento/' . $eventos['url_name']; ?>" title="<?= $eventos['evento']; ?>">
                                    <div class="main_box_eventos_img"><img src="<?= HOME . '/tim.php?src=uploads/' . $eventos['foto'] . '&w=425&h=175'; ?>" alt="<?= $eventos['evento']; ?>" title="<?= $eventos['evento']; ?>" ></div>
                                    <div class="main_box_eventos_dat"><i class="fa fa-calendar"></i> <?= $eventos['data']; ?></div>
                                    <div class="main_box_eventos_tit"><?= Check::Words($eventos['evento'], 6); ?></div>
                                </a>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
            <?php
            //Banner Lateral 3
            $banners->setPlaces("idtipo=10");
            if ($banners->getResult()):
                ?>
                <div class="banner_mainright_meio cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                    <?php
                    foreach ($banners->getResult() as $bnr):
                        echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                        echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=722&h=130&zc=0\" class=\"banner\" />";
                        echo "</a>";
                    endforeach;
                    ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
    <div class="main_content">
        <div class="main_left">
            <div class="main_blc_videos">
                <header>
                    <hgroup>
                        <h1>VÍDEOS</h1>
                        <h2>Clique para assistir</h2>
                    </hgroup>
                    <a href="<?= HOME . '/videos'; ?>" class="btn_mais btn_maisvideos">Mais Vídeos</a>
                </header>
                <div class="main_grp_videos">
                    <?php
                    $ReadMain->ExeRead("videos", "WHERE titulo != :tit AND destaque = :dest ORDER BY id DESC LIMIT 4", "tit=''&dest=sim");
                    if ($ReadMain->getResult()):
                        foreach ($ReadMain->getResult() as $videos):
                            $videos['titulo'] = Check::Words($videos['titulo'], 20);
                            ?>
                            <div class="main_box_videos">
                                <a href="<?= HOME . '/video/' . $videos['url_name']; ?>" title="<?= $videos['titulo']; ?>">
                                    <div class="main_box_videos_img"><img src="<?= $videos['foto']; ?>" alt="<?= $videos['titulo'] ?>" title="<?= $videos['titulo'] ?>"></div>
                                    <div class="main_box_videos_tit"><?= Check::Words($videos['titulo'], 8); ?></div>
                                </a>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
            <div class="main_blc_banners_meio">
                <?php
                //Banner Capa 2
                $banners->setPlaces("idtipo=5");
                if ($banners->getResult()):
                    ?>
                    <div class="banner_mainleft_small cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                        <?php
                        foreach ($banners->getResult() as $bnr):
                            echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                            echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=439&h=140&zc=0\" class=\"banner\" />";
                            echo "</a>";
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                //Banner Capa 3
                $banners->setPlaces("idtipo=6");
                if ($banners->getResult()):
                    ?>
                    <div class="banner_mainleft_small cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                        <?php
                        foreach ($banners->getResult() as $bnr):
                            echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                            echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=439&h=140&zc=0\" class=\"banner\" />";
                            echo "</a>";
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            <div class="main_blc_colenquete">
                <div class="main_blc_colunas">
                    <header>
                        <hgroup>
                            <h1>COLUNAS</h1>
                            <h2>Posts dos colunistas</h2>
                        </hgroup>
                        <a href="<?= HOME . '/colunistas'; ?>" class="btn_mais btn_maiscolunas">Mais Colunas</a>
                    </header>
                    <div class="main_grp_colunas">
                        <?php
                        $ReadMain->ExeRead('colunistas', "WHERE nome != :nome ORDER BY RAND() LIMIT :limit", "nome=''&limit=4");
                        foreach ($ReadMain->getResult() as $col):

                            $ReadMain->ExeRead('noticias', "WHERE colunista = :idcol ORDER BY id DESC LIMIT 1", "idcol={$col['id']}");
                            if (!empty($ReadMain->getResult()[0])):
                                $News = $ReadMain->getResult()[0];
                                ?>
                                <a href="<?= HOME . '/colunista/' . $col['url_name']; ?>" title="<?= $col['nome']; ?>">
                                    <div class="main_box_colunas">
                                        <div class="main_box_colunas_imgname">
                                            <div class="main_box_colunas_img"><?= Check::Image('uploads/' . $col['foto'], $col['nome'], 170, 100); ?></div>
                                            <div class="main_box_colunas_nom"><?= Check::Words($col['nome'], 3); ?></div>
                                        </div>
                                        <div class="main_box_colunas_inf">
                                            <div class="main_box_colunas_tit"><?= Check::Words($News['titulo'], 8); ?></div>
                                            <div class="main_box_colunas_pre"><?= ucfirst(strtolower(Check::Words($News['noticia'], 5))); ?></div>
                                            <div class="main_box_colunas_dat"><i class="fa fa-clock-o"></i> <?= date('d/m/Y H:i', strtotime($News['data'])); ?> hrs</div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            else:
                                ?>
                                <a href="<?= HOME . '/colunista/' . $col['url_name']; ?>" title="<?= $col['nome']; ?>">
                                    <div class="main_box_colunas">
                                        <div class="main_box_colunas_imgname">
                                            <div class="main_box_colunas_img"><?= Check::Image('uploads/' . $col['foto'], $col['nome'], 170, 100); ?></div>
                                            <div class="main_box_colunas_nom"><?= Check::Words($col['nome'], 3); ?></div>
                                        </div>
                                        <div class="main_box_colunas_inf">
                                            <div class="main_box_colunas_tit">Nenhum post ainda...</div>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
                <?php
                $ReadMain->ExeRead('enquete', "WHERE status = :status ORDER BY id DESC LIMIT 1", "status=A");
                if (!empty($ReadMain->getResult()[0])):
                    $Enquete = $ReadMain->getResult()[0];
                    $IpUser = $_SERVER['REMOTE_ADDR'];
                    ?>
                    <div class="main_blc_enquete">
                        <header><h1>ENQUETE</h1></header>
                        <div class="main_grp_enquete">
                            <div class="main_box_enquete">
                                <div class="box_enquete_perg"><?= $Enquete['pergunta']; ?></div>
                                <p class="trigger-box"></p>

                                <div class="spinload"><span class="fa fa-circle-o-notch fa-spin"></span> Processando...</div>
                                <?php
                                $CheckUser = new Read;
                                $CheckUser->ExeRead("enquete_usuario", "WHERE id_enquete = :idenq AND ip = :ipuser", "idenq={$Enquete['id']}&ipuser={$IpUser}");
                                if (empty($CheckUser->getResult()[0])):
                                    ?>
                                    <div class="box_enq_perg">
                                        <form name="form_enquete" class="j_formajax" method="post" action="">
                                            <input type="hidden" name="id_enquete" value="<?= $Enquete['id']; ?>">
                                            <div class="box_enquete_resp"><input type="radio" name="resp" id="resp1" value="<?= $Enquete['resp1']; ?>" /> <label for="resp1"><?= $Enquete['resp1']; ?></label></div>
                                            <div class="box_enquete_resp"><input type="radio" name="resp" id="resp2" value="<?= $Enquete['resp2']; ?>" /> <label for="resp2"><?= $Enquete['resp2']; ?></label></div>
                                            <div class="box_enquete_resp"><input type="radio" name="resp" id="resp3" value="<?= $Enquete['resp3']; ?>" /> <label for="resp3"><?= $Enquete['resp3']; ?></label></div>
                                            <div class="box_enquete_resp"><input type="radio" name="resp" id="resp4" value="<?= $Enquete['resp4']; ?>" /> <label for="resp4"><?= $Enquete['resp4']; ?></label></div>

                                            <div class="box_enquete_btns">
                                                <button type="submit" name="sendFormEnquete" class="btn_enq btn_enq_vote">Votar</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <div class="box_enq_resul">
                                        <div class="box_enquete_resp">
                                            <?= $Enquete['resp1'] . ' - ' . '<b>' . ceil((($Enquete['voto1'] * 100) / $Enquete['total'])) . ' %</b>'; ?>
                                        </div>
                                        <div class="box_enquete_resp">
                                            <?= $Enquete['resp2'] . ' - ' . '<b>' . ceil((($Enquete['voto2'] * 100) / $Enquete['total'])) . ' %</b>'; ?>
                                        </div>
                                        <div class="box_enquete_resp">
                                            <?= $Enquete['resp3'] . ' - ' . '<b>' . ceil((($Enquete['voto3'] * 100) / $Enquete['total'])) . ' %</b>'; ?>
                                        </div>
                                        <div class="box_enquete_resp">
                                            <?= $Enquete['resp4'] . ' - ' . '<b>' . ceil((($Enquete['voto4'] * 100) / $Enquete['total'])) . ' %</b>'; ?>
                                        </div>
                                        <div class="box_enquete_resp">
                                            <?= ' <b>Total  de Votos - ' . $Enquete['total'] . ' Votos</b>'; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="main_blc_acessadastempo">
                <div class="main_blc_acessadas">
                    <header>
                        <hgroup>
                            <h1>MAIS ACESSADAS</h1>
                            <h2>As notícias mais acessadas</h2>
                        </hgroup>
                    </header>
                    <div class="main_grp_acessadas">
                        <?php
                        $ReadMain->ExeRead("noticias", "WHERE titulo != :tit ORDER BY contador DESC LIMIT 5 ", "tit=''");
                        if ($ReadMain->getResult()):
                            foreach ($ReadMain->getResult() as $Rank):
                                $Rank['data'] = date('d/m/Y H:i', strtotime($Rank['data']));
                                ?>
                                <div class="main_box_outrasnoticias">
                                    <a href="<?= HOME . '/noticia/' . $Rank['url_name']; ?>" title="<?= $Rank['titulo']; ?>">
                                        <div class="main_box_outrasnoticias_ico"><i class="fa fa-newspaper-o"></i></div>
                                        <div class="main_box_outrasnoticias_inf">
                                            <div class="main_box_outrasnoticias_dat"><i class="fa fa-clock-o"></i> <?= $Rank['data']; ?> hrs - Acessos <b><?= $Rank['contador']; ?></b></div>
                                            <div class="main_box_outrasnoticias_tit"><?= $Rank['titulo']; ?></div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

                <div class="main_blc_tempo">
                    <header>
                        <h1>TEMPO</h1>
                        <div class="box_tempo_date">TERÇA-FEIRA - 06/09/2016</div>
                    </header>
                    <div class="main_grp_tempo">
                        <div class="box_tempo">
                            <div class="box_tempo_info">
                                <div class="box_tempo_tempdesc">
                                    <div class="box_tempo_city">Rolim de Moura</div>
                                    <div class="box_tempo_desc">Parcialmente Nublado</div>
                                </div>
                                <div class="box_tempo_img"><img src="<?= INCLUDE_PATH . '/images/clima/pn.png' ?>" alt="Parcialmente Nublado"></div>
                            </div>
                            <div class="box_tempo_temp">
                                <div class="box_tempo_temp_val">32</div>
                                <div class="box_tempo_temp_cel"><img src="<?= INCLUDE_PATH . '/images/clima/temp_grau.png' ?>" alt="Temperatura"></div>
                            </div>
                        </div>
                        <ul class="box_tempo_calendar">
                            <li class="active">DOM</li>
                            <li>SEG</li>
                            <li>TER</li>
                            <li>QUA</li>
                            <li>QUI</li>
                            <li>SEX</li>
                            <li>SÁB</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        <div class="main_right">
            <div class="main_right_tv"><a href="<?= HOME . '/tv-inforondonia'; ?>"><img src="<?= REQUIRE_PATH . '/images/box_tv.png' ?>"></a></div>
            <?php
            //Banner Capa Lateral 4
            $banners->setPlaces("idtipo=11");
            if ($banners->getResult()):
                ?>
                <div class="banner_border margin_bottom">
                    <div class="banner_mainright_full cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                        <?php
                        foreach ($banners->getResult() as $bnr):
                            echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                            echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=346&h=438&zc=0\" />";
                            echo "</a>";
                        endforeach;
                        ?>
                    </div>
                </div>
                <?php
            endif;

            //Banner Capa Lateral 5
            $banners->setPlaces("idtipo=12");
            if ($banners->getResult()):
                ?>
                <div class="banner_border">
                    <div class="banner_mainright_small cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                        <?php
                        foreach ($banners->getResult() as $bnr):
                            echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                            echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=346&h=210&zc=0\" />";
                            echo "</a>";
                        endforeach;
                        ?>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
        <?php
        //Banner Capa Full
        $banners->setPlaces("idtipo=7");
        if ($banners->getResult()):
            ?>
            <div class="banner_main_full cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                <?php
                foreach ($banners->getResult() as $bnr):
                    echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                    echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=\"" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=1267&h=140&zc=0\" class=\"banner\" />";
                    echo "</a>";
                endforeach;
                ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</main>
