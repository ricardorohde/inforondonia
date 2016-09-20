<?php
ob_start();
require('./_app/Config.inc.php');
$Session = new Session(10);
Check::UserOnline();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <!--[if lt IE 9]><script src="<?= HOME; ?>/_cdn/html5.js"></script><![endif]-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="alternate" type="application/rss+xml" title="INFORONDONIA - RSS" href="rss.xml" />
        <meta name="theme-color" content="#35314E">
        <?php
        $Link = new Link;
        $Link->getTags();
        ?>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/style.min.css"/>
    </head>
    <body>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-78466412-1', 'auto', {'allowLinker': true});
            ga('require', 'linker');
            ga('linker:autoLink', ['inforondonia.com', 'portalinforondonia.com.br', 'informarondonia.com'])
            ga('send', 'pageview');
        </script>
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NVRPHT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-NVRPHT');
        </script>
        <!-- End Google Tag Manager -->
        <?php
        //Topo
        require(REQUIRE_PATH . '/inc/header.inc.php');
        //Capa
        if (!require($Link->getPatch())):
            WSErro('Erro ao incluir arquivo de navegação!', WS_ERROR, true);
        endif;
        //Rodape
        require(REQUIRE_PATH . '/inc/footer.inc.php');
        ?>
    </body>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/font_oxygen.css">
    <link rel="stylesheet" type="text/css" href="<?= HOME; ?>/_cdn/font-awesome/css/font-awesome.min.css">
    <!-- JS -->
    <script src="<?= HOME; ?>/_cdn/jquery.js"></script>
    <script src="<?= HOME; ?>/_cdn/jcycle2.js"></script>
    <script src="<?= HOME; ?>/_cdn/slide.js"></script>
    <script src="<?= HOME; ?>/_cdn/_scripts.conf.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR' async defer></script>    
</html>
<?php
ob_end_flush();