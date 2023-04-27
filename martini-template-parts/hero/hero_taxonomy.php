<?php $term = get_queried_object(); ?>
<section id="hero" class="hero-title">
    <section class="hero-container">
        <div class="h-100 align-items-center">
            <div id="hero-content" class="p-2 d-flex flex-column justify-content-center">
                <h1> <?php echo $term->name; ?> </h1>
                <!-- <p class="h3 fw-regular"><?php /*  echo get_the_excerpt(); */ ?></p> -->
                <div class="hero-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
            </div>
        </div>
    </section>
</section>