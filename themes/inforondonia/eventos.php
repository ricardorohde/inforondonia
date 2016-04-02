<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><i class="fa fa-camera"></i> EVENTOS </h1>
                <p class="header_tagline">Veja as coberturas de eventos</p>
                <span class="header_line"></span>
            </header>
            <article class="content_pag">
                <?php for ($n = 1; $n <= 9; $n++): ?>
                    <div class="box_eventos">
                        <div class="evento_image"><img src="https://placeimg.com/400/200/tech"></div>
                        <div class="evento_dados">
                            <div class="evento_dadosdate"><i class="fa fa-calendar"></i>  01/04/2016</div>
                            <div class="evento_dadosalbum"><i class="fa fa-camera"></i> Galeria de Fotos - SEMAS 'Momento Mulher'</div>
                            <div class="evento_dadoslocal"><i class="fa fa-map-marker"></i> CTG - Rolim de Moura - RO</div>                            
                        </div>
                    </div>
                <?php endfor; ?>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
