<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

$attributes = shortcode_atts( array(
    'title' => false,
    'limit' => 4,
    'sections' => $sections,
    'labels' => $labels,
), $atts );


if(is_post_type_archive("scheda_didattica")){
    $class = "bluelectric";
} else if(is_post_type_archive("scheda_progetto")){
    $class = "bluelectric";
}


get_header();
?>

<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-3">
                <img src="" alt="">
            </div>
            <div class="col-8 offset-1">
                <h4 class="mb-3 text-black">Incontriamoci!</h4>
                <p>L’Istituto apre le porte alle famiglie per guidarvi nella scelta della Scuola. <br>
Partecipando potrete vedere i locali, parlare con gli insegnanti e con i ragazzi, assistere a una presentazione della proposta formativa della scuola e essere guidati in alcune piccole esperienze di laboratorio.</p>
                <a href="#" id="btn-md-default"> <button class="w-auto">Scopri di più</button> </a>
            </div>
        </div><!--incontriamoci -->
    </section>

    <section class="section bg-primary_container py-5">
        <div class="container">
            <div class="">
                <h3 class="mb-4 text-blue">Parliamone a tu per tu</h3>
                <p class="h5 mb-4 text-blue">Uno spazio dedicato per aiutarti a scegliere il percorso più adatto a te</p>
                <a id="btn-lg-default" href="#" target="blank">
                    <button class="w-auto">Prenota un appuntamento</button>
                </a>
            </div>
        </div>
    </section>
       
    <section class="container bg-white py-5">
        <?php get_template_part("template-parts/single/info-carousel, null, $attributes"); ?>
    </section>

    <section class="section bg-primary_container py-5">
        <div class="container">
            <div class="">
                <h3 class="mb-4 text-blue">Non resta che iscriversi</h3>
                <div class="iscriviti mb-4"><?php the_content(); ?></div>
                <a id="btn-lg-default" href="#" target="blank">
                    <button class="w-auto">Iscriviti</button>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container">
            <h4>In concreto quindi? Guarda i progetti dell’Istituto</h4>
            <div class="row mt-3 mt-lg-4 ml-md-0 mr-md-0 justify-content-between" id="loop_orientamento">

            <?php
              $loop = new WP_Query( array( 
                'post_type'         => 'scheda_progetto', 
                'post_status'       => 'publish', 
                'orderby'           => 'count', 
                'order'             => 'DESC', 
                'posts_per_page'    => 5,)
              );
            
              while ($loop -> have_posts()) : $loop -> the_post(); ?> 


                <article class="col-lg-2_5 col-12 card"> 
                    <a href="<?php the_permalink();?>">
                    <div class="card-bg">
                        <div class="card-img-top card-img position-relative">
                        <?php the_post_thumbnail("news-thumb");?> 
                        <div class="posizione-badges"> 
                            <?php get_template_part("template-parts/common/badge-tag.php"); ?> 
                        </div>
                        </div>
                        <div class="card-body">
                        <p class="card-title text-sx"> <?php the_title(); ?> </p>
                        <a href="#" id="btn-mini-default"> <button class="w-auto"><span>Scopri </span></button> </a>
                        </div><!--.card-body -->
                    </div><!--.card-bg -->
                    </a>  
                </article> <!--.card -->
                <?php endwhile; ?>
            </div><!--.row -->
        </div>

    </section>
</main>
<?php
get_footer();