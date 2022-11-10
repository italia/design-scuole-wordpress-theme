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
        <?php get_template_part("martini-template-parts/hero/hero_page"); ?>
    </section>

    <section class="container bg-white pt-5 pb-3">
        <h2 class="h2 mb-5 pb-3 ml-lg-5">Licei e istitutiti tecnici per tutte le esigenze</h2>
        <?php
        
        $attributes = array(
            'id' => 'crsl-0',
            'title' => 'LICEI',
            'limit' => 4,
            'labels' => array(),
            'sections' => array(),
        );

        // $posts = query_posts(array(
        $posts = new WP_Query( array(
            'post_type' => 'indirizzo', 
            'posts_per_page' => '4',
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

        // $posts = query_posts(array(
        $posts = new WP_Query( array(
            'post_type' => 'indirizzo', 
            'posts_per_page' => '4',
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

</main>
<?php
get_footer();