<?php
/* Template Name: Notizie
 *
 * notizie template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $tipologia_notizia, $ct;
get_header();

?>
		<?php get_template_part("martini-template-parts/hero/hero_title"); ?>
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

	<main id="main-container" class="main-container greendark">
		<div class="container">
			<div class="header-utils-sticky">
			</div><!-- /article-filter -->
			<div class="container">
				<div class="variable-gutters sticky-sidebar-container pt-lg-5 pt-4 mx-3 mx-lg-0">
					<div>
					<?php get_template_part("template-parts/search/search-form"); ?>
					<?php get_template_part("template-parts/search/filters", "articolo"); ?>
					</div>
				</div>
			</div><!-- /container -->
			<div class="row col-12" id="news">
		<?php
			$tipologie_notizie = dsi_get_option("tipologie_notizie", "notizie");
		while ( have_posts() ) :
			the_post();

			// get_template_part("template-parts/hero/notizie");

			$ct=1;
			if(is_array($tipologie_notizie) && count($tipologie_notizie)){
				echo 'Novità';
				foreach ( $tipologie_notizie as $id_tipologia_notizia ) {
					$tipologia_notizia = get_term_by("id", $id_tipologia_notizia, "tipologia-articolo");
					get_template_part("template-parts/home/notizie", "tipologie");
					$ct++;
				}

			}

			
			
		endwhile; // End of the loop.
		?>
			</div>
			<?php
			// get_template_part("template-parts/home/notizie", "circolari");
			$ct++;
			get_template_part("template-parts/home/notizie", "tipologie");
			// get_template_part("template-parts/home/eventi");
			?>
			<div class="container-news col-12 row mb-lg-4">
        
			<?php
			$loop = new WP_Query( array( 
				'post_type'         => 'post', 
				'post_status'       => 'publish', 
				'orderby'           => 'count', 
				'order'             => 'DESC', 
				'posts_per_page'    => 9,)
			);

			while ($loop -> have_posts()) : $loop -> the_post(); 

			?>
			<div class="col-12 col-lg-4">
			
			<article class="card">

				<div class="card-img-top card-img position-relative">

				<a class="img-loop" href="<?php the_permalink();?>">

					<?php the_post_thumbnail("news-thumb");?>
					<div>
					</div>

				</a>

				<div class="position-absolute" id="card_article_badge"> 

					<?php get_template_part("template-parts/common/badges-argomenti"); ?>

				</div>

				</div>

				<div class="card-body">

				<p class="card-title primary"><?php echo mb_strimwidth(get_the_title(), 0, 22,'...');?></p>

				<a href="<?php the_permalink();?>" class="btn-mini-default"> 

					<button class="w-auto">Scopri</button>

				</a>

				</div>

			</article> <!--.card -->

			</div>

			<?php endwhile; ?>

			</div><!--.container-news -->
		</div>
		</div>
	</main>

<?php
get_footer();



