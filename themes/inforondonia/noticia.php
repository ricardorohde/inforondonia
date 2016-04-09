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
                <div class="banner banner_news_full"></div>
                <div class="header_social">
                    <a href="http://www.facebook.com/inforondonia" title="Compartilhar no Facebook" class="rds_facebook"><i class="fa fa-facebook-square fa-2x"></i></a>
                    <a href="#" title="Compartilhar no Twitter" class="rds_twitter"><i class="fa fa-twitter-square fa-2x"></i></a>
                    <a href="#" title="Compartilhar no Google+" class="rds_googleplus"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    <a href="whatsapp://send?text=<?= $titulo . ' ' . HOME . '/noticia/' . $url_name; ?>" title="Compartilhar no Whatsapp" class="rds_whatsapp"><i class="fa fa-whatsapp fa-2x"></i></a>
                    <a href="#" title="Imprimir Notícia" class="rds_print"><i class="fa fa-print fa-2x"></i> Imprimir</a>
                </div>
            </header>
            <article class="content_pag">
                <figure class="article_news_image">
                    <a href="<?= HOME . '/uploads/' . $foto; ?>" rel="shadowbox">
                        <img alt="<?= $titulo; ?>" title="<?= $titulo; ?>" src="<?= HOME . '/tim.php?src=' . HOME . '/uploads/' . $foto . '&w=870&h=480'; ?>"/>
                    </a>
                </figure>
                <div class="article_news_chars"><?= $noticia; ?></div>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
