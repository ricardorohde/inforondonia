<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><i class="fa fa-newspaper-o"></i> NOTÍCIAS </h1>
                <p class="header_tagline">Veja todas notícias</p>
                <span class="header_line"></span>
            </header>
            <article class="content_pag">
                <?php for ($n = 1; $n <= 9; $n++): ?>
                    <div class="box_news">
                        <div class="news_image"><img src="https://placeimg.com/400/200/animals"></div>
                        <div class="news_dados">
                            <div class="news_dadosdate"><i class="fa fa-calendar"></i> 01/04/2016 20:46 hrs</div>
                            <div class="news_dadoscateg">POLICIAL</div>
                            <div class="news_dadostitle">Operação Bloqueio captura foragidos e recupera dois veículos em 24 horas de ação em Porto Velho </div>
                            <div class="news_dadospreview">As primeiras 24 horas da operação Bloqueio em Porto Velho resultaram na recuperação de dois veículos e três recapturas de forag [..]</div>
                        </div>
                    </div>
                <?php endfor; ?>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
