<?php
global $post;

// if(have_posts()) : while (have_posts()) : the_post(); ?>

<section id="postID-<?php echo $post->ID;?>" class="martini-list--item px-0 py-4 align-items-center">
    <div class="row container-martini px-0 px-md-4 align-items-center">
        <div class="col-12 col-md-6">
            <a href="<?php the_permalink();?>"> <!-- href temporaneo -->
                <h4 class="mb-0"><?php the_title();?></h4>
            </a>
        </div>
        <div class="col-12 col-md-6 align-items-start text-md-right">
            <a class="btn-sm-default" href="<?php the_permalink();?>"> <!-- href temporaneo -->
                <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
            </a>
        </div>
    </div>
</section>

<?php 
// endwhile; // end inner loop 
// endif;
?>