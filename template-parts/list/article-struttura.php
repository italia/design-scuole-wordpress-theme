<?php
global $post;

$image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);


$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);

// $argomenti = dsi_get_tipologia_struttura_of_post($post);

?>
<a class="presentation-card-link" href="<?php the_permalink(); ?>">
    <article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand" >
        <div class="card-body">
                <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>
                    <?php if(!$image_url){ ?>
                        <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
                    <?php } ?>
                </div>
                <div class="card-article-content">
                    <h2 class="h3"><?php the_title(); ?></h2>
                    <p><?php echo $excerpt; ?></p>
                    <?php /* if(is_array($argomenti) && count($argomenti)) { ?>
                        <div class="badges">
                            <?php foreach ( $argomenti as $item ) { ?>
                                <a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>"
                                   class="badge badge-sm badge-pill badge-outline-<?php echo $class; ?>"><?php echo $item->name; ?></a>
                            <?php } ?>
                        </div><!-- /badges -->
                    <?php } */ ?>
                </div><!-- /card-avatar-content -->
        </div><!-- /card-body -->
    </article><!-- /card card-bg card-article -->
</a>
