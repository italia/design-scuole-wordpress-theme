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
			$output .= '<a class="text-underline-hover" href="' . $item->url . '" aria-label="Vai alla pagina ' . $item->title . '" '.$custom_data.'>';
		} else {
			$output .= '<a class="text-underline-hover" href="#" aria-label="Vai alla pagina ' . $item->title . '" '.$custom_data.'>';
		}
 
		$output .= $item->title;
        
        $output .= '</a>';

		$output .= "</li>";
	}
}
class Footer_Privacy_Walker extends Walker_Nav_Menu {
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