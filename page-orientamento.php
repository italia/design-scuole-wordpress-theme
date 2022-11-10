<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */



$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);


if(is_post_type_archive("scheda_didattica")){
    $class = "bluelectric";
} else if(is_post_type_archive("scheda_progetto")){
    $class = "bluelectric";
}


get_header();
?>

<?php
$attributes=array(
    'title' => false,
    'limit' => 4,
    'labels' => array(
        'Title 0',
        'Title 1',
        'Title 2',
        'Title 3',
    ),
    'sections' => array(
        'Content 0',
        'Content 1',
        'Content 2',
        'Content 3',
    ),
)

?>


<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-lg-3">
                <img src="" alt="">
            </div>
            <div class="col-12 col-lg-8 offset-lg-1">
                <h2 class="mb-3 text-black">Incontriamoci!</h2>
                <p>L’Istituto apre le porte alle famiglie per guidarvi nella scelta della Scuola. <br> Partecipando potrete vedere i locali, parlare con gli insegnanti e con i ragazzi, assistere a una presentazione della proposta formativa della scuola e essere guidati in alcune piccole esperienze di laboratorio.</p>
                <a href="#" id="btn-md-default"> <button class="w-auto">Scopri di più</button> </a>
            </div>
        </div><!--incontriamoci -->
    </section>

    <section class="section bg-primary_container py-5">
        <div class="container">
            <div class="">
                <h2 class="mb-4 text-blue">Parliamone a tu per tu</h2>
                <p class="h5 mb-4 text-blue">Uno spazio dedicato per aiutarti a scegliere il percorso più adatto a te</p>
                <a id="btn-lg-default" href="#" target="blank">
                    <button class="w-auto">Prenota un appuntamento</button>
                </a>
            </div>
        </div>
    </section>
       
    <section class="container bg-white pt-5 pb-3">
        <?php
        
        $attributes = array(
            'id' => 'crsl-0',
            'title' => 'LICEI',
            'limit' => 4,
            'labels' => array(),
            'sections' => array(),
        );

        
        $posts = new WP_Query( array(
            "post_type" => "indirizzo",
            "posts_per_page" => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'percorsi-di-studio',
                    'field' => 'slug',
                    'terms' => 'licei'
                )
            ),
            'orderby' => "title",
            'order' => "ASC"
        ));

        
        while ( $posts->have_posts() ) : $posts->the_post(); 
        $attributes["labels"][] = get_the_title(); 
        $image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");

        ob_start(); 
        ?>
        <div class="card-article-img mt-3 mb-4"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>
            <?php if(!$image_url){ ?>
                <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
            <?php } ?>
        </div>
        <p><?php echo dsi_get_meta("descrizione"); ?></p>
        <?php 
        $attributes["sections"][] = ob_get_clean();
        endwhile;
        // var_dump($attributes);

        wp_reset_postdata();

        get_template_part( 'template-parts/single/info-carousel', null, $attributes) ?>
               
        <?php
    
        wp_enqueue_style( 'info-carousel', get_template_directory_uri() . '/assets/css/martino-carousel.css');
        ?>
    </section>

    <section class="container bg-white py-5">
        <?php
        
        $attributes = array(
            'id' => 'crsl-1',
            'title' => 'ISTITUTI TECNICI',
            'limit' => 4,
            'labels' => array(),
            'sections' => array(),
        );

        $posts = new WP_Query( array(
            "post_type" => "indirizzo",
            "posts_per_page" => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'percorsi-di-studio',
                    'field' => 'slug',
                    'terms' => 'istituti-tecnici'
                )
            ),
            'orderby' => "title",
            'order' => "ASC"
        ));
        
        while ( $posts->have_posts() ) : $posts->the_post(); 
        $attributes["labels"][] = get_the_title(); 
        $image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");

        ob_start(); 
        ?>
        <div class="card-article-img mt-3 mb-4"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>
            <?php if(!$image_url){ ?>
                <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
            <?php } ?>
        </div>
        <p><?php echo dsi_get_meta("descrizione"); ?></p>
        <?php 
        $attributes["sections"][] = ob_get_clean();
        endwhile;
        // var_dump($attributes);

        wp_reset_postdata();

        get_template_part( 'template-parts/single/info-carousel', null, $attributes) ?>
               
        <?php
    
        wp_enqueue_style( 'info-carousel', get_template_directory_uri() . '/assets/css/martino-carousel.css');
        ?>
    </section>

    <section class="section bg-primary_container py-5">
        <div class="container">
            <div class="">
                <h2 class="mb-4 text-blue">Non resta che iscriversi</h2>
                <div class="iscriviti mb-4"><?php the_content(); ?></div>
                <a class="btn-lg-default" href="#" target="blank">
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