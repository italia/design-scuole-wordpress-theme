<?php
global $post, $autore, $luogo, $c, $badgeclass;
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$file_documenti = dsi_get_meta("file_documenti");

?>
<section class="section bg-white">
    <?php if(has_post_thumbnail($post)){ 
        $colsize = 12;
    }else{
        $colsize = 12;
    } ?>
    <section class="section bg-white article-title article-title-small article-title-author">
        <div class="">
            <div class="row variable-gutters">
                <div class="col-<?php echo $colsize; ?>">
                    <div class="title-content">
                        <h1 class="h2 text-black"><?php the_title(); ?></h1>
                        <?php
                        $badgeclass = "badge-outline-greendark";
                        get_template_part("template-parts/common/badges-argomenti"); ?>
                    </div>
                    <div>
                        <div id="title-img"> 
                            <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                        </div>
                    </div>
                </div><!-- /col-md-6 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
</section>