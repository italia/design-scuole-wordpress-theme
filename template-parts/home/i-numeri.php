<?php
global $post;

$studenti = dsi_get_option( "studenti", "la_scuola" );
$classi = dsi_get_option( "classi", "la_scuola" );
$media = intval($studenti / $classi);
?>

	<section class="section section-padding py-5 bg-gray-light">
		<div class="container">
			<div class="row variable-gutters">
				<div class="col-md-6">
					<div class="title-section">
						<h2 class="h3 mb-3 mb-xl-5"><?php _e("La scuola in numeri", "design_scuole_italia"); ?></h2>
						<p class="mb-0"><?php echo dsi_get_option("numeri_descrizione", "la_scuola"); ?></p>
					</div><!-- /title-section -->
				</div><!-- /col-md-6 -->
			</div><!-- /row -->
			<div class="row variable-gutters">
				<div class="col-md-4">
					<div class="big-data">
						<p><?php echo $studenti; ?></p>
						<div class="big-data-details">
							<svg class="svg-smile"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-smile"></use></svg>
							<p><?php _e("Numero alunni", "design_scuole_italia"); ?></p>
						</div><!-- /big-data-details -->
					</div><!-- /big-data -->
				</div><!-- /col-md-4 -->
				<div class="col-md-4">
					<div class="big-data">
						<p><?php echo $classi; ?></p>
						<div class="big-data-details">
							<svg class="svg-classes"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-classes"></use></svg>
							<p><?php _e("Numero classi", "design_scuole_italia"); ?></p>
						</div><!-- /big-data-details -->
					</div><!-- /big-data -->
				</div><!-- /col-md-4 -->
				<div class="col-md-4">
					<div class="big-data-rounded">
						<div class="big-data-rounded-content">
							<p><?php echo $media; ?></p>
							<small><?php _e("Media alunni / classe", "design_scuole_italia"); ?></small>
						</div><!-- /big-data-rounded-content -->
					</div><!-- /big-data-rounded -->
				</div><!-- /col-md-4 -->
			</div><!-- /row -->
			<?php
			$url_scuoleinchiaro = dsi_get_option( "url_scuoleinchiaro", "la_scuola" );
			if($url_scuoleinchiaro != ""){
				?>
				<div class="row variable-gutters mb-4">
					<div class="col d-flex justify-content-center">
						<a class="btn btn-redbrown" href="<?php echo $url_scuoleinchiaro; ?>" target="_blank"><?php _e("Scopri di più", "design_scuole_italia"); ?></a>
					</div><!-- /col -->
				</div><!-- /row -->
				<?php
			}
			?>
		</div><!-- /container -->
	</section><!-- /section -->