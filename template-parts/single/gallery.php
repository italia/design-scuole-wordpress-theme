<?php
global $gallery;
?>

			<?php
			foreach ($gallery as $ida=>$urlg){
				$attach = get_post($ida);
				$imageatt =  wp_get_attachment_image_src($ida, "item-gallery");

				?>
				<li class="splide__slide">
					<div class="it-single-slide-wrapper gallery-item h-100">
							<figure>
								<a href="<?php echo $urlg; ?>" aria-label="Visualizza foto: <?php echo $attach->post_title; ?>">
									<?php dsi_get_img($imageatt[0], '', true); ?>
								</a>
								<?php
								if (!empty($attach->post_excerpt)) {
								?>
									<figcaption><?php echo $attach->post_excerpt; ?></figcaption>
									<?php
								}
								?>
							</figure>
					</div><!-- /item -->
				</li>
				<?php
			}
			?>
