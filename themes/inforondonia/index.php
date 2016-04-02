<main class="content">
    <span class="main_contacao">
        <?php
        $file_cota = 'http://developers.agenciaideias.com.br/cotacoes/json';
        $file_cotaget = file_get_contents($file_cota);
        $file_cotaread = json_decode($file_cotaget, true);
        $dolar_cota = str_replace('.', ',', $file_cotaread['dolar']['cotacao']);
        $euro_cota = str_replace('.', ',', $file_cotaread['euro']['cotacao']);
        $data_atual = date('Y-m-d');
        echo '<b>Rolim de Moura,  ' . Check::DataExt($data_atual) . ' - Dólar R$ ' . $dolar_cota . ' - Euro R$ ' . $euro_cota . '</b>';
        ?>
    </span>
    <div class="main_content">
        <div class="main_left">
            <div class="slide_content"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/01.jpg' . '&w=890&h=445'; ?>" alt="Titulo" title="Titulo"></div>
            <div class="banner banner_mainleft_full"></div>
            <div class="main_blc_lastnews">
                <?php for ($l = 1; $l <= 3; $l++): ?>
                    <div class="main_box_lastnews">
                        <div class="main_box_lastnews_img"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/01.jpg' . '&w=425&h=175'; ?>" alt="Titulo" title="Titulo"></div>
                        <div class="main_box_lastnews_cat"><b>IMÓVEIS</b></div>
                        <div class="main_box_lastnews_tit">Rolim de Moura – Prefeitura inicia construção da primeira ponte de ...</div>
                        <div class="main_box_lastnews_dat"><i class="fa fa-clock-o"></i> 17/03/2016 01:37 hrs</div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="main_right">
            <div class="banner banner_mainright_full"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/banner_1.jpg' . '&w=355&h=450'; ?>" alt="Titulo" title="Titulo"></div>
            <div class="likebox_facebook"><div class="fb-page" data-href="https://www.facebook.com/inforondonia" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/inforondonia"><a href="https://www.facebook.com/inforondonia">InfoRondonia</a></blockquote></div></div></div>
        </div>
    </div>
    <div class="main_content">
        <div class="main_blc_outnews">
            <header>
                <hgroup>
                    <h1>Notícias</h1>
                    <h2>Veja outras notícias</h2>
                </hgroup>
                <a href="#" class="btn_mais btn_maisnoticias">Mais Notícias</a>
            </header>
            <div class="main_grp_outrasnoticias">
                <?php for ($l = 1; $l <= 16; $l++): ?>
                    <div class="main_box_outrasnoticias">
                        <div class="main_box_outrasnoticias_ico"><i class="fa fa-newspaper-o"></i></div>
                        <div class="main_box_outrasnoticias_inf">
                            <div class="main_box_outrasnoticias_dat"><i class="fa fa-clock-o"></i> 17/03/2016 01:37 hrs</div>
                            <div class="main_box_outrasnoticias_tit">Rolim de Moura – Prefeitura inicia construção da primeira...</div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="main_rightblc">
            <div class="banner banner_mainright_meio"></div>
            <div class="main_blc_eventos">
                <header>
                    <hgroup>
                        <h1>Eventos</h1>
                        <h2>Cobertura de Eventos</h2>
                    </hgroup>
                    <a href="#" class="btn_mais btn_maiseventos">Mais Eventos</a>
                </header>
                <div class="main_grp_eventos">
                    <?php for ($l = 1; $l <= 8; $l++): ?>
                        <div class="main_box_eventos">
                            <div class="main_box_eventos_img"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/01.jpg' . '&w=425&h=175'; ?>" alt="Titulo" title="Titulo" ></div>
                            <div class="main_box_eventos_dat"><i class="fa fa-calendar"></i> 17/03/2016</div>
                            <div class="main_box_eventos_tit">Rolim de Moura – Prefeitura inicia construção da ...</div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="banner banner_mainright_meio"></div>
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
                    <a href="#" class="btn_mais btn_maisvideos">Mais Vídeos</a>
                </header>
                <div class="main_grp_videos">
                    <?php for ($l = 1; $l <= 4; $l++): ?>
                        <div class="main_box_videos">
                            <div class="main_box_videos_img"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/01.jpg' . '&w=425&h=175'; ?>" alt="Titulo" title="Titulo"></div>
                            <div class="main_box_videos_tit">Rolim de Moura – Prefeitura inicia pontes ...</div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="main_blc_banners_meio">
                <div class="banner banner_mainleft_small"></div>
                <div class="banner banner_mainleft_small"></div>
            </div>
            <div class="main_blc_colenquete">
                <div class="main_blc_colunas">
                    <header>
                        <hgroup>
                            <h1>COLUNAS</h1>
                            <h2>Posts dos colunistas</h2>
                        </hgroup>
                        <a href="#" class="btn_mais btn_maiscolunas">Mais Colunas</a>
                    </header>
                    <div class="main_grp_colunas">
                        <?php for ($l = 1; $l <= 4; $l++): ?>
                            <div class="main_box_colunas">
                                <div class="main_box_colunas_imgname">
                                    <div class="main_box_colunas_img"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/01.jpg' . '&w=170&h=100'; ?>" alt="Titulo" title="Titulo"></div>
                                    <div class="main_box_colunas_nom">Everaldo Lins</div>
                                </div>
                                <div class="main_box_colunas_inf">
                                    <div class="main_box_colunas_tit">Sobre o Coração</div>
                                    <div class="main_box_colunas_pre">A ciência ensina que é o cérebro o órgão por excelência que...</div>
                                    <div class="main_box_colunas_dat"><i class="fa fa-clock-o"></i> 17/03/2016 01:37 hrs</div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="main_blc_enquete">
                    <header>
                        <h1>ENQUETE</h1>

                    </header>
                    <div class="main_grp_enquete">

                    </div>
                </div>
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
                        <?php for ($l = 1; $l <= 5; $l++): ?>
                            <div class="main_box_outrasnoticias">
                                <div class="main_box_outrasnoticias_ico"><i class="fa fa-newspaper-o"></i></div>
                                <div class="main_box_outrasnoticias_inf">
                                    <div class="main_box_outrasnoticias_dat"><i class="fa fa-clock-o"></i> 17/03/2016 01:37 hrs</div>
                                    <div class="main_box_outrasnoticias_tit">Rolim de Moura – Prefeitura inicia construção da primeira...</div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="main_blc_tempo">
                    <header>
                        <h1>TEMPO</h1>
                    </header>
                    <div class="main_grp_tempo">
                        <?php
                        $uf = 'RO';
                        $city = 'ROLIM DE MOURA';
                        $city_url = rawurlencode(strtolower($city . '-' . $uf));
                        $file_temp = 'http://developers.agenciaideias.com.br/tempo/json/' . $city_url;
                        $file_tempget = file_get_contents($file_temp);
                        $file_tempread = json_decode($file_tempget, true);
                        $tempo = $file_tempread["agora"];
                        ?>
                        <div class="box_tempo">
                            <div class="box_tempo_date">Em <?= $tempo['data_hora']; ?> hrs</div>
                            <div class="box_tempo_city"><?= $city . ' - ' . $uf; ?></div>
                            <div class="box_tempo_info">
                                <div class="box_tempo_img"><img src="<?= $tempo['imagem']; ?>"></div>
                                <div class="box_tempo_tempdesc">
                                    <div class="box_tempo_temp"><?= $tempo['temperatura']; ?>º C</div>
                                    <div class="box_tempo_desc"><?= $tempo['descricao']; ?></div>
                                </div>
                            </div>
                            <div class="box_tempo_demais">
                                <div class="box_tempo_umid">Umidade: <?= $tempo['umidade']; ?></div>
                                <div class="box_tempo_vent">Vento: <?= $tempo['vento_velocidade']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_right">
            <div class="main_right_tv ratio4"><iframe class="ratio_element" src="http://iframe.dacast.com/b/20748/c/80089" width="100%" frameborder="0" scrolling="no" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" oallowfullscreen="" msallowfullscreen=""></iframe></div>
            <div class="banner banner_mainright_full"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/banner_1.jpg' . '&w=355&h=450'; ?>" alt="Titulo" title="Titulo"></div>
            <div class="banner banner_mainright_small"><img src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/banner_1.jpg' . '&w=355&h=215'; ?>" alt="Titulo" title="Titulo"></div>
        </div>
        <div class="banner banner_main_full"></div>
    </div>
</main>