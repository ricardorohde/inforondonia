<div class="main_right">
    <div class="main_content">
        <?php
        //Banner Capa Lateral 1
        $banners->setPlaces("idtipo=8");
        if ($banners->getResult()):
            ?>
            <div class="banner_border">
                <div class="banner_mainright_full cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                    <?php
                    foreach ($banners->getResult() as $bnr):
                        echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                        echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=346&h=438&zc=0\" />";
                        echo "</a>";
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
        endif;
        ?>
        <div class="likebox_facebook"><div class="fb-page" data-href="https://www.facebook.com/inforondonia" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/inforondonia"><a href="https://www.facebook.com/inforondonia">InfoRondonia</a></blockquote></div></div></div>
        <div class="main_right_tv"><a href="<?= HOME . '/tv-inforondonia'; ?>"><img src="<?= INCLUDE_PATH . '/images/box_tv.png' ?>"></a></div>
        <?php
        //Banner Capa Lateral 4
        $banners->setPlaces("idtipo=11");
        if ($banners->getResult()):
            ?>
            <div class="banner_border margin_bottom">
                <div class="banner_mainright_full cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                    <?php
                    foreach ($banners->getResult() as $bnr):
                        echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                        echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=346&h=438&zc=0\" />";
                        echo "</a>";
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
        endif;

//Banner Capa Lateral 5
        $banners->setPlaces("idtipo=12");
        if ($banners->getResult()):
            ?>
            <div class="banner_border">
                <div class="banner_mainright_small cycle-slideshow" data-cycle-log="false" data-cycle-timeout="5000" data-cycle-slides="> a">
                    <?php
                    foreach ($banners->getResult() as $bnr):
                        echo "<a href=\"{$bnr['link']}\" title=\"{$bnr['titulo']}\" target=\"_blank\">";
                        echo "<img alt=\"{$bnr['titulo']}\" title=\"{$bnr['titulo']}\" src=" . HOME . "/tim.php?src=uploads/{$bnr['banner']}&w=346&h=210&zc=0\" />";
                        echo "</a>";
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>