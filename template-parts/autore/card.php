<?php
global $autore;
?>
<div class="card-avatar-img">
	<img src="<?php echo dsi_get_user_avatar($autore); ?>">
</div><!-- /card-avatar-img -->
<div class="card-avatar-content">
	<p class="font-weight-normal">da <strong class="text-underline"><u><?php echo $autore->display_name; ?></u></strong></p>
	<small><?php echo dsi_get_user_role($autore); ?></small>
</div><!-- /card-avatar-content -->
