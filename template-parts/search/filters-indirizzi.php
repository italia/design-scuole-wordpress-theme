<?php

?>
<aside class="aside-list sticky-sidebar search-results-filters">
    <h2 class="sr-only">Filtri</h2>
    <h3 class="h6 text-uppercase"><strong><?php _e("Percorsi di studio", "design_scuole_italia"); ?></strong></h3>
    <form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
        <ul>
            <?php
            $terms = get_terms( array(
                'taxonomy' => 'percorsi-di-studio',
                'hide_empty' => true,
                'parent' => 0,
                'meta_key' =>  'dsi_order',
                'orderby'       =>  'meta_value',
                'order'       =>  'ASC',
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