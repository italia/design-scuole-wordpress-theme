<?php
global $struttura;

$tipologie = wp_get_object_terms( $struttura->ID, 'tipologia-struttura' );
if($tipologie){
	$tipologia = $tipologie[0]->slug;
}
?>
<div class="card-avatar-img">
    <a href="<?php echo get_permalink($struttura);  ?>"><?php get_template_part("template-parts/svg/icona",$tipologia); ?></a>
</div><!-- /card-avatar-img -->
<div class="card-avatar-content">
    <p class="font-weight-normal"><strong class="text-underline"><u><a href="<?php echo get_permalink($struttura);  ?>"><?php echo $struttura->post_title; ?></a></u></strong></p>
</div><!-- /card-avatar-content -->
