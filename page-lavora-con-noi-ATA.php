<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header()
?>
<main id="main-container" class="main-container">
    <?php get_template_part("martini-template-parts/hero/hero_title") ?>

    <section id="input-lavora-con-noi-docenti" class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode('[contact-form-7 id="743" title="Lavora con noi - ATA"]') ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer()

?>