<?php
global $post, $set_card_top_margin, $set_card_wrapper;
$autore = get_user_by("ID", $post->post_author);

$image_url = get_the_post_thumbnail_url($post, "vertical-card");

$timestamp_inizio = dsi_get_meta("timestamp_inizio", "_dsi_evento_", $post->ID);
$dataora_inizio = date_i18n("Y-m-d H:i", $timestamp_inizio); 

$timestamp_fine= dsi_get_meta("timestamp_fine", "_dsi_evento_", $post->ID);
$dataora_fine = date_i18n("Y-m-d H:i", $timestamp_fine); 

$dataora_adesso = date_i18n("Y-m-d H:i", time()); 

$in_corso = false;

if($dataora_inizio <= $dataora_adesso && $dataora_adesso <= $dataora_fine)
	$in_corso = true;

?><div class="card card-bg card-event card-vertical-thumb bg-white card-thumb-rounded <?php echo $set_card_wrapper ? "card-wrapper" : ""; ?> <?php echo $in_corso ? "border border-success" : ""; ?> <?php echo $set_card_top_margin ? "mt-2" : ""; ?>">
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
            <?php if($in_corso) { ?><p class="font-weight-bold text-greendark">In svolgimento</p><?php }?>
			<p class="font-weight-normal"><?php echo dsi_get_date_evento($post); ?></p>
		</div><!-- /card-event-dates-content -->
	</div><!-- /card-event-dates -->
</div><!-- /card --><?php
		
