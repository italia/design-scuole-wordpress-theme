<?php get_header();
?>

<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    </section>

    <section>
        <div class="container">
            <div class="row my-5">
                <h3>Videoteca</h3>
            </div>
            <div class="row">
                <?php the_content();?>
            </div>
            <div>
                <?php echo do_shortcode('[TS_Video_Gallery id="1"]') ;?>
            </div>
            <h3>lezioni</h3>
            <div>
                <?php echo do_shortcode('[TS_Video_Gallery id="2"]') ;?>
            </div>
        </div>
    </section>

</main>
<?php
get_footer();