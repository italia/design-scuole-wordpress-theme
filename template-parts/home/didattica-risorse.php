<?php
$args = array('post_type' => 'scheda_progetto', 'posts_per_page' => 1);
$progetti = get_posts($args);

$args = array('post_type' => 'scheda_didattica', 'posts_per_page' => 1);
$scheda_didattica = get_posts($args);

if((is_array($progetti) && count($progetti)) || (is_array($scheda_didattica) && count($scheda_didattica))) {
    ?>

    <section class="section bg-white py-5">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col-lg-4">
                    <div class="h6 mb-3"><?php _e("Didattica", "design_scuole_italia"); ?></div>
                    <h2 class="text-large mb-4 pr-4"><?php _e("Esplora le risorse didattiche dell'Istituto", "design_scuole_italia"); ?></h2>
                    <?php if (is_home()) { ?>
                        <a class="btn btn-sm btn-outline-bluelectric"
                           href="<?php echo dsi_get_template_page_url("page-templates/didattica.php"); ?>"><?php _e("Vai alla didattica", "design_scuole_italia"); ?></a>
                    <?php } ?>
                </div><!-- /col-lg-4 -->
                <div class="col-lg-8">
                    <div class="row variable-gutters pt-5">
                        <?php
                        // todo: programma materia
                        /*
                        <div class="col-lg-4">
                            <div class="card card-bg card-icon-main rounded mb-3">
                                <a href="<?php echo get_post_type_archive_link("programma_materia"); ?>">
                                    <div class="card-body">
                                        <svg class="icon icon-bluelectric svg-programs"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-programs"></use></svg>
                                        <div class="card-icon-content">
                                            <p><strong><?php _e("Programmi", "design_scuole_italia"); ?></strong></p>
                                        </div><!-- /card-icon-content -->
                                    </div><!-- /card-body -->
                                </a>
                            </div><!-- /card card-bg card-icon-main rounded -->
                        </div><!-- /col-lg-4 -->
     */


                        if (is_array($progetti) && count($progetti)) {
                            ?>
                            <div class="col-lg-6">
                                <div class="card card-bg card-icon-main rounded mb-3">
                                    <a href="<?php echo get_post_type_archive_link("scheda_progetto"); ?>">
                                        <div class="card-body">
                                            <svg class="icon icon-bluelectric svg-books">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xlink:href="#svg-books"></use>
                                            </svg>
                                            <div class="card-icon-content">
                                                <p><strong><?php _e("Progetti", "design_scuole_italia"); ?></strong></p>
                                            </div><!-- /card-icon-content -->
                                        </div><!-- /card-body -->
                                    </a>
                                </div><!-- /card card-bg card-icon-main rounded -->
                            </div><!-- /col-lg-4 -->
                            <?php
                        }


                        if (is_array($scheda_didattica) && count($scheda_didattica)) {
                            ?>
                            <div class="col-lg-6">
                                <div class="card card-bg card-icon-main rounded mb-3">
                                    <a href="<?php echo get_post_type_archive_link("scheda_didattica"); ?>">
                                        <div class="card-body">
                                            <svg class="icon icon-bluelectric svg-timetable">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xlink:href="#svg-timetable"></use>
                                            </svg>
                                            <div class="card-icon-content">
                                                <p>
                                                    <strong><?php _e("Schede didattiche", "design_scuole_italia"); ?></strong>
                                                </p>
                                            </div><!-- /card-icon-content -->
                                        </div><!-- /card-body -->
                                    </a>
                                </div><!-- /card card-bg card-icon-main rounded -->
                            </div><!-- /col-lg-4 -->
                            <?php
                        }
                        ?>
                    </div><!-- /row -->
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section --><?php
}
