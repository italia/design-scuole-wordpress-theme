<?php
global $post;
$numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $post->ID);

?><div class="card card-bg bg-white card-thumb-rounded">
	<div class="card-body">
		<div class="card-content">
			<h3 class="h5"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h3>
            <small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
			<p><?php echo get_the_excerpt($post); ?></p>
		</div>
	</div><!-- /card-body -->
</div><!-- /card --><?php
