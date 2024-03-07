<?php
$testo_argomenti = dsi_get_option("testo_argomenti", "argomenti");

?>
    <section class="section bg-petrol py-5 position-relative d-flex align-items-center overflow-hidden" >
        <div class="purple-oval-forms">
			<svg width="100%" height="100%" viewBox="0 0 578 359" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" role="img" aria-label="purple oval forms">
              <g id="Group-2">
	              <path id="Oval-2" d="M578,359c0,-159.61 -129.39,-289 -289,-289c-159.61,0 -289,129.39 -289,289l578,0Z" style="fill:url(#_LinearA1);fill-rule:nonzero;"/>
	              <path id="Oval-2-Copy" d="M578,0c0,159.61 -129.39,289 -289,289c-159.61,0 -289,-129.39 -289,-289l578,0Z" style="fill:url(#_LinearA2);fill-rule:nonzero;"/>
              </g>
			<defs>
				<linearGradient id="_LinearA1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1.76961e-14,289,-289,1.76961e-14,289,70)">
					<stop offset="0" style="stop-color:#314A5E;stop-opacity:1"/>
					<stop offset="1" style="stop-color:#6A9AB7;stop-opacity:0.61"/>
				</linearGradient>
				<linearGradient id="_LinearA2" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(-578,-7.07846e-14,7.07846e-14,-578,578,144.5)">
					<stop offset="0" style="stop-color:#233A4C;stop-opacity:0"/>
					<stop offset="1" style="stop-color:#6A9AB7;stop-opacity:1"/>
				</linearGradient>
			</defs>
            </svg>
		</div>
		<div class="container">
            <div class="row variable-gutters">
                <div class="col-md-5">
                    <div class="hero-title text-left">
                        <h1 class="p-0 mb-2"><?php _e("Argomenti", "design_scuole_italia"); ?></h1>
                        <h2 class="h4 font-weight-normal"><?php echo $testo_argomenti; ?></h2>
                    </div><!-- /hero-title -->
                </div><!-- /col-md-5 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->
