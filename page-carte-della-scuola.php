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
    <section id="container-fluid" class="px-5 p-4">
        <div class="row container-martini">
            <div class="col-12 col-md-6">
                <h4>Amministrazione trasparente</h4>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default">
                    <button class="w-auto">Visita la pagina</button>
                </a>
            </div>
        </div>

    </section>
    <section class="row bg-light px-5 p-4">
        <div class="col-12 row container-martini p-0">
            <div class="col-12 col-md-6">
                <h4 class="">Privacy</h4>
            </div>
            <div class="col-12 col-md-6 align-item-start text-md-right">
                <a class="btn-sm-default" href="privacy">
                    <button class="w-auto">Visita la pagina</button>
                </a>
            </div>
        </div>
        
    </section>



    <section id="container-fluid" class="px-5 p-4">
        <div class="row container-martini">
            <div class="col-12 col-md-6">
                <h4>Albo</h4>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default">
                    <button class="w-auto">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>

    </section>
    <section class="row bg-light px-5 p-4">
        <div class="col-12 row container-martini p-0">
            <div class="col-12 col-md-6">
                <h4 class="">Sicurezza</h4>
            </div>
            <div class="col-12 col-md-6 align-items-start text-md-right">
                <a class="btn-sm-default"  href="sicurezza">
                    <button class="w-auto">Visita la pagina</button>
                </a>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();