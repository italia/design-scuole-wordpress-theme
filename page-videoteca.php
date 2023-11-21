<?php get_header();
?>

<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    </section>
    <?php get_template_part("template-parts/common/breadcrumb"); ?>

    <section>
        <div class="container mx-auto">
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