<aside class="aside-list sticky-sidebar search-results-filters pt-3">
	<form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
		<div class="h6 text-uppercase mt-4">
			<strong><?php _e("Tipologia", "design_scuole_italia"); ?></strong>
		</div>
		<fieldset>
			<legend class="sr-only">tipologia di articoli</legend>
			<?php
			$terms = get_terms( array(
				'taxonomy' => 'tipologia-articolo',
				'hide_empty' => true,
			) );
			foreach ( $terms as $term ) { ?>
				<div class="form-check my-0">
					<input 
						type="radio" 
						name="tipologia-articolo" 
						value="<?php echo $term->slug; ?>" 
						id="check-<?php echo $term->slug; ?>" 
						<?php if($term->slug == get_query_var("tipologia-articolo")) echo " checked "; ?> 
						onChange="this.form.submit()"
					>
					<label class="mb-0" for="check-<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
				</div>
			<?php } ?>
		</fieldset>
	</form>
</aside>