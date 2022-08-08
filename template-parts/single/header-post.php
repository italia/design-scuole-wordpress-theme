<?php
global $post, $autore, $luogo, $c, $badgeclass;
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$file_documenti = dsi_get_meta("file_documenti");
$luoghi = dsi_get_meta("luoghi");
$persone = dsi_get_meta("persone");
$numerazione_circolare = dsi_get_meta("numerazione_circolare");

$image_url = get_the_post_thumbnail_url($post, "item-gallery");
$autore = get_user_by("ID", $post->post_author);
?>
<?php if(has_post_thumbnail($post)){ ?>
<section class="section bg-white">
    <?php
    $colsize = 12;
    }else{
    ?>
    <section class="section bg-white article-title article-title-small article-title-author">
        <?php
        $colsize = 12;
        } ?>
        <div class="container">
            <div class="row variable-gutters">
                <div class="col-<?php echo $colsize; ?> article-title-author-container justify-content-start">
                    <div class="title-content">
                        <h1><?php the_title(); ?></h1>
                        <?php
                        $badgeclass = "badge-outline-greendark";
                        get_template_part("template-parts/common/badges-argomenti"); ?>
                    </div>
                    <div>
                        <div id="title-img" class=""> 
                            <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
                        </div>
                        <?php get_template_part( "template-parts/single/bottom" ); ?>
                    </div>
                </div><!-- /col-md-6 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>