<?php
global $struttura;

$tipologie = wp_get_object_terms( $struttura->ID, 'tipologia-struttura' );
if($tipologie){
	$tipologia = $tipologie[0]->slug;
}
?>
<div class="card card-bg  bg-color bg-dark card-icon-main rounded">
	<a href="<?php echo get_permalink($struttura); ?>">
		<div class="card-body">
			<?php get_template_part("template-parts/svg/icona",$tipologia); ?>
			<div class="card-icon-content">
                <p><strong class="text-white"><?php echo $struttura->post_title; ?></strong></p>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
	</a>
</div><!-- /card card-bg card-icon-main rounded -->

