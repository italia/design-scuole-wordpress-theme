<?php
global $post;
$numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $post->ID);
$accesso_circolare = circolare_access($post->ID);
?>

<div class="card card-bg bg-white card-thumb-rounded col-lg-4">
	<div class="card-body">
		<div class="card-content">
		<?php if($accesso_circolare != "false") { ?>
			<h3 class="h5" style="font-weight: 600"><a href="<?php echo get_permalink($post); ?>" aria-label="<?php echo $post->$post_title ?>"><?php echo get_the_title($post); ?></a></h3>
            <small class="h6 text-greendark"><?php _e("Circolare ", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
			<p><?php echo $post->_dsi_circolare_descrizione; ?></p>
		<?php } else { ?>
				<div class="card-article-content">
				<p class="font-weight-bold pl-2">Il contenuto della circolare n. <?php echo$numerazione_circolare?> (<?php echo date_i18n("j F Y", strtotime($post->post_date)); ?>) è riservato.</p>
				</div>
		<?php } ?>
		</div>
	</div><!-- /card-body -->
</div><!-- /card -->
<?php
