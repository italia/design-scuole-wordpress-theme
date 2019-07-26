<?php

require "vendor/CMB2/init.php";
require "vendor/CMB2-conditional-logic/cmb2-conditional-logic.php";
require "vendor/CMB2-field-Leaflet-Geocoder/cmb-field-leaflet-map.php";
require "vendor/cmb2-attached-posts/cmb2-attached-posts-field.php";

add_filter( 'pw_cmb2_field_select2_asset_path', function ($var){return get_stylesheet_directory_uri()."/inc/vendor/cmb-field-select2-master";});
require "vendor/cmb-field-select2-master/cmb-field-select2.php";


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

	$programs = get_posts("post_type=programma_materia&posts_per_page=-1&orderby=title&order=ASC");

	$options = array();
	if ( $programs ) {
		foreach ( $programs as $program ) {
			$options[ $program->ID ] = $program->post_title;
		}
	}

	return $options;
}


function dsi_get_luoghi_options( $parent = false, $addnone=false) {
	if($parent)
		$luoghi = get_posts("post_type=luogo&posts_per_page=-1&orderby=title&order=ASC&post_parent=0");
	else
		$luoghi = get_posts("post_type=luogo&posts_per_page=-1&orderby=title&order=ASC");

	$options = array();
	if($addnone)
		$options[0]=__("No","design_scuole_italia");
	if ( $luoghi ) {
		foreach ( $luoghi as $luogo ) {
			$options[ $luogo->ID ] = $luogo->post_title;
		}
	}

	return $options;
}


function dsi_get_strutture_options( $query_args = false) {

	$programs = get_posts("post_type=struttura&posts_per_page=-1&orderby=title&order=ASC");

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