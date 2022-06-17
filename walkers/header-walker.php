
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
		$output .= "<li role='menuitem'>";
		$custom_data = '';

		if ($item->post_name == "servizi-per-il-personale-scolastico" || $item->post_name == "servizi-per-famiglie-e-studenti") {
			$custom_data = 'data-crawler="service-type"';
		}

		if($custom_data) {
			if ($item->url) {
				$output .= '<a class="'. $args->menu_class .' " href="' . $item->url . '" aria-label="Vai alla pagina ' . $item->title . '" '.$custom_data.'>';
			} else {
				$output .= '<a class="'. $args->menu_class .' " href="#" '.$custom_data.'>';
			}
		} else {
			if ($item->url) {
				$output .= '<a class="'. $args->menu_class .' " href="' . $item->url . '" aria-label="Vai alla pagina ' . $item->title . '">';
			} else {
				$output .= '<a class="'. $args->menu_class .' " href="#">';
			}
		}
 
		$output .= $item->title;
        
        $output .= '</a>';

		$output .= "</li>";
	}
}