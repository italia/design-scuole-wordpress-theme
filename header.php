<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Design_Scuole_Italia
 */

/** Header_Mobile_Menu class */
require_once get_template_directory() . '/walkers/mobile-header-walker.php';

$theme_locations = get_nav_menu_locations();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php if ($favicon_url = dsi_get_option("favicon_scuola")) { ?>
		<link rel="icon" type="image/x-icon" href="<?= $favicon_url ?>">
	<?php } 

    // Tag Open Graph per l'immagine di copertina nei link condivisi (es: Facebook)
    $cover_image_url = dsi_get_option("immagine", "la_scuola");
    $thumbnail_url = get_the_post_thumbnail_url();

    $home_image_url = $cover_image_url ?: $favicon_url;

    $og_image_url = is_front_page() ? $home_image_url : ($thumbnail_url ?: $home_image_url);

    if ($og_image_url) { ?>
        <meta property="og:image" content="<?= $og_image_url ?>">
        <?php
        $og_image_url_alt = get_post_meta(attachment_url_to_postid($og_image_url), '_wp_attachment_image_alt', true);

        if ($og_image_url_alt) { ?>
            <meta property="og:image:alt" content="<?= $og_image_url_alt ?>">
    <?php }
    }
    ?>
    
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php 
    $active_page = dsi_get_current_group();
    get_template_part("template-parts/common/svg"); 
?>

<!-- Right menu element-->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right perfect-scrollbar">
    <div class="menu-user-mobile menu-user-blue">
    </div>
</nav>
<!-- End Right menu element-->

<?php

if(is_search() || is_archive())
    get_template_part("template-parts/header/search-filters");
?>


<?php $active_page = dsi_get_current_group(); ?>

