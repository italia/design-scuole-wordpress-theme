<?php
$post_type = get_query_var("post_type");
;
?>
<aside class="aside-list sticky-sidebar search-results-filters">
    <form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
        <?php if(isset($post_type) && !is_array($post_type) && $post_type != ""){ ?>
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>">
        <?php } ?>
        <h3 class="h6 text-uppercase"><strong><?php _e("Sezioni", "design_scuole_italia"); ?></strong></h3>
        <ul>
			<?php
			$terms = get_terms( array(
				'taxonomy' => 'tipologie',
				'hide_empty' => true,
			) );
			foreach ( $terms as $term ) {
				?>
                <li>
                    <div class="custom-control custom-checkbox custom-checkbox-outline">
                        <input type="radio" class="custom-control-input" name="tipologie" value="<?php echo $term->slug; ?>" id="check-<?php echo $term->slug; ?>" <?php if($term->term_id == get_query_var("tipologie")) echo " checked "; ?> onChange="this.form.submit()">
                        <label class="custom-control-label" for="check-<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                    </div>
                </li>

				<?php
			}
			?>
        </ul>

    </form>
</aside>