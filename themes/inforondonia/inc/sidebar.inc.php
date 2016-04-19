<div class="main_right">
    <div class="main_content">
        <?php
        //Banner Capa Lateral 1
        $banners->setPlaces("idtipo=8");
        if ($banners->getResult()):
            ?>
            <div class="banner banner_mainright_full slide">
                <?php
                foreach ($banners->getResult() as $bnr):
                    echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                    echo "<picture>";
                    echo "<source srcset=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=635&h=95\" media=\"(max-width:1200px)\" />";
                    echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=346&h=438\" />";
                    echo "</picture>";
                    echo "</a>";
                endforeach;
                ?>
            </div>
            <?php
        endif;
        ?>
        <div class="likebox_facebook"><div class="fb-page" data-href="https://www.facebook.com/inforondonia" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/inforondonia"><a href="https://www.facebook.com/inforondonia">InfoRondonia</a></blockquote></div></div></div>
        <div class="main_right_tv ratio4"><iframe class="ratio_element" src="http://iframe.dacast.com/b/20748/c/80089" width="100%" frameborder="0" scrolling="no" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" oallowfullscreen="" msallowfullscreen=""></iframe></div>
        <?php
        //Banner Capa Lateral 4
        $banners->setPlaces("idtipo=11");
        if ($banners->getResult()):
            ?>
            <div class="banner banner_mainright_full slide">
                <?php
                foreach ($banners->getResult() as $bnr):
                    echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                    echo "<picture>";
                    echo "<source srcset=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=635&h=95\" media=\"(max-width:1200px)\" />";
                    echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=346&h=438\" />";
                    echo "</picture>";
                    echo "</a>";
                endforeach;
                ?>
            </div>
            <?php
        endif;

        //Banner Capa Lateral 5
        $banners->setPlaces("idtipo=12");
        if ($banners->getResult()):
            ?>
            <div class="banner banner_mainright_small slide">
                <?php
                foreach ($banners->getResult() as $bnr):
                    echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                    echo "<picture>";
                    echo "<source srcset=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=635&h=95\" media=\"(max-width:1200px)\" />";
                    echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=" . HOME . "/uploads/{$bnr['banner']}&w=346&h=210\" />";
                    echo "</picture>";
                    echo "</a>";
                endforeach;
                ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>