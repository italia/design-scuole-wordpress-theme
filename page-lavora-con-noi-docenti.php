<?php
get_header()
?>
<main id="main-container" class="main-container">
    <?php get_template_part("martini-template-parts/hero/hero_title") ?>

    <section id="input-lavora-con-noi-docenti" class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode('[contact-form-7 id="126" title="Lavora con noi - Docenti"]') ?>

                <p class="disclaimer mt-4 text-xs bold">Attenzione: per inviare più candidature è necessario compilare più volte il modulo</p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer()

?>