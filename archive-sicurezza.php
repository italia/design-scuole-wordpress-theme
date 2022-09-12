<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();

?>
    <main id="main-container" class="main-container">
        <?php get_template_part("template-parts/hero/hero_page"); ?>
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <section id="container-spazi">
            <div class="row">
                <?php 

                    $sicurezza = get_term_by("id", "file_sicurezza");
                    $covid = get_term_by("id", "file_covid"); 

                    $loop = new WP_Query( array(
                        'post_type'         => 'sicurezza',
                        'post_status'       => 'publish',
                        'orderby'           => 'count',
                        'order'             => 'DESC',
                        'posts_per_page'    => 999 ,
                    )); 
                    
                    while ($loop -> have_posts()) : $loop -> the_post( $sicurezza ); ?>

                        <article>
                            <div class="row">
                                <div class="col-2"><i class="bi bi-filetype-pdf"></i></div>
                                <div class="col-8"> 
                                    <a href="<?php the_permalink();?>"> 
                                        <?php the_title(); ?> 
                                    </a> 
                                </div>
                            </div>        
                        </article>

                <?php endwhile; ?>

                <!-- Secondo loop per il covid -->

                <?php 

                    $sicurezza = get_term_by("id", "file_sicurezza");
                    $covid = get_term_by("id", "file_covid"); 

                    $loop = new WP_Query( array(
                        'post_type'         => 'sicurezza',
                        'post_status'       => 'publish',
                        'orderby'           => 'count',
                        'order'             => 'DESC',
                        'posts_per_page'    => 999 ,
                    )); 

                    while ($loop -> have_posts()) : $loop -> the_post( $covid ); ?>

                        <article>
                            <div class="row">
                                <div class="col-2">icona</div>
                                <div class="col-8"> 
                                    <a href="<?php the_permalink();?>"> 
                                        <?php the_title(); ?> 
                                    </a> 
                                </div>
                            </div>        
                        </article>

                <?php endwhile; ?>

            </div>
            </section>
        </main>

    <?php
    get_footer();