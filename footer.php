<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Design_Scuole_Italia
 */
?>
<footer id="footer--wrapper" class="footer--wrapper">
    <div class="container">
        <div class="row variable-gutters mb-5">
            <div class="col logos-wrapper">
                <img class="ue-logo"
                    src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-eu-inverted.svg' ); ?>"
                    alt="logo Unione Europea"
                >
                <div class="logo-footer">
                    <?php get_template_part("template-parts/common/logo"); ?>

                    <h2 class="h1">
                        <a href="<?php echo home_url(); ?>">
                            <span><?php echo dsi_get_option("tipologia_scuola"); ?></span>
                            <span><strong><?php echo dsi_get_option("nome_scuola"); ?></strong></span>
                            <span><?php echo dsi_get_option("luogo_scuola"); ?></span>
                        </a>
                    </h2>
                </div><!-- /logo-footer -->
            </div><!-- /col -->
        </div><!-- /row -->
        <div class="footer">
            <div class="footer--column">
                <input type="checkbox" id="footer--column-1" name="footer-column" checked>
                <label for="footer--column-1">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-2" name="footer-column">
                <label for="footer--column-2">
                <?php dynamic_sidebar( 'footer-2' ); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-3" name="footer-column">
                <label for="footer--column-3">
                <?php dynamic_sidebar( 'footer-3' ); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-4" name="footer-column">
                <label for="footer--column-4">
                <?php dynamic_sidebar( 'footer-4' ); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-5" name="footer-column">
                <label for="footer--column-5">
                <?php dynamic_sidebar( 'footer-5' ); ?>
            </div><!-- /footer--column -->
        </div><!-- /row -->

        <div class="row variable-gutters">
            <div class="col-lg-12 sub-footer">
                <?php
                $location = "menu-footer";
                if ( has_nav_menu( $location ) ) {
                    wp_nav_menu(array(
                        "theme_location" => $location, 
                        "depth" => 1, 
                        "menu_class" => "footer-inline-menu", 
                        "container" => "",
                        'walker' => new Footer_Menu_Walker()
                    ));
                }
                ?>
                <?php
                $show_socials = dsi_get_option( "show_socials", "socials" );
                if($show_socials == "true") : ?>
                    <div class="footer-social">
                        <span>Seguici su:</span>
                        <div class="footer-social-wrapper">
                            <?php if($facebook = dsi_get_option( "facebook", "socials" )) :?><a href="<?php echo $facebook; ?>" aria-label="facebook" title="vai alla pagina facebook"><svg class="icon it-social-facebook"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-facebook"></use></svg></a><?php endif; ?>
                            <?php if($youtube = dsi_get_option( "youtube", "socials" )) :?><a href="<?php echo $youtube; ?>" aria-label="youtube" title="vai alla pagina youtube"><svg class="icon it-social-youtube"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-youtube"></use></svg></a><?php endif; ?>
                            <?php if($instagram = dsi_get_option( "instagram", "socials" )) :?><a href="<?php echo $instagram; ?>" aria-label="instagram" title="vai alla pagina instagram"><svg class="icon it-social-instagram"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-instagram"></use></svg></a><?php endif; ?>
                            <?php if($twitter = dsi_get_option( "twitter", "socials" )) :?><a href="<?php echo $twitter; ?>" aria-label="twitter" title="vai alla pagina twitter"><svg class="icon it-social-twitter"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-twitter"></use></svg></a><?php endif; ?>
                            <?php if($linkedin = dsi_get_option( "linkedin", "socials" )) :?><a href="<?php echo $linkedin; ?>" aria-label="linkedin" title="vai alla pagina linkedin"><svg class="icon it-social-linkedin"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-linkedin"></use></svg></a><?php endif; ?>
                        </div><!-- /footer-social-wrapper -->
                    </div><!-- /gooter-social -->
                <?php endif ?>
            </div>
        </div><!-- /row -->
        <?php
        $footer_text = dsi_get_option("footer_text", "setup");
        if(isset($footer_text) && trim($footer_text) != "") {
            ?>
            <div class="row variable-gutters mb-3">
                <div class="col-lg-12 text-left text-md-center footer-text">
                    <?php echo wpautop($footer_text); ?>
                </div>
            </div>
            <?php
        }
        get_template_part("template-parts/common/copy");
        ?>

</footer>
</div><!-- /push_container -->

<?php wp_footer(); ?>

</body>
</html>
