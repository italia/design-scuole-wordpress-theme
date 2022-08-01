<!-- Ricerca fitro articolo -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modal" aria-hidden="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content perfect-scrollbar">
			<div class="modal-body">
                <form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="container">
						<div class="row variable-gutters">
							<div class="col">
								<div class="h2" id="searchModal" >
									<?php _e("Cerca","design_scuole_italia"); ?>
									<button type="button" class="close dismiss" data-dismiss="modal" aria-label="Chiudi">
										<svg class="svg-cancel-large"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-cancel-large"></use></svg>
									</button>
								</div>
								<div class="form-group search-form">
									<label for="search-input"><?php _e("Cerca","design_scuole_italia"); ?></label>
									<input type="text" name="s" id="search-input" data-element="search-modal-input" class="form-control" aria-describedby="search-form" placeholder="<?php _e("Cerca informazioni, servizi, notizie o documenti","design_scuole_italia"); ?>" value="<?php echo get_search_query(); ?>">
                                    <button type="button" class="clean-input" aria-label="Elimina testo di ricerca">
                                        <svg class="svg-cancel-large" role="presentation">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-cancel-large"></use>
                                        </svg>
                                    </button>
                                    <button type="submit" class="search-btn" aria-label="avvia la ricerca" data-element="search-submit" name="type" value="any">
                                        <svg class="svg-search">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-search"></use>
                                        </svg>
                                    </button>
								</div>
								<div class="cat-filters">
                                    
	                                    <?php 
                                    // check if post type is used
                                    $post_types = dsi_get_post_types_grouped("news");
                                    if(dsi_count_grouped_posts($post_types)) {
                                    ?>
									<div class="custom-control custom-submit-greendark">
									    <button type="submit" class="custom-control-submit <?php if(isset($_GET["type"]) && $_GET["type"] == "news") echo "checked"; ?>" id="notizie" name="type" value="news"><?php _e("Cerca tra le <strong class='text-uppercase text-small-bold'>novità</strong>","design_scuole_italia"); ?></button>
									</div>

									<?php }
                                  ?>
                                    
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Search Modal -->
<?php
