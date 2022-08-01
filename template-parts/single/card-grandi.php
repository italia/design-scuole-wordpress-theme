<?php
global $post, $autore;
$autore = get_user_by("ID", $post->post_author);

$image_url = get_the_post_thumbnail_url($post, "vertical-card");

?><div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
	<div class="card-body row" id="card_news">
		<?php if($image_url) { ?>
			<div class="card-thumb col-12">
                <img src="<?php echo $image_url; ?>" alt="">
			</div>
		<?php  } ?>
		<div class="card-content col-12">
			<h3 class="h6"><a href="<?php echo get_permalink($post); ?>" aria-label="Apre <?php echo get_the_title($post); ?>"><?php echo get_the_title($post); ?></a></h3>
			<p><?php echo get_the_excerpt($post); ?></p>
            <a href="">Approfondisci</a>
		</div>
	</div><!-- /card-body -->
</div><!-- /card --><?php
