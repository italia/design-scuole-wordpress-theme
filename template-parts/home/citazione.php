<?php
global $post;

$citazione = dsi_get_option("citazione", "la_scuola");
if(trim($citazione) != ""){
	?>
	<section class="section py-4 bg-redbrown big-quote-wrapper">
		<div class="big-quote-bg quote">
      <!-- <svg width="100%" height="100%" viewBox="0 0 1280 463" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
        <g id="Quote-Desktop" serif:id="Quote/Desktop">
        <rect id="red-to-red" x="0" y="0" width="1280" height="463" style="fill:url(#_Linear1);"></rect>
        <path id="Path-11" d="M1193.68,448.626l-1193.68,-215.78l0,-232.846l1280,0l0,463l-86.32,-14.374Z" style="fill:url(#_Linear2);"></path>
        <path id="Path-11-Copy" d="M915.875,0l364.125,3l0,460l-364.125,-463Z" style="fill:url(#_Linear3);"></path>
        <rect id="Rectangle" x="0" y="0" width="1280" height="179.71" style="fill:url(#_Linear4);"></rect>
        </g>
        <defs>
        <linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(-1280,-60.5791,60.5791,-1280,1280,261.79)">
        <stop offset="0" style="stop-color:#d1344c;stop-opacity:1"></stop>
        <stop offset="1" style="stop-color:#ab2b3e;stop-opacity:1"></stop>
        </linearGradient>
        <linearGradient id="_Linear2" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(516.161,-33.3395,-33.3395,-516.161,1.47553,263.61)">
        <stop offset="0" style="stop-color:#f83e5a;stop-opacity:1"></stop>
        <stop offset="0.52" style="stop-color:#f83e5a;stop-opacity:0.784314"></stop>
        <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"></stop>
        </linearGradient>
        <linearGradient id="_Linear3" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(91.0761,-255.538,-255.538,-91.0761,985.332,477.64)">
        <stop offset="0" style="stop-color:#c2bfff;stop-opacity:0"></stop>
        <stop offset="0.52" style="stop-color:#f83e5a;stop-opacity:0.784314"></stop>
        <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"></stop>
        </linearGradient>
        <linearGradient id="_Linear4" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(7.04e-05,-162.496,209.621,5.45735e-05,658.576,179.71)">
        <stop offset="0" style="stop-color:#d1344c;stop-opacity:0"></stop>
        <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"></stop>
        </linearGradient>
        </defs>
        </svg>
         <g id="Quote-Desktop" serif:id="Quote/Desktop">
          <rect id="red-to-red" x="0" y="0" width="1280" height="463" style="fill:url(#_Linear1);"/>
          <path id="Path-11" d="M1193.68,448.626l-1193.68,-215.78l0,-232.846l1280,0l0,463l-86.32,-14.374Z" style="fill:url(#_Linear2);"/>
          <path id="Path-11-Copy" d="M915.875,0l364.125,3l0,460l-364.125,-463Z" style="fill:url(#_Linear3);"/>
          <rect id="Rectangle" x="0" y="0" width="1280" height="179.71" style="fill:url(#_Linear4);"/>
        </g>
        <defs>
          <linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(-1280,-60.5791,60.5791,-1280,1280,261.79)">
            <stop offset="0" style="stop-color:#d1344c;stop-opacity:1"/>
            <stop offset="1" style="stop-color:#ab2b3e;stop-opacity:1"/>
          </linearGradient>
          <linearGradient id="_Linear2" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(516.161,-33.3395,-33.3395,-516.161,1.47553,263.61)">
            <stop offset="0" style="stop-color:#f83e5a;stop-opacity:1"/>
            <stop offset="0.52" style="stop-color:#f83e5a;stop-opacity:0.784314"/>
            <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"/>
          </linearGradient>
          <linearGradient id="_Linear3" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(91.0761,-255.538,-255.538,-91.0761,985.332,477.64)">
            <stop offset="0" style="stop-color:#c2bfff;stop-opacity:0"/>
            <stop offset="0.52" style="stop-color:#f83e5a;stop-opacity:0.784314"/>
            <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"/>
          </linearGradient>
          <linearGradient id="_Linear4" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(7.04e-05,-162.496,209.621,5.45735e-05,658.576,179.71)">
            <stop offset="0" style="stop-color:#d1344c;stop-opacity:0"/>
            <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"/>
          </linearGradient>
        </defs>
      </svg> -->
		</div>
		<div class="container">
			<div class="row variable-gutters justify-content-center">
				<div class="col-md-10">
					<div class="big-quote">
						<h2 style="font-size: 5rem"><?php echo $citazione; ?></h2>
					</div><!-- /big-quote -->
				</div><!-- /col-md-10 -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
}