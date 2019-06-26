<?php

require "vendor/CMB2/init.php";
require "vendor/CMB2-conditional-logic/cmb2-conditional-logic.php";
require "vendor/CMB2-field-Leaflet-Geocoder/cmb-field-leaflet-map.php";
require "vendor/cmb2-attached-posts/cmb2-attached-posts-field.php";


function dsi_get_user_options( $query_args ) {

	$args = wp_parse_args( $query_args, array(

		'fields' => array( 'user_login' ),

	) );

	$users = get_users(  );

	$user_options = array();
	if ( $users ) {
		foreach ( $users as $user ) {
			$user_options[ $user->ID ] = $user->user_login;
		}
	}

	return $user_options;
}


// includo i singoli file di template di backend
foreach (glob(get_template_directory() ."/inc/admin/*.php") as $filename)
{
	require $filename;
}


//require "vendor/CMB2/example-functions.php";