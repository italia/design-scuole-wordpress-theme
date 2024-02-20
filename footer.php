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
<footer id="footer--wrapper" class="footer--wrapper pt-3">

    <?php
    get_template_part("martini-template-parts/footer-logos")
    ?>

    <div class="container">
        <div class="footer--main-wrapper">
            <!-- <div class="row variable-gutters mb-5"> -->
            <section>
                <!-- <img class="ue-logo"
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-eu-inverted.svg'); ?>"
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
                <img src="https://www.martinomartini.eu/wp-content/uploads/2023/09/logo_mm_footer.png" alt="" style="max-width: 100%;">
            </section>
            <section>
                <div class="footer-info" style="max-width: 100%;">
                    <?php
                    $gmaps_scuola = dsi_get_option("gmaps_scuola");
                    $indirizzo_scuola = dsi_get_option("indirizzo_scuola");
                    $telefono_scuola = dsi_get_option("telefono_scuola");
                    $email_scuola = dsi_get_option("email_scuola");
                    $pec_scuola = dsi_get_option("pec_scuola");
                    $fax_scuola = dsi_get_option("fax_scuola");
                    $fiscale_scuola = dsi_get_option("fiscale_scuola");
                    $iban_scuola = dsi_get_option("iban_scuola");
                    $codice_ministeriale = dsi_get_option("codice_ministeriale");

                    if (is_string($gmaps_scuola)) { ?>
                        <div><a data-prefix="" href="<?php echo $gmaps_scuola; ?>" target="_blank"><?php echo $indirizzo_scuola; ?></a></div>
                    <?php }
                    if (is_string($telefono_scuola)) { ?>
                        <div><a data-prefix="Tel.:" href="tel:<?php echo $telefono_scuola; ?>"><?php echo $telefono_scuola; ?></a></div>
                    <?php }
                    if (is_string($email_scuola)) { ?>
                        <div><a data-prefix="email.:" href="mailto:<?php echo $email_scuola; ?>"><?php echo $email_scuola; ?></a></div>
                    <?php }
                    if (is_string($pec_scuola)) { ?>
                        <div><a data-prefix="PEC.:" href="mailto:<?php echo $pec_scuola; ?>"><?php echo $pec_scuola; ?></a></div>
                    <?php }
                    if (is_string($fax_scuola)) { ?>
                        <div><a data-prefix="Fax:" href="fax:<?php echo $fax_scuola; ?>"><?php echo $fax_scuola; ?></a></div>
                    <?php }
                    if (is_string($fiscale_scuola)) { ?>
                        <div><a data-prefix="Cod. Fisc.:" href="#" data-copy-text="<?php echo $fiscale_scuola; ?>"><?php echo $fiscale_scuola; ?></a></div>
                    <?php }
                    if (is_string($iban_scuola)) { ?>
                        <div><a data-prefix="Cod. IBAN:" href="#" data-copy-text="<?php echo $iban_scuola; ?>"><?php echo $iban_scuola; ?></a></div>
                    <?php }
                    if (is_string($codice_ministeriale)) { ?>
                        <div><a data-prefix="Cod. Ministeriale:" href="#" data-copy-text="<?php echo $codice_ministeriale; ?>"><?php echo $codice_ministeriale; ?></a></div>
                    <?php } ?>
                </div>
                <?php
                $show_socials = dsi_get_option("show_socials", "socials");
                if ($show_socials == "true") : ?>
                    <div class="footer--social">
                        <!-- <span>Seguici su:</span> -->
                        <div class="footer--social-wrapper">
                            <?php if ($facebook = dsi_get_option("facebook", "socials")) : ?><a href="<?php echo $facebook; ?>" aria-label="facebook" title="vai alla pagina facebook"><svg class="icon it-social-facebook">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-facebook"></use>
                                    </svg></a><?php endif; ?>
                            <?php if ($youtube = dsi_get_option("youtube", "socials")) : ?><a href="<?php echo $youtube; ?>" aria-label="youtube" title="vai alla pagina youtube"><svg class="icon it-social-youtube">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-youtube"></use>
                                    </svg></a><?php endif; ?>
                            <?php if ($instagram = dsi_get_option("instagram", "socials")) : ?><a href="<?php echo $instagram; ?>" aria-label="instagram" title="vai alla pagina instagram"><svg class="icon it-social-instagram">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-instagram"></use>
                                    </svg></a><?php endif; ?>
                            <?php if ($twitter = dsi_get_option("twitter", "socials")) : ?><a href="<?php echo $twitter; ?>" aria-label="twitter" title="vai alla pagina twitter"><svg class="icon it-social-twitter">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-twitter"></use>
                                    </svg></a><?php endif; ?>
                            <?php if ($linkedin = dsi_get_option("linkedin", "socials")) : ?><a href="<?php echo $linkedin; ?>" aria-label="linkedin" title="vai alla pagina linkedin"><svg class="icon it-social-linkedin">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-linkedin"></use>
                                    </svg></a><?php endif; ?>
                        </div><!-- /footer--social-wrapper -->
                    </div><!-- /footer--social -->
                <?php endif ?>
            </section>
            <!-- <section class="footer--banners-wrapper">
                <?php
                $img_dir = get_stylesheet_directory_uri() . '/assets/images_martini/footer';
                // TODO Add links to footer's white areas
                ?>
                <a href="https://www.martinomartini.eu/alboonline/visualizza_albo.php">
                    <img src="<?php echo $img_dir . '/footer-img-pub.jpg'; ?>" alt="" ><span class="d-none d-md-block">Pubblicità<br>legale</span>
                </a>
                <a href="https://aprilascuola.provincia.tn.it/sei/#/soggetto/0221179501/scuola/lavora-con-la-scuola">
                    <img src="<?php echo $img_dir . '/footer-img-lav.jpg'; ?>" alt="" ><span class="d-none d-md-block">Lavora con<br>la scuola</span>
                </a>
                <a href="https://aprilascuola.provincia.tn.it/sei/#/soggetto/0221179501/scuola/amministrazione-trasparente">
                    <img src="<?php echo $img_dir . '/footer-img-amm.jpg'; ?>" alt="" ><span class="d-none d-md-block">Amministrazione trasparente</span>
                </a>
                <a href="#">
                    <img src="<?php echo $img_dir . '/footer-img-3.jpg';   ?>" alt="" width="619" height="68"  >
                </a>
            </section> -->
        </div><!-- /row -->
        <div class="row variable-gutters">
        </div><!-- /row -->
        <div class="footer">
            <div class="footer--column">
                <input type="checkbox" id="footer--column-1" name="footer-column" checked>
                <label for="footer--column-1">
                    <?php dynamic_sidebar('footer-1'); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-2" name="footer-column">
                <label for="footer--column-2">
                    <?php dynamic_sidebar('footer-2'); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-3" name="footer-column">
                <label for="footer--column-3">
                    <?php dynamic_sidebar('footer-3'); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-4" name="footer-column">
                <label for="footer--column-4">
                    <?php dynamic_sidebar('footer-4'); ?>
            </div><!-- /footer--column -->

            <div class="footer--column">
                <input type="checkbox" id="footer--column-5" name="footer-column">
                <label for="footer--column-5">
                    <?php dynamic_sidebar('footer-5'); ?>
            </div><!-- /footer--column -->
        </div><!-- /row -->

        <!-- note legali -->
        <div class="py-3">
            <div class="row justify-content-between">
                <div class="footer-inline-menu col-12 col-md-3">
                    <a href="/note-legali/" data-element="legal-notes">Note legali</a>
                </div>
                <div class="footer-inline-menu col-12 col-md-3">
                    <a href="https://form.agid.gov.it/view/696de8bc-1f82-48a1-9037-d97d9f2d7dab/" data-element="accessibility-link">Dichiarazione di accessibilità</a>
                </div>
                <div class="footer-inline-menu col-12 col-md-3">
                    <a href="/feedback/" data-element="accessibility-link">Feedback</a>
                </div>
            </div>
        </div>

        <section class="bottom">
            <?php
            $location = "menu-footer";
            if (has_nav_menu($location)) {
                wp_nav_menu(array(
                    "theme_location" => $location,
                    "depth" => 1,
                    "menu_class" => "footer-inline-menu",
                    "container" => "",
                    "item" => 'privacy-policy',
                    'walker' => new Footer_Menu_Walker()
                ));
            }
            ?>
        </section>

</footer>
</div><!-- /push_container -->
<script>
    const vibrate = (() => ('vibrate' in window?.navigator) ? timings => window.navigator.vibrate(timings) : () => {})()
    const copyURI = e => {
        e.preventDefault();
        navigator.clipboard.writeText(e.target.dataset.copyText).then(() => {
            /* clipboard successfully set */
            e.target.classList.add('copied');
            window.setTimeout(() => e.target.classList.remove('copied'), 1200);
            vibrate([150, 100, 120])
        }, () => {
            /* clipboard write failed */
            e.target.classList.add('copy-failed');
            window.setTimeout(() => e.target.classList.remove('copy-failed'), 1200);
            vibrate([50, 100, 50, 100, 100])
        });
    };
    window.addEventListener('DOMContentLoaded',
        document.querySelectorAll('a[data-copy-text]')
        .forEach(a => {
            a.addEventListener('click', copyURI);
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
            .addEventListener('input', footerTabsState.save)
        )
    );
</script>
<?php wp_footer(); ?>

</body>

</html>