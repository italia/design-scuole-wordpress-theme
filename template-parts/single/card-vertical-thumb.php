<?php
global $post, $autore;
$autore = get_user_by("ID", $post->post_author);

$image_url = get_the_post_thumbnail_url($post, "vertical-card");

?>
	<div class="p-0 mb-4 card-body row" id="card_news">
		<?php if($image_url) { ?>
			<div class="card-thumb col-3 p-0">
                <img src="<?php echo $image_url; ?>" alt="" class="rounded w-100">
			</div>
		<?php  } ?>
		<div class="card-content p-0 pl-3 col-8">
			<h3 class="h6"><a href="<?php echo get_permalink($post); ?>" aria-label="Apre <?php echo get_the_title($post); ?>"><?php echo get_the_title($post); ?></a></h3>
			<p><?php echo get_the_excerpt($post); ?></p>
		</div>
	</div><!-- /card-body -->
<?php
