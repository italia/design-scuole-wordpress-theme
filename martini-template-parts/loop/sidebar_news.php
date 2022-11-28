<section class="related-news">
    <h4 class="text-black mb-4">News correlate</h4>
    <div class="container-progetti col-12 mb-4">
        <?php
        $loop = new WP_Query( array( 
            'post_type'         => 'post',
            'post_status'       => 'publish', 
            'orderby'           => 'count', 
            'order'             => 'DESC', 
            'posts_per_page'    => 3, )
        );
        while ($loop -> have_posts()) : $loop -> the_post(); 
        ?> 
        <article class="card-progetti">
            <div class="row-img">
            <a class="img-loop" href="<?php the_permalink();?>">
                <?php 
                if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
                    echo get_the_post_thumbnail($post->ID);
                }
                ?>
            </a>
            </div><!--.row-img -->
            <div class="card--body">
                <a href="<?php the_permalink();?>">          
                    <h5 class="h6 primary"><?php echo mb_strimwidth(get_the_title(), 0, 60,'...');?></h5>
                    <p class="text-sm"><?php echo substr(strip_tags(dsi_get_meta("descrizione")), 0, 72,);?>...</p>
                </a>
            </div>
        </article>
        <?php endwhile; ?>
    </div><!--.container-progetti -->
    <div class="col-12 mt-4 mt-lg-0 pl-0 pr-0 w-100">
      <a class="btn-lg-default-outline" href="i-progetti-della-classe">
        <button>Vedi tutte</button>
      </a>
    </div><!--.col-12 -->

  </div><!-- row -->

</section>
