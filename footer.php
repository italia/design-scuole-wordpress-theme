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
        <div class="footer--main-wrapper">
        <!-- <div class="row variable-gutters mb-5"> -->
            <section>
                <!-- <img class="ue-logo"
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-eu-inverted.svg' ); ?>"
                alt="logo Unione Europea"
                > -->
                <div class="logo-footer">
                    <?php get_template_part("template-parts/common/logo"); ?>
                    
                    <h2 class="h1">
                        <a href="<?php echo home_url(); ?>">
                            <span><?php echo dsi_get_option("tipologia_scuola"); ?></span>
                            <span><?php echo dsi_get_option("nome_scuola"); ?></span>
                            <!-- <span><?php echo dsi_get_option("luogo_scuola"); ?></span> -->
                        </a>
                    </h2>
                </div><!-- /logo-footer -->
                <div class="footer-info">
                    <div><a data-prefix="" href="<?php echo dsi_get_option("gmaps_scuola"); ?>" target="_blank"><?php echo dsi_get_option("indirizzo_scuola"); ?></a></div>
                    <div><a data-prefix="Tel.:" href="tel:<?php echo dsi_get_option("telefono_scuola"); ?>"><?php echo dsi_get_option("telefono_scuola"); ?></a></div>
                    <div><a data-prefix="Fax:" href="fax:<?php echo dsi_get_option("fax_scuola"); ?>"><?php echo dsi_get_option("fax_scuola"); ?></a></div>
                    <div><a data-prefix="Cod. Fisc.:" href="#" data-copy-text="<?php echo dsi_get_option("fiscale_scuola"); ?>"><?php echo dsi_get_option("fiscale_scuola"); ?></a></div>
                    <div><a data-prefix="Cod. IBAN:" href="#" data-copy-text="<?php echo dsi_get_option("iban_scuola"); ?>"><?php echo dsi_get_option("iban_scuola"); ?></a></div>
                </div>
                <?php
                $show_socials = dsi_get_option( "show_socials", "socials" );
                if($show_socials == "true") : ?>
                    <div class="footer--social">
                        <!-- <span>Seguici su:</span> -->
                        <div class="footer--social-wrapper">
                            <?php if($facebook = dsi_get_option( "facebook", "socials" )) :?><a href="<?php echo $facebook; ?>" aria-label="facebook" title="vai alla pagina facebook"><svg class="icon it-social-facebook"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-facebook"></use></svg></a><?php endif; ?>
                            <?php if($youtube = dsi_get_option( "youtube", "socials" )) :?><a href="<?php echo $youtube; ?>" aria-label="youtube" title="vai alla pagina youtube"><svg class="icon it-social-youtube"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-youtube"></use></svg></a><?php endif; ?>
                            <?php if($instagram = dsi_get_option( "instagram", "socials" )) :?><a href="<?php echo $instagram; ?>" aria-label="instagram" title="vai alla pagina instagram"><svg class="icon it-social-instagram"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-instagram"></use></svg></a><?php endif; ?>
                            <?php if($twitter = dsi_get_option( "twitter", "socials" )) :?><a href="<?php echo $twitter; ?>" aria-label="twitter" title="vai alla pagina twitter"><svg class="icon it-social-twitter"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-twitter"></use></svg></a><?php endif; ?>
                            <?php if($linkedin = dsi_get_option( "linkedin", "socials" )) :?><a href="<?php echo $linkedin; ?>" aria-label="linkedin" title="vai alla pagina linkedin"><svg class="icon it-social-linkedin"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-linkedin"></use></svg></a><?php endif; ?>
                        </div><!-- /footer--social-wrapper -->
                    </div><!-- /footer--social -->
                <?php endif ?>
            </section>
            <section class="footer--banners-wrapper">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </section>
        </div><!-- /row -->
        <div class="row variable-gutters">
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

        <section class="bottom">
        <?php
                $location = "menu-footer";
                if ( has_nav_menu( $location ) ) {
                    wp_nav_menu(array(
                        "theme_location" => $location, 
                        "depth" => 1, 
                        "menu_class" => "footer-inline-menu", 
                        "container" => "",
                        "item" => 'privacy-policy',
                        'walker' => new Footer_Privacy_Walker()
                    ));
                }
                ?>
        </section>

</footer>
</div><!-- /push_container -->
<script>
    const vibrate = (() => ('vibrate' in window?.navigator) ? timings => window.navigator.vibrate(timings) : () => {} )()
    const copyURI = e => {
        e.preventDefault();
        navigator.clipboard.writeText(e.target.dataset.copyText).then(() => {
            /* clipboard successfully set */
            e.target.classList.add('copied');
            window.setTimeout(() => e.target.classList.remove('copied'), 1200);
            vibrate([150,100,120])
        }, () => {
            /* clipboard write failed */
            e.target.classList.add('copy-failed');
            window.setTimeout(() => e.target.classList.remove('copy-failed'), 1200);
            vibrate([50,100,50,100,100])
        });
    };
    window.addEventListener('DOMContentLoaded', 
        document.querySelectorAll('a[data-copy-text]')
            .forEach(a => {
                a.addEventListener('click', copyURI );
                a.setAttribute('title', 'Click to copy')
            })
    );

    const footerTabsState = {
        save: (e) => window.sessionStorage[e.target.id] = +e.target.checked || 0,
        load: (e) => {
            const state = window.sessionStorage[e.id];
            if (!state) return e;
            e.checked = !!+state;
            return e;
        }
    };
    window.addEventListener('DOMContentLoaded', 
        document.querySelectorAll('.footer input[type=checkbox]')
            .forEach(input => 
                footerTabsState.load(input)
                    .addEventListener('input', footerTabsState.save )
            )
    );
    
</script>
<?php wp_footer(); ?>

</body>
</html>
