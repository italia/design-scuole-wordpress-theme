<?php
global $badgeclass, $classe;
if(!isset($badgeclass))
	$badgeclass = "badge-outline-purplelight";
$argomenti = dsi_get_classi_of_post();
if(is_array($argomenti) && count($argomenti)) {
	?>
	<aside class="badges-wrapper badges-main">
	<h4><?php _e("Classi", "design_scuole_italia"); ?></h4>
	<div class="badges">
		<?php foreach ( $argomenti as $classe ) { ?>
            <?php
			get_template_part( "template-parts/classe/card" );

			?>
		<?php } ?>
	</div><!-- /badges -->
	</aside><!-- /badges-wrapper -->
	<?php
}