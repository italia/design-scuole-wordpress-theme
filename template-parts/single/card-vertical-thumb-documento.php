<?php
global $post, $autore, $set_card_top_margin, $set_card_wrapper;
$autore = get_user_by("ID", $post->post_author);

$prefix = "_dsi_documento_";

$descrizione = dsi_get_meta("descrizione" , $prefix, $post->ID);
$numerazione_albo = dsi_get_meta("numerazione_albo" , $prefix, $post->ID);
$post_tags = get_the_terms(get_the_ID(), 'tipologia-documento');

?><div class="card card-bg card-icon card-vertical-thumb bg-white card-thumb-rounded <?php echo $set_card_wrapper ? "card-wrapper" : ""; ?> <?php echo $set_card_top_margin ? "mt-2" : ""; ?>">
	<div class="card-body px-4">
			<svg class="icon it-pdf-document" role="img" aria-label="pdf"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-news"></use></svg>
			<div class="card-icon-content">
				<h3 class="h5"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h3>
				<small class="h6 text-redbrown">
					<?php
                        if ($post_tags) {
                                foreach($post_tags as $tag) {
                                    echo '<a href="'.get_tag_link($tag->term_id).'" class="badge badge-sm badge-pill badge-outline-redbrown" aria-label="Tipologia: '.$tag->name.'">'. $tag->name .'</a> ';
                                }
                            }
                    ?>
					<?php if(dsi_is_albo($post) && $numerazione_albo){ ?>	
						<span aria-label="Numerazione albo" class="mx-2">
							<?php echo $numerazione_albo; ?>
						</span>
					<?php } ?>
				</small>
				<p><?php echo $descrizione; ?></p>
        </div><!-- /card-icon-content -->
	</div><!-- /card-body -->
</div><!-- /card --><?php
		
