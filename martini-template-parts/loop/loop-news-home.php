<div class="cards-container col-12 col-lg-7 m-0 p-0">

  <div class="container m-0 p 0">

    <div class="row">

      <h4 class="col-12">Ultime news </h4>

      <div class="container-news col-12 row">
        
        <?php
          $loop = new WP_Query( array( 
            'post_type'         => 'post', 
            'post_status'       => 'publish', 
            'orderby'           => 'count', 
            'order'             => 'DESC', 
            'posts_per_page'    => 3,)
          );

          while ($loop -> have_posts()) : $loop -> the_post(); 

        ?>
        <div class="col-12 col-lg-4">
        
          <article class="card">

            <div class="card-img-top card-img position-relative">

              <a class="img-loop" href="<?php the_permalink();?>">

                <div></div>
                <?php the_post_thumbnail("news-thumb");?>

              </a>

              <div class="position-absolute" id="card_article_badge"> 

                <?php get_template_part("template-parts/common/badges-argomenti"); ?>

              </div>

            </div>

            <div class="card-body">

              <p class="card-title primary"> <?php the_title(); ?> </p>

              <a href="<?php the_permalink();?>" class="btn-mini-default"> 

                <button class="w-auto">Scopri</button>

              </a>

            </div>

          </article> <!--.card -->

        </div>

          <?php endwhile; ?>

        </div><!--.container-news -->

        <div class="button-container col-12 mt-4 mt-lg-0 pr-3">

          <a class="btn-lg-default-outline w-100" href="<?php get_page_by_path('novità')?>" class="col-12 p-0">

            <button>Vai alla sezione</button>

          </a>

        </div>    
    </div>
  </div><!-- container m-0 p 0 -->
</div><!-- .cards-container-->