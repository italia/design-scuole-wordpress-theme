<?php
/* Template Name: Open-Day */

get_header();
?>

<main id="open-day" class="main-container">
       
    <?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?> 
    
    <div class="container">

        <section class="mt-5">

            <div> <?php the_content(); ?> </div>

        </section>

    </div>

    <div class="container mb-5">
        <div class="row justify-content-between">
            <?php 

            $loop = new WP_Query( array(
                'post_type'         => 'indirizzo',
                'post_status'       => 'publish',
                'orderby'           => 'count',
                'order'             => 'DESC',
                'posts_per_page'    => 999 ,
            )); 
            
            while ($loop -> have_posts()) : $loop -> the_post('indirizzo');?>
                <article class="col-lg-3 mt-5">

                    <div class="text-center row">

                        <div class="open-day-foto col-12">
                        <? the_post_thumbnail('news-thumb');?>
                        </div>

                        <div class="col-12 open-post-title">
                        <? the_title();?>
                        </div>

                    </div>  

                </article>

            <?php endwhile; ?>
        </div>

    </div>      

</main>

<?php
get_footer();
?>