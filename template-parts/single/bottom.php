<?php
global $post, $licenza, $nascondi_licenza;
?>
<div id="article_data" class="text-black">
    <h5 data-element="metadata"><em><?php _e("", "design_scuole_italia"); ?> <?php
		$date_publish = new DateTime($post->post_date);
		echo $date_publish->format('d.m.Y')
		?></em></h5>
    
</div><!-- /article-footer -->

