<?php
global $post, $autore, $set_card_top_margin, $set_card_wrapper;
$autore = get_user_by("ID", $post->post_author);

$image_id= get_post_thumbnail_id($post);
$image_url = get_the_post_thumbnail_url($post, "vertical-card");
$show_contatore_commenti = dsi_get_option("show_contatore_commenti", "setup");


?><div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded <?php echo $set_card_wrapper ? "card-wrapper" : ""; ?> <?php echo $set_card_top_margin ? "mt-2" : ""; ?>">
	<div class="card-body">
		<div class="card-content flex-grow-1">
			<h3 class="h5"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h3>

<?php
        if($post->post_type == "post") {
	        ?>
            <p><?php echo $post->_dsi_articolo_descrizione; ?></p>
            <?php
        } else if($post->post_type == "circolare") {
	        ?>
            <p><?php echo $post->_dsi_circolare_descrizione; ?></p>
            <?php
        } else {                        
            ?>
            <p><?php echo get_the_excerpt($post); ?></p>
	        <?php
        }
            ?>
		</div>
		<?php if($image_url) { ?>
			<div class="card-thumb">
            	<?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
			</div>
		<?php  } ?>
	</div><!-- /card-body -->
	<div class="card-comments-wrapper">
		<?php get_template_part("template-parts/autore/card"); ?>
        <?php
        if($post->post_type == "post" && $show_contatore_commenti != "false") {
	        ?>
            <div class="comments">
                <p><?php echo $post->comment_count; ?></p>
            </div><!-- /comments -->
	        <?php
        }
            ?>
	</div><!-- /card-comments-wrapper -->
</div><!-- /card --><?php
