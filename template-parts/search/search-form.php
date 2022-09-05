<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Cerca:', 'label' ) ?></span>
        <input type="search" id="search_field" class="search-field" placeholder="<?php echo esc_attr_x( 'Cerca', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
</form>