<?php
global $gallery;
?>

<?php
foreach ($gallery as $ida=>$urlg){
	$attach = get_post($ida);

	?>
	<li class="splide__slide">
		<div class="it-single-slide-wrapper gallery-item h-100">
				<figure>
					<?php
						if (wp_attachment_is('video', $ida)) {
							$image_url = get_the_post_thumbnail_url($ida) ?: get_the_post_thumbnail_url();
						?>
							<a href="<?php echo $urlg; ?>" target="_blank" aria-label="Visualizza video: <?php echo $attach->post_title; ?>">
								<div class="video-wrapper shadow-none rounded-0">
									<?php
									if($image_url){
										dsi_get_img_from_url($image_url);
									}
									else
									{
									?>
										<div class="bg-secondary" style="height: 320px"></div>
										<?php
									}
									?>
									<svg class="svg-play">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-play"></use>
									</svg>
								</div>
							</a>
						<?php
						} else {
						?>
							<a href="<?php echo $urlg; ?>" aria-label="Visualizza foto: <?php echo $attach->post_title; ?>">
								<?php dsi_get_img_from_url($urlg); ?>
							</a>
						<?php
						}
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
