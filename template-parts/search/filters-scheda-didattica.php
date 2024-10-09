<?php
$post_type = get_query_var("post_type");
if(!$post_type)
    $post_type = "scheda_didattica";

if(isset($_REQUEST["archive"]))
    $archive = $_REQUEST["archive"];
?>


<aside class="aside-list sticky-sidebar search-results-filters">
    <form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
    	<h2 class="sr-only">Filtri</h2>
        <?php if(isset($post_type) && !is_array($post_type) && $post_type != ""){ ?>
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>">
        <?php } ?>

        <?php if(isset($archive) && $archive != ""){ ?>
            <input type="hidden" name="archive" value="<?php echo $archive; ?>">
        <?php } ?>
        <h3 class="h6 text-uppercase"><strong><?php _e("Livelli", "design_scuole_italia"); ?></strong></h3>
        <ul>
			<?php
			$terms = get_terms( array(
				'taxonomy' => 'percorsi-di-studio',
				'hide_empty' => true,
                'parent' => 0,
			) );
			foreach ( $terms as $term ) {
				?>
                <li>
                    <div class="form-check my-0">
                        <input type="radio" class="custom-control-input" name="percorsi-di-studio" value="<?php echo $term->slug; ?>" id="check-<?php echo $term->slug; ?>" <?php if($term->slug == get_query_var("percorsi-di-studio")) echo " checked "; ?> onChange="this.form.submit()">
                        <label class="mb-0" for="check-<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                    </div>
                </li>

				<?php
			}
			?>
        </ul>

    </form>
</aside>