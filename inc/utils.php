<?php
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
if(!function_exists("dsi_get_option")) {
	function dsi_get_option( $key = '', $type = "dsi_options", $default = false ) {
		if ( function_exists( 'cmb2_get_option' ) ) {
			// Use cmb2_get_option as it passes through some key filters.
			return cmb2_get_option( $type, $key, $default );
		}

		// Fallback to get_option if CMB2 is not loaded yet.
		$opts = get_option( $type, $default );

		$val = $default;

		if ( 'all' == $key ) {
			$val = $opts;
		} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
			$val = $opts[ $key ];
		}

		return $val;
	}
}

/**
 * Wrapper function for get_post_meta
 * @param string $key
 * @return mixed meta_value
 */
if(!function_exists("dsi_get_meta")){
	function dsi_get_meta( $key = '', $prefix = "", $post_id = "") {

		if($post_id == "")
			$post_id = get_the_ID();

		if($prefix != "")
			return get_post_meta( $post_id, $prefix.$key, true );

		if(is_singular("servizio")){
			$prefix = '_dsi_servizio_';
			return get_post_meta( $post_id, $prefix.$key, true );
		}else if (is_singular("luogo")) {
			$prefix = '_dsi_luogo_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("struttura")) {
			$prefix = '_dsi_struttura_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("evento")) {
			$prefix = '_dsi_evento_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}

		return get_post_meta( $post_id, $key, true );
	}
}


/**
 * Wrapper function for user avatar
 * @param object user
 * @return string url
 */
if(!function_exists("dsi_get_user_avatar")){
	function dsi_get_user_avatar( $user = false, $size=250 ) {
		if(!$user && is_user_logged_in()){
			$user = wp_get_current_user();
		}

		$avatar = get_avatar_url( $user->ID, array("size" => $size) );

		$avatar = apply_filters("dsi_avatar_url", $avatar, $user);
		return $avatar;
	}
}



/**
 * Wrapper function for user role
 * @param object user
 * @return string role
 */
if(!function_exists("dsi_get_user_role")) {
	function dsi_get_user_role( $user = false ) {
		global $wp_roles;

		if ( ! $user && is_user_logged_in() ) {
			$user = wp_get_current_user();
		}

		$roles = array();
		if ( ! empty( $user->roles ) && is_array( $user->roles ) ) {
			foreach ( $user->roles as $role ) {
				$roles[] .= translate_user_role( $role);
			}
		}
		$role = implode( ', ', $roles );
		$role = apply_filters( "dsi_user_role", $role, $user );

		return $role;
	}
}



/**
 * Wrapper function for agomenti taxonomy list
 * @return array arguomenti
 */
if(!function_exists("dsi_get_argomenti_of_post")) {
	function dsi_get_argomenti_of_post( $singular = false ) {
		global $post;

		if ( ! $singular && is_singular() ) {
			$singular = $post;
		}

		$argomenti_terms = wp_get_object_terms( $singular->ID, 'category' );
		return $argomenti_terms;
	}
}


/**
 * Function to get mapbox access token
 * @return string accesstoken
 */
if(!function_exists("dsi_get_mapbox_access_token")) {
	function dsi_get_mapbox_access_token() {
		global $post;

		$accesstoken = dsi_get_option( "mapbox_key", "setup" );
		if ( trim( $accesstoken ) == "" ) {
			$accesstoken = DSI_ACCESSTOKEN_MAPBOX;
		}

		return $accesstoken;
	}
}

/**
 * Event date start/stop
 * @param $post
 *
 */
function dsi_get_date_evento($post){
	$prefix = '_dsi_evento_';
	$ret = "";
	$timestamp_inizio = dsi_get_meta("timestamp_inizio", $prefix, $post->ID);
	$timestamp_fine= dsi_get_meta("timestamp_fine", $prefix, $post->ID);
	if($timestamp_inizio >= $timestamp_fine){
		$ret .=  date_i18n("j F Y", $timestamp_inizio);
		$ret .= __(" alle ", "design_scuole_italia");
		$ret .=  date_i18n("h:i", $timestamp_inizio);
		return $ret;
	}

	$data_inizio = date_i18n("j F Y", $timestamp_inizio);
	$data_fine = date_i18n("j F Y", $timestamp_fine);
	$ora_inizio = date_i18n("h:i", $timestamp_inizio);
	$ora_fine = date_i18n("h:i", $timestamp_fine);
	if($data_inizio == $data_fine){
		$ret .= __("Il ", "design_scuole_italia");
		$ret .= $data_inizio;
		$ret .= __(" dalle ", "design_scuole_italia");
		$ret .= $ora_inizio;
		$ret .= __(" alle ", "design_scuole_italia");
		$ret .= $ora_fine;

	}else{
		$ret .= __("dal ", "design_scuole_italia");
		$ret .= $data_inizio;
		$ret .= __(" alle ", "design_scuole_italia");
		$ret .= $ora_inizio;
		$ret .= __(" al ", "design_scuole_italia");
		$ret .= $data_fine;
		$ret .= __(" alle ", "design_scuole_italia");
		$ret .= $ora_fine;
	}

	return $ret;

}

