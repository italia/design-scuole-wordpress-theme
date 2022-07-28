<?php
global $post, $tipologia_notizia, $ct, $servizio;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

<section class="section py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
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
					<div class="col-3">
						<div class="it-single-slide-wrapper h-100">
						<?php get_template_part("template-parts/single/card", "vertical-thumb"); ?>
						</div>
					</div>
					<?php } ?>
				
			</div>
		</div><!-- /carousel-large -->
        <?php if($tipologia_notizia){ ?>
		<div class="pt-3 text-center d-none">
			<a class="text-underline" href="<?php echo get_term_link($tipologia_notizia); ?>"><strong>Vedi tutti</strong></a>
		</div>
        <?php } ?>
	</div><!-- /container -->
</section><!-- /section -->