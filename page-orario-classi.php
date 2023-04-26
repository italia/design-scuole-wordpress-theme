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
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <section class="container">

        <h1>ORARIO CLASSI</h1>
            <header role="banner">
                <div class="" role="navigation" id="accordion_orari">
                    <ul class="nav__list p-0">
                    <li>
                        <input id="group-1" type="checkbox" hidden />
                        <label for="group-1" class="p-0"><span class="fa fa-angle-right"></span>LICEI</label>
                        <ul class="group-list p-0">
                        <li>
                            <input id="sub-group-1" type="checkbox" hidden />
                            <label for="sub-group-1" class="p-0"><span class="fa fa-angle-right"></span> Scientifico Scienze Applicate</label>
                            <ul class="sub-group-list p-0">
                            
                                
                            <!-- loop scientifico scienze applicate -->
                            
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-2" type="checkbox" hidden />
                            <label for="sub-group-2" class="p-0"><span class="fa fa-angle-right"></span> Scienze Applicate in 4anni </label>
                            <ul class="sub-group-list p-0">
                                <?php 
                                    $loop = new WP_Query( array(
                                        'post_type'         => 'orario-classi',
                                        'post_status'       => 'publish',
                                        'orderby'           => 'count',
                                        'order'             => 'DESC',
                                        'posts_per_page'    => 999 ,
                                )); ?>
                                    
                                <!-- loop scientifico scienze applicate in 4 anni-->
                                <?php 
                                    while ($loop -> have_posts()) : $loop -> the_post();
                                        $radio_input = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_licei', true );
                                        $file = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_licei', true );

                                        if ($radio_input == 'scientifico-scienze-applicate-in-4anni' ) { ?>
                                            <li><a href=""> 
                                                <?php the_title(); ?> 
                                            </a></li>   
                                        <?php
                                        }
                                    endwhile;
                                ?>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-3" type="checkbox" hidden />
                            <label for="sub-group-3" class="p-0"><span class="fa fa-angle-right"></span> Scientifico Sportivo</label>
                            <ul class="sub-group-list p-0">
                                <?php 
                                    $loop = new WP_Query( array(
                                        'post_type'         => 'orario-classi',
                                        'post_status'       => 'publish',
                                        'orderby'           => 'count',
                                        'order'             => 'DESC',
                                        'posts_per_page'    => 999 ,
                                )); ?>
                                    
                                <!-- loop scientifico sportivo -->
                                <?php 
                                    while ($loop -> have_posts()) : $loop -> the_post();
                                        $radio_input = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_licei', true );
                                        $file = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_licei', true );

                                        if ($radio_input == 'scientifico-sportivo' ) { ?>
                                            <li><a href=""> 
                                                <?php the_title(); ?> 
                                            </a></li>   
                                        <?php
                                        }
                                    endwhile;
                                ?>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-4" type="checkbox" hidden />
                            <label for="sub-group-4" class="p-0"><span class="fa fa-angle-right"></span> Scienze Umane</label>
                            <ul class="sub-group-list p-0">
                                <?php 
                                    $loop = new WP_Query( array(
                                        'post_type'         => 'orario-classi',
                                        'post_status'       => 'publish',
                                        'orderby'           => 'count',
                                        'order'             => 'DESC',
                                        'posts_per_page'    => 999 ,
                                )); ?>
                                    
                                <!-- loop scientifico scienze umane -->
                                <?php 
                                    while ($loop -> have_posts()) : $loop -> the_post();
                                        $radio_input = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_licei', true );
                                        $file = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_licei', true );

                                        if ($radio_input == 'scienze-umane' ) { ?>
                                            <li><a href=""> 
                                                <?php the_title(); ?> 
                                            </a></li>   
                                        <?php
                                        }
                                    endwhile;
                                ?>
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
                                <?php 
                                    $loop = new WP_Query( array(
                                        'post_type'         => 'orario-classi',
                                        'post_status'       => 'publish',
                                        'orderby'           => 'count',
                                        'order'             => 'DESC',
                                        'posts_per_page'    => 999 ,
                                )); ?>
                                    
                                <!-- loop scientifico sportivo -->
                                <?php 
                                    while ($loop -> have_posts()) : $loop -> the_post();
                                        $radio_input = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );
                                        $file = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );

                                        if ($radio_input == 'AFM' ) { ?>
                                            <li><a href=""> 
                                                <?php the_title(); ?> 
                                            </a></li>   
                                        <?php
                                        }
                                    endwhile;
                                ?>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-6" type="checkbox" hidden />
                            <label for="sub-group-6" class="p-0"><span class="fa fa-angle-right"></span> Economico Sportivo</label>
                            <ul class="sub-group-list p-0">
                                <?php 
                                    $loop = new WP_Query( array(
                                        'post_type'         => 'orario-classi',
                                        'post_status'       => 'publish',
                                        'orderby'           => 'count',
                                        'order'             => 'DESC',
                                        'posts_per_page'    => 999 ,
                                )); ?>
                                    
                                <!-- loop scientifico sportivo -->
                                <?php 
                                    while ($loop -> have_posts()) : $loop -> the_post();
                                        $radio_input = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );
                                        $file = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );

                                        if ($radio_input == 'trasporti-e-logistica' ) { ?>
                                            <li><a href=""> 
                                                <?php the_title(); ?> 
                                            </a></li>   
                                        <?php
                                        }
                                    endwhile;
                                ?>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-7" type="checkbox" hidden />
                            <label for="sub-group-7" class="p-0"><span class="fa fa-angle-right"></span> Trasporti e Logistica</label>
                            <ul class="sub-group-list p-0">
                                <?php 
                                    $loop = new WP_Query( array(
                                        'post_type'         => 'orario-classi',
                                        'post_status'       => 'publish',
                                        'orderby'           => 'count',
                                        'order'             => 'DESC',
                                        'posts_per_page'    => 999 ,
                                )); ?>
                                    
                                <!-- loop scientifico sportivo -->
                                <?php 
                                    while ($loop -> have_posts()) : $loop -> the_post();
                                        $radio_input = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );
                                        $file = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );

                                        if ($radio_input == 'economico-sportivo' ) { ?>
                                            <li><a href=""> 
                                                <?php the_title(); ?> 
                                            </a></li>   
                                        <?php
                                        }
                                    endwhile;
                                ?>
                            </ul>
                        </li>
                        <li>
                            <input id="sub-group-8" type="checkbox" hidden />
                            <label for="sub-group-8" class="p-0"><span class="fa fa-angle-right"></span> Conduzione Mezzo Aereo</label>
                            <ul class="sub-group-list p-0">
                                <?php 
                                    $loop = new WP_Query( array(
                                        'post_type'         => 'orario-classi',
                                        'post_status'       => 'publish',
                                        'orderby'           => 'count',
                                        'order'             => 'DESC',
                                        'posts_per_page'    => 999 ,
                                )); ?>
                                    
                                <!-- loop scientifico sportivo -->
                                <?php 
                                    while ($loop -> have_posts()) : $loop -> the_post();
                                        $radio_input = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );
                                        $file = get_post_meta( get_the_ID(), '_martini_orario_classi_wiki_test_radio_istituti', true );

                                        if ($radio_input == 'conduzione-mezzo-aereo' ) { ?>
                                            <li><a href=""> 
                                                <?php the_title(); ?> 
                                            </a></li>   
                                        <?php
                                        }
                                    endwhile;
                                ?>
                            </ul>
                        </li>
                        </ul>
                    </li>

                </ul>
                </div>    
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