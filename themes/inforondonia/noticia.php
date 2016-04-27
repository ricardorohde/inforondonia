<?php
if ($Link->getData()):
    extract($Link->getData());
    $data = date('d/m/Y H:i', strtotime($data));
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><?= $titulo; ?></h1>
                <p class="header_subtitle"><?= $subtitulo; ?></p>
                <span class="header_line"></span>
                <?php
                //Banner Noticia Ler 1
                $banners->setPlaces("idtipo=13");
                if ($banners->getResult()):
                    ?>
                    <div class="banner_news_full cycle-slideshow" data-cycle-timeout="5000" data-cycle-slides="> a">
                        <?php
                        foreach ($banners->getResult() as $bnr):
                            echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                            echo "<picture>";
                            echo "<source srcset=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=635&h=95\" media=\"(max-width:1200px)\" />";
                            echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=870&h=140\" class=\"banner\" />";
                            echo "</picture>";
                            echo "</a>";
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                ?>
                <div class="header_social">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= HOME . '/noticia/' . $url_name; ?>" title="Compartilhar no Facebook" class="rds_facebook" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
                    <a href="https://twitter.com/home?status=<?= HOME . '/noticia/' . $url_name; ?>" title="Compartilhar no Twitter" class="rds_twitter" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>
                    <a href="https://plus.google.com/share?url=<?= HOME . '/noticia/' . $url_name; ?>" title="Compartilhar no Google+" class="rds_googleplus" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    <a href="whatsapp://send?text=<?= $titulo . ' ' . HOME . '/noticia/' . $url_name; ?>" title="Compartilhar no Whatsapp" class="rds_whatsapp"><i class="fa fa-whatsapp fa-2x"></i></a>
                    <a href="" title="Imprimir Notícia" id="print" class="rds_print"><i class="fa fa-print fa-2x"></i> Imprimir</a>
                </div>
            </header>
            <article class="content_pag">
                <figure class="article_news_image">
                    <a href="<?= HOME . '/uploads/' . $foto; ?>" rel="shadowbox">
                        <img alt="<?= $titulo; ?>" title="<?= $titulo; ?>" src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/' . $foto . '&w=870&h=480'; ?>"/>
                    </a>
                </figure>
                <div class="article_news_chars"><?= $noticia; ?></div>
                <?php
                //Banner Noticia Ler 2
                $banners->setPlaces("idtipo=14");
                if ($banners->getResult()):
                    ?>
                    <div class="banner_news_full cycle-slideshow" data-cycle-timeout="5000" data-cycle-slides="> a">
                        <?php
                        foreach ($banners->getResult() as $bnr):
                            echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                            echo "<picture>";
                            echo "<source srcset=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=635&h=95\" media=\"(max-width:1200px)\" />";
                            echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=870&h=140\" class=\"banner\" />";
                            echo "</picture>";
                            echo "</a>";
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                //Outras Fotos
                $OutrasFotos = new Read;
                $OutrasFotos->ExeRead("banco_fotos", "WHERE id_tipo = :idtipo AND tipo = :tipo", "idtipo={$id}&tipo=N");
                if ($OutrasFotos->getResult()):
                    ?>
                    <div class="article_news_moreimg">
                        <?php
                        foreach ($OutrasFotos->getResult() as $fotos):
                            echo '<div class="boxfotos">';
                            echo '<img alt="' . $titulo . '" title="' . $titulo . '" src="' . HOME . '/tim.php?src=' . HOME . '/uploads/' . $fotos['foto'] . '&w=870"/>';
                            echo '</div>';
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                //Video
                if (!empty($video)):
                    ?>
                    <div class="article_news_moreimg">
                        <div class="frameBox">
                            <div class="ratio16">
                                <iframe class="ratio_element"  width="100%" height="100%" src="https://www.youtube.com/embed/<?= Check::ytVideo($video); ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="article_news_morenews">
                    <header class="header_morenews">
                        <h1 class="header_morenews_vin">Outras Notícias</h1>
                    </header>
                    <div class="content_morenews">
                        <?php
                        $ReadMoreNews = new Read;
                        $ReadMoreNews->ExeRead('noticias', "WHERE titulo != :titulo AND categoria = :categoria AND id <> :id ORDER BY id DESC LIMIT :limit", "titulo=''&categoria={$categoria}&id={$id}&limit=4");
                        if ($ReadMoreNews->getResult()):
                            foreach ($ReadMoreNews->getResult() as $n):
                                $n['titulo'] = Check::Words($n['titulo'], 16);
                                $n['noticia'] = Check::Words(strip_tags($n['noticia']), 36);
                                $n['data'] = date('d/m/Y H:i', strtotime($n['data']));
                                ?>
                                <div class="box_morenews">
                                    <a href="<?= HOME . '/noticia/' . $n['url_name']; ?>">
                                        <div class="morenews_img"><img alt="<?= $n['titulo']; ?>" title="<?= $n['titulo']; ?>" src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/' . $n['foto'] . '&w=380&h=180'; ?>"/></div>
                                        <div class="morenews_dados">
                                            <div class="morenews_datetime"><i class="fa fa-calendar"></i> <?= $n['data']; ?> hrs</div>
                                            <div class="morenews_title"><?= $n['titulo']; ?></div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
