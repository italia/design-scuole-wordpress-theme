<?php
$hero_post_id = 134;
$use_slider = -1;
?>
<section id="hero" class="hero-page">
    <section class="hero-container">
        <div id="hero-splide">
            <div id="hero-content" class="align-items-center splide__track">
                <ul class="splide__list ">
                    <?php
                    $loop = new WP_Query(array(
                        'post_type'         => 'hero_slider',
                        'post_status'       => 'publish',
                        'orderby'           => 'menu_order', 
                        'order'             => 'ASC',
                        'posts_per_page'    => 5,
                    ));
                    while ($loop->have_posts()) : $loop->the_post();
                    $use_slider++;
                    ?>
                        <li class="splide__slide p-2 w-100">
                            <h1><?php the_title(); ?></h1>
                            <p class="h3 fw-regular"><?php echo get_the_excerpt(); ?></p>
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
</section>
<?php if ($use_slider > 0) { 
/**
 *  @see {@link https://splidejs.com/v3/guides/getting-started/ } 
 */?>
<script>
    document.addEventListener('DOMContentLoaded', () =>
        (!!Splide) && (new Splide('#hero-splide', {
            type: 'loop',
            autoplay: true,
            pagination: true,
            classes: {
                arrows: 'splide__arrows container',
                pagination: 'splide__pagination container',
            },
        })).mount() );
</script>
<?php } ?>