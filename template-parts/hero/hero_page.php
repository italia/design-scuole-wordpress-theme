<?php 
    $hero_post_id = 134;
?>
<section>
    <div id="hero" class="container-fluid">
        <div id="content" class="row align-items-center">
            <div class="col-12">
                <h1> <?php the_title(); ?> </h1>
                <p class="h3 fw-regular"><?php 
                    echo get_the_title($hero_post_id);
                ?></p>
                <div class="text-center">
                    <a id="btn-md-default" class="" href="<?php 
                    echo get_the_permalink($hero_post_id); 
                    ?>" target="blank" class="col-12"><button class="w-auto">Scopri</button></a>
                </div>
                
            </div>
        </div>
    </div>
</section>