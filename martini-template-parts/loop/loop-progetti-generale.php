<div class="cards-container m-0 p-0">

  <div class="container m-0 p-0">

    <div class="row">

      <h4 class="col-12">Progetti correlati </h4>

      <div class="container-news col-12 row mb-4 my-3">
        
        <?php
          $loop = new WP_Query( array( 
            'post_type'         => 'scheda_progetto', 
            'post_status'       => 'publish', 
            'orderby'           => 'count', 
            'order'             => 'DESC', 
            'posts_per_page'    => 3,)
          );


          while ($loop -> have_posts()) : $loop -> the_post(); 

          ?> 

          <div class="col-12 col-lg-4">
              <?php get_template_part( 'martini-template-parts/card', get_post_type() );?> 
          </div>
      <?php
        ?>
        

          <?php endwhile; ?>

        </div><!--.container-news -->

        <div class="button-container col-12 mt-4 mt-lg-0 pr-3">

          <a class="btn-lg-default-outline w-100" href="<?php get_page_by_path('progetti')?>" class="col-12 p-0">

            <button>Vai alla sezione</button>

          </a>

        </div>    
    </div>
  </div><!-- container m-0 p 0 -->
</div><!-- .cards-container-->