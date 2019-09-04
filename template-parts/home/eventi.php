<?php
global $post, $ct;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

<section class="section <?php echo $container_class; ?> py-5">
	<div class="container">
		<div class="title-section text-center mb-5">
			<h3 class="h4"><?php _e("Eventi", "design_scuole_italia"); ?></h3>
		</div><!-- /title-large -->
		<div class="owl-carousel carousel-theme carousel-large">
			<?php
			$args = array('post_type' => 'evento',
			              'posts_per_page' => 9
			);
			$posts = get_posts($args);
			foreach ($posts as $post){ ?>
				<div class="item">
					<?php get_template_part("template-parts/evento/card"); ?>
				</div>
			<?php } ?>

		</div><!-- /carousel-large -->
		<div class="pt-3 text-center">
			<a class="text-underline" href="<?php echo get_post_type_archive_link("evento"); ?>"><strong>Vedi tutti</strong></a>
		</div>
	</div><!-- /container -->
</section><!-- /section -->