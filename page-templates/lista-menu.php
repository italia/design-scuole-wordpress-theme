<?php
/* Template Name: Lista Link
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $tipologia_notizia, $ct;
get_header();
?>

<?php get_template_part("martini-template-parts/hero/hero_title"); ?>
<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>
    <!-- loop per le pagine -->
    <div class="container mb-5 martini-list">
        <?php

        function get_menu_items_by_registered_slug($menu_slug)
        {
            $menu_items = array();
            if (($locations = get_nav_menu_locations()) && isset($locations[$menu_slug])) {
                $menu = get_term($locations[$menu_slug]);
                $menu_items = wp_get_nav_menu_items($menu->term_id);
            }
            return $menu_items;
        }
        $show_menus = [];
        $menus = get_menu_items_by_registered_slug('menu-scuola');
        foreach ($menus as $menu) {
            $show_menus[] = $menu->title;
        }

        echo '<pre>';
        print_r($show_menus);
        ?>
    </div>
</main>
<?php
get_footer();
