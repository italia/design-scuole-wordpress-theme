<?php
global $post, $tipologia_notizia, $ct, $servizio;

$container_class = "bg-white";
if($ct%2)
	$container_class = "bg-gray-light";

?>

<section class="section <?php echo $container_class; ?> py-5">
	<div class="container">
		<div class="title-section text-center mb-5">
			<h3 class="h4"><?php if($tipologia_notizia)echo $tipologia_notizia->name; ?></h3>
		</div><!-- /title-large -->
        <div class="owl-carousel carousel-theme carousel-large">
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
            <div class="item">
				<?php get_template_part("template-parts/single/card", "vertical-thumb"); ?>
			</div>
			<?php } ?>

		</div><!-- /carousel-large -->
        <?php if($tipologia_notizia){ ?>
		<div class="pt-3 text-center">
			<a class="text-underline" href="<?php echo get_term_link($tipologia_notizia); ?>"><strong>Vedi tutti</strong></a>
		</div>
        <?php } ?>
	</div><!-- /container -->
</section><!-- /section -->