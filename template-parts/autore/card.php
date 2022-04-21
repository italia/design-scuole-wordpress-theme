<?php
global $autore;
?>
<div class="card-avatar-img">
    <a href="<?php echo get_author_posts_url( $autore->ID);  ?>" aria-label="Apre la pagina di <?php echo esc_attr(dsi_get_display_name( $autore->ID )); ?>"><img src="<?php echo dsi_get_user_avatar($autore); ?>" alt="<?php echo esc_attr(dsi_get_display_name( $autore->ID )); ?>"></a>
</div><!-- /card-avatar-img -->
<div class="card-avatar-content">
    <p class="font-weight-normal">da <strong class="text-underline"><u><a href="<?php echo get_author_posts_url( $autore->ID);  ?>" aria-label="Apre la pagina di <?php echo esc_attr(dsi_get_display_name( $autore->ID )); ?>"><?php echo dsi_get_display_name( $autore->ID ); ?></a></u></strong></p>
	<small><?php echo dsi_get_user_role($autore); ?></small>
</div><!-- /card-avatar-content -->
