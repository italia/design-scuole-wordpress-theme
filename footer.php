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
<footer id="footer-wrapper" class="footer-wrapper">
    <div class="container">
        <div class="row variable-gutters mb-5">
            <div class="col">
                <div class="logo-footer">
                    <?php get_template_part("template-parts/common/logo"); ?>

                    <p class="h1">
                        <a href="<?php echo home_url(); ?>">
                            <span><?php echo dsi_get_option("tipologia_scuola"); ?></span>
                            <span><strong><?php echo dsi_get_option("nome_scuola"); ?></strong></span>
                            <span><?php echo dsi_get_option("luogo_scuola"); ?></span>
                        </a>
                    </p>
                </div><!-- /logo-footer -->
            </div><!-- /col -->
        </div><!-- /row -->
        <div class="row variable-gutters mb-3">
            <div class="col-lg-3">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div><!-- /col-lg-3 -->
            <div class="col-lg-3">
                <?php dynamic_sidebar( 'footer-2' ); ?>
            </div><!-- /col-lg-3 -->

            <div class="col-lg-3">
                <?php dynamic_sidebar( 'footer-3' ); ?>
            </div><!-- /col-lg-3 -->

            <div class="col-lg-3">
                <?php dynamic_sidebar( 'footer-4' ); ?>
            </div><!-- /col-lg-3 -->
        </div><!-- /row -->

        <div class="row variable-gutters mb-3">
            <div class="col-lg-12">
                <?php
                $location = "menu-footer";
                if ( has_nav_menu( $location ) ) {
                    wp_nav_menu(array("theme_location" => $location, "depth" => 1, "menu_class" => "footer-inline-menu", "container" => ""));
                }
                ?>
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