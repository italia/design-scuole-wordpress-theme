<?php
global $post, $tipologia_notizia, $ct, $servizio;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

<section class="section py-5">

			<div class="">
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
					<div class="col-3">
						<div class="it-single-slide-wrapper h-100">
						<?php get_template_part("template-parts/single/card", "grandi"); ?>
						</div>
					</div>
					<?php } ?>
			</div>

</section><!-- /section -->