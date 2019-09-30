<?php
global $post;
$autore = get_user_by("ID", $post->post_author);

$image_url = get_the_post_thumbnail_url($post, "vertical-card");

?>
<div class="card card-bg bg-white card-thumb-rounded">
    <div class="card-body">
		<?php get_template_part("template-parts/common/badges-argomenti", "notitle"); ?>
        <h4 class="h5"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h4>
        <p><?php echo get_the_excerpt($post); ?></p>
    </div><!-- /card-body -->
</div>
