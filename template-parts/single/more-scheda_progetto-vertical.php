<?php
/**
 * Box correlati per tassonomia argomento
 */

global $post, $related_type, $posts_array;
if(!$related_type)
    $related_type = "card-vertical-thumb";
$oldpost = $post;

if ( count( $posts_array ) ) { ?>
	<section class="section bg-gray-gradient py-5 " id="art-par-correlati">
	    <div class="container pt-3">
				<h3 class="mb-5 ml-3 text-center semi-bold text-gray-primary"><?php _e("Progetti correlati", "design_scuole_italia"); ?></h3>
            <div class="" id="related_projects">
                <?php
                foreach ( $posts_array as $post ) {
                    ?>
                    <div class="mb-4">
                        <?php 
                        get_template_part( "template-parts/single/".$related_type, $post->post_type ); ?>
                    </div><!-- /item -->
                <?php } ?>
            </div>
	    </div><!-- /container -->
	</section><?php
}
$post = $oldpost;