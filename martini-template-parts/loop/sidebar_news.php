<div>
    <div id="sidebar_news" class="mt-xs-0 mt-sm-0">
        <h4 class="text-black mb-4">News correlate</h4>
        <div class="row mt-3 mt-lg-0">

            <?php
            $loop = new WP_Query( array( 
                'post_type'         => 'post', 
                'post_status'       => 'publish', 
                'orderby'           => 'count', 
                'order'             => 'DESC', 
                'posts_per_page'    => 2,)
            );
            
            while ($loop -> have_posts()) : $loop -> the_post(); ?> 

            <article class="col-12 mt-3 mb-3"> 
                <div class="row justify-content-between" id="card_image_sidebar">
                    <div class="col-lg-3 col-3 row-img">
                        <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail("project-thumb");?> 
                        </a>
                    </div>
                
                    <div class="col-lg-8 col-7 pl-2">
                        <a href="<?php the_permalink();?>">
                            <p class="h6"><?php the_title(); ?></p>
                            <div id="related_text"><?php the_excerpt($length); ?></div>
                        </a>
                    </div><!--.col-8 -->
                </div><!--.row -->
            </article><!--.col-12 -->
            <?php endwhile; ?>
        </div>
        <div class="mt-4 mb-4">
            <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)) { ?>
            <h2 class="mb-4 h4 text-black"><?php _e("Allegati", "design_scuole_italia"); ?></h2>

            <div class="">
                <?php
                if(is_array($link_schede_documenti) && count($link_schede_documenti)>0) {
                    global $documento;
                    foreach ( $link_schede_documenti as $link_scheda_documento ) {
                        $documento = get_post( $link_scheda_documento );
                        get_template_part( "template-parts/documento/card" );
                    }
                }

                global $idfile, $nomefile;
                if(is_array($file_documenti) && count($file_documenti)>0) {

                    foreach ( $file_documenti as $idfile => $nomefile ) {
                        get_template_part( "template-parts/documento/file" );
                    }
                }
                ?>
            </div><!-- /card documento-->
            <?php
            }
            ?>
        </div><!-- /allegati -->
    </div><!--.sidebar -->
</div><!--col-3 offset-1 -->