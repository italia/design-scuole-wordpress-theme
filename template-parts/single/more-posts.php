<?php
/**
 * Box correlati per tassonomia argomento
 */
global $post, $related_type, $posts_array;
if(!$related_type)
    $related_type = "card-vertical-thumb";
$oldpost = $post;
	
if ( is_array( $posts_array ) && count( $posts_array ) ) { ?>
	<section class="section bg-gray-gradient" id="art-par-correlati">
	<div class="container pt-3">

		<div class="row variable-gutters">
			<div class="col-12">

				<h2 class="h3 text-left semi-bold text-gray-primary"><?php _e("News correlate", "design_scuole_italia"); ?></h2>

				<div>
                  <div class="ps-lg-3 pe-lg-3 news_correlate">
                    <div id="news_correlate">
						<?php
						foreach ( $posts_array as $post ) {
							?>
							<div class="mb-4">
								<?php get_template_part( "template-parts/single/".$related_type, $post->post_type ); ?>
						</div><!-- /item -->
						<?php } ?>
						</div>
				  </div><!-- /carousel-large -->
				</div>
			</div><!-- /col-lg-12 -->
		</div><!-- /row -->
	</div><!-- /container -->
	</section><?php
}

$post = $oldpost;