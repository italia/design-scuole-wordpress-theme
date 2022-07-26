<?php
/**
 * Box correlati per tassonomia argomento
 */
global $post;
$argomenti = dsi_get_argomenti_of_post();
if(is_array($argomenti) && count($argomenti)) {
	// estraggo gli id
	$arr_ids = array();
	foreach ( $argomenti as $item ) {
		$arr_ids[] = $item->term_id;
	}
	// recupero servizi, notizie e documenti collegati agli argomenti utente
	$servizi_array = get_posts(
		array(
			'posts_per_page' => 5,
			'post_type'      => 'servizio',
			'post__not_in'   => array( $post->ID ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'post_tag',
					'field'    => 'term_id',
					'terms'    => $arr_ids,
				)
			)
		)
	);

	$documenti_array = get_posts(
		array(
			'posts_per_page' => 5,
			'post_type'      => 'documento',
			'post__not_in'   => array( $post->ID ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'post_tag',
					'field'    => 'term_id',
					'terms'    => $arr_ids,
				)
			)
		)
	);

	$posts_array = get_posts(
		array(
			'posts_per_page' => 5,
			'post_type'      => 'post',
			'post__not_in'   => array( $post->ID ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'post_tag',
					'field'    => 'term_id',
					'terms'    => $arr_ids,
				)
			)
		)
	);


	if ((is_array($servizi_array) && count( $servizi_array )) || (is_array($documenti_array) && count( $documenti_array )) || (is_array($posts_array) && count( $posts_array )) ) {
		$contabox=0;
		if(is_array($servizi_array) && count( $servizi_array )) $contabox++;
		if(is_array($documenti_array) && count( $documenti_array )) $contabox++;
		if(is_array($posts_array) && count( $posts_array )) $contabox++;
		$colnum = 12/$contabox;
		?>
		<section class="section bg-gray-gradient py-5" id="art-par-correlati">
		<div class="container">

			<div class="row variable-gutters">
				<div class="col-lg-12">

					<h3 class="mb-4 text-center semi-bold text-gray-primary"><?php _e( "Altri contenuti che potrebbero interessarti", "design_scuole_italia" ); ?></h3>

					<div class="badges-wrapper text-center mt-0 mb-4">
						<small><strong><?php _e( "Contenuti filtrati per:", "design_scuole_italia" ); ?></strong>
						</small>
						<div class="badges mt-3">
							<?php
							foreach ( $argomenti as $item ) { ?>
								<a href="<?php echo get_term_link( $item ); ?>"
								   class="badge badge-sm badge-pill badge-outline-gray-primary" ><?php echo $item->name; ?></a>
							<?php } ?>
						</div><!-- /badges -->
					</div><!-- /badges-wrapper -->

					<div class="accordion-wrapper accordion-cards accordion-responsive">
						<div class="row variable-gutters">

							<?php if(is_array($servizi_array) && count($servizi_array)){ ?>
								<div class="col-xl-<?php echo $colnum; ?>">
									<div class="card card-bg h-100 rounded">
										<div class="card-body">
											<div class="card-header accordion-header">
												<svg class="icon icon-toggle svg-gear">
													<use xmlns:xlink="http://www.w3.org/1999/xlink"
													     xlink:href="#svg-gear"></use>
												</svg>
												<span><?php _e( "Servizi", "design_scuole_italia" ); ?></span>
											</div><!-- /accordion-header -->
											<div class="card-content accordion-content">
												<ul>
													<?php
													foreach ( $servizi_array as $item ) {
														echo '<li><a href="'.get_permalink($item).'">'.get_the_title($item).'</a></li>';
													}
													?>
												</ul>
											</div><!-- /accordion-content -->
										</div><!-- /card-body -->
									</div><!-- /card card-bg card-icon rounded -->
								</div><!-- /col-xl-<?php echo $colnum; ?> -->
							<?php } ?>

							<?php if(is_array($posts_array) && count($posts_array)){ ?>
								<div class="col-xl-<?php echo $colnum; ?>">
									<div class="card card-bg h-100 rounded">
										<div class="card-body">
											<div class="card-header accordion-header">
												<svg class="icon icon-toggle svg-news">
													<use xmlns:xlink="http://www.w3.org/1999/xlink"
													     xlink:href="#svg-news"></use>
												</svg>
												<span><?php _e( "Notizie", "design_scuole_italia" ); ?></span>
											</div><!-- /accordion-header -->
											<div class="card-content accordion-content">
												<ul>
													<?php
													foreach ( $posts_array as $item ) {
														echo '<li><a href="'.get_permalink($item).'">'.get_the_title($item).'</a></li>';
													}
													?>
												</ul>
											</div><!-- /accordion-content -->
										</div><!-- /card-body -->
									</div><!-- /card card-bg card-icon rounded -->
								</div><!-- /col-xl-<?php echo $colnum; ?> -->
							<?php } ?>

							<?php if(is_array($documenti_array) && count($documenti_array)){ ?>
								<div class="col-xl-<?php echo $colnum; ?>">

									<div class="card card-bg h-100 rounded">
										<div class="card-body">
											<div class="card-header accordion-header">
												<svg class="icon icon-toggle svg-documents">
													<use xmlns:xlink="http://www.w3.org/1999/xlink"
													     xlink:href="#svg-documents"></use>
												</svg>
												<span><?php _e( "Documenti", "design_scuole_italia" ); ?></span>
											</div><!-- /accordion-header -->
											<div class="card-content accordion-content">
												<ul>
													<?php
													foreach ( $documenti_array as $item ) {
														echo '<li><a href="'.get_permalink($item).'">'.get_the_title($item).'</a></li>';
													}
													?>
												</ul>
											</div><!-- /accordion-content -->
										</div><!-- /card-body -->
									</div><!-- /card card-bg card-icon rounded -->
								</div><!-- /col-xl-<?php echo $colnum; ?> -->
							<?php } ?>

						</div><!-- /row -->
					</div><!-- /accordion-wrapper -->

				</div><!-- /col-lg-12 -->
			</div><!-- /row -->
		</div><!-- /container -->
		</section><?php
	}
}