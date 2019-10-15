<?php
global $post;

$image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);


$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);

$argomenti = dsi_get_argomenti_of_post();
$numerazione_circolare =  dsi_get_meta("numerazione_circolare", "", $post->ID);


?>
    <article class="card card-bg card-article card-article-<?php echo $class; ?>">
        <div class="card-body">
            <a href="<?php the_permalink(); ?>">
                <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>

                    <div class="date">
                        <span class="year"><?php echo date_i18n("Y", strtotime($post->post_date)); ?></span>
                        <span class="day"><?php echo date_i18n("d", strtotime($post->post_date)); ?></span>
                        <span class="month"><?php echo date_i18n("M", strtotime($post->post_date)); ?></span>
                    </div>

                    <?php if(!$image_url){ ?>
                        <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
                    <?php } ?>

                </div>
                <div class="card-article-content">
                    <small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo $excerpt; ?></p>
                    <?php if(count($argomenti)) { ?>
                        <div class="badges">
                            <?php foreach ( $argomenti as $item ) { ?>
                                <a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>"
                                   class="badge badge-sm badge-pill badge-outline-<?php echo $class; ?>"><?php echo $item->name; ?></a>
                            <?php } ?>
                        </div><!-- /badges -->
                    <?php } ?>
                </div><!-- /card-avatar-content -->
            </a>
        </div><!-- /card-body -->
    </article><!-- /card card-bg card-article -->