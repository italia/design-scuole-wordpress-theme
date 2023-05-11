<?php

/**
 * Page for display project
 */
get_header();
?>

<main id="main-container" class="main-container">
    <section id="hero" class="hero-title">
        <section class="hero-container">
            <div class="h-100 align-items-center">
                <div id="hero-content" class="p-2 d-flex flex-column justify-content-center">
                    <h1> Le Notizie </h1>
                    <!-- <p class="h3 fw-regular"><?php /*  echo get_the_excerpt(); */ ?></p> -->
                    <div class="hero-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                </div>
            </div>
        </section>
    </section>
    <!-- container post -->
    <section class="container my-5">
        <div class="row my-3">
            <?php
            $loop = new WP_Query(array(
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'orderby'           => 'count',
                'order'             => 'ASC',
                'posts_per_page'    => 999,
            ));

            while ($loop->have_posts()) : $loop->the_post(); ?>

                <article class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card__content">
                            <a class="card__content__image" href="<?php the_permalink(); ?>">
                                <?php if (!empty(get_the_post_thumbnail())) { ?>
                                    <?php the_post_thumbnail('news-thumb'); ?>
                                <?php } else { ?>
                                    <img class="card__content__image__placeholder" src="<?php echo get_template_directory_uri() . '/assets/images_martini/logo-custom.png'; ?>" />
                                <?php } ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="card__content__link">
                                <h5 class="card__content__link__title"><?php echo mb_strimwidth(get_the_title(), 0, 22, '...'); ?></h5>
                            </a>
                            <p class="card__content__text"><?php echo mb_strimwidth(get_the_excerpt(), 0, 60, '...'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="card__content__link">
                                <button class="card__content__link__button">Scopri</button>
                            </a>
                        </div>
                    </div>
                </article>

            <?php endwhile; ?>

        </div>
    </section><!-- end primary -->
</main>

<?php
get_footer();
