<?php
global $post, $autore;
$autore = get_user_by("ID", $post->post_author);

$image_url = get_the_post_thumbnail_url($post, "vertical-card");

?><div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
	<div class="row card-body" id="card_notizie">
		<?php if($image_url) { ?>
			<div class="card-thumb col-12" id="card_image">
                <img src="<?php echo $image_url; ?>" alt="">
				<div class="" id="badge_news">
				<?php get_template_part("template-parts/common/badges-argomenti"); ?>
				</div>
			</div>
		<?php  } ?>
		<div class="card-content col-12 py-4 px-4">
			<h3 class="h5"><a href="<?php echo get_permalink($post); ?>" aria-label="Apre <?php echo get_the_title($post); ?>"><?php echo get_the_title($post); ?></a></h3>
			<p class="pb-3"><?php echo get_the_excerpt($post); ?></p>
            <a href="<?php echo get_permalink($post); ?>"aria-label="Apre" class="btn btn-primary">Approfondisci</a>
		</div>
	</div><!-- /card-body -->
</div><!-- /card --><?php
