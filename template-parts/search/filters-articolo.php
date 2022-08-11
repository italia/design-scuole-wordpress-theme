<?php

?>
<aside class="aside-list sticky-sidebar search-results-filters pt-3">
	<form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
			<ul id="filtro_articolo">
				<?php
				$terms = get_terms( array(
					'taxonomy' => 'tipologia-articolo',
					'hide_empty' => true,
				) );
				foreach ( $terms as $term ) {
					?>
					<li>
                        <div class="form-check my-0">
							<input type="radio" class="custom-control-input" name="tipologia-articolo" value="<?php echo $term->slug; ?>" id="check-<?php echo $term->slug; ?>" <?php if($term->slug == get_query_var("tipologia-articolo")) echo " checked "; ?> onChange="this.form.submit()">
							<label class="mb-0" id="no-round" for="check-<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
						</div>
					</li>

					<?php
				}
				?>
			</ul>
	</form>
</aside>

