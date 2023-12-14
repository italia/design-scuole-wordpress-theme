<?php
global $argomento;
$home_argomenti = dsi_get_option("home_argomenti", "homepage");

?>
<div class="container position-relative slided-top">
    <div class="row variable-gutters mb-4">
        <?php
                foreach ($home_argomenti as $idargomento){
                 $argomento = get_term($idargomento, 'post_tag');
                    ?>
                    <div class="col-lg-4 mb-4">
                        <?php get_template_part("template-parts/argomento/card", "noicon"); ?>
                    </div><!-- /col-lg-4 -->
                    <?php

                }
        ?>
    </div><!-- /row -->
    <?php
    $landing_url = dsi_get_template_page_url("page-templates/argomenti.php");
    if($landing_url) {
        ?>
        <div class="pb-5 text-center">
            <a class="btn btn-outline-petrol" href="<?php echo $landing_url; ?>"><strong><?php _e("Scopri di più", "design_scuole_italia"); ?></strong></a>
        </div>
        <?php
    }
 ?>
</div><!-- /container --><?php
