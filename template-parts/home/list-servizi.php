<div class="container position-relative slided-top">
    <div class="row variable-gutters mb-4">
        <?php
        global $servizio;
        $args = array('post_type' => 'servizio',
            'posts_per_page' => 6,
        );
        $servizi = get_posts($args);
        foreach ($servizi as $servizio) {
            ?>
            <div class="col-lg-4 mb-4">
                <?php get_template_part("template-parts/servizio/card", "noicon"); ?>
            </div><!-- /col-lg-4 -->
            <?php
        }
        ?>
    </div><!-- /row -->
    <?php
    $landing_url = dsi_get_template_page_url("page-templates/servizi.php");
    if($landing_url) {
        ?>
        <div class="pb-5 text-center">
            <a class="text-underline" href="<?php echo $landing_url; ?>"><strong><?php _e("Scopri di più", "design_scuole_italia"); ?></strong></a>
        </div>
        <?php
    }
 ?>
</div><!-- /container --><?php
