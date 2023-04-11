<?php
global $post, $tipologia_notizia, $ct, $servizio;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

<section class="section <?php echo $container_class; ?> py-5">
	<div class="container">
		<div class="title-section mb-5">
			<h2 class="h4"><?php _e("Circolari", "design_scuole_italia"); ?></h2>
		</div><!-- /title-large -->
		
		<div class="pt-3 text-center">
			<a class="text-underline" href="<?php echo get_post_type_archive_link("circolare"); ?>"><strong>Vedi tutti</strong></a>
		</div>
	</div><!-- /container -->
</section><!-- /section -->
