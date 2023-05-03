<?php get_header(); ?>

<section>
  <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
  <?php get_template_part("template-parts/common/breadcrumb"); ?>
</section>

<main id="main-container" class="container">
  <section class="my-5 mx-sm-3">
    <h2 class="my-5"> <?php the_title(); ?> </h2>
    <?php the_content(); ?>
  </section>

</main>

<?php
get_footer();
