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


<?php
$loop = new WP_Query( array(
    'post_type'         => 'orario-classi',
    'post_status'       => 'publish',
    'orderby'           => 'count',
    'order'             => 'DESC',
    'posts_per_page'    => 999 ,
));

$scientifico_scienze_applicate = get_term_by("id", "scientifico scienze applicate");
$scienze_applicate_in_4anni = get_term_by("id", "scienze applicate in 4anni");
$scientifico_sportivo = get_term_by("id", "scientifico sportivo");
$scienze_umane = get_term_by("id", "scienze umane"); 
  
?>


<main id="main-container" class="main-container">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <section class="container">

        <h1 class="h2">ORARIO CLASSI</h1>
            <header role="banner">
                <nav class="nav" role="navigation" id="accordion_orari">
                    <ul class="nav__list p-0">
                    <li>
                        <input id="group-1" type="checkbox" hidden />
                        <label for="group-1" class="p-0"><span class="fa fa-angle-right"></span>LICEI</label>
                        <ul class="group-list p-0">
                        <li>
                            <input id="sub-group-1" type="checkbox" hidden />
                            <label for="sub-group-1" class="p-0"><span class="fa fa-angle-right"></span> Scientifico Scienze Applicate</label>
                            <ul class="sub-group-list p-0">
                                <?php query_posts(); ?>
                                <?php while ($loop -> have_posts()) : $loop -> the_post( $scienze_applicate_in_4anni); ?>
                                <li><a href="#"><?php the_title();?></a></li>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-2" type="checkbox" hidden />
                            <label for="sub-group-2" class="p-0"><span class="fa fa-angle-right"></span> Scienze Applicate in 4anni </label>
                            <ul class="sub-group-list p-0">
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-3" type="checkbox" hidden />
                            <label for="sub-group-3" class="p-0"><span class="fa fa-angle-right"></span> Scientifico Sportivo</label>
                            <ul class="sub-group-list p-0">
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-4" type="checkbox" hidden />
                            <label for="sub-group-4" class="p-0"><span class="fa fa-angle-right"></span> Scienze Umane</label>
                            <ul class="sub-group-list p-0">
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                            </ul>
                        </li>
                        </ul>
                    </li>
                    <li>
                        <input id="group-2" type="checkbox" hidden />
                        <label for="group-2" class="p-0"><span class="fa fa-angle-right"></span>ISTITUTI TECNICI</label>
                        <ul class="group-list p-0">
                        <li>
                            <input id="sub-group-5" type="checkbox" hidden />
                            <label for="sub-group-5" class="p-0"><span class="fa fa-angle-right"></span> AFM</label>
                            <ul class="sub-group-list p-0">
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-6" type="checkbox" hidden />
                            <label for="sub-group-6" class="p-0"><span class="fa fa-angle-right"></span> Economico Sportivo</label>
                            <ul class="sub-group-list p-0">
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-7" type="checkbox" hidden />
                            <label for="sub-group-7" class="p-0"><span class="fa fa-angle-right"></span> Trasporti e Logistica</label>
                            <ul class="sub-group-list p-0">
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-8" type="checkbox" hidden />
                            <label for="sub-group-8" class="p-0"><span class="fa fa-angle-right"></span> Conduzione Mezzo Aereo</label>
                            <ul class="sub-group-list p-0">
                                <li><a href="#">2nd level nav item</a></li>
                                <li><a href="#">2nd level nav item</a></li>
                            </ul>
                        </li>
                        </ul>
                    </li>

                </ul>
                </nav>    
            </header>

            <div class="col-lg-3 mt-4 mt-lg-0">
                <a id="btn-lg-default-outline" href="#" target="blank" class="col-12">
                <button>Orario docenti</button>
                </a>
            </div>
        </section>
    </main>
<?php
get_footer();