<?php

require "vendor/CMB2/init.php";
require "vendor/CMB2-conditional-logic/cmb2-conditional-logic.php";
require "vendor/CMB2-field-Leaflet-Geocoder/cmb-field-leaflet-map.php";
require "vendor/cmb2-attached-posts/cmb2-attached-posts-field.php";


function dsi_get_user_options( $query_args = false) {

	if(!$query_args)
		$query_args['fields'] = array( 'ID', 'user_login' );

	$users = get_users( $query_args );

	$user_options = array();
	if ( $users ) {
		foreach ( $users as $user ) {
			$user_options[ $user->ID ] = $user->user_login;
		}
	}

	return $user_options;
}

function dsi_get_program_options( $query_args = false) {

	$programs = get_posts("post_type=programma_materia&posts_per_page=-1");

	$options = array();
	if ( $programs ) {
		foreach ( $programs as $program ) {
			$options[ $program->ID ] = $program->post_title;
		}
	}

	return $options;
}



function dsi_get_classe_options( $query_args = false) {

	$classi = get_terms( array(
		'taxonomy' => 'classe',
		'hide_empty' => false,
	));

	$options = array();
	if ( $classi ) {
		foreach ( $classi as $classe ) {
			$options[ $classe->term_id ] = $classe->name;
		}
	}

	return $options;
}





// includo i singoli file di template di backend
foreach (glob(get_template_directory() ."/inc/admin/*.php") as $filename)
{
	require $filename;
}


//require "vendor/CMB2/example-functions.php";