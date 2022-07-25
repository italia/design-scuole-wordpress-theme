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

class Footer_Menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li>";

		$custom_data = '';
		if ($item->post_name == 'privacy-policy' || $item->post_name == 'dichiarazione-di-accessibilita') { 
			$custom_data = $item->post_name == 'privacy-policy' 
			? 'data-element="privacy-policy-link"' 
			: 'data-element="accessibility-link"';
		}
		if ($item->url) {
			$output .= '<a class="text-underline-hover" href="' . $item->url . '" '.$custom_data.'>';
		} else {
			$output .= '<a class="text-underline-hover" href="#" '.$custom_data.'>';
		}
 
		$output .= $item->title;
        
        $output .= '</a>';

		$output .= "</li>";
	}
}