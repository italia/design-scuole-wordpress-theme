<?php
/**
 * Box correlati per tassonomia argomento
 */
global $post, $related_type, $posts_array;
if(!$related_type)
    $related_type = "card-vertical-thumb";
$oldpost = $post;
	
if ( is_array( $posts_array ) && count( $posts_array ) ) { ?>
	<section class="" id="art-par-correlati">
	<div class="pt-3">

		<div class="row variable-gutters">
			<div class="col-12">

				<h2 class="h4 text-black text-left semi-bold"><?php _e("News correlate", "design_scuole_italia"); ?></h2>

				
                  <div class="ps-lg-3 pe-lg-3 news_correlate" id="news_correlate">
                    
						<?php
						foreach ( $posts_array as $post ) {
							?>
							
								<?php get_template_part( "template-parts/single/".$related_type, $post->post_type ); ?>
						
						<?php } ?>
						</div>
				  
				
			</div><!-- /col-lg-12 -->
		</div><!-- /row -->
	</div><!-- /container -->
	</section><?php
}

$post = $oldpost;