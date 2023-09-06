<div class="row loop__news m-0 w-100">

  <?php
  $loop = new WP_Query(
    array(
      'post_type'         => 'post',
      'post_status'       => 'publish',
      'orderby'           => 'count',
      'order'             => 'DESC',
      'posts_per_page'    => 4,
    )
  );

  while ($loop->have_posts()) : $loop->the_post();

  ?>

    <article class="loop__news__card col-12 col-md-6">
      <div class="loop__news__card__content">
        <a class="loop__news__card__content__image" href="<?php the_permalink(); ?>">
          <?php if( !empty(get_the_post_thumbnail()) ) { ?>
            <?php the_post_thumbnail('item-gallery');?>
            <?php } else { ?>
                <img class="object-fit-cover loop__news__card__content__image__placeholder" src="<?php echo get_template_directory_uri() . '/assets/images_martini/logo-custom.png'; ?>"/>
          <?php } ?>
        </a>

        <h5 class="loop__news__card__content__title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?></h5>

        <a href="<?php the_permalink(); ?>" class="loop__news__card__content__link">
          <button class="loop__news__card__content__link__button">Scopri</button>
        </a>
      </div>
    </article> <!--.card -->

  <?php endwhile; ?>
</div>