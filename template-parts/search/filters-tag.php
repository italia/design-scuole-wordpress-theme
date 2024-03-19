<?php
$groups = array(
	"school" => __("Scuola", "design_scuole_italia"),
	"service" =>  __("Servizi", "design_scuole_italia"),
	"news" =>  __("Novità", "design_scuole_italia"),
	"education" =>  __("Didattica", "design_scuole_italia")
);


$allowed_types = array( "any", "school", "news", "education", "service" );
if ( isset( $_GET["type"] ) && in_array( $_GET["type"], $allowed_types ) ) {
	$type = $_GET["type"];
	// associazione tra types e post_type
	$post_types = dsi_get_post_types_grouped( $type, true );

} else {
    if(isset( $_GET["post_types"] ))
    	$post_types = $_GET["post_types"];
    else
	    $post_types = array();
}
$post_terms = array();
if(isset($_GET["post_terms"]))
	$post_terms = $_GET["post_terms"];

$current_term = get_queried_object();
?>

<aside class="aside-list sticky-sidebar search-results-filters">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="hidden" name="s" value="" />
	<input type="hidden" name="post_terms[]" value="<?php echo $current_term->term_id; ?>">

    <?php
    foreach ($groups as $key => $value){
        $types = dsi_get_post_types_grouped($key, true);
        ?>
        <h3 class="h6 text-uppercase"><strong><?php echo $value; ?></strong></h3>
        <ul>
            <?php
            foreach ( $types as $type ) {
	            $name = get_post_type_object( $type )->labels->name;
                if ($name) {
                ?>
                <li>
                    <div class="form-check my-0">
                        <input type="checkbox" class="custom-control-input" name="post_types[]" value="<?php echo $type; ?>" id="check-<?php echo $type; ?>" <?php if(in_array($type, $post_types)) echo " checked "; ?> onChange="this.form.submit()">
                        <label class="mb-0" for="check-<?php echo $type; ?>"><?php echo $name; ?></label>
                    </div>
                </li>
            <?php
                }
            }
            ?>
        </ul>

    <?php
    }
    ?>


    </form>
</aside>