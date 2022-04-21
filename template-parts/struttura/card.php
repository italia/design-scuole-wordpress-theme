<?php
global $struttura;

$tipologie = wp_get_object_terms( $struttura->ID, 'tipologia-struttura' );
$tipologia = "";
if(is_array($tipologie) && count($tipologie) > 0){
	$tipologia = $tipologie[0]->slug;
}
?>
<div class="card card-bg card-icon-main rounded">
	<a href="<?php echo get_permalink($struttura); ?>" aria-describedby="card-desc-<?php echo $struttura->ID; ?>" aria label="Apre link: <?php echo $struttura->post_title; ?>">
		<div class="card-body">
			<?php get_template_part("template-parts/svg/icona",$tipologia); ?>
			<div class="card-icon-content"  id="card-desc-<?php echo $struttura->ID; ?>">
				<p><strong><?php echo $struttura->post_title; ?></strong></p>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
	</a>
</div><!-- /card card-bg card-icon-main rounded -->

