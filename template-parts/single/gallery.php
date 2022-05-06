<?php
global $gallery;
?>

			<?php
			foreach ($gallery as $ida=>$urlg){
				$attach = get_post($ida);
				$imageatt =  wp_get_attachment_image_src($ida, "item-gallery");

				?>
				<li class="splide__slide">
					<div class="it-single-slide-wrapper gallery-item">
						<a href="<?php echo $urlg; ?>">
							<figure>
								<img src="<?php echo $imageatt[0]; ?>" alt="<?php echo esc_attr($attach->post_title); ?>">
								<?php
								if (!empty($attach->post_title)) {
								?>
									<figcaption><?php echo $attach->post_title; ?></figcaption>
									<?php
								}
								?>
							</figure>
						</a>
					</div><!-- /item -->
				</li>
				<?php
			}
			?>
