<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
$term = get_queried_object();
?>

<main id="main-container-libro" class="main-container">
    <?php get_template_part("template-parts/common/breadcrumb", null, ORARI_POST_TYPE); ?>
	<section class="container mt-5 mb-5">
		<div class="row">
			<div class="col-12">
				<h1 class="primary"><?php echo $term->name ?></h1>
				<div class="col-12">
					<input type="search" id="myInput" onkeyup="filtro_libro()" placeholder="Cerca libro" autocomplete="off">
					<ul id="myUL" class="">
						<?php
						// console_log($term->term_id);
						// echo 'test';
						wp_reset_query();
						$loop = new WP_Query(array(
							'post_type' => ORARI_POST_TYPE,
							// 'post_status' => "publish",
							'post_per_page' => '-1',
							'nopaging' => !false,
							// 'orderby' => "title",
							// 'order' => "ASC",
							// 'cat' => $term->term_id
							'tax_query' => array(
								array(
									'taxonomy' => ORARI_TAXONOMY,
									'field' => 'term_id',
									'terms' => array($term->term_id),
								)
							),
						));
						if ($loop->have_posts()) {
							while ($loop->have_posts()) : $loop->the_post();
								// console_log(get_the_title());
						?>
								<li><a href="#libro-<?php echo urlencode(get_the_title()).'-'.get_the_ID(); ?>"><?php the_title(); ?></a></li>
						<?php
							endwhile;
						} else {
							get_template_part('template-parts/content', 'none');
						}
						?>
					</ul>
				</div>
				<div class="col-12 contenitore-img">
					<?php
					if ($loop->have_posts()) {
						while ($loop->have_posts()) : $loop->the_post();
							$file = get_post_meta(get_the_ID(), 'orari_img_url', true);
							$size = get_post_meta(get_the_ID(), 'orari_img_size', true);
					?>
						<div class="img" id="libro-<?php echo urlencode(get_the_title()).'-'.get_the_ID(); ?>">
							<h2 class="h3"><?php the_title(); ?></h2>
							<p class="wysiwig-text"><?php the_content(); ?></p>
							<div class="img-wrapper">
								<img src="<?php echo $file; ?>" <?php echo $size; ?> alt="<?php the_title(); ?>" loading="lazy">
							</div>
						</div>
					<?php
						endwhile;
					}
					?>
				</div>
			</div>
			<?php
			// $post = get_page_by_path('libro-classi');
			?>
			<!-- <div class="col-lg-2 col-6 mt-4">
				<a class="btn-md-default-outline" href="/didattica/libro-classi/">
					<button>
						Orario Classi
					</button>
				</a>
			</div> -->
		</div>
	</section>
	<script>
		function filtro_libro() {
			// Declare variables
			var input, filter, ul, li, a, i, re, txtValue;
			input = document.getElementById('myInput');
			filter = input.value.toUpperCase();
			ul = document.getElementById("myUL");
			li = ul.getElementsByTagName('li');
			re = new RegExp(filter, 'gi');

			let text = filter;
			// Loop through all list items, and hide those who don't match the search query
			for (i = 0; i < li.length; i++) {
				a = li[i].getElementsByTagName("a")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li[i].style.display = "";
					// if (!doHighlight) continue;
					text = a.innerHTML.replace(/(<mark class="highlight">|<\/mark>)/gim, '')
					a.innerHTML = filter.length ?
						text.replace(re, '<mark class="highlight">$&</mark>') :
						text;
				} else {
					li[i].style.display = "none";
				}
			}
		}
		document.addEventListener('DOMContentLoaded', ()=>{
			const maxLength = 2+Math.max(...[...document.querySelectorAll('ul#myUL li a')].map(a=>a.innerText.split(' ').map(s=>s.length)).flat());
			document.getElementById("myUL").style.setProperty('--char-length', maxLength+'ch');
		})
	</script>
</main>

<?php get_footer(); ?>