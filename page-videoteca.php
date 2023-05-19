<?php get_header();
?>

<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    </section>

    <section>
        <div class="container mx-5">
            <div class="row">
                <?php the_content();?>
            </div>
            <h3>Orientamento in entrata</h3>
            <div>
                <?php echo do_shortcode( '[TS_Video_Gallery id="1"]' ); ?>
            </div>
            <h3>Dicono di noi</h3>
            <div>
                <?php echo do_shortcode('[TS_Video_Gallery id="5"]') ;?>
            </div>
            <h3>Progetti</h3>
            <div>
                <?php echo do_shortcode('[TS_Video_Gallery id="6"]') ;?>
            </div>
            <h3>Videolezioni</h3>
            <div>
                <?php echo do_shortcode('[TS_Video_Gallery id="2"]') ;?>
            </div>
            <h3>Video studenti</h3>
            <div>
                <?php echo do_shortcode('[TS_Video_Gallery id="1"]') ;?>
            </div>
            <h3>Tutorial</h3>
            <div>
                <?php echo do_shortcode('[TS_Video_Gallery id="4"]') ;?>
            </div>
        </div>
    </section>

</main>
<?php
get_footer();