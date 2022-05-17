<?php
$testo_sezione_persone = dsi_get_option("testo_sezione_persone", "persone");
?>
<section class="section bg-redbrown bg-red-gradient py-0 py-md-4 py-lg-5 position-relative d-flex align-items-center overflow-hidden" >
    <div class="people-red-forms">
        <svg width="100%" height="100%" viewBox="0 0 535 360" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g id="Group" opacity="0.3"><path d="M508.97,291.344c-17.94,-13.653 -54.976,-31.136 -54.976,-31.136c0,0 -16.751,20.084 -51.504,31.136c-34.743,-11.052 -51.494,-31.136 -51.494,-31.136c0,0 -37.046,17.483 -54.975,31.136c-17.929,13.653 -29.041,93.656 -29.041,93.656l271.02,0c0,0 -7.943,-77.599 -29.03,-93.656Zm-242.97,-35.163c44.51,10.271 71.393,-3.163 82.421,-23.456c12.79,16.026 30.407,27.4 54.069,27.4c62.501,0 83.026,-79.264 83.026,-114.469c0,-35.204 -1.001,-93.656 -83.026,-93.656c-39.006,0 -59.562,13.268 -70.528,30.917c-44.802,-1.894 -73.394,36.89 -44.134,114.771c11.07,29.46 1.428,53.009 -21.828,58.493Z" style="fill:url(#_Linear1);fill-rule:nonzero;"/><path id="Shape1" serif:id="Shape" d="M164.5,252.75c54.843,0 83.25,-76.729 83.25,-111c0,-34.271 -0.99,-101.75 -83.25,-101.75c-82.26,0 -83.25,67.479 -83.25,101.75c0,34.271 28.407,111 83.25,111Zm137.094,36.01c-20.572,-13.699 -82.26,-41.125 -82.26,-41.125c0,0 -17.834,17.797 -54.834,32.865c-37,-15.068 -54.843,-32.875 -54.843,-32.875c0,0 -61.689,27.427 -82.26,41.126c-20.554,13.718 -29.397,84.249 -29.397,84.249l333,0c0,0 -5.199,-68.108 -29.406,-84.24Z" style="fill:url(#_Linear2);fill-rule:nonzero;"/></g><defs><linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(2.03904e-14,333,-333,2.03904e-14,402,52)"><stop offset="0" style="stop-color:#ff6262;stop-opacity:1"/><stop offset="1" style="stop-color:#ff9494;stop-opacity:1"/></linearGradient><linearGradient id="_Linear2" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(2.03904e-14,333,-333,2.03904e-14,164.5,40)"><stop offset="0" style="stop-color:#ff81a0;stop-opacity:1"/><stop offset="1" style="stop-color:#5c000e;stop-opacity:1"/></linearGradient></defs></svg>
    </div>
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-md-5">
                <div class="hero-title text-left">
                    <h1 class="p-0 mb-2"><?php the_title(); ?></h1>
                    <h2 class="h4 font-weight-normal"><?php echo $testo_sezione_persone; ?></h2>
                </div><!-- /hero-title -->
            </div><!-- /col-md-5 -->
        </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /section -->
