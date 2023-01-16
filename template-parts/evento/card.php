<?php
global $post;
$autore = get_user_by("ID", $post->post_author);

$image_url = get_the_post_thumbnail_url($post, "vertical-card");

?>
<div class="card card-bg card-event bg-white card-thumb-rounded">
	<div class="card-body">
		<div class="card-content">
			<h3 class="h5"><a href="<?php echo get_permalink($post);     ?>"><?php echo get_the_title($post); ?></a></h3>
			<p><?php echo dsi_get_meta("descrizione", "", $post->ID) ?  dsi_get_meta("descrizione", "", $post->ID) :  get_the_excerpt($post); ?></p>
		</div>
	</div><!-- /card-body -->
	<div class="card-event-dates">
		<div class="card-event-dates-icon">
			<svg class="icon svg-calendar"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-calendar"></use></svg>
		</div><!-- /card-event-dates-icon -->
		<div class="card-event-dates-content">
			<p class="font-weight-normal"><?php echo dsi_get_date_evento($post); ?></p>
		</div><!-- /card-event-dates-content -->
	</div><!-- /card-event-dates -->
</div><!-- /card -->
