<?php
global $post, $tipologia_notizia, $ct, $servizio;
$notizie_show_circolari_panoramica = dsi_get_option("notizie_show_circolari_panoramica", "notizie");
$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>


<?php if($notizie_show_circolari_panoramica != "false") { ?>
<section class="section <?php echo $container_class; ?> py-5">
	<div class="container">
		<div class="title-section mb-5">
			<h2 class="h4"><?php _e("Le circolari", "design_scuole_italia"); ?></h2>
		</div><!-- /title-large -->
		<div class="it-carousel-wrapper carousel-notice it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide>
			<div class="splide__track">
				<ul class="splide__list">
					<?php
					$args = array('post_type' => 'circolare',
								'posts_per_page' => 9,
					);
					$posts = get_posts($args);
					foreach ($posts as $post){ ?>				
					<li class="splide__slide">
						<div class="it-single-slide-wrapper h-100">
							<?php get_template_part("template-parts/single/card", "vertical-thumb-circolare"); ?>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div><!-- /carousel-large -->
		<div class="pt-3 text-center">
			<a class="text-underline" href="<?php echo get_post_type_archive_link("circolare"); ?>"><strong>Vedi tutti</strong></a>
		</div>
	</div><!-- /container -->
</section><!-- /section -->
<?php } ?>
