<?php
$post_type = get_query_var("post_type");
?>
<aside class="aside-list sticky-sidebar search-results-filters">

    <form role="search" method="get" class="search-form" action="<?php echo home_url(""); ?>">
        <?php if(isset($post_type) && !is_array($post_type) && $post_type != ""){ ?>
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>">
        <?php } ?>

        <?php
        $atcontatore =0;
        // ricalco l'organizzazione di amministrazione trasparente
        if(function_exists("dsi_amministrazione_trasparente_array")){
            foreach (dsi_amministrazione_trasparente_array() as $inner) {
                $atcontatore++;
                $sez_l = strtolower(preg_replace('/[^a-zA-Z]+/', '', $inner[0]));

                //  Scan through inner loop
                $atreturn_head = '<ul class="collapse" id="'.$sez_l.'">';
                $atreturn_head_nocollapse = '<ul id="'.$sez_l.'">';
                $atreturn_body = '';
                $atcounter = 0;
                $collapsed = true;
                foreach ($inner[1] as $value) {
                    $args = array( 'taxonomy' => 'amministrazione-trasparente', 'term' => $value );
                    $query = new WP_Query( $args );
                    $fount_posts = $query->found_posts;
                    $atcounter = $atcounter + $fount_posts;


                    $atreturn_body .= '<li>';
                    $term = get_term_by('name', $value, 'amministrazione-trasparente');
//            $atreturn .= '<a href="' . get_term_link( get_term_by('name', $value, 'amministrazione-trasparente'), 'amministrazione-trasparente' ) . '" title="' . $value . '">' . $value . '</a>';
                    $atreturn_body .= '<div class="form-check my-0">';
                    $atreturn_body .= '<input type="radio" class="custom-control-input" name="amministrazione-trasparente" value="';
                    $atreturn_body .= $term->slug.'" id="check-'.$term->slug.'"';
                    if($term->slug == get_query_var("amministrazione-trasparente")){
                        $atreturn_body .= " checked ";
                        $collapsed = false;
                    }
                    $atreturn_body .= ' onChange="this.form.submit()">';
                    $atreturn_body .= ' <label class="mb-0" for="check-'.$term->slug.'"><a href="' . get_term_link( get_term_by('name', $value, 'amministrazione-trasparente'), 'amministrazione-trasparente' ) . '">'.$term->name.'</a></label>';
                    $atreturn_body .= '</div>';

                    $atreturn_body .= '</li>';
                }
                $atreturn_foot = '</ul>';


                echo '<h3 class="h6 text-uppercase"><strong>';
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