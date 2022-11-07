<?php 
    $hero_post_id = 134;
?>
<section class="container">
    <div id="hero-splide" >
        <div id="content" class="row align-items-center splide__track">
            <ul class="splide__list ">

                <!-- 
                    TODO: Change loop in `hero` slider
                    labels: enhancement, help wanted
                    assignees: maxmorozoff, ToldoDesign128, paolosartori
                -->
                <?php for ($i=0; $i < 5; $i++) { ?>

                <li class="splide__slide">
                    <h1> <?php the_title(); ?> </h1>
                    <p class="h3 fw-regular"><?php 
                        echo get_the_title($hero_post_id);
                    ?></p>
                    <div class="text-center ">
                        <a class="btn-md-default" class="" href="<?php 
                        echo get_the_permalink($hero_post_id); 
                        ?>" target="blank" class="col-12"><button class="w-auto">Scopri</button></a>
                    </div>
                </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</section>
<script>
    document.addEventListener( 'DOMContentLoaded', () =>
        (!!Splide) && (new Splide( '#hero-splide', {
            type: 'loop',
            pagination: true,
            start: 0,
        })).mount() && (document.querySelector('#hero-splide .splide__list').style = ''));
</script>