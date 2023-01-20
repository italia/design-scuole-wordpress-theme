<?php get_header();
?>

<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                <img src="<?php echo get_template_directory_uri().'/images/Open_Day.png';?>" alt="" class="w-100">
            </div>
            <div class="col-12 col-lg-8 offset-lg-1">
                <h2 class="mb-3">Incontriamoci!</h2>
                <p>L’Istituto apre le porte alle famiglie per guidarvi nella scelta della Scuola. <br> Partecipando potrete vedere i locali, parlare con gli insegnanti e con i ragazzi, assistere a una presentazione della proposta formativa della scuola e essere guidati in alcune piccole esperienze di laboratorio.</p>
                <a href="#" class="btn-md-default"> <button class="w-auto">Scopri di più</button> </a>
            </div>
        </div><!--incontriamoci -->
    </section>

    <section class="section bg-primary_container py-5">
        <div class="container">
            <div class="">
                <h2 class="mb-4">Parliamone a tu per tu</h2>
                <p class="h5 mb-4">Uno spazio dedicato per aiutarti a scegliere il percorso più adatto a te</p>
                <a class="btn-lg-default" href="#" target="blank">
                    <button class="w-auto">Prenota un appuntamento</button>
                </a>
            </div>
        </div>
    </section>
       
    <section class="container bg-white pt-5 pb-3">
        <?php get_template_part('martini-template-parts/carousel/indirizzi', null, 'licei');?>
    </section>

    <section class="container bg-white py-5">
        <?php get_template_part('martini-template-parts/carousel/indirizzi', null, 'istituto');?>
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
                        <a href="#" class="btn-mini-default"> <button class="w-auto"><span>Scopri </span></button> </a>
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