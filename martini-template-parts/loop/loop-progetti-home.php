<div class="col-12 col-lg-4 offset-lg-1 mt-5 mt-lg-0 pl-0" id="progetti-home">
          <h4>Alcuni dei nostri progetti </h4>
          <div class="container-progetti">

            <?php
                $loop = new WP_Query( array( 
                  'post_type'         => 'scheda_progetto',
                  'post_status'       => 'publish', 
                  'orderby'           => 'count', 
                  'order'             => 'DESC', 
                  'posts_per_page'    => 2, )
                );
            
              while ($loop -> have_posts()) : $loop -> the_post(); ?> 

              <article class="card-progetti"> 
                <div class="row-img">
                  <a class="img-loop" href="<?php the_permalink();?>">
                    <?php 
                    if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
                          echo get_the_post_thumbnail($post->ID);
                        }?> 
                    <div></div> 
                  </a>
                </div><!--.row-img -->
              
                  <div class="card--body">
                    <a href="<?php the_permalink();?>">
                      <h5 class="h6 primary"><?php echo mb_strimwidth(get_the_title(), 0, 60,);?></h5>
                      <p class="text-sm"><?php echo substr(strip_tags(dsi_get_meta("descrizione")), 0, 60);?>...</p>
                    </a>
                  </div>
              
              </article>
            <?php endwhile; ?>
          </div><!--.container-progetti -->

        <div class="mt-4 mt-lg-0 pl-0 pr-0 w-100">
          <a class="btn-lg-default-outline" href="">
            <button>Vedi tutti</button>
          </a>
        </div><!--.col-12 -->