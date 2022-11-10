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
    <?php get_template_part("template-parts/common/breadcrumb"); ?>
    <section id="container-educazione-per-adulti" class="px-5 p-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>2 Livello Ite</h4>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default">
                    <button class="w-auto">Visita la pagina</button>
                </a>
            </div>
        </div>

    </section>
    <section class="row bg-light px-5 p-4">
        <div class="col-12 col-md-6">
            <h4 class="">Corsi liberi</h4>
        </div>
        <div class="col-12 col-md-6 align-items-start text-md-right">
            <a class="btn-sm-default" href="corsi_liberi">
                <button class="w-auto">Visita la pagina</button>
            </a>
        </div>
    </section>
    <section id="container-carte-della-scuola" class="px-5 p-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>1 Livello 3°media</h4>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default">
                    <button class="w-auto">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
