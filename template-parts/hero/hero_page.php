<?php 
    $hero_post_id = "";
?>
<section>
    <div id="hero" class="container-fluid">
        <div id="content" class="row align-items-center">
            <div class="col-12">
                <h1> <?php the_title(); ?> </h1>
                <p class="h3 fw-regular"><?php 
                    get_the_title();
                ?></p>
                <div class="text-center">
                    <a id="btn-lg-default" class="" href="<?php 
                    the_permalink($hero_post_id); 
                    ?>" target="blank" class="col-12"><button class="w-auto">Scopri</button></a>
                </div>
                
            </div>
        </div>
    </div>
</section>