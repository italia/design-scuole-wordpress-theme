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
		if (!str_starts_with($item->post_name, 'privacy-policy')) return $output .= "";
		$output .= "<li>";

		$custom_data = 'data-element="privacy-policy-link"';
		// $title = $item->title;
		$title = 'Cookie Policy e Privacy Policy';
		$output .= '<a class="text-underline-hover" href="/privacy-policy" aria-label="Vai alla pagina ' 
			. $title . '" '.$custom_data.'>';
		$output .= $title;
        
        $output .= '</a>';

		$output .= "</li>";
	}
}