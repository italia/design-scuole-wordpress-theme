<?php
$post_type = get_query_var("post_type");

function printUl($data){
	$sez_l = strtolower(preg_replace('/[^a-zA-Z]+/', '', $data[0]));
	$term = get_term_by('name', $data[0], 'amministrazione-trasparente');
	$array = get_term_children($term->term_id,'amministrazione-trasparente');
	$searchedTerm = get_term_by('slug',get_query_var("amministrazione-trasparente"),'amministrazione-trasparente');
	echo '<li class="ml-2 mb-3"><p class="h6 my-3"><strong>';
	echo '<a data-toggle="collapse"  href="#'.$sez_l.'">'.$data[0].'</a></strong><span class="counterA text-danger"> ('.$data["count"].')</span></p>';
	if(in_array($searchedTerm->term_id,$array) or $searchedTerm->term_id == $term->term_id){
		echo '<ul class="ml-3 collapse show" id="'.$sez_l.'">';
	}else{
		echo '<ul class="ml-3 collapse" id="'.$sez_l.'">';
	}
	foreach($data[1] as $inner){
		printLi($inner);
	}
	echo '</ul></li>';
}
function printLi($data){
	global $collapsed;
	if(count($data[1])==0){
		$args = array( 'taxonomy' => 'amministrazione-trasparente', 'term' => $data[0] );
		echo '<li>';
		$term = get_term_by('name', $data[0], 'amministrazione-trasparente');
		echo '<div class="form-check my-0">';
		echo '<input type="radio" class="custom-control-input" name="amministrazione-trasparente" value="';
		echo $term->slug.'" id="check-'.$term->slug.'"';
		if($term->slug == get_query_var("amministrazione-trasparente")){
			echo " checked ";
		}
		echo ' onChange="this.form.submit()">';
		echo  '<label class="h-auto mb-0" for="check-'.$term->slug.'"><a href="' . get_term_link( get_term_by('name', $data[0], 'amministrazione-trasparente'), 'amministrazione-trasparente' ) . '">'.$term->name.'</a> <span class="counterA text-danger"> ('.$data["count"].')</span></label>';
		echo '</div>';
		echo '</li>';
	}
	else{
		printUl($data);
	}
}


?>
<aside class="aside-list sticky-sidebar search-results-filters">

    <form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
		<h2 class="sr-only">Filtri</h2>
        <?php if(isset($post_type) && !is_array($post_type) && $post_type != ""){ ?>
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>">
        <?php } ?>

        <?php
        $atcontatore =0;
        // ricalco l'organizzazione di amministrazione trasparente
        if(function_exists("dsi_amministrazione_trasparente_array")){

            foreach (get_amministrazione_array() as $inner) {
                $atcontatore++;
                $sez_l = strtolower(preg_replace('/[^a-zA-Z]+/', '', $inner[0]));

                //  Scan through inner loop
                $atreturn_head = '<ul class="collapse" id="'.$sez_l.'">';
                $atreturn_head_nocollapse = '<ul id="'.$sez_l.'">';
                $atreturn_body = '';
                $atcounter = 0;

				
                echo '<fieldset><legend class="h6 text-wrap"><strong>';
				echo '<a data-toggle="collapse"  href="#'.$sez_l.'">'.$inner[0].'</a></strong> <span class="counterA text-danger"> ('.$inner["count"].')</span></legend>';
				$term = get_term_by('name', $inner[0], 'amministrazione-trasparente');
				$array = get_term_children($term->term_id,'amministrazione-trasparente');
				$searchedTerm = get_term_by('slug',get_query_var("amministrazione-trasparente"),'amministrazione-trasparente');
				if(in_array($searchedTerm->term_id,$array)or $searchedTerm->term_id == $term->term_id){
					echo '<ul class="ml-2 collapse show" id="'.$sez_l.'">';
				}else{
					echo '<ul class="ml-2 collapse" id="'.$sez_l.'">';
				}
                foreach ($inner[1] as $value) {
					if(count($value[1])==0){
						printLi($value);
					}
					else{
						printUl($value);
					}
				}
                echo "</ul></fieldset>";

            }
        }
        ?>
    </form>
</aside>
			<style>
			.counterA{
				font-size:14px
			}
			</style>