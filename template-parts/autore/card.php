<?php
global $autore;
?>
<div class="card-avatar-img">
    <img src="<?php echo dsi_get_user_avatar($autore); ?>" alt="<?php echo esc_attr(dsi_get_display_name( $autore->ID )); ?>">
</div><!-- /card-avatar-img -->
<div class="card-avatar-content">
    <p class="font-weight-normal">da <strong class="text-underline"><u><?php echo dsi_get_display_name( $autore->ID ); ?></u></strong></p>
	<small><?php echo dsi_get_user_role($autore); ?></small>
</div><!-- /card-avatar-content -->
