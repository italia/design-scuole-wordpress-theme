<?php
/* Template Name: Amministrazione Trasparente
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>

    <main id="main-container" class="main-container">

        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <section class="section bg-white pb-4">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-md-12 article-title-author-container pt-0">
                            <div class="title-content">
                                <h1><?php the_title(); ?></h1>
                            </div><!-- /title-content -->
                        </div><!-- /col-md-6 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

            <section class="section bg-white">
                <div class="container ">
                    <article class="article-wrapper">
                        <div class="row variable-gutters">
                            <div class="col-lg-12">

                                <?php
                                the_content();
?>
                                <div class="row variable-gutters">
                                    <?php

                                $atcontatore = $atct = 0;
                                foreach (dsi_amministrazione_trasparente_array() as $inner) {
                                    $atcontatore++;

                                    //  Scan through inner loop
                                    $atreturn = '<ul>';
                                    $atcounter = 0;
                                    foreach ($inner[1] as $value) {
                                        $args = array( 'taxonomy' => 'amministrazione-trasparente', 'term' => $value );
                                        $query = new WP_Query( $args );
                                        $fount_posts = $query->found_posts;
                                        $atcounter = $atcounter + $fount_posts;

                                        if ( !$fount_posts) {
                                            $opty = 'style="opacity: 0.7;"';
                                        } else { $opty = ''; }
                                        $atreturn .= '<li '.$opty.'>';
                                       // $atreturn .= '<li>';
                                        $atreturn .= '<a href="' . get_term_link( get_term_by('name', $value, 'amministrazione-trasparente'), 'amministrazione-trasparente' ) . '" title="' . $value . '">' . $value . '</a>';
                                        $atreturn .= '</li>';
                                    }
                                    $atreturn .= '</ul>';

                                    echo "<div class='col-lg-6'>";
                                    echo '<div class="ammtrasm-tableclass" id="at-s-'.++$atct.'">';

                                    $sez_l = strtolower(preg_replace('/[^a-zA-Z]+/', '', $inner[0]));
                                    echo '<h3>';
                                    echo '<div class="at-number">'.$atcounter.'</div>';

                                    echo '<span id="'.$sez_l.'" href="#'.$sez_l.'"><a href="'.get_term_link(get_term_by('name', $inner[0], 'amministrazione-trasparente'), 'amministrazione-trasparente').'">'.$inner[0].'</a></span></h3>';
                                    echo $atreturn;

                                    echo '</div>';
                                    echo '</div>';

                                }

                                ?>
                                </div>
                            </div>
                        </div>

                    </article>
                </div>
            </section>
        <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->


<?php
get_footer();
