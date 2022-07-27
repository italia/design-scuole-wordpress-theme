<?php
global $autore;
?>
<div class="card-avatar-img">
	<a href="<?php echo get_author_posts_url( $autore->ID);  ?>"><img src="<?php echo dsi_get_user_avatar($autore); ?>" alt=""></a>
</div><!-- /card-avatar-img -->
<div class="card-avatar-content">
	<p class="font-weight-normal"><strong class="text-underline"><u><a href="<?php echo get_author_posts_url( $autore->ID);  ?>"><?php echo dsi_get_display_name($autore->ID); ?></a></u></strong></p>
</div><!-- /card-avatar-content -->
