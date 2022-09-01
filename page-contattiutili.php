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
                <div class="col-12">
                    <h4> Articolazione degli uffici </h4>
                    <p>
                    Gli uffici della segreteria scolastica di via Perlasca 4 a Mezzolombardo sono aperti al pubblico nei 
                    seguenti giorni (solo su appuntamento):
                    </p>
                </div>
                <div class="col-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Mattina</th>
                            <th scope="col">Pomeriggio</th>
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
                <div class="col-12">
                    <table class="table-secondary table table-bordered">
                        <tbody>
                            <tr><td>Lunedì</td><td>7:30 - 13:30</td></tr>
                            <tr><td>Martedì</td><td>7:30 - 13:30</td></tr>
                            <tr><td>Mercoledì</td><td>7:30 - 13:30</td></tr>
                            <tr><td>Giovedì</td><td>7:30 - 13:30</td></tr>
                            <tr><td>Venerdì</td><td>7:30 - 13:30</td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <h4> Collaboratori del dirigente scolastico e referenti/funzioni strumentali</h4>
                </div>
                <div class="col-12">
                    <table class="table-secondary table table-bordered">
                        <tbody>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td></td><td></td></tr>
                        </tbody>
                    </table>
                </div>
        </section>
    </main>


<?php
get_footer();