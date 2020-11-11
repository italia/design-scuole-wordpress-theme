<?php
global $post;

$image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);


$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
$anno_scolastico =  dsi_get_meta("anno_scolastico", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);

$argomenti = dsi_get_argomenti_of_post();

?>
<article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand" onclick="document.location.href='<?php the_permalink(); ?>';">
    <div class="card-body">
        <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>
            <?php if(!$image_url){ ?>
                <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
            <?php } ?>
        </div>
        <div class="card-article-content">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <?php
            // recupero l'anno scolastico di riferimento del progetto
            if($anno_scolastico){
                ?>
                <i><small><?php _e("Anno scolastico", "design_scuole_italia"); ?> <?php echo dsi_convert_anno_scuola($anno_scolastico) ?></small></i>
                <?php
            }
            ?>
            <p><?php echo $excerpt; ?></p>
        </div><!-- /card-avatar-content -->
    </div><!-- /card-body -->
</article><!-- /card card-bg card-article -->
