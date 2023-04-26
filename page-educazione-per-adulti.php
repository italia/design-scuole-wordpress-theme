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
    <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>
    <section id="container-fluid" class="px-0 px-md-5 p-4 align-items-center">
        <div class="row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="1-livello-terza-media"> <!-- href temporaneo -->
                    <h4 class="mb-0">1 Livello 3°media</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default" href="1-livello-terza-media"> <!-- href temporaneo -->
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>

    </section>
    <section class="row bg-light px-0 px-md-5 p-4 align-items-center">
        <div class="col-12 row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="2-livello-ite-serale"> <!-- href temporaneo -->
                    <h4 class="mb-0">2 Livello Ite</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default" href="2-livello-ite-serale"> <!-- href temporaneo -->
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>
    <section id="container-fluid" class="px-0 px-md-5 p-4 align-items-center">
        <div class="row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="corsi-liberi"> <!-- href temporaneo -->
                    <h4 class="mb-0">Corsi liberi</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default" href="corsi_liberi"> <!-- href temporaneo -->
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
