<div class="row g-2">

  <?php
  $loop = new WP_Query(
    array(
      'post_type'         => 'orientamento',
      'post_status'       => 'publish',
      'orderby'           => 'count',
      'order'             => 'DESC',
      'posts_per_page'    => 3,
    )
  );

  while ($loop->have_posts()) : $loop->the_post();

  ?>

    <article class="orientamento col-12 col-md-4">
        <div class="orientamento__post">
            <h5 class="orientamento__post__title"><?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?></h5>
            <p class="orientamento__post__text"><?php echo mb_strimwidth(get_the_excerpt(), 0, 300, '...');;?></p>
            <a href="<?php the_permalink(); ?>" class="orientamento__post__link">
                <button class="orientamento__post__link__button">Scopri di più</button>
            </a>
        </div>
    </article> <!--.card -->
    

  <?php endwhile; ?>
</div>