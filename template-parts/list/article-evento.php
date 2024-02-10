<?php
global $post;


$image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);


$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);

// $argomenti = dsi_get_argomenti_of_post();
$timestamp_inizio = dsi_get_meta("timestamp_inizio", "_dsi_evento_", $post->ID);
$dataora_inizio = date_i18n("Y-m-d H:i", $timestamp_inizio); 

$timestamp_fine= dsi_get_meta("timestamp_fine", "_dsi_evento_", $post->ID);
$dataora_fine = date_i18n("Y-m-d H:i", $timestamp_fine); 

$dataora_adesso = date_i18n("Y-m-d H:i", time()); 

$in_corso = false;

if($dataora_inizio <= $dataora_adesso && $dataora_adesso <= $dataora_fine)
	$in_corso = true;
?> 
<a class="presentation-card-link" href="<?php the_permalink(); ?>">
    <article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand" role="region" aria-description="Card dell'articolo">
        <div class="card-body">
            <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?> aria-hidden=true>
                <div class="date" aria-hidden=true>
                    <span class="year" aria-hidden=true><?php echo date_i18n("Y", $timestamp_inizio); ?></span>
                    <span class="day" aria-hidden=true><?php echo date_i18n("d", $timestamp_inizio); ?></span>
                    <span class="month" aria-hidden=true><?php echo date_i18n("M", $timestamp_inizio); ?></span>
                </div>
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
		<div class="card-event-dates">
			<div class="card-event-dates-icon" aria-hidden=true>
				<svg class="icon svg-calendar"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-calendar"></use></svg>
			</div><!-- /card-event-dates-icon -->
			<div class="card-event-dates-content">
                <?php if($in_corso) { ?><p class="font-weight-bold text-greendark">In svolgimento</p><?php }?>
				<p class="font-weight-normal"><?php echo dsi_get_date_evento($post); ?></p>
			</div><!-- /card-event-dates-content -->
		</div><!-- /card-event-dates -->
    </article><!-- /card card-bg card-article -->
</a>
