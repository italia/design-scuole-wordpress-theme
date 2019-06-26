<?php
global $post;
$autore = get_user_by("ID", $post->post_author);

$image_url = get_the_post_thumbnail_url($post, "vertical-card");

?><div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
	<div class="card-body">
		<div class="card-content">
			<h4 class="h5"><a href="<?php echo get_permalink($post);     ?>"><?php echo get_the_title($post); ?></a></h4>
			<p><?php echo get_the_excerpt($post); ?></p>
		</div>
		<?php if($image_url) { ?>
			<div class="card-thumb">
				<img src="<?php echo $image_url; ?>">
			</div>
		<?php  } ?>
	</div><!-- /card-body -->
	<div class="card-comments-wrapper">
		<div class="card-avatar-img">
			<img src="<?php echo dsi_get_user_avatar($autore); ?>">
		</div><!-- /card-avatar-img -->
		<div class="card-avatar-content">
			<p class="font-weight-normal">da <strong class="text-underline"><u><?php echo $autore->display_name; ?></u></strong></p>
			<small><?php echo dsi_get_user_role($autore); ?></small>
		</div><!-- /card-avatar-content -->
		<div class="comments">
			<p><?php echo $post->comment_count; ?></p>
		</div><!-- /comments -->
	</div><!-- /card-comments-wrapper -->
</div><!-- /card --><?php
