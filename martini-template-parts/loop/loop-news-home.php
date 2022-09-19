<div class="cards-container ml-0">
          <h4>Ultime news </h4>
          <div class="container-news">
        
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
              <article class="card">
                <div class="card-img-top card-img position-relative">
                  <a class="img-loop" href="<?php the_permalink();?>">
                    <?php the_post_thumbnail("news-thumb");?>
                    <div></div>
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
            <?php endwhile; ?>
          </div><!--.container-news -->
          <div class="button-container mt-4 mt-lg-0">
            <a class="btn-lg-default-outline w-100" href="<?php get_page_by_path('novità')?>" class="col-12 p-0">
              <button>Vai alla sezione</button>
            </a>
          </div>
          
        </div><!-- .cards-container-->