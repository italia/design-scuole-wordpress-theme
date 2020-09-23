<?php
global $gallery;
?>

			<?php
			foreach ($gallery as $ida=>$urlg){
				$attach = get_post($ida);
				$imageatt =  wp_get_attachment_image_src($ida, "item-gallery");

				?>
				<div class="item gallery-item">
					<a href="<?php echo $urlg; ?>">
						<figure>
							<img src="<?php echo $imageatt[0]; ?>" alt="<?php echo esc_attr($attach->post_title); ?>">
							<figcaption><?php echo $attach->post_title; ?></figcaption>
						</figure>
					</a>
				</div><!-- /item -->
				<?php
			}
			?>
