<?php
global $post, $tipologia_notizia, $ct, $servizio;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

<section class="section <?php echo $container_class; ?> py-5">
	<div class="container">
		<div class="title-section mb-5">
			<h2 class="h4"><?php if($tipologia_notizia)echo $tipologia_notizia->name; ?></h2>
		</div><!-- /title-large -->
		<div class="it-carousel-wrapper carousel-notice it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide>
			<div class="splide__track">
				<ul class="splide__list">
					<?php
					$args = array('post_type' => 'post',
									'posts_per_page' => 9,
									'tax_query' => array(
										array(
											'taxonomy' => 'tipologia-articolo',
											'field' => 'term_id',
											'terms' => $tipologia_notizia->term_id,
										),
									),
					);
					$posts = get_posts($args);
					foreach ($posts as $post){ ?>
					<li class="splide__slide">
								<div class="it-single-slide-wrapper">
								<?php get_template_part("template-parts/single/card", "vertical-thumb"); ?>
								</div>
							</li>
					<?php } ?>
				</ul>
			</div>
		</div><!-- /carousel-large -->
        <?php if($tipologia_notizia){ ?>
		<div class="pt-3 text-center">
			<a class="text-underline" href="<?php echo get_term_link($tipologia_notizia); ?>"><strong>Vedi tutti</strong></a>
		</div>
        <?php } ?>
	</div><!-- /container -->
</section><!-- /section -->