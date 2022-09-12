<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $luogo, $c, $struttura, $gallery;
get_template_part("template-parts/single/related-posts", $args = array( "scheda_progetto")); 
get_header();

$is_luogo_scuola = dsi_get_meta("is_luogo_scuola");

$link_schede_luoghi = dsi_get_meta("link_schede_luoghi");
$nome_luogo_custom = dsi_get_meta("nome_luogo_custom");
$link_strutture = dsi_get_meta("link_strutture");
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$link_schede_servizi = dsi_get_meta("link_schede_servizi");

//$file_documenti = dsi_get_meta("file_documenti");
$is_realizzato = dsi_get_meta("is_realizzato");
$risultati = dsi_get_meta("risultati");
$gallery = dsi_get_meta("gallery");

$user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);
?>
    <main id="main-container" class="main-container bluelectric ">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);
            $image_url = get_the_post_thumbnail_url($post, "item-gallery");
            $autore = get_user_by("ID", $post->post_author);
            ?>

            
            <section class="section bg-white py-lg-5 py-3">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-lg-8 col-md-8 col-12 position-static h-auto d-block">
                            <div>
                                <div class="title-content">
                                    <h1 class="h2 text-black mb-lg-5 mb-4"><?php the_title(); ?></h1>
                                    <?php
                                    global $badgeclass;
                                    $badgeclass = "badge-outline-bluelectric";
                                    get_template_part("template-parts/common/badges-argomenti");
                                    ?>
                                
                                    <!-- <p class="mb-0"><?php echo dsi_get_meta("descrizione"); ?></p>-->
                                    
                                </div><!-- /title-content -->
                                <div class="" id="title-img">
                                    <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
                                </div class="pt-4">
                                <?php
                                    $anno_scolastico =  dsi_get_meta("anno_scolastico");

                                    // recupero l'anno scolastico di riferimento del progetto
                                    if($anno_scolastico){
                                        ?>
                                        <i class="text-black font-weight-normal h6 d-block pt-4 m-0"><?php _e("Anno scolastico", "design_scuole_italia"); ?> <?php echo dsi_convert_anno_scuola($anno_scolastico) ?></i>
                                        <?php
                                    }
                                    ?>
                            </div><!-- /header -->
                        

                            <div class="main-content pt-lg-2 pt-0">
                                <?php if($user_can_view_post): ?>
                                <article class="article-wrapper p-0">
                                    
                                    <div class="px-0 wysiwig-text">
                                        <h4><?php _e("", "design_scuole_italia"); ?></h4>
                                        <?php the_content(); ?>
                                    </div>

                                    <?php else: ?>
                                        <div class="col-lg-12 p-5 m-5 text-center font-weight-bold wysiwig-text">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endif; ?>

                                </article>

                                <?php if ( is_array( $gallery ) && count( $gallery ) > 0 ) { ?>
                                <section class="section py-5" id="art-par-gallery">
                                    <div class="container py-4">
                                        <div class="title-section text-center mb-5">
                                            <h3 class="h4">Galleria</h3>
                                        </div><!-- /title-large -->
                                        <div class="row variable-gutters">
                                            <div class="col-12">
                                                <div class="it-carousel-wrapper simple-two-carousel splide" data-bs-carousel-splide>
                                                    <div class="splide__track">
                                                        <ul class="splide__list">
                                                        <?php get_template_part( "template-parts/single/gallery", $post->post_type ); ?>
                                                        </ul>
                                                    </div><!-- /carousel-simple -->
                                                </div>
                                            </div><!-- /col -->
                                        </div><!-- /row -->
                                    </div><!-- /container -->
                                </section>
                                <?php } ?><!-- /gallery -->

                            </div><!-- / main-content -->
                        </div><!-- /col-lg-8 -->
                        
                        <div class="col-12 col-lg-4 pl-lg-5 pl-0" id="progetti-home">
                            <div id="sidebar_projects">
                                <h4 class="text-black mb-4">Progetti correlati</h4>
                            <div class="row mt-3 mt-lg-0">

                                <?php
                                $loop = new WP_Query( array( 
                                    'post_type'         => 'post', 
                                    'post_status'       => 'publish', 
                                    'orderby'           => 'count', 
                                    'order'             => 'DESC', 
                                    'posts_per_page'    => 2,)
                                );
                                
                                while ($loop -> have_posts()) : $loop -> the_post(); ?> 

                                <article class="col-12"> 
                                    <div class="row justify-content-between">
                                        
                                        <div class="col-lg-4 col-4 row-img">
                                            <a href="<?php the_permalink();?>">
                                                <?php the_post_thumbnail("project-thumb, h-75");?> 
                                            </a>
                                        </div>
                                    
                                        <div class="col-lg-8 col-7">
                                            <a href="<?php the_permalink();?>">
                                                <p class="h6"><?php the_title(); ?></p>
                                                <?php the_excerpt($length); ?>
                                            </a>
                                        </div><!--.col-8 -->
                                    </div><!--.row -->
                                </article><!--.col-12 -->
                                <?php endwhile; ?>
                            </div><!--.row -->
                        </div><!--col-3 offset-1 -->
      
                            <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) /*|| (is_array($file_documenti) && count($file_documenti)>0)*/){ ?>
                                <h4  id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <div class="card-deck card-deck-spaced d-block" id="card-sidebar">
                                            <?php
                                            if(is_array($link_schede_documenti) && count($link_schede_documenti)>0) {
                                                global $documento;
                                                foreach ( $link_schede_documenti as $link_scheda_documento ) {
                                                    $documento = get_post( $link_scheda_documento );
                                                    get_template_part( "template-parts/documento/card" );
                                                }
                                            }

                                            /*
                                            global $idfile, $nomefile;
                                            if(is_array($file_documenti) && count($file_documenti)>0) {

                                                foreach ( $file_documenti as $idfile => $nomefile ) {
                                                    get_template_part( "template-parts/documento/file" );
                                                }
                                            }*/

                                            ?>
                                        </div><!-- /card-deck card-deck-spaced -->
                                    </div><!-- /col-lg-12 -->
                                </div><!-- /row -->
                            <?php
                            }
                            ?><!-- /documenti -->
                        </div>

                    </div><!-- /row -->
                </div><!-- /container -->
            </section><!-- /section -->

                <?php get_template_part("template-parts/header/status"); ?>


                
                
            
                    


        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
