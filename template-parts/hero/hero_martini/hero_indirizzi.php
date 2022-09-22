<section>
    <div id="hero" class="container-fluid">
        <div id="content" class="row align-items-center">
            <div class="col-8">
                <h1> <?php the_title(); ?> </h1>
            </div>
            <div class="col-4">
                <?php if ( has_post_thumbnail('dsi_register_indirizzo_post_type') ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>