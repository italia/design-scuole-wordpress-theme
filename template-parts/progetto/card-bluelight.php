<?php
global $progetto, $autore, $post;
$autore = get_user_by("ID", $progetto->post_author);
$post = $progetto;
?>

    <div class="card card-bg card-thumb-rounded mb-3 h-100">
        <div class="card-body">
            <div class="card-content">
                <a href="<?php echo get_permalink($progetto); ?>" class="project-card-title"><h3 class="mb-0"><?php echo $progetto->post_title; ?></h3></a>    
                <p class="mb-4 mt-3"><?php  echo dsi_get_meta("descrizione" , '_dsi_scheda_progetto_', $progetto->ID); ?></p>
            </div>
        </div><!-- /card-body -->
        <!-- <div class="card-top badge-container mb-3">
            <?php
            $argomenti = dsi_get_argomenti_of_post();
             foreach ( $argomenti as $item ) { ?>
                <a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>" class="badge badge-sm badge-pill badge-outline-bluelectric"><?php echo $item->name; ?></a>
            <?php } ?>
            <?php /* // todo: programma materia
            <div class="d-flex align-items-center">
                <?php
                $classi = dsi_get_meta("classi", "_dsi_scheda_progetto_", $post->ID);
                if(is_array($classi) && count($classi) > 0) {

                    ?>
                    <small class="mr-2">Classe</small>
                    <?php
                    foreach ( $classi as $idclasse ) {
					$classe = get_term( $idclasse );
					?>
                        <a class="badge badge-sm badge-pill badge-bluelectric px-2" href="<?php echo get_term_link($classe); ?>"><?php echo $classe->name; ?></a>
                    <?php }
                }
                ?>

            </div>
            */ ?>
        </div>
        <div class="card-comments-wrapper mb-1">
            <?php // get_template_part("template-parts/autore/card"); ?>
        </div>/card-comments-wrapper -->
    </div><!-- /card -->