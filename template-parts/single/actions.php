<?php
global $post;
$parts = parse_url( home_url() );
$current_uri = "{$parts['scheme']}://{$parts['host']}" . add_query_arg( NULL, NULL );
if(is_singular()){
    $current_title = get_the_title();
}else if ( is_tag() ) {
    $current_title = __("Argomento", "design_scuole_italia").": ".single_cat_title( '', false );
} elseif ( is_category() ) {
    $current_title = single_tag_title( '', false );
} elseif ( is_tax("tipologia-articolo") ) {
    $current_title = single_term_title('', false);
} elseif ( is_tax("tipologia-servizio") ) {
    $current_title = __("Servizi per ", "design_scuole_italia").": ".single_term_title('', false);
} elseif ( is_post_type_archive() ) {
    $current_title = post_type_archive_title('', false);
}else{
    $current_title = dsi_get_option("nome_scuola");
}

?><div class="actions-wrapper actions-main">
    <a class="toggle-actions" href="#" title="Vedi azioni" data-target="#modal-more-items" data-toggle="modal">
        <svg class="it-more-items"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-more-items"></use></svg>
        <span><?php _e("Stampa / Condividi", "design_scuole_italia"); ?></span>
    </a>
    <div class="modal fade modal-actions" id="modal-more-items" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="link-list-wrapper">
                        <ul class="link-list">
                            <!--
							<li>
								<a href="#" class="list-item left-icon" title="Scarica il contenuto">
									<svg class="icon it-download"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-download"></use></svg>
									<span>Scarica</span>
								</a>
							</li>
							//-->
                            <?php if(is_singular("circolare")){ ?>
                            <li>
                                <a href="<?php echo add_query_arg( array( 'pdf' => 'true' ), get_permalink($post) ); ?>" class="list-item left-icon" title="<?php _e("Genera PDF", "design_scuole_italia"); ?>">
                                    <svg class="icon it-pdf"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-pdf-document"></use></svg>
                                    <span><?php _e("Genera PDF", "design_scuole_italia"); ?></span>
                                </a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="javascript:window.print();" class="list-item left-icon" title="<?php _e("Stampa il contenuto", "design_scuole_italia"); ?>">
                                    <svg class="icon it-print"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-print"></use></svg>
                                    <span><?php _e("Stampa", "design_scuole_italia"); ?></span>
                                </a>
                            </li>
                            <!--
							<li>
								<a href="#" class="list-item left-icon" title="Ascolta il contenuto">
									<svg class="icon it-hearing"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-hearing"></use></svg>
									<span>Ascolta</span>
								</a>
							</li>
							//-->
                            <li>
                                <a href="mailto:?subject=<?php echo urlencode($current_title); ?>&body=<?php echo urlencode($current_uri); ?>" class="list-item left-icon" title="<?php _e("Invia il contenuto", "design_scuole_italia"); ?>">
                                    <svg class="icon it-email"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-email"></use></svg>
                                    <span><?php _e("Invia", "design_scuole_italia"); ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item collapsed link-toggle" title="<?php _e("Condividi", "design_scuole_italia"); ?>" href="#social-share" data-toggle="collapse" aria-expanded="false" aria-controls="social-share" role="button"id="share-control"> 
                                    <svg class="icon it-share"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-share"></use></svg>
                                    <span><?php _e("Condividi", "design_scuole_italia"); ?></span>
                                    <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                </a>
                                <ul class="link-sublist collapse" id="social-share" role="region" aria-labelledby="share-control">
                                    <li>
                                        <a class="list-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_uri); ?>" title="<?php _e("Condividi su", "design_scuole_italia"); ?>: Facebook" target="_blank">
                                            <svg class="icon it-social-facebook"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-facebook"></use></svg>
                                            <span>Facebook</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="list-item" href="http://twitter.com/share?text=<?php echo urlencode($current_title); ?>&url=<?php echo urlencode($current_uri); ?>" title="<?php _e("Condividi su", "design_scuole_italia"); ?>: Twitter"  target="_blank">
                                            <svg class="icon it-social-twitter"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-twitter"></use></svg>
                                            <span>Twitter</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="list-item" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($current_uri); ?>&title=<?php echo urlencode($current_title); ?>&source=<?php echo urlencode(dsi_get_option("nome_scuola")); ?>" title="<?php _e("Condividi su", "design_scuole_italia"); ?>: Linkedin"  target="_blank">
                                            <svg class="icon it-social-linkedin"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-social-linkedin"></use></svg>
                                            <span>Linkedin</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!-- /modal-body -->
            </div><!-- /modal-content -->
        </div><!-- /modal-dialog -->
    </div><!-- /modal -->
    </div><!-- /actions-wrapper --><?php
