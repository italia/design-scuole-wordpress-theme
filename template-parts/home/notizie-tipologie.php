<?php
global $post, $tipologia_notizia, $ct, $servizio;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

		<?php
		$args = array('post_type' => 'post',
						'posts_per_page' => 9,
						'tax_query' => array(
							array(
								'taxonomy' => 'tipologia-articolo', 'evento', 'dicono-di-noi',
								'field' => 'term_id',
								'terms' => $tipologia_notizia->term_id,
							),
						),
		);
		$posts = get_posts($args);
		foreach ($posts as $post){ ?>

			<div class="col-lg-3 col-md-6 col-12" id="card_grandi">
			<?php get_template_part("template-parts/single/card", "grandi"); ?>
			</div>

		<?php } ?>

