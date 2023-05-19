<?php
get_header();
?>

<main id="main-container" class="main-container">


    <?php get_template_part("martini-template-parts/hero/hero_title"); ?>


    <section id="text-block" class="section bg-white">
        <div class="container">
            <div class="row main-content variable-gutters">

                <div id="organigramma_page" class="col-lg-8 mt-5 mb-5">
                    <?php the_content(); ?>
                    <div class="my-3">
                        <!-- Galleria -->
                        <?php
                            $prefix = '_martini_progetti_';
                            $galleria = get_post_meta(get_the_ID(), $prefix . 'wiki_galleria', true);
                            echo '<div class="file-list-wrap">';
                            
                            // Loop through them and output an image
                            foreach ((array) $galleria as $attachment_id => $attachment_url) {
                                echo '<div class="file-list-image">';
                                echo wp_get_attachment_image($attachment_id, $img_size);
                                echo '</div>';
                            }
                            echo '</div>';
                            ?>
                    </div>
                </div>

                <div id="sidebar" class="col-lg-3 offset-lg-1 px-5 px-3 px-lg-3 py-5">
                    <aside class="aside-main aside-sticky">
                        <div class="col-12" id="program-legend">
                            <!-- Campo contatti -->
                            <div class="mailfield pb-1">
                                <?php
                                $prefix = '_martini_progetti_';
                                $martini_group_referenti = get_post_meta(get_the_ID(), $prefix . 'group_referenti', true);
                                if (is_array($martini_group_referenti) && !empty($martini_group_referenti)) { ?>

                                    <h5>Referenti</h5>
                                    <ul>
                                        <?php
                                        $martini_group_referenti = get_post_meta(get_the_ID(), $prefix . 'group_referenti', true);
                                        if (is_array($martini_group_referenti) && !empty($martini_group_referenti))

                                            foreach ($martini_group_referenti as $martini_referente) {
                                                $martini_ref = esc_html($martini_referente[$prefix . 'nome_referente'], 'nome referente');
                                                $martini_ref = esc_html($martini_referente[$prefix . 'email_martini'], 'email referente'); ?>

                                            <li>
                                                <?php if ($martini_referente[$prefix . 'nome_referente'] != "") echo '<h6 class"mailfield"> ' . $martini_referente[$prefix . 'nome_referente'] . ' </h6>'; ?>
                                                <?php if ($martini_referente[$prefix . 'email_martini'] != "") echo '<a href="mailto:' . $martini_referente[$prefix . 'email_martini'] . '"> ' . $martini_referente[$prefix . 'email_martini'] . ' </a>'; ?>
                                            </li>

                                        <?php
                                            }
                                        ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <!-- Campo link url -->
                            <div class="mailfield pb-1">
                                <?php
                                $prefix = '_martini_progetti_';
                                $martini_group_link = get_post_meta(get_the_ID(), $prefix . 'group_link', true);
                                if (is_array($martini_group_link) && !empty($martini_group_link)) { ?>
                                    <h5>Link utili</h5>
                                    <ul>
                                        <?php
                                        $martini_group_link = get_post_meta(get_the_ID(), $prefix . 'group_link', true);
                                        if (is_array($martini_group_link) && !empty($martini_group_link))

                                            foreach ($martini_group_link as $martini_link) {
                                                $martini_link_ID = esc_html($martini_link[$prefix . 'nome_link'], 'Testo del link');
                                                $martini_url_link = esc_html($martini_link[$prefix . 'url_link'], 'link URL');
                                        ?>
                                            <li>
                                                <a href="<?php echo $martini_url_link; ?>" target='_blank'> <?php echo $martini_link_ID; ?> </a>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </aside>
                </div> <!--/ sidebar -->

            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();