<div id="main-wrapper" class="push_container">
    <?php get_template_part("template-parts/common/skiplink"); ?>
    <header id="main-header" class="bg-white">
        <?php get_template_part("template-parts/header/slimheader"); ?>
        <div class="container header-top">
            <div class="row variable-gutters">
                <div class="col-8 d-flex align-items-center">
                    <button class="hamburger hamburger--spin-r toggle-menu menu-left push-body d-xl-none" type="button" aria-label="apri chiudi navigazione">
                        <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <!-- Left menu element-->
                    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left perfect-scrollbar">
                        <div class="logo-header">
                            <?php get_template_part("template-parts/common/logo"); ?>
                            <div class="h1">
                                <a href="<?php echo home_url(); ?>">
                                    <span><?php echo dsi_get_option("tipologia_scuola"); ?></span>
                                    <span><strong><?php echo dsi_get_option("nome_scuola"); ?></strong></span>
                                    <span class="d-none d-lg-block"><?php echo dsi_get_option("luogo_scuola"); ?></span>
                                </a>
                            </div>
                        </div><!-- /logo-header -->
                        <div class="nav-list-mobile dl-menuwrapper">
                            <nav aria-label="Principale">
                                <ul class="dl-menu nav-list nav-list-primary" data-element="menu">
                                    <?php
                                    // check if scuola has menu
                                    $theme_location = "menu-scuola";
                                    $option_location = "item_menu_scuola";
                                    unset($menu_obj);
                                    if(isset($theme_locations[$theme_location]))
                                        $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                    if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                        $landing_url = dsi_get_template_page_url("page-templates/la-scuola.php");
                                        if($landing_url)
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown1" data-element="school-submenu" class="%2$s"><li class="menu-title" ><div class="h3"><a href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                        else
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown1" data-element="school-submenu" class="%2$s">%3$s</ul>';

                                        ?>
                                        <li class="text-redbrown menu-dropdown-simple-wrapper">
                                            <a class="toggle-dropdown toggle-dropdown-simple <?php echo $active_page == 'school' ? 'active' : ''?>" role="button" href="#" aria-expanded="false" id="mainNavDropdownMobile1" title="Vai alla pagina: <?php _e("Scuola","design_scuole_italia"); ?>"><?php _e("Scuola","design_scuole_italia"); ?></a>
                                            <?php wp_nav_menu(array(
                                                "menu" => $menu_obj, 
                                                "items_wrap" => $items_wrap,
                                                "depth" => 1, 
                                                "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple",
                                                "container" => "", 
                                                "walker" => new Mobile_Header_Menu_Walker()
                                                )) ?>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    // check if servizi has menu
                                    $theme_location = "menu-servizi";
                                    $option_location = "item_menu_servizi";
                                    unset($menu_obj);
                                    if(isset($theme_locations[$theme_location]))
                                        $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                    if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                        $landing_url = dsi_get_template_page_url("page-templates/servizi.php");
                                        if($landing_url)
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown2" data-element="services-submenu" id="%1$s" class="%2$s"><li class="menu-title" ><div class="h3"><a href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                        else
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown2" data-element="services-submenu" id="%1$s" class="%2$s">%3$s</ul>';

                                        ?>
                                        <li class="text-purplelight menu-dropdown-simple-wrapper">
                                            <a class="toggle-dropdown toggle-dropdown-simple <?php echo $active_page == 'service' ? 'active' : ''?>" role="button" href="#" aria-expanded="false" id="mainNavDropdownMobile2" title="Vai alla pagina: <?php _e("Servizi","design_scuole_italia"); ?>"><?php _e("Servizi","design_scuole_italia"); ?></a>
                                            <?php wp_nav_menu(array(
                                                "menu" => $menu_obj, 
                                                "items_wrap" => $items_wrap,
                                                "depth" => 1, 
                                                "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple",
                                                "container" => "", 
                                                "walker" => new Mobile_Header_Menu_Walker()
                                            )) ?>
                                        </li>
                                        <?php

                                    }
                                    ?>
                                    <?php
                                    // check if notizie has menu
                                    $theme_location = "menu-notizie";
                                    $option_location = "item_menu_notizie";
                                    unset($menu_obj);
                                    if(isset($theme_locations[$theme_location]))
                                        $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                    if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                        $landing_url = dsi_get_template_page_url("page-templates/notizie.php");
                                        if($landing_url)
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown3" data-element="news-submenu" id="%1$s" class="%2$s"><li class="menu-title" ><div class="h3"><a href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                        else
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown3" data-element="news-submenu" id="%1$s" class="%2$s">%3$s</ul>';

                                        ?>
                                        <li class="text-greendark menu-dropdown-simple-wrapper">
                                            <a class="toggle-dropdown toggle-dropdown-simple <?php echo $active_page == 'news' ? 'active' : ''?>" role="button" href="#" aria-expanded="false" id="mainNavDropdownMobile3" title="Vai alla pagina: <?php _e("Novità","design_scuole_italia"); ?>"><?php _e("Novità","design_scuole_italia"); ?></a>
                                            <?php wp_nav_menu(array(
                                                "menu" => $menu_obj, 
                                                "items_wrap" => $items_wrap,
                                                "depth" => 1, 
                                                "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple",
                                                "container" => "", 
                                                "walker" => new Mobile_Header_Menu_Walker()
                                            )) ?>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    // check if didattica has menu
                                    $theme_location = "menu-didattica";
                                    $option_location = "item_menu_didattica";
                                    unset($menu_obj);
                                    if(isset($theme_locations[$theme_location]))
                                        $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                    if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                        $landing_url = dsi_get_template_page_url("page-templates/didattica.php");
                                        if($landing_url)
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown4" data-element="teaching-submenu" id="%1$s" class="%2$s"><li class="menu-title" ><div class="h3"><a href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                        else
                                            $items_wrap = '<ul  aria-labelledby="mainNavDropdown4" data-element="teaching-submenu" id="%1$s" class="%2$s">%3$s</ul>';

                                        ?>
                                        <li class="text-bluelectric menu-dropdown-simple-wrapper">
                                            <a class="toggle-dropdown toggle-dropdown-simple <?php echo $active_page == 'education' ? 'active' : ''?>" role="button" href="#" aria-expanded="false" id="mainNavDropdownMobile4" title="Vai alla pagina: <?php _e("Didattica","design_scuole_italia"); ?>"><?php _e("Didattica","design_scuole_italia"); ?></a>
                                            <?php wp_nav_menu(array(
                                                "menu" => $menu_obj, 
                                                "items_wrap" => $items_wrap,
                                                "depth" => 1, 
                                                "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple",
                                                "container" => "", 
                                                "walker" => new Mobile_Header_Menu_Walker()
                                            )) ?>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul><!-- /nav-list -->
                            </nav>
                            <?php
                            $location = "menu-topright";
                            if ( has_nav_menu( $location ) ) {
                                echo '<nav aria-label="Argomenti">';
                                wp_nav_menu(array("theme_location" => $location, "depth" => 1,  "menu_class" => "nav-list nav-list-secondary", "container" => ""));
                                echo '</nav>';
                            }
                            ?>
                        </div>
                    </div>
                    <!-- End Left menu element-->
                    <div class="logo-header">
						<?php get_template_part("template-parts/common/logo"); ?>
                        <div class="h1">
                            <a href="<?php echo home_url(); ?>" aria-label="Vai alla homepage" title="vai alla homepage" >
                                <span><?php echo dsi_get_option("tipologia_scuola"); ?></span>
                                <span><strong><?php echo dsi_get_option("nome_scuola"); ?></strong></span>
                                <span class="d-none d-lg-block"><?php echo dsi_get_option("luogo_scuola"); ?></span>
                            </a>
                        </div>
                    </div><!-- /logo-header -->
                    <div class="sticky-main-nav">

                    </div><!-- /sticky-main-nav -->

                </div><!-- /col -->
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <div class="header-search d-flex align-items-center">
                        <button type="button" class="d-flex align-items-center search-btn" data-toggle="modal" data-target="#search-modal" aria-label="Cerca nel sito" data-element="search-modal-button">
                            <span class="d-none d-lg-block mr-2"><strong>Cerca</strong></span>
                            <svg class="svg-search">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-search"></use>
                            </svg>
                        </button>
                    </div><!-- /header-search -->
                    <div class="header-utils-sticky">

                    </div>

					<?php
                    /*
					if(!is_user_logged_in()) {
						get_template_part("template-parts/header/header-anon");
					}else{
						get_template_part("template-parts/header/header-logged");
					}
                    */
					?>
                    <?php
                    $show_socials = dsi_get_option( "show_socials", "socials" );
                    if($show_socials == "true") : ?>
                    <div class="header-social">
                        <span>Seguici su:</span>
                        <div class="header-social-wrapper">
                        <?php if($facebook = dsi_get_option( "facebook", "socials" )) :?><a href="<?php echo $facebook; ?>" aria-label="facebook" title="vai alla pagina facebook"><svg class="icon it-social-facebook"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-facebook"></use></svg></a><?php endif; ?>
                            <?php if($youtube = dsi_get_option( "youtube", "socials" )) :?><a href="<?php echo $youtube; ?>" aria-label="youtube" title="vai alla pagina youtube"><svg class="icon it-social-youtube"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-youtube"></use></svg></a><?php endif; ?>
                            <?php if($instagram = dsi_get_option( "instagram", "socials" )) :?><a href="<?php echo $instagram; ?>" aria-label="instagram" title="vai alla pagina instagram"><svg class="icon it-social-instagram"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-instagram"></use></svg></a><?php endif; ?>
                            <?php if($twitter = dsi_get_option( "twitter", "socials" )) :?><a href="<?php echo $twitter; ?>" aria-label="twitter" title="vai alla pagina twitter"><svg class="icon it-social-twitter"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-twitter"></use></svg></a><?php endif; ?>
                            <?php if($linkedin = dsi_get_option( "linkedin", "socials" )) :?><a href="<?php echo $linkedin; ?>" aria-label="linkedin" title="vai alla pagina linkedin"><svg class="icon it-social-linkedin"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-linkedin"></use></svg></a><?php endif; ?>
                            <?php if($telegram = dsi_get_option( "telegram", "socials" )) :?><a href="<?php echo $telegram; ?>" aria-label="telegram" title="vai su Telegram"><svg class="icon it-social-telegram"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-telegram"></use></svg></a><?php endif; ?>
                        </div><!-- /header-social-wrapper -->
                    </div><!-- /header-social -->
                    <?php endif ?>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->

        <div class="bg-white d-none d-xl-block header-bottom" id="sub-nav">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col nav-container">
                        <nav aria-label="Principale" class="main-nav" id="menu-principale">
                            <ul class="dl-menu nav-list nav-list-primary" data-element="menu">
                                <?php
                                // check if scuola has menu
                                $theme_location = "menu-scuola";
                                $option_location = "item_menu_scuola";
                                unset($menu_obj);
                                if(isset($theme_locations[$theme_location]))
                                    $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                    $landing_url = dsi_get_template_page_url("page-templates/la-scuola.php");
                                    if($landing_url)
                                        $items_wrap = '<ul class="%2$s" data-element="school-submenu"><li class="menu-title" ><div class="h3"><a class="list-item" href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                    else
                                        $items_wrap = '<ul class="%2$s" data-element="school-submenu">%3$s</ul>';

                                    ?>
                                    <li class="text-redbrown menu-dropdown-simple-wrapper">
                                        <a class="nav-link dropdown-toggle <?php echo $active_page == 'school' ? 'active' : ''?>" data-toggle="dropdown"  role="button" href="#" aria-expanded="false" id="mainNavDropdown1"><?php _e("Scuola","design_scuole_italia"); ?></a>
                                        <div class="dropdown-menu menu-dropdown dl-submenu menu-dropdown-simple"  aria-labelledby="mainNavDropdown1">
                                            <div class="link-list-wrapper">
                                                <?php wp_nav_menu(array(
                                                    "menu" => $menu_obj, 
                                                    "items_wrap" => $items_wrap,
                                                    "depth" => 1, 
                                                    "menu_class" => "link-list", 
                                                    "container" => "", 
                                                    "walker" => new Header_Menu_Walker()
                                                )) ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                                <?php
                                // check if servizi has menu
                                $theme_location = "menu-servizi";
                                $option_location = "item_menu_servizi";
                                unset($menu_obj);
                                if(isset($theme_locations[$theme_location]))
                                    $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                    $landing_url = dsi_get_template_page_url("page-templates/servizi.php");
                                    if($landing_url)
                                        $items_wrap = '<ul class="%2$s" data-element="services-submenu"><li class="menu-title" ><div class="h3"><a class="list-item" href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                    else
                                        $items_wrap = '<ul class="%2$s" data-element="services-submenu">%3$s</ul>';

                                    ?>
                                    <li class="text-purplelight menu-dropdown-simple-wrapper">
                                        <a class="nav-link dropdown-toggle <?php echo $active_page == 'service' ? 'active' : ''?>" data-toggle="dropdown"  role="button" href="#" aria-expanded="false" id="mainNavDropdown2"><?php _e("Servizi","design_scuole_italia"); ?></a>
                                        <div class="dropdown-menu menu-dropdown dl-submenu menu-dropdown-simple"  aria-labelledby="mainNavDropdown2">
                                            <div class="link-list-wrapper">
                                                <?php wp_nav_menu(array(
                                                    "menu" => $menu_obj, 
                                                    "items_wrap" => $items_wrap,
                                                    "depth" => 1, 
                                                    "menu_class" => "link-list", 
                                                    "container" => "", 
                                                    "walker" => new Header_Menu_Walker()
                                                )) ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php

                                }
                                ?>
                                <?php
                                // check if notizie has menu
                                $theme_location = "menu-notizie";
                                $option_location = "item_menu_notizie";
                                unset($menu_obj);
                                if(isset($theme_locations[$theme_location]))
                                    $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                    $landing_url = dsi_get_template_page_url("page-templates/notizie.php");
                                    if($landing_url)
                                        $items_wrap = '<ul class="%2$s" data-element="news-submenu"><li class="menu-title" ><div class="h3"><a class="list-item" href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                    else
                                        $items_wrap = '<ul class="%2$s" data-element="news-submenu">%3$s</ul>';

                                    ?>
                                    <li class="text-greendark menu-dropdown-simple-wrapper">
                                        <a class="nav-link dropdown-toggle <?php echo $active_page == 'news' ? 'active' : ''?>" data-toggle="dropdown"  role="button" href="#" aria-expanded="false" id="mainNavDropdown3"><?php _e("Novità","design_scuole_italia"); ?></a>
                                        <div class="dropdown-menu menu-dropdown dl-submenu menu-dropdown-simple"  aria-labelledby="mainNavDropdown3">
                                            <div class="link-list-wrapper">
                                                <?php wp_nav_menu(array(
                                                    "menu" => $menu_obj, 
                                                    "items_wrap" => $items_wrap,
                                                    "depth" => 1, 
                                                    "menu_class" => "link-list", 
                                                    "container" => "", 
                                                    "walker" => new Header_Menu_Walker()
                                                )) ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                                <?php
                                // check if didattica has menu
                                $theme_location = "menu-didattica";
                                $option_location = "item_menu_didattica";
                                unset($menu_obj);
                                if(isset($theme_locations[$theme_location]))
                                    $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
                                if(isset($menu_obj) && !is_wp_error($menu_obj)) {
                                    $landing_url = dsi_get_template_page_url("page-templates/didattica.php");
                                    if($landing_url)
                                        $items_wrap = '<ul class="%2$s" data-element="teaching-submenu"><li class="menu-title" ><div class="h3"><a class="list-item" href="'.$landing_url.'" data-element="overview">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
                                    else
                                        $items_wrap = '<ul class="%2$s" data-element="teaching-submenu">%3$s</ul>';

                                    ?>
                                    <li class="text-bluelectric menu-dropdown-simple-wrapper">
                                        <a class="nav-link dropdown-toggle <?php echo $active_page == 'education' ? 'active' : ''?>" data-toggle="dropdown"  role="button" href="#" aria-expanded="false" id="mainNavDropdown4"><?php _e("Didattica","design_scuole_italia"); ?></a>
                                        <div class="dropdown-menu menu-dropdown dl-submenu menu-dropdown-simple"  aria-labelledby="mainNavDropdown4">
                                            <div class="link-list-wrapper">
                                                <?php wp_nav_menu(array(
                                                    "menu" => $menu_obj, 
                                                    "items_wrap" => $items_wrap,
                                                    "depth" => 1, 
                                                    "menu_class" => "link-list", 
                                                    "container" => "", 
                                                    "walker" => new Header_Menu_Walker()
                                                )) ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul><!-- /nav-list -->
                        </nav>
	                    <?php
	                    $location = "menu-topright";
                        if ( has_nav_menu( $location ) ) {
                            echo '<nav aria-label="Argomenti">';
                            wp_nav_menu(array(
                                "theme_location" => $location, 
                                "depth" => 1,  
                                "menu_class" => "nav-list nav-list-secondary", 
                                "container" => ""
                            ));
                            echo '</nav>';
                        }
                        ?>

                    </div><!-- /col nav-container -->
                </div><!-- /row -->
            </div><!-- /container -->
        </div><!-- /sub-nav -->


    </header><!-- /header -->

	<?php get_template_part("template-parts/common/search-modal"); ?>
    <?php
    if(!is_user_logged_in())
        get_template_part("template-parts/common/access-modal");
    ?>
