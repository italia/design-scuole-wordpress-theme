<?php
/* Template Name: Amministrazione Trasparente
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();

function printUl($data){
	echo '<a href="' . get_term_link( get_term_by('name', $data[0], 'amministrazione-trasparente'), 'amministrazione-trasparente' ) . '" title="' . $data[0] . '"><h5>'.$data[0].'<span class="counterA" style="color:red"> ('.$data["count"].')</span></h5></a>';
	echo "<ul>";
	foreach($data[1] as $inner){
		printLi($inner);
	}
	echo "</ul>";
}
function printLi($data){
	if(count($data[1])==0){
		echo '<li><a href="' . get_term_link( get_term_by('name', $data[0], 'amministrazione-trasparente'), 'amministrazione-trasparente' ) . '" title="' . $data[0] . '">' . $data[0] . '</a> <span class="counterA" style="color:red"> ('.$data["count"].')</span></li>';
	}
	else{
		printUl($data);
	}
}
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
                                foreach (get_amministrazione_array() as $inner) {

                                    //  Scan through inner loop


                                    echo "<div class='col-lg-6'>";
                                    echo '<div class="ammtrasm-tableclass" id="at-s-'.++$atct.'">';

                                    $sez_l = strtolower(preg_replace('/[^a-zA-Z]+/', '', $inner[0]));
                                    echo '<a href="' . get_term_link( get_term_by('name', $inner[0], 'amministrazione-trasparente'), 'amministrazione-trasparente' ) . '" title="' . $inner[0] . '"><h3>';
                                    echo '<span id="'.$sez_l.'" href="#'.$sez_l.'">'.$inner[0].'</span><span class="counterA" style="color:red"> ('.$inner["count"].')</span></h3></a>';
                                    echo '<ul>';

                                    
									foreach ($inner[1] as $value) {
										if(count($value[1])==0){
											printLi($value);
										}
										else{
											printUl($value);
										}
                                    }
									echo '</ul>';
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
			<style>
			.counterA{
				font-size:14px
			}
			</style>
        <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->


<?php
get_footer();
