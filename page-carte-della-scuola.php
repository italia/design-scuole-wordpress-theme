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
<?php get_template_part("template-parts/hero/hero_page"); ?>
<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>
    <section id="container-fluid" class="px-0 px-md-5 p-4 align-items-center">
        <div class="row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="documenti-di-istituto">
                    <h4 class="mb-0">Documenti di Istituto</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default" href="documenti-di-istituto">
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>
    <section class="row bg-light px-0 px-md-5 p-4 align-items-center">
        <div class="col-12 row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="privacy">
                    <h4 class="mb-0">Privacy</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-item-start text-md-right">
                <a class="btn-sm-default" href="privacy">
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>
        
    </section>



    <section id="container-fluid" class="px-0 px-md-5 p-4 align-items-center">
        <div class="row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="albo">
                    <h4 class="mb-0">Pubblicità Legale</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default" href="albo">
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>

    </section>
    <section class="row bg-light px-0 px-md-5 p-4 align-items-center">
        <div class="col-12 row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="sicurezza">
                    <h4 class="mb-0">Sicurezza</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default"  href="sicurezza">
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>
    <section id="container-fluid" class="px-0 px-md-5 p-4 align-items-center">
        <div class="row container-martini px-0 px-md-4 align-items-center">
            <div class="col-12 col-md-6">
                <a href="https://aprilascuola.provincia.tn.it/sei/#/soggetto/0221179501/scuola/amministrazione-trasparente">
                    <h4 class="mb-0">Amministrazione trasparente</h4>
                </a>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default" href="https://aprilascuola.provincia.tn.it/sei/#/soggetto/0221179501/scuola/amministrazione-trasparente">
                    <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                </a>
            </div>
        </div>

    </section>
</main>
<?php
get_footer();