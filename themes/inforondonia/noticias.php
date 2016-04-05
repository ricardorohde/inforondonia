<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><i class="fa fa-newspaper-o"></i> NOTÍCIAS </h1>
                <p class="header_tagline">Veja todas notícias</p>
                <span class="header_line"></span>
            </header>
            <article class="content_pag">
                <?php
                $getPage = (!empty($Link->getlocal()[1]) ? $Link->getlocal()[1] : 1);
                $Pager = new Pager(HOME . '/noticias/');
                $Pager->ExePager($getPage, 10);

                $ReadNewsAll = new Read;
                $ReadNewsAll->ExeRead('noticias', "WHERE titulo != :titulo ORDER BY id DESC LIMIT :limit OFFSET :offset", "titulo=''&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");

                if (!$ReadNewsAll->getResult()):
                    WSErro('Desculpe, ainda não há nenhuma <br><b>NOTICIA</b> cadastrada!', WS_INFOR);
                else:
                    $View = new View;
                    $tpl_noticias = $View->Load('noticias');

                    foreach ($ReadNewsAll->getResult() as $n):
                        $n['titulo'] = Check::Words($n['titulo'], 16);
                        $n['noticia'] = strip_tags($n['noticia']);
                        $n['noticia'] = Check::Words($n['noticia'], 36);
                        $n['data'] = date('d/m/Y H:i', strtotime($n['data']));
                        $View->Show($n, $tpl_noticias);
                    endforeach;

                    echo '<nav>';
                    $Pager->ExePaginator('noticias', "WHERE titulo != :t ORDER BY id DESC", "t=''");
                    echo $Pager->getPaginator();
                    echo '</nav>';
                endif;
                ?>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
