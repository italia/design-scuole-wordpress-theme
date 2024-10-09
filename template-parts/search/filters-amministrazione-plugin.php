<?php
/**
 * The template part for Amministrazione Trasparente filters compatibility
 * https://it.wordpress.org/plugins/amministrazione-trasparente
 *
 * @package Design_Scuole_Italia
 */

$post_type = get_query_var("post_type");
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
        if(function_exists("amministrazionetrasparente_getarray")){
            foreach (amministrazionetrasparente_getarray() as $inner) {
                $atcontatore++;
                $sez_l = strtolower(preg_replace('/[^a-zA-Z]+/', '', $inner[0]));

                //  Scan through inner loop
                $atreturn_head = '<ul class="collapse" id="'.$sez_l.'">';
                $atreturn_head_nocollapse = '<ul id="'.$sez_l.'">';
                $atreturn_body = '';
                $atcounter = 0;
                $collapsed = true;
                foreach ($inner[1] as $value) {
                    $args = array( 'taxonomy' => 'tipologie', 'term' => $value );
                    $query = new WP_Query( $args );
                    $fount_posts = $query->found_posts;
                    $atcounter = $atcounter + $fount_posts;


                    $atreturn_body .= '<li>';
                    $term = get_term_by('name', $value, 'tipologie');
                    $atreturn_body .= '<div class="form-check my-0">';
                    $atreturn_body .= '<input type="radio" class="custom-control-input" name="tipologie" value="';
                    $atreturn_body .= $term->slug.'" id="check-'.$term->slug.'"';
                    if($term->slug == get_query_var("tipologie")){
                        $atreturn_body .= " checked ";
                        $collapsed = false;
                    }
                    $atreturn_body .= ' onChange="this.form.submit()">';
                    $atreturn_body .= ' <label class="mb-0 h-auto" for="check-'.$term->slug.'"><a href="' . get_term_link( get_term_by('name', $value, 'tipologie'), 'tipologie' ) . '">'.$term->name.'</a></label>';
                    $atreturn_body .= '</div>';

                    $atreturn_body .= '</li>';
                }
                $atreturn_foot = '</ul>';


                echo '<h3 class="h6"><strong>';
                echo '<a data-toggle="collapse"  href="#'.$sez_l.'">'.$inner[0].'</a></strong></h3>';
                if($collapsed)
                    echo $atreturn_head;
                else
                    echo $atreturn_head_nocollapse;

                echo $atreturn_body;
                echo $atreturn_foot;

            }
        }
        ?>

    </form>
</aside>
