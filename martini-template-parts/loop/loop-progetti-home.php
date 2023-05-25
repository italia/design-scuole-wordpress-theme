<!-- new loop -->

<div class="row loop__progetti">

  <?php
  $loop = new WP_Query(
    array(
      'post_type'         => 'progetti',
      'post_status'       => 'publish', 
      'orderby'           => 'menu_order', 
      'order'             => 'ASC', 
      'posts_per_page'    => 3, )
  );

  while ($loop->have_posts()) : $loop->the_post();

  ?>

    <article class="col-12 loop__progetti__card mb-2">
      <div class="loop__progetti__card__content w-100">
        <a class="loop__progetti__card__content__image" href="<?php the_permalink(); ?>">
          <?php if( !empty(get_the_post_thumbnail()) ) { ?>
            <?php the_post_thumbnail('project-thumb');?>
            <?php } else { ?>
                <img class="loop__progetti__card__content__image__placeholder" src="<?php echo get_template_directory_uri() . '/assets/images_martini/logo-custom.png'; ?>"/>
          <?php } ?>
        </a>
        <div class="loop__progetti__card__content__body w-100">

        <a href="<?php the_permalink(); ?>" class="loop__progetti__card__content__body__link">
          <h6 class="loop__progetti__card__content__body__link__title"><?php echo mb_strimwidth(get_the_title(), 0, 40, '...'); ?></h6>
        </a>          
        
        </div>
      </div>
    </article> <!--.card -->

  <?php endwhile; ?>
</div>