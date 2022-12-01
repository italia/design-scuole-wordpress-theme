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
        <div class="container mb-5 martini-list">        
            <div>
            <?php   
                $args = array(
                'posts_per_page' => -1,
                'post_parent' => $post->ID,
                'post_type' => 'page',
                'post_status' => '',
                'orderby' => 'title',
                'order' => 'ASC',);

                query_posts($args);
                
                if(have_posts()) {
                    while (have_posts()) : the_post(); 
                        get_template_part("template-parts/list/page-list"); 
                    endwhile; 
                } 
            ?>
            </div>
        </div>
</main>
<?php
get_footer();
