<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><i class="fa fa-smile-o"></i> QUEM SOMOS </h1>
                <p class="header_tagline">Um pouco sobre nós</p>
                <span class="header_line"></span>
            </header>
            <article class="content_pag">
                <?php
                $Read = new Read;
                $Read->ExeRead('institucional', "WHERE sobre != :sobre", "sobre=''");
                $exRead = $Read->getResult()[0];

                echo $exRead['sobre'];
                ?>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
