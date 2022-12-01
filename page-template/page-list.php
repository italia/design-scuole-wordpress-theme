<?php
/* Template Name: Lista
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $tipologia_notizia, $ct;
get_header();
?>

<?php get_template_part("martini-template-parts/hero/hero_title"); ?>
<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <!-- loop per le pagine -->
        <div class="container my-5">        
            <div>
                
            <?php   
            $args = array(
            'posts_per_page' => -1,
            'post_parent' => $post->ID,
            'post_type' => 'page',
            'post_status' => '',
            'orderby' => 'title',
            'order' => 'ASC',);

            query_posts($args); ?>

            <?php if(have_posts()) : while (have_posts()) : the_post(); ?>

            <section id="container-fluid" class="px-0 px-md-5 p-4 align-items-center">
                <div class="row container-martini px-0 px-md-4 align-items-center">
                    <div class="col-12 col-md-6">
                        <a href="<?php the_permalink();?>"> <!-- href temporaneo -->
                            <h4 class="mb-0"><?php the_title();?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 align-items-start text-md-right">
                        <a class="btn-sm-default" href="<?php the_permalink();?>"> <!-- href temporaneo -->
                            <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                        </a>
                    </div>
                </div>
            </section>

            <?php endwhile; // end inner loop ?>
    
            <?php endif; // end outer if have_posts?>

            </div>
        </div>
</main>
<?php
get_footer();
