<?php
global $post, $tipologia_servizio, $ct, $servizio;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

<section class="section <?php echo $container_class; ?> py-5">
	<div class="container">
		<div class="title-section mb-5">
			<h2 class="h4"><?php _e("Percorsi di studio", "design_scuole_italia"); ?></h2>
		</div><!-- /title-large -->
		<div class="row variable-gutters">
			<?php
			$args = array('post_type' => 'indirizzo',
			              'posts_per_page' => 9,
			);
			$indirizzi = get_posts($args);
			foreach ($indirizzi as $servizio){ ?>
			<div class="col-lg-4 mb-4">
				<?php get_template_part("template-parts/servizio/card"); ?>
			</div>
			<?php } ?>

		</div><!-- /row -->
		<div class="pt-3 text-center">
			<a class="text-underline" href="<?php echo get_post_type_archive_link("indirizzo"); ?>"><strong><?php _e("Vedi tutti", "design_scuole_italia"); ?></strong></a>
		</div>
	</div><!-- /container -->
</section><!-- /section -->
