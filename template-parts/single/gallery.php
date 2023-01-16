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
					<a href="<?php echo $urlg; ?>" aria-label="Visualizza foto: <?php echo $attach->post_title; ?>">
						<?php dsi_get_img_from_url($urlg); ?>
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
