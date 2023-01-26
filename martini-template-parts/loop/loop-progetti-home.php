<!-- new loop -->

<div class="row loop__progetti">

  <?php
  $loop = new WP_Query(
    array(
      'post_type'         => 'scheda_progetto',
      'post_status'       => 'publish', 
      'orderby'           => 'count', 
      'order'             => 'DESC', 
      'posts_per_page'    => 3, )
  );

  while ($loop->have_posts()) : $loop->the_post();

  ?>

    <article class="col-12 loop__progetti__card">
      <div class="loop__progetti__card__content">
        <a class="loop__progetti__card__content__image" href="<?php the_permalink(); ?>">
          <?php if( !empty(get_the_post_thumbnail()) ) { ?>
            <?php the_post_thumbnail('news-thumb');?>
            <?php } else { ?>
                <img class="loop__news__card__content__image__placeholder" src="<?php echo get_template_directory_uri() . '/assets/images_martini/logo-custom.png'; ?>"/>
          <?php } ?>
        </a>

        <h5 class="loop__progetti__card__content__title"><?php echo mb_strimwidth(get_the_title(), 0, 22, '...'); ?></h5>
        <p><?php echo mb_strimwidth( get_the_excerpt(), 0, 60, '...' );?></p>

        <a href="<?php the_permalink(); ?>" class="loop__progetti__card__content__link">
          <button class="loop__progetti__card__content__link__button">Scopri</button>
        </a>
      </div>
    </article> <!--.card -->

  <?php endwhile; ?>
</div>