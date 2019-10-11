<?php
global $luogo, $struttura, $c;


// controllo se è un parent, in caso recupero i dati del genitore
if($luogo->post_parent == 0){
    $card_title = $luogo->post_title;
    $indirizzo = dsi_get_meta("indirizzo", '', $luogo->ID);

}else{
    $parent = get_post($luogo->post_parent);
    $card_title = $parent->post_title;

    $indirizzo = dsi_get_meta("indirizzo", "", $luogo->post_parent);
}
?>
<div class="card card-bg card-icon rounded">
    <a href="<?php echo get_permalink($luogo); ?>">
        <div class="card-body">
            <svg class="icon svg-marker-simple"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-marker-simple"></use></svg>
            <div class="card-icon-content">
                <p><strong><?php echo $card_title; ?></strong></p>
                <small><?php echo $indirizzo; ?></small>
            </div><!-- /card-icon-content -->
        </div><!-- /card-body -->
    </a>
</div>
