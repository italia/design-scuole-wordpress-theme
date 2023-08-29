	<?php
    global $s_query;


	$argomenti_names = get_terms(array(
		'taxonomy' => 'post_tag',
		'orderby' => 'count',
		'order'   => 'DESC',
		'hide_empty'   => 1,
		'number' => "20",
    	'search' => $s_query
        )
	);

	$argomenti_description = get_terms(array(
		'taxonomy' => 'post_tag',
		'orderby' => 'count',
		'order'   => 'DESC',
		'hide_empty'   => 1,
		'number' => "20",
    	'description__like' => $s_query
        )
	);

	$argomenti = array_merge($argomenti_names, $argomenti_description);


	if(!empty($argomenti)) { ?>
	<div class="row variable-gutters mb-5">
		<div class="col-lg-12">
			<div class="badges-wrapper">
				<h3><?php _e("Potrebbero interessarti","design_scuole_italia"); ?></h3>
				<div class="badges">
					<?php
					foreach ($argomenti as $argomento){
						$taglink = get_tag_link($argomento);  ?>
						<a href="<?php echo $taglink; ?>" class="badge badge-sm badge-pill badge-outline-primary"><?php echo $argomento->name; ?></a>
					<?php } ?>
				</div><!-- /badges -->
			</div><!-- /badges-wrapper -->
		</div>
	</div>
	<?php } ?>