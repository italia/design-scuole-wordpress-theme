<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>

<main id="main-container" class="main-container">
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>

        <section id="primary" class="container" > 
            <div class="row">
                <div class="col-12 mt-5 px-3">
                    <h4>Articolazione degli uffici </h4>
                    <p>
                    Gli uffici della segreteria scolastica di via Perlasca 4 a Mezzolombardo sono aperti al pubblico nei 
                    seguenti giorni (solo su appuntamento):
                    </p>
                </div>
            </div>  
            <div class="row">
                <div class="col-12 col-md-6 mt-3 px-3">
                    <table class="table table-bordered">
                        <thead class="table-info">
                            <tr>
                            <th ></th>
                            <th >Mattina</th>
                            <th>Pomeriggio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Lunedì</td><td>7:30 - 13:30</td><td></td></tr>
                            <tr><td>Martedì</td><td>7:30 - 13:30</td><td>14:00 - 16:30</td></tr>
                            <tr><td>Mercoledì</td><td>7:30 - 13:30</td><td>14:00 - 16:30</td></tr>
                            <tr><td>Giovedì</td><td>7:30 - 13:30</td><td>14:00 - 16:30</td></tr>
                            <tr><td>Venerdì</td><td>7:30 - 13:30</td><td>14:00 - 16:30</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section id="primary" class="container" >        
            <div class="content mx-5 my-5" role="main" data-target="index" >
            <?php the_content(); ?>
            </div><!-- end content -->
        </section><!-- end primary -->
</main>

<?php
get_footer();