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
        <?php get_template_part("template-parts/hero/hero_page"); ?>
        <section id="container-contattiutili">
            <div class="row">
                <div class="col-12">
                    <h4> Articolazione degli uffici </h4>
                    <p>
                    Gli uffici della segreteria scolastica di via Perlasca 4 a Mezzolombardo sono aperti al pubblico nei 
                    seguenti giorni (solo su appuntamento):
                    </p>
                </div>
            </div>
            <div class="row">
                <div clas="col-5">
                    <table>
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Mattina</th>
                            <th scope="col">Pomeriggio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>Lunedi</td><td>Giovedi</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>


<?php
get_footer();