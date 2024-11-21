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
            <div class="col logos-wrapper">
                <img class="ue-logo"
                    src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-eu-inverted.svg' ); ?>"
                    alt="Finanziato dall' Unione Europea - Next generation EU"
                >
                <div class="logo-footer">
                    <a href="<?php echo home_url(); ?>" class="logo-header" <?php echo is_front_page() ? 'aria-current="page"' : ''; ?>>
                    <?php get_template_part("template-parts/common/logo", null, array( 'ignora_stemma_scuola' => true )); ?>
                    <span class="h1">     
                        <span><?php echo dsi_get_option("tipologia_scuola"); ?></span>
                        <span><strong><?php echo dsi_get_option("nome_scuola"); ?></strong></span>
                        <span><?php echo dsi_get_option("luogo_scuola"); ?></span>
                        <?php if (!is_front_page()): ?>
                        <span class="sr-only">— Visita la pagina iniziale della scuola</span>
                        <?php endif; ?>
                    </span>
                    </a>
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
                            <?php if($telegram = dsi_get_option( "telegram", "socials" )) :?><a href="<?php echo $telegram; ?>" aria-label="telegram" title="vai su Telegram"><svg class="icon it-social-telegram"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-telegram"></use></svg></a><?php endif; ?>
                        </div><!-- /footer-social-wrapper -->
                    </div><!-- /gooter-social -->
                <?php endif ?>
            </div>
        </div><!-- /row -->
        <?php
            $contatti_indirizzo = dsi_get_option("contatti_indirizzo", "contacts");
            
            $contatti_centralino = dsi_get_option("contatti_centralino", "contacts");
            $contatti_PEO = dsi_get_option("contatti_PEO", "contacts");
            $contatti_PEC = dsi_get_option("contatti_PEC", "contacts");

            $contatti_CF = dsi_get_option("contatti_CF", "contacts");
            $contatti_meccanografico = dsi_get_option("contatti_meccanografico", "contacts");
            $contatti_IPA = dsi_get_option("contatti_IPA", "contacts");
            $contatti_CUF = dsi_get_option("contatti_CUF", "contacts");

            $footer_text = dsi_get_option("footer_text", "setup");

            if($contatti_indirizzo || $contatti_centralino || $contatti_PEO || $contatti_PEC || $contatti_CF || $contatti_meccanografico || $contatti_IPA || $contatti_CUF || (isset($footer_text) && trim($footer_text) != "")) {
            ?>
                <div class="row variable-gutters mb-3">
                    <div class="col-lg-12 text-left text-md-center footer-text">
                            
                            <?php if($contatti_indirizzo) { ?>
                                Indirizzo: <a class="text-underline-hover" href="https://www.google.com/maps/search/<?php echo urlencode($contatti_indirizzo); ?>" title="Visualizza su Google Maps"><?php echo $contatti_indirizzo; ?></a>
                            <?php } ?>
                            
                            <?php if($contatti_centralino || $contatti_PEO || $contatti_PEC) { ?>
                                <ul class="list-inline">
                                    <?php if($contatti_centralino) { ?>
                                        <li class="list-inline-item">Centralino: <a class="text-underline-hover" href="tel:<?php echo str_replace(' ', '', $contatti_centralino); ?>"><?php echo $contatti_centralino; ?></a></li>
                                    <?php } ?>
                                    <?php if($contatti_PEO) { ?>
                                        <li class="list-inline-item">Email: <a class="text-underline-hover" href="mailto:<?php echo str_replace(' ', '', $contatti_PEO); ?>"><?php echo $contatti_PEO; ?></a></li>
                                    <?php } ?>
                                    <?php if($contatti_PEC) { ?>
                                        <li class="list-inline-item">Posta elettronica certificata (PEC): <a class="text-underline-hover" href="mailto:<?php echo str_replace(' ', '', $contatti_PEC); ?>"><?php echo $contatti_PEC; ?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            
                            <?php if($contatti_CF || $contatti_meccanografico || $contatti_IPA || $contatti_CUF) { ?>
                                <ul class="list-unstyled">
                                    <?php if($contatti_CF) { ?>
                                        <li>Codice fiscale: <?php echo $contatti_CF; ?></li>
                                    <?php } ?>
                                    <?php if($contatti_meccanografico) { ?>
                                        <li>Codice meccanografico: <a class="text-underline-hover" href="https://cercalatuascuola.istruzione.it/cercalatuascuola/ricerca/risultati?tipoRicerca=RAPIDA&rapida=<?php echo str_replace(' ', '', $contatti_meccanografico); ?>"><?php echo $contatti_meccanografico; ?></a></li>
                                    <?php } ?>
                                    <?php if($contatti_IPA) { ?>
                                        <li>Codice Indice delle Pubbliche Amministrazioni (IPA): <?php echo $contatti_IPA; ?></li>
                                    <?php } ?>
                                    <?php if($contatti_CUF) { ?>
                                        <li>Codice unico di fatturazione (CUF): <?php echo $contatti_CUF; ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            
                            <?php echo wpautop($footer_text); ?>
                    </div>
                </div>
            <?php
        }
        get_template_part("template-parts/common/copy");
        ?>
    </div>
</footer>
</div><!-- /push_container -->

<?php wp_footer(); ?>

</body>
</html>
