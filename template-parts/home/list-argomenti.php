<?php
global $argomento, $show_descrizione;

$home_show_argomenti = dsi_get_option("home_show_argomenti", "homepage");
if(!$home_show_argomenti) $home_show_argomenti = "true_manual";
        
$argomenti = dsi_get_option("home_argomenti", "homepage");
if($home_show_argomenti == "true_evidenza") $argomenti = dsi_get_option("argomenti_evidenza", "argomenti");

$argomenti_evidenza_layout = dsi_get_option("argomenti_evidenza_layout", "argomenti");
$show_descrizione = dsi_get_option("argomenti_evidenza_descrizione", "argomenti");

$layout = "noicon";
if($argomenti_evidenza_layout == "icona") $layout = "";
if($argomenti_evidenza_layout == "immagine") $layout = "image";
?>
<div class="container position-relative slided-top">
    <div class="row variable-gutters mb-4 petrol">
        <?php
                foreach ($argomenti as $idargomento){
                    $argomento = get_term($idargomento, 'post_tag');
                    if($argomento) {
                        ?>
                        <div class="col-lg-4 mb-4">
                            <?php get_template_part("template-parts/argomento/card", $layout); ?>
                        </div><!-- /col-lg-4 -->
                        <?php
                    }
                }
        ?>
    </div><!-- /row -->
    <?php
    $landing_url = dsi_get_template_page_url("page-templates/argomenti.php");
    if($landing_url) {
        ?>
        <div class="pb-5 text-center">
            <a class="btn btn-outline-petrol" href="<?php echo $landing_url; ?>"><strong><?php _e("Scopri di pi&ugrave;", "design_scuole_italia"); ?></strong></a>
        </div>
        <?php
    }
 ?>
</div><!-- /container --><?php
