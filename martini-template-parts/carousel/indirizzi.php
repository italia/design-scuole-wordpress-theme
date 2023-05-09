
    <?php

    if (!is_string($args)) return;

    // Indirizzi licei
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
        'tax_query' => array( array(
            'taxonomy' => 'percorsi-di-studio',
            'field' => 'slug',
            'terms' => 'licei'
        )),
        'orderby' => "title",
        'order' => "ASC"
    ));

    if ($args=='istituto'){
    // indirizzi istituti tecnici
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
        'tax_query' => array( array(
            'taxonomy' => 'percorsi-di-studio',
            'field' => 'slug',
            'terms' => 'istituti'
        )),
        'orderby' => "title",
        'order' => "ASC"
    ));}

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
    <p>
        <?php 
        // echo dsi_get_meta("descrizione"); 
        echo get_the_content(); 
        ?>
    </p>
    <a href="<?php echo get_permalink();?>" class="btn-md-default"> 
        <button class="w-auto">Scopri di più</button> 
    </a>
    <?php 
    $attributes["sections"][] = ob_get_clean();
    endwhile;
    // var_dump($attributes);

    wp_reset_postdata();

    get_template_part( 'martini-template-parts/carousel/info-carousel', null, $attributes) ?>
            
    <?php wp_enqueue_style( 'info-carousel', get_template_directory_uri() . '/assets/css/martino-carousel.css');?>