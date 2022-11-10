<?php
/* Template Name: Open-Day */

get_header();
?>

<main id="open-day" class="main-container">
       
    <?php get_template_part("martini-template-parts/hero/hero_page"); ?> 
    
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

    <div class="container mb-5">

        <div class="row">    


            <?php 

                $loop_01 = new WP_Query( array(
                    'post_type'         => 'openday',
                    'post_status'       => 'publish',
                    'orderby'           => 'count',
                    'order'             => 'DESC',
                    'posts_per_page'    => 999 ,
                )); 

                    $data_openday_01 = get_post_meta( get_the_ID(), '_dsi_indirizzo_wiki_test_textdate_timestamp', true );
                    $data_openday_02 = get_post_meta( get_the_ID(), '_dsi_indirizzo_wiki_test_textdate_timestamp_02', true );

                while ($loop -> have_posts()) : $loop -> the_post();

                    $data_post = get_post_meta( get_the_ID(), '_martini_openday_wiki_test_textdate_timestamp', true );

                    if ($data_post == $data_openday_01 ) { ?>
                        <article class="col-lg-6 mt-5 bg-red">

                            <div class="row">

                                <div class="col-12">
                                    <h6><?php the_title();?></h6>
                                </div>

                                <div class="col-12">
                                    <p><?php echo $subtitle?></p>
                                </div>

                            </div>  

                        </article>  
                    <?php
                    }
                endwhile;
            ?>

        </div>


    </div>
        

</main>

<?php
get_footer();
?>