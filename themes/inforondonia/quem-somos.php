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

                //Contato
                $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if ($Contato && $Contato['SendFormContato']):
                    unset($Contato['SendFormContato']);
                    $Contato['DestinoNome'] = 'Contato - INFORONDONIA';
                    $Contato['DestinoEmail'] = 'contato@inforondonia.com.br';

                    $SendMail = new Email;
                    $SendMail->Enviar($Contato);
                    if ($SendMail->getError()):
                        WSErro($SendMail->getError()[0], $SendMail->getError()[1]);
                    endif;
                endif;
                ?>
                <div class="contato_form">
                    <h1 class="header_contato_form">Entre em contato</h1>
                    <form name="contatoForm" method="post" action="">
                        <div class="form_input">
                            <label for="RemetenteNome">Nome</label>
                            <input type="text" name="RemetenteNome" id="RemetenteNome" class="contato_nome" placeholder="Informe seu Nome">
                        </div>
                        <div class="form_input">
                            <label for="RemetenteEmail">E-mail</label>
                            <input type="text" name="RemetenteEmail" id="RemetenteEmail" class="contato_email" placeholder="Informe seu E-mail">
                        </div>
                        <div class="form_input">
                            <label for="Assunto">Assunto</label>
                            <input type="text" name="Assunto" id="Assunto" class="contato_assunto" placeholder="Assunto da Mensagem">
                        </div>
                        <div class="form_input">
                            <label for="Mensagem">Mensagem</label>
                            <textarea rows="10" name="Mensagem" id="Mensagem" class="contato_mensagem" placeholder="Deixe sua Mensagem"></textarea>
                        </div>
                        <div class="form_input">
                            <input type="submit" name="SendFormContato" class="contato_send" value="Enviar Contato">
                        </div>
                    </form>
                </div>


            </article>
        </div>
    </div>
    <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
</div>
