<?php
$testo_didattica = dsi_get_option("testo_didattica", "didattica");
$corso_di_studio = dsi_get_meta("corso_di_studio");
?>

<section> 
    <div id="hero" class="container-fluid"> 
        <div id="content" class="row align-items-center"> 
            <div class="col-lg-4 offset-lg-4"> 
                <h1> <?php the_title(); ?> </h1> 
                <h2 class="h4 font-weight-normal"><?php echo wpautop($corso_di_studio);?></h2>  
            </div> 
            <div class=" col-12 col-lg-2 offset-lg-1 text-center"> 
                <?php if ( has_post_thumbnail() ) : ?> 
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> 
                        <?php the_post_thumbnail("project-thumb"); ?> 
                    </a> 
                <?php endif; ?>  
            </div> 
        </div> 
    </div> 
</section>