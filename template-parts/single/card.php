<?php
global $post;
?>
<div class="card card-bg bg-white card-thumb-rounded">
	<div class="card-body">
		<div class="card-content">
			<h3 class="h5" style="font-weight: 600"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h3>
      <p><?php echo dsi_get_meta("descrizione", "", $post->ID) ?  dsi_get_meta("descrizione", "", $post->ID) :  get_the_excerpt($post); ?></p>
		</div>
	</div><!-- /card-body -->
</div><!-- /card -->
