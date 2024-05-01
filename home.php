<?php
/**
 * The template for displaying home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>
    <main id="main-container" class="main-container redbrown">
        <?php
        if ( have_posts() ) :
            $messages = dsi_get_option( "messages", "home_messages" );
            if($messages && !empty($messages)) {
                get_template_part("template-parts/home/messages");
            }

            get_template_part("template-parts/hero/home");

            get_template_part("template-parts/home/banner");

            $home_is_selezione_automatica = dsi_get_option("home_is_selezione_automatica", "homepage");
            if($home_is_selezione_automatica == "false"){
                get_template_part("template-parts/home/articoli", "manuali");
            }else{
                get_template_part("template-parts/home/articoli", "eventi");
            }

            ?>
        <section class="section bg-white">
        <?php get_template_part("template-parts/hero/servizi"); ?>
        <?php get_template_part("template-parts/home/list", "servizi"); ?>
        </section>
            <?php
            $visualizzazione_didattica = dsi_get_option("visualizzazione_didattica", "didattica");
            if($visualizzazione_didattica == "scuole")
                get_template_part("template-parts/home/didattica", "cicli");
            else if($visualizzazione_didattica == "indirizzi")
                get_template_part("template-parts/home/didattica", "cicli-indirizzi");

              get_template_part("template-parts/home/didattica", "risorse");

//            get_template_part("template-parts/luogo/map");

        endif; // End of the loop.
		
		
		$home_argomenti = dsi_get_option("home_argomenti", "homepage");
		
		if (is_array($home_argomenti) && count($home_argomenti)) {
			?>
				<section class="section bg-white">
					<?php get_template_part("template-parts/hero/argomenti"); ?>
					<?php get_template_part("template-parts/home/list", "argomenti"); ?>
				</section>
			<?php
		}
        ?>
    </main>
<?php
get_footer();
