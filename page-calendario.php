<?php
get_header();
?>

<main id="main-container" class="main-container">
<?php get_template_part("template-parts/common/breadcrumb"); ?>

    <section id="text-block" class="section bg-white mt-5 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-12">
                <h2>Calendario d'istituto</h2>
                    <?php echo do_shortcode('[calendar id="613"]'); ?>
                </div>

            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();
