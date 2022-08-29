<?php
global $post;

$image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);


$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);

// $argomenti = dsi_get_argomenti_of_post();

?>

<div class="col-12 col-lg-3">
<article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand p-0" >
    <div class="card-body row p-0">
    <div class="card-thumb col-12 p-0">
                <img src="<?php echo $image_url; ?>" alt="" class="col-12 p-0">
				<div id="card_article_badge">
                <?php get_template_part("template-parts/common/ badges-argomenti"); ?>
				</div>
			</div>
        <div class="card-article-content col-12">
            <h2 class="h3"><a href="<?php echo get_permalink($post); ?>" aria-label="Apre <?php echo get_the_title($post); ?>"><?php echo get_the_title($post); ?></a></h2>
            <p><?php echo $excerpt; ?></p>
            <a href="<?php echo get_permalink($post); ?>"aria-label="Apre" class="btn btn-primary">Approfondisci</a>
            <?php if(count($argomenti)) { ?>
                    <div class="badges">
                        <?php foreach ( $argomenti as $item ) { ?>
                            <a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>"
                               class="badge badge-sm badge-pill badge-outline-<?php echo $class; ?>"><?php echo $item->name; ?></a>
                        <?php } ?>
                    </div><!-- /badges -->
                <?php } ?>
        </div><!-- /card-avatar-content -->
    </div><!-- /card-body -->
</article><!-- /card card-bg card-article -->
</div>