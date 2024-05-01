<?php
global $post, $set_card_top_margin;

$image_id= get_post_thumbnail_id($post);
$image_url = get_the_post_thumbnail_url($post, "vertical-card");


?><div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded <?php echo $set_card_top_margin ? "mt-2" : ""; ?>">
	<div class="card-body">
    <?php if($image_url) { ?>
			<div class="card-thumb">
            	<?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
			</div>
		<?php  } ?>
		<div class="card-content flex-grow-1">
			<h3 class="h5" style="font-weight: 600"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h3>

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
		
	</div><!-- /card-body -->
</div><!-- /card --><?php
