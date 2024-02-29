<?php
global $post, $autore, $luogo, $c, $badgeclass;
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$file_documenti = dsi_get_meta("file_documenti");
$luoghi = dsi_get_meta("luoghi");
$persone = dsi_get_meta("persone");
$numerazione_circolare = dsi_get_meta("numerazione_circolare");

$image_id= get_post_thumbnail_id($post);
if(has_post_thumbnail($post))
    $image_url = get_the_post_thumbnail_url($post, "item-thumb");
else
    $image_url = get_template_directory_uri() ."/assets/placeholders/logo-service.png";

$autore = get_user_by("ID", $post->post_author);
?>
<section class="section bg-white py-2 py-lg-3 py-xl-5">
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-12 col-sm-3 col-lg-2 d-none d-sm-block">
                <div class="section-thumb mx-3">
                    <?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
                </div><!-- /section-thumb -->
            </div><!-- /col-lg-2 -->
            <div class="col-12 col-sm-9 col-lg-5 col-md-8">
                <small class="h6 text-greendark"><?php _e("Circolare ", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
                <div class="section-title">
                    <h1 class="h2"><?php the_title(); ?></h1>
                    <p><?php echo dsi_get_meta("descrizione"); ?></p>
                </div><!-- /title-section -->
            </div><!-- /col-lg-5 col-md-8 -->
            <div class="col-lg-3 col-md-4 offset-lg-1">
                <div class="card card-avatar card-comments mt-3">
                   <?php
                        $privacy_hidden = get_user_meta( $autore->ID, '_dsi_persona_privacy_hidden', true);
                        
                        if($privacy_hidden == "false") {
                            ?><a href="<?php echo get_author_posts_url( $autore->ID);  ?>"><?php
                        }
                        ?>
                        <div class="card-body p-0">
                            <?php get_template_part("template-parts/autore/card"); ?>
                        </div>
                        <?php
                        
                        if($privacy_hidden == "false") {
                            ?></a><?php
                        }
                   ?>
                </div>
            </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
        </div><!-- /row -->
    </div><!-- /container -->
</section>
