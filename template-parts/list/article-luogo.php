<?php
global $post;
$image_url = false;
if(has_post_thumbnail($post))
    $image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);


$excerpt =  dsi_get_meta("descrizione_breve", "", $post->ID);

if(!$excerpt)
    $excerpt = get_the_excerpt($post);

// $argomenti = dsi_get_tipologia_luogo_of_post($post);


$posizione_gps = false;

	if ( $post->post_parent == 0 ) {
		$posizione_gps = dsi_get_meta( "posizione_gps", '_dsi_luogo_', $post->ID );
	} else {
		$parent        = get_post( $post->post_parent );
		$posizione_gps = dsi_get_meta( "posizione_gps", "_dsi_luogo_", $post->post_parent );
	}

	if($image_url)
	    $posizione_gps = false;
?>
<a class="presentation-card-link" href="<?php the_permalink(); ?>">
<article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand" >
	<div class="card-body">
		<div class="card-article-img"  <?php if($image_url && !$posizione_gps) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>
            <?php if($posizione_gps != false){ ?>

                    <div class="map-wrapper">
                        <div class="map" id="map_<?php echo $post->ID; ?>"></div>
                    </div>
            <?php } ?>
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
<?php if($posizione_gps != false){ ?>
    <script>
        jQuery(function() {
            var mymap = L.map('map_<?php echo $post->ID; ?>', {
                zoomControl: false,
                scrollWheelZoom: false
            }).setView([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>], 15);
            L.marker([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>]).addTo(mymap);

            // add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '',
                maxZoom: 18,
            }).addTo(mymap);
        });
    </script>
<?php }  ?>