<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><i class="fa fa-users"></i> COLUNISTAS </h1>
                <p class="header_tagline">Nossos colunistas</p>
                <span class="header_line"></span>
            </header>
            <article class="content_pag">
                <?php for ($n = 1; $n <= 9; $n++): ?>
                    <div class="box_colunista">
                        <div class="colunista_image"><img src="https://placeimg.com/400/200/people"></div>
                        <div class="colunista_dados">
                            <div class="colunista_dadosnome">José de Arimatéa dos Santos</div>
                            <div class="colunista_dadosultpost">" Não é saudosismo – Por José de Arimatéa dos Santos... "</div>
                            <div class="colunista_dadosdate">Último Post em 01/04/2016 21:33 hrs</div>
                        </div>
                    </div>
                <?php endfor; ?>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
