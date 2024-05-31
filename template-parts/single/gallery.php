<?php
global $gallery;
?>

<?php
foreach ($gallery as $ida => $urlg) {
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
						<?php
						if($image_url){
							dsi_get_img_from_url($image_url);
						}
						else
						{
						?>
							<div class="bg-secondary" style="
								width: 100%;
								height: 320px;
							"></div>
							<?php
						}
						?>
						<div class="bg-secondary" style="
							position: absolute;
							top: 0;
							bottom: 0;
							width: 100%;
							height: 100%;
							opacity: 50%;
							">
						</div>
						<svg class="svg-play" style="
							position: absolute;
							top: calc(50% - 40px);
							left: calc(50% - 40px);
							height: 80px;
							width: 80px;
							fill: #FFFFFFDD;">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-play"></use>
						</svg>
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