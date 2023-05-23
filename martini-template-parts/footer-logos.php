<?php
$loop = new WP_Query(array(
    'post_type'         => 'footer_logos',
    'post_status'       => 'publish',
    'orderby'           => 'menu_order', 
    'order'             => 'ASC',
    'posts_per_page'    => 5,
));
if ($loop->have_posts()) {
?>
<section id="footer_logos" class="footer_logos-page">
    <section class="footer_logos-container">
        <div id="footer_logos-splide">
            <div class="footer_logos-content align-items-center splide__track">
                <ul class="splide__list ">
                    <?php
                    while ($loop->have_posts()) : $loop->the_post();
                        $id = get_the_ID();

                        $href = current(array_filter(get_post_meta($id, "_martini_footer_logos_url")));
                        $label = get_the_title();
                        $label_position = current(array_filter(get_post_meta($id, "_martini_footer_logos_label_position")));

                        $image_id = get_post_thumbnail_id($id);
                    ?>
                        <li class="splide__slide">

                        <?php if (!empty($href)) { ?>
                            <a class="footer_logos-container footer_logos-link" href="<?php echo $href; ?>">
                        <?php } ?>
                                <div class="footer_logos-container <?php 
                                    printf(empty($label_position)?"%s":"footer_logos-label-%s", $label_position); 
                                ?>">

                                <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                                
                                <?php if (!empty($label)) { ?>                            
                                    <span class="footer_logos-label"><?php echo $label; ?></span>
                                <?php } ?>
                                </div>
                        <?php if (!empty($href)) { ?>
                            </a>
                        <?php } ?>
                        
                        </li>
                    <?php
                        
                        endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </section>
</section>
<?php 
/**
 *  @see {@link https://splidejs.com/v3/guides/getting-started/ } 
 */?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const element = document.querySelector('#footer_logos-splide');

        (!!Splide && !!element) && (new Splide(element, {
            type: 'loop',
            pagination: false,
            arrows: false,
            autoWidth: true,
            perPage: 10,
            drag: 'free',
        })).mount();
    });
</script>
<?php } ?>