<?php
global $item;

?>
<article class="article-simple">
	<div class="row variable-gutters">
		<div class="col-lg-5">
			<?php
			$thumbnail = get_the_post_thumbnail($item, "article-simple-thumb");
			if($thumbnail){
				?>
				<div class="article-thumb">
					<a href="<?php echo get_permalink($item); ?>">
						<?php echo $thumbnail; ?>
					</a>
				</div>
				<?php
			}
			?>

		</div><!-- /col-lg-5 -->
		<div class="col-lg-7">
			<div class="article-content">
				<?php
				$argomenti = dsi_get_argomenti_of_post($item);
				if(is_array($argomenti) && count($argomenti)) {
					$c=0;
					?>
					<div class="details"> in
						<?php
						foreach ( $argomenti as $argomento ) {
							if($c) echo ", "; $c++;
							?>
							<a href="<?php echo get_term_link($argomento); ?>"><?php echo $argomento->name; ?></a><?php
						} ?>
					</div>
					<?php
				}
				?>
				<h3><a href="<?php echo get_permalink($item); ?>"><?php echo get_the_title($item); ?></a></h3>
			</div>
		</div><!-- /col-lg-7 -->
	</div><!-- /row -->
</article>
