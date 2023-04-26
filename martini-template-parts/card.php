<article class="card">
    <div class="card-img-top card-img position-relative">
        <a class="img-loop" href="<?php the_permalink();?>">
            <?php 
                if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
                echo get_the_post_thumbnail($post->ID);
                }
            ?>
            <div>
            </div>
        </a>
        <div class="position-absolute" id="card_article_badge"> 
            <?php get_template_part("template-parts/common/badges-argomenti"); ?>
        </div>
    </div>
    <div class="card-body">
        <p class="card-title primary"> <?php the_title(); ?> </p>
        <a href="<?php the_permalink();?>" class="btn-mini-default"> 
            <button class="w-auto">Scopri</button>
        </a>
    </div>
</article> <!--.card -->
