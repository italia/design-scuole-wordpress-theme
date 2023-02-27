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

<main id="main-container-orario-docenti" class="main-container">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>
	<section class="container mt-5 mb-5">
		<div class="row">
			<div class="col-12">
				<h1 class="primary"><?php echo $term->name ?></h1>
				<div class="col-6 mt-4 d-none">
					<input type="text" name="orario professori" id="search-input-orario" class="form-control" placeholder="Cerca l'orario dei docenti" data-element="search-modal-input" aria-describedby="search-form" value="" data-focus-mouse="false" type="text">
					<?php get_search_form(); ?>
				</div>
				<div class="col-12">
					<!-- <div class="col-6 mt-4 min-h"> -->
					<input type="search" id="myInput" onkeyup="filtro_Docenti(!true)" placeholder="Cerca orario docenti" autocomplete="off">
					<!-- <ul id="myUL" class="row-cols-4 row"> -->
					<ul id="myUL" class="">
						<?php
						// console_log($term->term_id);
						// echo 'tests';
						wp_reset_query();
						$loop = new WP_Query(array(
							'post_type' => "orario",
							// 'post_status' => "publish",
							'post_per_page' => '-1',
							'nopaging' => !false,
							// 'orderby' => "title",
							// 'order' => "ASC",
							// 'cat' => $term->term_id
							'tax_query' => array(
								array(
									'taxonomy' => 'orari',
									'field' => 'term_id',
									'terms' => array($term->term_id),
								)
							),
						));
						if ($loop->have_posts()) {
							while ($loop->have_posts()) : $loop->the_post();
								console_log(get_the_title());
						?>
								<li><a href="#orario-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></li>
						<?php
							endwhile;
							// }
						} else {
							get_template_part('template-parts/content', 'none');
						}
						?>
					</ul>
				</div>
				<div class="col-12 contenitore-img">
					<span id="ancoraggio"></span>
					<?php
					if ($loop->have_posts()) {
						while ($loop->have_posts()) : $loop->the_post();
							$file = get_post_meta(get_the_ID(), 'orari_img_url', true);
					?>
							<img id="orario-<?php echo get_the_ID(); ?>" src="<?php echo $file; ?>" alt="<?php the_title(); ?>" loading="lazy">
					<?php
						endwhile;
					}
					?>
				</div>
			</div>
			<div class="col-lg-2 col-6 mt-4">
				<?php
				$post = get_page_by_path('orario-classi');
				?>
				<a class="btn-md-default-outline" href="/didattica/orario-classi/">
					<button>
						Orario Classi
					</button>
				</a>
			</div>
		</div>
	</section>
	<script>
		function filtro_Docenti({
			doHighlight
		}) {
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
	</script>
</main>

<?php get_footer(); ?>