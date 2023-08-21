<?php
/**
 * Box correlati per tassonomia argomento
 */

global $post, $related_type, $posts_array;
if(!$related_type)
    $related_type = "card-vertical-thumb";
$oldpost = $post;

if ( is_array($posts_array) && count( $posts_array ) ) { ?>
	<section class="section bg-gray-gradient py-5" id="art-par-correlati">
	<div class="container pt-3">

		<div class="row variable-gutters">
			<div class="col-lg-12">

				<h3 class="mb-5 text-center semi-bold text-gray-primary"><?php _e("Progetti correlati", "design_scuole_italia"); ?></h3>

				<div class="it-carousel-wrapper carousel-notice it-carousel-landscape-abstract-three-cols splide"
                  data-bs-carousel-splide>
                  <div class="splide__track ps-lg-3 pe-lg-3">
                    <ul class="splide__list it-carousel-all">
						<?php
						foreach ( $posts_array as $post ) {
							?>
							<li class="splide__slide">
								<?php 
								get_template_part( "template-parts/single/".$related_type, $post->post_type ); ?>
							</li><!-- /item -->
						<?php } ?>
					</ul>
				  </div><!-- /carousel-large -->
				</div>
			</div><!-- /col-lg-12 -->
		</div><!-- /row -->
	</div><!-- /container -->
	</section><?php
}
$post = $oldpost;