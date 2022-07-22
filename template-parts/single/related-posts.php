<?php
/**
 * Box correlati per tassonomia argomento
 */
global $post, $args, $posts_array;
$argomenti = dsi_get_argomenti_of_post();
if(is_array($argomenti) && count($argomenti)) {
	// estraggo gli id
	$arr_ids = array();
	foreach ( $argomenti as $item ) {
		$arr_ids[] = $item->term_id;
	}
	// recupero articoli, eventi e circolari collegati agli argomenti del post
    $posts_array = get_posts(
        array(
            'posts_per_page' => 6,
            'post_type'      => $args,
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
}