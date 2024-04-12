<?php
global $post;

$testo_notizie = dsi_get_option("testo_notizie", "notizie");
$testo_eventi = dsi_get_option("testo_eventi", "notizie");

?>
    <section class="section bg-greendark bg-greendarkgradient py-5 position-relative d-flex align-items-center overflow-hidden" style="min-height: 240px;" >
        <div class="green-square-forms">
            <svg width="100%" height="100%" viewBox="0 0 726 360" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g id="Group" opacity="0.32"><path id="Rectangle" d="M627.751,245.625l-396.368,-193.321l-193.322,396.368l396.368,193.321l193.322,-396.368Z" style="fill:url(#_Linear1);"/><path id="Rectangle1" serif:id="Rectangle" d="M583.359,-179.506l-264.865,159.147l159.147,264.865l264.865,-159.147l-159.147,-264.865Z" style="fill:url(#_Linear2);"/><path id="Rectangle2" serif:id="Rectangle" d="M210.182,-54.565l-213.341,33.79l33.79,213.34l213.341,-33.79l-33.79,-213.34Z" style="fill:url(#_Linear3);"/></g><defs><linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(203.046,589.69,-589.69,203.046,231.383,52.3035)"><stop offset="0" style="stop-color:#0f842e;stop-opacity:1"/><stop offset="1" style="stop-color:#00838f;stop-opacity:1"/></linearGradient><linearGradient id="_Linear2" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(344.438,-26.7144,26.7144,344.438,398.068,112.073)"><stop offset="0" style="stop-color:#0e8a5f;stop-opacity:1"/><stop offset="1" style="stop-color:#00838f;stop-opacity:1"/></linearGradient><linearGradient id="_Linear3" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(230.236,72.8805,-72.8805,230.236,13.7359,85.8949)"><stop offset="0" style="stop-color:#0e8a5f;stop-opacity:1"/><stop offset="1" style="stop-color:#00838f;stop-opacity:1"/></linearGradient></defs></svg>
        </div>
        <div class="container">
            <div class="row variable-gutters">
                <div class="col-md-5">
                    <div class="hero-title text-left">
                        <?php the_archive_title( '<h1 class="p-0 mb-2">', '</h1>' ); ?>
                        <?php if (!is_post_type_archive("evento")) {
                            remove_filter('get_the_post_type_description', 'wpautop');
                            the_archive_description("<h2 class=\"h4 font-weight-normal\">","</h2>");
                            add_filter( 'get_the_post_type_description', 'wpautop' );
                        } else { ?>
                            <h2 class="h4 font-weight-normal"><?php echo $testo_eventi ?></h2>
                        <?php }
                        ?>
                    </div><!-- /hero-title -->
                </div><!-- /col-md-5 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->