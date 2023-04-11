<?php
/**
 * Custom template for single-circolare.php
 *
 */
global $post, $autore, $luogo, $c, $badgeclass;
$args = ["post", "evento", "circolare"];
get_template_part("template-parts/single/related-posts");

// controllo la visibilità della circolare
$is_pubblica = dsi_get_meta("is_pubblica");
/* if($is_pubblica == "false") {
    if(!is_user_logged_in()){
        wp_redirect(home_url());
    }
} */


get_header();
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$file_documenti = dsi_get_meta("file_documenti");
//$luoghi = dsi_get_meta("luoghi");
//$persone = dsi_get_meta("persone");
$numerazione_circolare = dsi_get_meta("numerazione_circolare");

$gruppi_circolari = dsi_get_meta("gruppi_circolari");
$destinatari_circolari =  dsi_get_meta("destinatari_circolari");
$user = wp_get_current_user();
$current_user_roles = (array) $user->roles;

$can_view = "true";

if($destinatari_circolari == "ruolo"){
	
	$allowed_roles = dsi_get_meta("ruoli_circolari"); 
	$c = array_intersect($allowed_roles,$current_user_roles);
	if (count($c) > 0) {
	$can_view = "true";
	} else {
	$can_view = "false";
	}
	
	

	if (in_array($allowed_roles,$current_user_roles)) {
	$can_view_new = "true";
	} else {
	$can_view_new = "false";
	}
	

	
	
	
}

if($destinatari_circolari == "all"){
	$can_view = "true";
}


if($destinatari_circolari == "gruppo"){
		$users = array();
        $gruppi_circolari = dsi_get_meta("gruppi_circolari", '', $post->ID);
        $users = get_objects_in_term( $gruppi_circolari, "gruppo-utente" );
        if (in_array($user->ID,$users )) {
			$can_view = "true";
		} else {
			$can_view = "false";
		}	
}




?>  


    <main id="main-container" class="main-container greendark">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
		
		
<?php if($is_pubblica == "false" && !is_user_logged_in()) {?>
<!-- Utente non loggato && circolare non pubblica -->
<center><p class="article-wrapper">Il contenuto è riservato, per visualizzarlo è necessario <a href="#" aria-label="Accedi" data-toggle="modal" data-target="#access-modal">inserire le proprie credenziali</a>.</p></center><br>
<?php get_footer();die;?>
<?php }?>		
		
		
<?php if ($is_pubblica == "false" && is_user_logged_in() &&  $can_view == "false") {?>
<!-- Utente loggato, circolare non pubblica ma non autorizzata -->            
<center><p class="article-wrapper">Il contenuto della circolare è riservato. La tua utenza non è autorizzata a visualizzarlo.</p></center><br>
<?php get_footer();die;?>
<?php }?>	


<?php if ($can_view != "false") {?>
<!-- Circolare autorizzata --> 
        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);


                get_template_part("template-parts/single/header-circolare");
            ?>

            <section class="section bg-white py-5">
                <div class="container border-top">
                    <div class="row variable-gutters">
                        <div class="col-lg-9 col-md-8 order-lg-1">
                            <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
                                    <div class="col-lg-8 wysiwig-text">
										<?php the_content(); ?>
                                    </div>
                                </div>
                                <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)) { ?>
                                    <h2 class="h4 mb-4"><?php _e("Documenti", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php
                                                if(is_array($link_schede_documenti) && count($link_schede_documenti)>0) {
                                                    global $documento;
                                                    foreach ( $link_schede_documenti as $link_scheda_documento ) {
                                                        $documento = get_post( $link_scheda_documento );
                                                        get_template_part( "template-parts/documento/card" );
                                                    }
                                                }

                                                global $idfile, $nomefile;
                                                if(is_array($file_documenti) && count($file_documenti)>0) {

                                                    foreach ( $file_documenti as $idfile => $nomefile ) {
                                                        get_template_part( "template-parts/documento/file" );
                                                    }
                                                }

                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                            <?php get_template_part( "template-parts/single/feedback-circolare");?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <?php get_template_part( "template-parts/single/bottom" ); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            </article>
                        </div><!-- /col-lg-8 -->
                        <div class="col-lg-3 col-md-4 order-lg-0">
                            <?php get_template_part("template-parts/single/actions"); ?>
                            <?php $badgeclass = "badge-outline-greendark";                        get_template_part("template-parts/common/badges-argomenti"); ?>
                        </div><!-- /col-lg-3 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php get_footer();die;?>
<?php }?>		



<?php if ($is_pubblica == "true" ) {?>
<!-- Circolare pubblica in caso di conflitto con i destinatari (buggy admin) forza la visualizzazione --> 
        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);


                get_template_part("template-parts/single/header-circolare");
            ?>

    <section class="section bg-white py-5">
                <div class="container border-top">
                    <div class="row variable-gutters">
                        <div class="col-lg-9 col-md-8 order-lg-1">
                            <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
                                    <div class="col-lg-8 wysiwig-text">
										<?php the_content(); ?>
                                    </div>
                                </div>
                                <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)) { ?>
                                    <h2 class="h4 mb-4"><?php _e("Documenti", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php
                                                if(is_array($link_schede_documenti) && count($link_schede_documenti)>0) {
                                                    global $documento;
                                                    foreach ( $link_schede_documenti as $link_scheda_documento ) {
                                                        $documento = get_post( $link_scheda_documento );
                                                        get_template_part( "template-parts/documento/card" );
                                                    }
                                                }

                                                global $idfile, $nomefile;
                                                if(is_array($file_documenti) && count($file_documenti)>0) {

                                                    foreach ( $file_documenti as $idfile => $nomefile ) {
                                                        get_template_part( "template-parts/documento/file" );
                                                    }
                                                }

                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                            <?php get_template_part( "template-parts/single/feedback-circolare");?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <?php get_template_part( "template-parts/single/bottom" ); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            </article>
                        </div><!-- /col-lg-8 -->
                        <div class="col-lg-3 col-md-4 order-lg-0">
                            <?php get_template_part("template-parts/single/actions"); ?>
                            <?php $badgeclass = "badge-outline-greendark";                        get_template_part("template-parts/common/badges-argomenti"); ?>
                        </div><!-- /col-lg-3 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

<?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php get_footer();die;?>
<?php }?>	


