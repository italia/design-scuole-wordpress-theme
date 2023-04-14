<?php
/**
 * Nav Menu API: Header_Walker_Nav_Menu class
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 4.6.0
 */

/**
 * Custom class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */

class Header_Menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li>";
		$custom_data = '';

		if ( stripos( $item->title, 'personale scolastico' ) !== false || stripos( $item->title, 'famiglie e studenti' ) !== false ) {
			$custom_data = 'data-element="service-type"';
		}
		if ( stripos( $item->title, 'i luoghi' ) !== false ) {
			$custom_data = 'data-element="school-locations"';
		}

		if($custom_data) {
			if ($item->url) {
				$output .= '<a class="list-item" href="' . $item->url . '" '.$custom_data.'>';
			} else {
				$output .= '<a class="list-item" href="#" '.$custom_data.'>';
			}
		} else {
			if ($item->url) {
				$output .= '<a class="list-item" href="' . $item->url . '">';
			} else {
				$output .= '<a class="list-item" href="#">';
			}
		}
 
		$output .= $item->title;
        
        $output .= '</a>';
	}
}
