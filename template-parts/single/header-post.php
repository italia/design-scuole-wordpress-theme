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
    <?php 
        $attachment_id = get_post_thumbnail_id(); // Get the featured image ID
        $didascalia = wp_get_attachment_caption($attachment_id);
        $alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
    ?>
    <div class="title-img d-flex align-items-end" <?php if ($image_url) { ?>style="background-image: url('<?php echo $image_url; ?>');" <?php } ?><?php if ($alt_text) { ?> role="img" aria-label="<?php echo $alt_text ?>" <?php } ?>><?php if ($didascalia) { ?><div class="w-100 p-4 bg-black text-white"><?php echo $didascalia; ?></div><?php } ?></div>
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
