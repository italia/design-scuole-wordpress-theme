<!-- Search Modal -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modal" aria-hidden="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content perfect-scrollbar">
			<div class="modal-body">
                <form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="container">
						<div class="row variable-gutters">
							<div class="col">
								<h2 class="h2" id="searchModal" >
									<?php _e("Cerca","design_scuole_italia"); ?>
									<button type="button" class="close dismiss" data-dismiss="modal" aria-label="Chiudi">
										<svg class="svg-cancel-large"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-cancel-large"></use></svg>
									</button>
								</h2>
								<div class="form-group search-form">
									<label for="search-input"><?php _e("Cerca","design_scuole_italia"); ?></label>
									<input type="text" name="s" id="search-input" data-element="search-modal-input" class="form-control" placeholder="<?php _e("Cerca informazioni, servizi, notizie o documenti","design_scuole_italia"); ?>" value="<?php echo get_search_query(); ?>">
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
                                    $post_types = dsi_get_post_types_grouped("school");
                                    if(dsi_count_grouped_posts($post_types)) {
	                                    ?>
                                        <div class="custom-control custom-submit-redbrown">
									        <button type="submit" class="custom-control-submit <?php if(isset($_GET["type"]) && $_GET["type"] == "school") echo "checked"; ?>" id="scuola" name="type" value="school"><?php _e( "Cerca nella sezione <strong class='text-uppercase text-small-bold'>scuola</strong>", "design_scuole_italia" ); ?></button>
                                        </div>
	                                    <?php }
                                    // check if post type is used
                                    $post_types = dsi_get_post_types_grouped("news");
                                    if(dsi_count_grouped_posts($post_types)) {
                                    ?>
									<div class="custom-control custom-submit-greendark">
									    <button type="submit" class="custom-control-submit <?php if(isset($_GET["type"]) && $_GET["type"] == "news") echo "checked"; ?>" id="notizie" name="type" value="news"><?php _e("Cerca tra le <strong class='text-uppercase text-small-bold'>novità</strong>","design_scuole_italia"); ?></button>
									</div>
									<?php }
                                    // check if post type is used
                                    $post_types = dsi_get_post_types_grouped("service");
                                    if(dsi_count_grouped_posts($post_types)) {
                                    ?>
									<div class="custom-control custom-submit-purplelight">
									    <button type="submit" class="custom-control-submit <?php if(isset($_GET["type"]) && $_GET["type"] == "service") echo "checked"; ?>" id="servizi" name="type" value="service"><?php _e("Cerca nei <strong class='text-uppercase text-small-bold'>servizi</strong>","design_scuole_italia"); ?></button>
                                    </div>
									<?php }
                                    // check if post type is used
                                    $post_types = dsi_get_post_types_grouped("education");
                                    if(dsi_count_grouped_posts($post_types)) {
                                    ?>
									<div class="custom-control custom-submit-bluelectric">
									    <button type="submit" class="custom-control-submit <?php if(isset($_GET["type"]) && $_GET["type"] == "education") echo "checked"; ?>" id="didattica" name="type" value="education"><?php _e("Cerca nella <strong class='text-uppercase text-small-bold'>didattica</strong>","design_scuole_italia"); ?></button>
									</div>
									<?php }
                                    // check if post type is used
                                    /*
                                    $post_types = dsi_get_post_types_grouped("class");
                                    if(dsi_count_grouped_posts($post_types)) {
                                    ?>
									<div class="custom-control custom-checkbox custom-checkbox-grey">
										<input type="submit" class="custom-control-input <?php if(isset($_GET["type"]) && $_GET["type"] == "class") echo "checked"; ?>" id="la-mia-classe" name="type" value="class">
										<label class="custom-control-label" for="la-mia-classe"><?php _e("La mia classe","design_scuole_italia"); ?></label>
									</div>
									<?php } */ ?>
                                    <div class="custom-control custom-submit-primary">
									    <button type="submit" class="custom-control-submit <?php if(isset($_GET["type"]) && $_GET["type"] == "any") echo "checked"; ?>" id="tutto" name="type" value="any"><?php _e("Cerca in <strong class='text-uppercase text-small-bold'>tutto il sito</strong>","design_scuole_italia"); ?></button>
                                    </div>
								</div>
							</div>
						</div>
                        <div class="row variable-gutters">
                            <div class="col-lg-5">
                                <div class="searches-list-wrapper">
                                <h3 class="h4">Ricerche frequenti</h3>
                                <ul class="searches-list">
                                    <?php
                                    $popular_posts = new WP_Query( array(
                                        'post_type'     => ['circolare','documento','evento','incarico','indirizzo', 'luogo', 'post','scheda_didattica','scheda_progetto','servizio','struttura'], 
                                        'posts_per_page' => 7, 
                                        'meta_key'      => 'views',
                                        'orderby'       => 'meta_value_num',
                                        'order'         => 'DESC'
                                        )
                                     );
                                    
                                    if (is_array($popular_posts->posts)) {
                                         foreach ($popular_posts->posts as $post) {
                                        $group = dsi_get_post_types_group($post->post_type);
                                    ?>
                                        <li>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <!-- <span><?php #echo dsi_get_italian_name_group($group) ?></span> -->
                                        </li>
                                    <?php
                                    }} else { ?>
                                        <li>Nessun risultato</li>
                                    <?php };
                                    wp_reset_query();
                                    ?>
                                </ul>
                                </div>
                            </div> 
                            <div class="col-lg-6">
                            <?php
                            $argomenti = get_terms(array(
                                'taxonomy' => 'post_tag',
                                'orderby' => 'count',
                                'order'   => 'DESC',
                                'hide_empty'   => 1,
                                'number' => "20"
                            ));
                            if(!empty($argomenti)) { ?>
                            <div class="row variable-gutters">
                                <div class="col-lg-12">
                                    <div class="badges-wrapper">
                                        <h3 class="h4"><?php _e("Potrebbero interessarti","design_scuole_italia"); ?></h3>
                                        <div class="badges">
                                            <?php
                                            foreach ($argomenti as $argomento){
                                                $taglink = get_tag_link($argomento);  ?>
                                                <a href="<?php echo $taglink; ?>" title="<?php _e("Visualizza gli argomenti per","design_scuole_italia"); ?>: <?php echo $argomento->name; ?>" class="badge badge-sm badge-pill badge-outline-primary"><?php echo $argomento->name; ?></a>
                                            <?php } ?>
                                        </div><!-- /badges -->
                                    </div><!-- /badges-wrapper -->
                                </div>
                            </div>
                            <?php } ?>
                            </div> <!-- TAGS -->
                        </div>                        
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Search Modal -->
<?php
