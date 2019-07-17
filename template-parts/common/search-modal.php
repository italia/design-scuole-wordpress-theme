<!-- Search Modal -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content perfect-scrollbar">
			<div class="modal-body">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="container">
						<div class="row variable-gutters">
							<div class="col">
								<h2>
									<?php _e("Cerca","design_scuole_italia"); ?>
									<button type="button" class="close dismiss" data-dismiss="modal" aria-label="Close">
										<svg class="svg-cancel-large"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-cancel-large"></use></svg>
									</button>
								</h2>
								<div class="form-group search-form">
									<svg class="svg-search"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-search"></use></svg>
									<label><?php _e("Cerca","design_scuole_italia"); ?></label>
									<input type="text" name="s" class="form-control" aria-describedby="search-form" placeholder="<?php _e("Cerca servizi, notizie o documenti","design_scuole_italia"); ?>" value="<?php echo get_search_query(); ?>">
								</div>
								<div class="cat-filters">
									<div class="custom-control custom-checkbox custom-checkbox-primary">
										<input type="submit" class="custom-control-input <?php if(isset($_GET["type"]) && $_GET["type"] == "any") echo "checked"; ?>" id="tutto" name="type" value="any" >
										<label class="custom-control-label" for="tutto"><?php _e("Tutto","design_scuole_italia"); ?></label>
									</div>
									<div class="custom-control custom-checkbox custom-checkbox-redbrown">
										<input type="submit" class="custom-control-input <?php if(isset($_GET["type"]) && $_GET["type"] == "school") echo "checked"; ?>" id="scuola" name="type" value="school">
										<label class="custom-control-label" for="scuola"><?php _e("Scuola","design_scuole_italia"); ?></label>
									</div>
									<div class="custom-control custom-checkbox custom-checkbox-greendark">
										<input type="submit" class="custom-control-input <?php if(isset($_GET["type"]) && $_GET["type"] == "news") echo "checked"; ?>" id="notizie" name="type" value="news">
										<label class="custom-control-label" for="notizie"><?php _e("Notizie","design_scuole_italia"); ?></label>
									</div>
									<div class="custom-control custom-checkbox custom-checkbox-purplelight">
										<input type="submit" class="custom-control-input <?php if(isset($_GET["type"]) && $_GET["type"] == "service") echo "checked"; ?>" id="servizi" name="type" value="service">
										<label class="custom-control-label" for="servizi"><?php _e("Servizi","design_scuole_italia"); ?></label>
									</div>
									<div class="custom-control custom-checkbox custom-checkbox-bluelectric">
										<input type="submit" class="custom-control-input <?php if(isset($_GET["type"]) && $_GET["type"] == "education") echo "checked"; ?>" id="didattica" name="type" value="education">
										<label class="custom-control-label" for="didattica"><?php _e("Didattica","design_scuole_italia"); ?></label>
									</div>
									<div class="custom-control custom-checkbox custom-checkbox-grey">
										<input type="submit" class="custom-control-input <?php if(isset($_GET["type"]) && $_GET["type"] == "class") echo "checked"; ?>" id="la-mia-classe" name="type" value="class">
										<label class="custom-control-label" for="la-mia-classe"><?php _e("La mia classe","design_scuole_italia"); ?></label>
									</div>
								</div>
							</div>
						</div>
						<div class="row variable-gutters">
							<div class="col-lg-12">
								<div class="badges-wrapper">
									<h4><?php _e("Argomenti","design_scuole_italia"); ?></h4>
									<div class="badges">
                                        <?php
                                        $categories = get_categories(array(
	                                        'orderby' => 'count',
	                                        'order'   => 'ASC',
	                                        'hide_empty'   => 0,
	                                        'parent'  => 0,
	                                        'number' => 20
                                        ));
                                        foreach ($categories as $category){
                                            $catlink = get_category_link($category);  ?>
                                            <a href="<?php echo $catlink; ?>" title="<?php _e("Vai all'argomento","design_scuole_italia"); ?>: <?php echo $category->name; ?>" class="badge badge-sm badge-pill badge-outline-primary"><?php echo $category->name; ?></a>
                                       <?php } ?>
                                    </div><!-- /badges -->
								</div><!-- /badges-wrapper -->
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
