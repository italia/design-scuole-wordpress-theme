<?php
global $gallery;
?>
<div class="row variable-gutters">
	<div class="col">
		<div class="owl-carousel carousel-theme carousel-simple">
			<?php
			foreach ($gallery as $ida=>$urlg){
				$attach = get_post($ida);
				$imageatt =  wp_get_attachment_image_src($ida, "item-gallery");

				?>
				<div class="item gallery-item">
					<a href="<?php echo $urlg; ?>">
						<figure>
							<img src="<?php echo $imageatt[0]; ?>">
							<figcaption><?php echo $attach->post_title; ?></figcaption>
						</figure>
					</a>
				</div><!-- /item -->
				<?php
			}
			?>
		</div><!-- /carousel-large -->
	</div><!-- /col -->
</div><!-- /row -->