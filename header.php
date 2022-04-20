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

$theme_locations = get_nav_menu_locations();
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part("template-parts/common/svg"); ?>
<?php get_template_part("template-parts/common/skiplink"); ?>

<!-- Left menu element-->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left perfect-scrollbar">
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

    </div>
</nav>
<!-- End Left menu element-->

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


<?php get_template_part("template-parts/header/slimheader"); ?>

<div id="main-wrapper" class="push_container">
    <header id="main-header" class="bg-white">
        <div class="container header-top">
            <div class="row variable-gutters">
                <div class="col-8 d-flex align-items-center">
                    <button class="hamburger hamburger--spin-r toggle-menu menu-left push-body d-xl-none" type="button" aria-label="burger menu">
                        <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                        </span>
                    </button>
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
                    <div class="sticky-main-nav">

                    </div><!-- /sticky-main-nav -->

                </div><!-- /col -->
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <div class="header-search d-flex align-items-center">
                        <button type="button" class="d-flex align-items-center search-btn" data-toggle="modal" data-target="#search-modal">
                            <p class="d-none d-lg-block"><strong>Cerca</strong></p>
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
                    <div class="header-social d-none d-lg-flex">
                        <span>Seguici su:</span>
                        <div class="header-social-wrapper">
                            <?php if($facebook = dsi_get_option( "facebook", "socials" )) :?><a href="<?php echo $facebook; ?>" target="_blank" aria-label="facebook"><svg class="icon it-social-facebook"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-facebook"></use></svg></a><?php endif; ?>
                            <?php if($youtube = dsi_get_option( "youtube", "socials" )) :?><a href="<?php echo $youtube; ?>" target="_blank" aria-label="youtube"><svg class="icon it-social-youtube"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-youtube"></use></svg></a><?php endif; ?>
                            <?php if($instagram = dsi_get_option( "instagram", "socials" )) :?><a href="<?php echo $instagram; ?>" target="_blank" aria-label="instagram"><svg class="icon it-social-instagram"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-instagram"></use></svg></a><?php endif; ?>
                            <?php if($twitter = dsi_get_option( "twitter", "socials" )) :?><a href="<?php echo $twitter; ?>" target="_blank" aria-label="twitter"><svg class="icon it-social-twitter"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-twitter"></use></svg></a><?php endif; ?>
                            <?php if($linkedin = dsi_get_option( "linkedin", "socials" )) :?><a href="<?php echo $linkedin; ?>" target="_blank" aria-label="linkedin"><svg class="icon it-social-linkedin"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-linkedin"></use></svg></a><?php endif; ?>
                        </div><!-- /header-social-wrapper -->
                    </div><!-- /header-social -->
                    <?php endif ?>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->

        <section class="bg-white d-none d-sm-block" id="sub-nav">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col nav-container">
                        <ul class="dl-menu nav-list nav-list-primary" id="menup">
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
			                        $items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown1" id="%1$s" class="%2$s"><li class="menu-title"><div class="h3"><a href="'.$landing_url.'">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
		                        else
			                        $items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown1" id="%1$s" class="%2$s">%3$s</ul>';

		                        ?>
                                <li class="text-redbrown menu-dropdown-simple-wrapper">
                                    <a class="toggle-dropdown toggle-dropdown-simple" role="button" href="#" aria-expanded="false" id="mainNavDropdown1" title="Vai alla pagina: <?php _e("Scuola","design_scuole_italia"); ?>"><?php _e("Scuola","design_scuole_italia"); ?></a>
	                                <?php wp_nav_menu(array("menu" => $menu_obj, "items_wrap" => $items_wrap,"depth" => 1, "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple", "container" => "")) ?>
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
			                        $items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown2" id="%1$s" class="%2$s"><li class="menu-title"><div class="h3"><a href="'.$landing_url.'">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
		                        else
		                            $items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown2" id="%1$s" class="%2$s">%3$s</ul>';

		                        ?>
                                <li class="text-purplelight menu-dropdown-simple-wrapper">
                                    <a class="toggle-dropdown toggle-dropdown-simple" role="button" href="#" aria-expanded="false" id="mainNavDropdown2" title="Vai alla pagina: <?php _e("Servizi","design_scuole_italia"); ?>"><?php _e("Servizi","design_scuole_italia"); ?></a>
			                        <?php wp_nav_menu(array("menu" => $menu_obj, "depth" => 1, "items_wrap" => $items_wrap, "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple", "container" => "")) ?>
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
			                        $items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown3" id="%1$s" class="%2$s"><li class="menu-title"><div class="h3"><a href="'.$landing_url.'">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
		                        else
			                        $items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown3" id="%1$s" class="%2$s">%3$s</ul>';

		                        ?>
                                <li class="text-greendark menu-dropdown-simple-wrapper">
                                    <a class="toggle-dropdown toggle-dropdown-simple" role="button" href="#" aria-expanded="false" id="mainNavDropdown3" title="Vai alla pagina: <?php _e("Novità","design_scuole_italia"); ?>"><?php _e("Novità","design_scuole_italia"); ?></a>
			                        <?php wp_nav_menu(array("menu" => $menu_obj, "depth" => 1, "items_wrap" => $items_wrap, "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple", "container" => "")) ?>
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
									$items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown4" id="%1$s" class="%2$s"><li class="menu-title"><div class="h3"><a href="'.$landing_url.'">'.__("Panoramica", "design_scuole_italia").'</a></div></li>%3$s</ul>';
								else
									$items_wrap = '<ul role="region" aria-labelledby="mainNavDropdown4" id="%1$s" class="%2$s">%3$s</ul>';

								?>
                                <li class="text-bluelectric menu-dropdown-simple-wrapper">
                                    <a class="toggle-dropdown toggle-dropdown-simple" role="button" href="#" aria-expanded="false" id="mainNavDropdown4" title="Vai alla pagina: <?php _e("Didattica","design_scuole_italia"); ?>"><?php _e("Didattica","design_scuole_italia"); ?></a>
									<?php wp_nav_menu(array("menu" => $menu_obj, "depth" => 1, "items_wrap" => $items_wrap, "menu_class" => "menu-dropdown dl-submenu menu-dropdown-simple", "container" => "")) ?>
                                </li>
								<?php
							}
							?>
                        </ul><!-- /nav-list -->
	                    <?php
	                    $location = "menu-topright";
                        if ( has_nav_menu( $location ) ) {
                            wp_nav_menu(array("theme_location" => $location, "depth" => 1,  "menu_class" => "nav-list nav-list-secondary", "container" => ""));
                        }
                        ?>

                    </div><!-- /col nav-container -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /sub-nav -->


    </header><!-- /header -->

	<?php get_template_part("template-parts/common/search-modal"); ?>
    <?php
    if(!is_user_logged_in())
        get_template_part("template-parts/common/access-modal");
    ?>

