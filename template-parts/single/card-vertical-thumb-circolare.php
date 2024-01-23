<?php
global $post, $autore, $set_card_top_margin, $set_card_wrapper;
$autore = get_user_by("ID", $post->post_author);

$image_id= get_post_thumbnail_id($post);
$image_url = get_the_post_thumbnail_url($post, "vertical-card");

$numerazione_circolare = dsi_get_meta("numerazione_circolare");
$is_pubblica = dsi_get_meta("is_pubblica");
$accesso_circolare = circolare_access($post->ID);


?><div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded <?php echo $set_card_wrapper ? "card-wrapper" : ""; ?> <?php echo $set_card_top_margin ? "mt-2" : ""; ?>">
	<div class="card-body">
	<?php if($accesso_circolare != "false") { ?>
		<div class="card-content">
		<h3 class="h5"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h3>
		<small class="h6 text-greendark"><?php _e("Circolare ", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
		<p><?php echo $post->_dsi_circolare_descrizione; ?></p>
		</div>
		<?php if($image_url) { ?>
			<div class="card-thumb">
            	<?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
			</div>
		<?php  } ?>
	<?php  } else { ?>
		<div class="card-content">
			<div class="card-article-content">
			<p class="font-weight-bold pl-2">Il contenuto della circolare numero <?php echo$numerazione_circolare?> è riservato.</p>
			</div>
		</div>
	<?php  } ?>
	
	</div><!-- /card-body -->
</div><!-- /card --><?php
		
