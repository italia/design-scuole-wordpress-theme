<?php
global $autore;
$image_id = null;
$foto_url = get_the_author_meta('_dsi_persona_foto', $autore->ID);
if($foto_url)
	$image_id = attachment_url_to_postid($foto_url);
$image_url = dsi_get_user_avatar($autore);

$privacy_hidden = get_user_meta( $autore->ID, '_dsi_persona_privacy_hidden', true);

if($privacy_hidden == "false") {
?>
<div class="col-lg-4">
	<div class="card card-bg bg-white card-avatar rounded mb-3 card-persona">
		<div class="card-body">                     
			<div class="card-avatar-img">
				<?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
			</div><!-- /card-avatar-img -->
			<div class="card-avatar-content">
				<p class="font-weight-normal">
					<a href="<?php echo get_author_posts_url( $autore->ID); ?>" aria-label="vai alla pagina di <?php echo dsi_get_display_name( $autore->ID ); ?>">
						<strong class="text-underline"><u><?php echo dsi_get_display_name( $autore->ID ); ?></u></strong>
					</a>
				</p>
				<small><?php echo dsi_get_user_role($autore); ?></small>
			</div><!-- /card-avatar-content -->
		</div>
	</div>
</div>
<?php
} else {
?>
<div class="col-lg-4">
	<div class="card card-bg bg-white card-avatar rounded mb-3 card-persona">
		<div class="card-body">                     
			<div class="card-avatar-img">
				<?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
			</div><!-- /card-avatar-img -->
			<div class="card-avatar-content">
				<p class="font-weight-bold">
					Personale scolastico

				</p>
				<small><?php echo dsi_get_user_role($autore); ?></small>
			</div><!-- /card-avatar-content -->
		</div>
	</div>
</div>
<?php
}
?>
