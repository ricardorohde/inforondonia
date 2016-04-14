<header class="main_header">
    <div class="content">
        <div class="box_header_logords">
            <a href="<?= HOME; ?>" title="<?= SITENAME; ?> - Informação é a nossa prioridade!"><h1 class="main_header_logo"><?= SITENAME; ?> - Informação é a nossa prioridade!</h1></a>
            <div class="main_header_rds">
                <a href="http://www.facebook.com/inforondonia" title="<?= SITENAME; ?> no Facebook" class="rds_facebook" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
                <a href="https://twitter.com/inforondonia" title="<?= SITENAME; ?> no Twitter" class="rds_twitter" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>
                <a href="#" title="<?= SITENAME; ?> no Google+" class="rds_googleplus"><i class="fa fa-google-plus-square fa-2x" target="_blank"></i></a>
            </div>
        </div>
        <div class="box_header_banners">
            <div class="banner main_header_banner"></div>
            <div class="banner main_header_banner"></div>
        </div>
    </div>

    <div class="content">
        <nav class="main_header_menu">
            <div class="main_header_grpmenu">
                <a class="mobmenu" href="#" title="Mobile Nav"><i class="fa fa-bars"></i> MENU</a>
                <ul>
                    <li><a href="<?= HOME . '/noticias'; ?>">NOTÍCIAS</a></li>
                    <li><a href="<?= HOME . '/colunistas'; ?>">COLUNISTAS</a></li>
                    <li><a href="<?= HOME . '/tv-inforondonia'; ?>">TV <?= SITENAME; ?></a></li>
                    <li><a href="<?= HOME . '/eventos'; ?>">EVENTOS</a></li>
                    <li><a href="<?= HOME . '/videos'; ?>">VíDEOS</a></li>
                    <li><a href="<?= HOME . '/midia-kit'; ?>">MÍDIA KIT</a></li>
                    <li><a href="<?= HOME . '/denuncia'; ?>">DENÚNCIA</a></li>
                    <li><a href="<?= HOME . '/quem-somos'; ?>">QUEM SOMOS</a></li>
                </ul>
            </div>
            <div class="main_header_busca">
                <form name="busca" action="" method="post">
                    <input type="search" name="s" class="busca_input" placeholder="Digite sua busca...">
                    <button type="submit" name="sendsearch" class="busca_btn"><i class="fa fa-search fa-2x"></i></button>
                </form>
            </div>
        </nav>
    </div>
</header>