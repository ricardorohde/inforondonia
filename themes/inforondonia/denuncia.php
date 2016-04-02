<div class="content">
    <div class="main_left">
        <div class="main_content">
            <header class="header_content">
                <h1 class="header_title"><i class="fa fa-warning"></i> DENÚNCIA </h1>
                <p class="header_tagline">Registre sua denúncia</p>
                <span class="header_line"></span>
            </header>
            <article class="content_pag">
                <div class="box_denuncia">
                    <div class="denuncia_txt">
                        Faça agora mesmo sua denúncia. Mandem-nos fotos, vídeos, reclamações, sugestões, sobre o que esta acontecendo com seu município, todas as denúncias serão investigadas e se forem verídicas serão feitas matérias para mostrar o descaso, e as sugestões serão sempre bem vidas para a melhoria do <b>PORTAL <?= SITENAME;?></b>.<br> Seus dados serão guardados em sigílo e não aparecerão para o público. 
                    </div>
                    <div class="denuncia_form">
                        <form>
                            <input type="text" name="denuncia_nome" placeholder="Informe seu Nome" class="denuncia_nome">
                            <input type="text" name="denuncia_email" placeholder="Informe seu E-mail" class="denuncia_email">
                            <input type="text" name="denuncia_cidade" placeholder="Informe sua Cidade" class="denuncia_cidade">
                            <input type="text" name="denuncia_uf" placeholder="UF" class="denuncia_uf">
                            <input type="text" name="denuncia_telefone" placeholder="Informe seu Telefone" class="denuncia_telefone">
                            <textarea rows="10" name="denuncia_msg" placeholder="Deixe sua Mensagem" class="denuncia_msg"></textarea>
                            <input type="text" name="denuncia_link" placeholder="Link do Video" class="denuncia_link">
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
