<?php
$hero_post_id = 134;
?>
<section class="hero-container">
    <div id="hero-splide">
        <div id="hero-content" class="row align-items-center splide__track">
            <ul class="splide__list ">

                <?php
                // TODO: Change loop in `hero` slider
                // labels: enhancement, help wanted
                // assignees: maxmorozoff, ToldoDesign128, paolosartori
                ?>
                <?php
                $loop = new WP_Query(array(
                    'post_type'         => 'hero_slider',
                    'post_status'       => 'publish',
                    'orderby'           => 'menu_order', 
                    'order'             => 'ASC',
                    'posts_per_page'    => 5,
                ));
                while ($loop->have_posts()) : $loop->the_post();

                ?>
                    <li class="splide__slide">
                        <h1><?php the_title(); ?></h1>
                        <p class="h3 fw-regular"><?php the_excerpt(); ?></p>
                        <div class="text-center ">
                            <a class="btn-md-default" href="<?php 
                                echo get_post_meta(get_the_ID(), "_martini_hero_slider_url")[0] ?? "#"; ?>">
                                <button class="w-auto"><?php 
                                    echo get_post_meta(get_the_ID(), "_martini_hero_slider_cta_label")[0] ?? "Scopri"; 
                                ?></button>
                            </a>
                        </div>
                        <div class="splide__slide__img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>
    </div>
</section>
<script>
    /**
     *  @see {@link https://splidejs.com/v3/guides/getting-started/ } 
     */
    document.addEventListener('DOMContentLoaded', () =>
        (!!Splide) && (new Splide('#hero-splide', {
            type: 'loop',
            pagination: true,
            // start: 0,
            classes: {
                arrows: 'splide__arrows container',
                pagination: 'splide__pagination container',
            },
        })).mount() && (document.querySelector('#hero-splide .splide__list').style = ''));
</script>