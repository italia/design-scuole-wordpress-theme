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
<section class="section bg-white article-title article-title-author">

    <div class="title-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
    <?php
    $colsize = 6;
    }else{
    ?>
    <section class="section bg-white article-title article-title-small article-title-author">
        <?php
        $colsize = 12;
        } ?>
        <div class="container">
            <div class="row variable-gutters">
                <div class="col-md-<?php echo $colsize; ?> article-title-author-container">
                    <div class="title-content">
                        <h1><?php the_title(); ?></h1>
                        <p class="mb-0"><?php echo dsi_get_meta("descrizione"); ?></p>
                    </div><!-- /title-content -->
                    <div class="card card-avatar card-comments">
                        <div class="card-body p-0">
                            <?php get_template_part("template-parts/autore/card"); ?>
                            <?php if(dsi_get_option("show_contatore_commenti", "setup") != "false") { ?>
                            <div class="comments ml-auto">
                                <p><?php echo $post->comment_count; ?></p>
                            </div><!-- /comments -->
                            </div>
		                    <?php } ?>                            
                        </div><!-- /card-body -->
                    </div><!-- /card card-avatar -->
                </div><!-- /col-md-6 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
