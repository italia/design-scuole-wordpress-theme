<?php
global $post;
global $badgeclass;


if(!isset($badgeclass)) {
	//$badgeclass = "badge-outline-purplelight";
$badgeclass = "";
// prendo la prima categira di $post
// prendo lo slug della categoria
// Creo la class

$badgeclass = "color-news" . $news;
$badgeclass = "color-dicono-di-noi" . $dicono-di-noi;
$badgeclass = "color-eventi" . $event;

}

$argomenti = dsi_get_argomenti_of_post();
if(count($argomenti)) {
	?>
		<div class="badges mb-2">
			<?php foreach ( $argomenti as $item ) { ?>
				<a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>"
				   class="badge badge-sm badge-pill <?php echo $badgeclass; ?> "><?php echo $item->name; ?></a>
			<?php } ?>
		</div><!-- /badges -->
	<?php
}