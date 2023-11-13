<?php
/* Template Name: Landing
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
get_header();
?>
<main>
    <section class="container my-5">
        <h1 class="my-3 text-primary"><?php echo the_title(); ?></h1>
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <div class="p-4">
        <?php
        wp_reset_query(); // necessary to reset query
        while (have_posts()) : the_post(); ?>
        <?php
            the_content();
        endwhile; // End of the loop.
        ?>
        </div>
    </section>
</main>
<?php
get_footer();
