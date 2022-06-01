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
									<img src="<?php echo $imageatt[0]; ?>" alt="<?php echo esc_attr($attach->post_title); ?>">	
								</a>
								<?php
								if (!empty($attach->post_title)) {
								?>
									<figcaption><?php echo $attach->post_title; ?></figcaption>
									<?php
								}
								?>
							</figure>
					</div><!-- /item -->
				</li>
				<?php
			}
			?>
