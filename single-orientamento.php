<?php get_header();?>

<?php get_template_part("template-parts/hero/hero_martini/page"); ?>      

    <main id="main-container" class="container">
      <section>
        <h2> <?php the_title(); ?> </h2>

        <p> <?php the_content(); ?> </p>
      </section>

    </main>

<?php
get_footer();
