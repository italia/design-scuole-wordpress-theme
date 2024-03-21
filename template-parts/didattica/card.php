<?php
global $post, $autore;
$autore = get_user_by("ID", $post->post_author);
$tempo_apprendimento = dsi_get_meta("tempo_apprendimento", "_dsi_scheda_didattica_", $post->ID);
$image_url = get_the_post_thumbnail_url($post, "item-thumb");
$image_id = get_post_thumbnail_id($post);
if(!$image_url)
    $image_url = get_template_directory_uri() ."/assets/placeholders/logo-service.png";
?>

<div class="card card-horizontal card-wrapper card-bg card-icon p-2 card-article-bluelectric cursorhand">

        <div class="card-thumb rounded">
            <?php if($image_url) { ?>
            <a href="<?php echo get_permalink($post); ?>">
                <?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
            </a>
            <?php } ?>
        </div><!-- /card-thumb -->

    <div class="card-body">
        <div class="clearfix mb-3">
            <?php
            $argomenti = dsi_get_argomenti_of_post();
            foreach ( $argomenti as $item ) { ?>
                <a href="<?php echo get_term_link($item); ?>" class="badge badge-sm badge-pill badge-outline-bluelectric"><?php echo $item->name; ?></a>
            <?php } ?>
        </div>
        <small class="card-date icon-dark"><?php echo date_i18n("d F Y", strtotime($post->post_date)); ?></small>
        <h3><a href="<?php echo get_permalink($post); ?>" ><?php echo get_the_title($post); ?></a></h3>
        <?php
        if(!empty($tempo_apprendimento) || get_comment_count($post->ID)["approved"] > 0) {
            ?>
            <ul class="list-icon">
                <?php
                if(!empty($tempo_apprendimento)) {
                    echo '<script> console.log("card > null check",'. json_encode($tempo_apprendimento) .','. json_encode(is_null($tempo_apprendimento)) .','. json_encode(empty($tempo_apprendimento)) .')</script>';
                    ?>
                    <li class="icon-duration"><?php echo $tempo_apprendimento; ?></li>
                    <?php
                }
                ?>
                <?php
                if(get_comment_count($post->ID)["approved"] > 0) {
                    ?>
                    <li class="icon-comments"><?php echo get_comment_count($post->ID)["approved"]; ?></li>
                    <?php
                }
                ?>
            </ul>
        <?php
        }
        ?>
        <div class="card-author">
            <?php
                $privacy_hidden = get_user_meta( $autore->ID, '_dsi_persona_privacy_hidden', true);
                if($privacy_hidden == "false") {
            ?>
                <p class="text-dark">da <a href="<?php echo get_author_posts_url( $autore->ID);  ?>"><?php echo dsi_get_display_name($autore->ID); ?></a></p>
            <?php
                } else {
            ?>
                <p class="text-dark">curato dal personale scolastico</p>
            <?php
                }
            ?>
        </div><!-- /card-author -->
    </div><!-- /card-body -->
</div><!-- /card -->
