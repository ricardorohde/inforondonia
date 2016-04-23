<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><i class="fa fa-users"></i> COLUNISTAS </h1>
                <p class="header_tagline">Nossos colunistas</p>
                <span class="header_line"></span>
            </header>
            <article class="content_pag">
                <?php
                $getPage = (!empty($Link->getlocal()[1]) ? $Link->getlocal()[1] : 1);
                $Pager = new Pager(HOME . '/colunistas/');
                $Pager->ExePager($getPage, 10);

                $Colunista = new Read;
                $Colunista->FullRead(" SELECT c.id, c.nome, c.foto, c.url_name"
                        . " FROM usuarios c "
                        . " WHERE c.nome != :nome AND c.url_name != :url AND c.colunista = :col"
                        . " ORDER BY c.nome DESC"
                        . " LIMIT :limit OFFSET :offset", "nome=''&url=''&col=sim&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
                if (!$Colunista->getResult()):
                    WSErro('Desculpe, ainda não há nenhum <b>COLUNISTA</b> cadastrado!', WS_INFOR);
                else:

                    $View = new View;
                    $tpl_colunistas = $View->Load('colunistas');

                    foreach ($Colunista->getResult() as $col):
                        $NewsFK = new Read;
                        $NewsFK->FullRead(" SELECT n.titulo, n.data FROM noticias n WHERE n.qm_cadastr = :colunista ORDER BY n.id DESC LIMIT 1", "colunista={$col['id']}");
                        $News = $NewsFK->getResult()[0];

                        $col['nome'] = Check::Words($col['nome'], 5);
                        $col['titulo'] = Check::Words($News['titulo'], 10);
                        $col['data'] = date('d/m/Y H:i', strtotime($News['data']));
                        $View->Show($col, $tpl_colunistas);
                    endforeach;

                    echo '<nav>';
                    $Pager->ExePaginator('usuarios', "WHERE nome != :nome AND url_name != :url AND colunista = :col ORDER BY id DESC", "nome=''&url=''&col=sim");
                    echo $Pager->getPaginator();
                    echo '</nav>';
                endif;
                ?>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
