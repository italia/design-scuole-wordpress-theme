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

class Mobile_Header_Menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li>";
		$custom_data = '';

		if ($item->post_name == "servizi-per-il-personale-scolastico" || $item->post_name == "servizi-per-famiglie-e-studenti") {
			$custom_data = 'data-element="service-type"';
		}

		if($custom_data) {
			if ($item->url) {
				$output .= '<a href="' . $item->url . '" '.$custom_data.'>';
			} else {
				$output .= '<a href="#" '.$custom_data.'>';
			}
		} else {
			if ($item->url) {
				$output .= '<a href="' . $item->url . '">';
			} else {
				$output .= '<ahref="#">';
			}
		}
 
		$output .= $item->title;
        
        $output .= '</a>';

		$output .= "</li>";
	}
}