<?php
global $post;

$img_identita = dsi_get_option("immagine", "la_scuola");
$colid=6;
$showimage = true;
if($img_identita == ""){
	// se non è stata caricata una immagine apro a schermo pieno
	$colid = 12;
	$showimage = false;
}
?>

<section class="section bg-white section-hero">
	<div class="container">
		<div class="row variable-gutters">
			<div class="col-md-<?php echo $colid; ?>">
				<div class="hero-title">
					<small><?php the_title(); ?></small>
					<h1><?php echo dsi_get_option("tipologia_scuola"); ?> <?php echo dsi_get_option("nome_scuola"); ?><br /><span class="text-redbrown"><?php echo dsi_get_option("luogo_scuola"); ?></span></h1>
				</div><!-- /hero-title -->
			</div><!-- /col-md-<?php echo $colid; ?> -->
		</div><!-- /row -->
	</div><!-- /container -->
	<?php if($showimage){ ?>
		<div class="hero-img" style="background: url('<?php echo $img_identita; ?>')  no-repeat center top; background-size: cover; "></div>
	<?php } ?>
</section><!-- /section -->
<?php

