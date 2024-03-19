<?php
global $argomento, $show_descrizione;

$img = dsi_get_term_meta('immagine', "_dsi_post_tag_", $argomento->term_id);

if($img) {
	$image_id = attachment_url_to_postid( $img );
	if($image_id != 0) {
    	$img_thumbnail = wp_get_attachment_image_src($image_id, 'article-simple-thumb');
    	if($img_thumbnail) $img = $img_thumbnail[0];
    }
}

if(!$img)
	$img = get_template_directory_uri() ."/assets/placeholders/placeholder-argomenti.svg";
    ?>
    <div class="card card-bg card-wrapper card-img no-after rounded">
        <a href="<?php echo get_term_link($argomento); ?>">
            <div class="img-responsive-wrapper">
                <div class="img-responsive" style="background-image:url('<?php echo $img; ?>'); background-size:cover" >
                </div>
            </div>
            <div class="card-body">
                <div class="card-icon-content" id="card-desc-argomento-<?php echo $argomento->term_id; ?>">
                    <h3 class="h4"><strong><?php echo $argomento->name; ?></strong></h3>
                    <?php if($show_descrizione == "true") { ?><small><?php echo $argomento->description; ?></small> <?php } ?>
                </div><!-- /card-icon-content -->
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg rounded -->
    <?php