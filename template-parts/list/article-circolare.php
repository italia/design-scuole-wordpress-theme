<?php
global $post;

$image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);
$is_pubblica = dsi_get_meta("is_pubblica");

$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);

$argomenti = dsi_get_argomenti_of_post();
$numerazione_circolare =  dsi_get_meta("numerazione_circolare", "", $post->ID);
$destinatari_circolari =  dsi_get_meta("destinatari_circolari");

$user = wp_get_current_user();
$current_user_roles = (array) $user->roles;

$can_view = "true";

if($destinatari_circolari == "ruolo"){
	$allowed_roles = dsi_get_meta("ruoli_circolari"); 
	$c = array_intersect($allowed_roles,$current_user_roles);
	if (count($c) > 0) {
	$can_view = "true";
	} else {
	$can_view = "false";
	}
	
}

if($destinatari_circolari == "all"){
	$can_view = "true";
}
    
if($destinatari_circolari == "gruppo"){
		$users = array();
        $gruppi_circolari = dsi_get_meta("gruppi_circolari", '', $post->ID);
        $users = get_objects_in_term( $gruppi_circolari, "gruppo-utente" );
        if (in_array($user->ID,$users )) {
			$can_view = "true";
		} else {
			$can_view = "false";
		}	
}
?>


<?php if($is_pubblica == "false" && !is_user_logged_in()  ) { ?>

<?php } ?>



<?php if($is_pubblica == "false" && is_user_logged_in() &&  $can_view == "true"  ) { ?>
<a class="presentation-card-link" href="<?php the_permalink(); ?>">
    <article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand" >
       <div class="card-body">
                <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>

                    <div class="date">
                        <span class="year"><?php echo date_i18n("Y", strtotime($post->post_date)); ?></span>
                        <span class="day"><?php echo date_i18n("d", strtotime($post->post_date)); ?></span>
                        <span class="month"><?php echo date_i18n("M", strtotime($post->post_date)); ?></span>
                    </div>

                    <?php if(!$image_url){ ?>
                        <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
                    <?php } ?>

                </div>
                <div class="card-article-content">
                    <small class="h6 text-greendark"><?php _e("Circolare ", "design_scuole_italia"); echo $numerazione_circolare; ?></small>

                    <h2 class="h3"><?php the_title(); ?></h2>
                    <p><?php echo $excerpt; ?></p>
					

                </div><!-- /card-avatar-content -->
        </div><!-- /card-body --> 
    </article><!-- /card card-bg card-article -->
</a> <?php } ?>


<?php if($is_pubblica == "false" && is_user_logged_in() &&  $can_view == "false"  ) { ?>
<!-- non mostrare -->
<?php } ?>



<?php if($is_pubblica == "true" ) { ?>
<a class="presentation-card-link" href="<?php the_permalink(); ?>">
    <article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand" >
       <div class="card-body">
                <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>

                    <div class="date">
                        <span class="year"><?php echo date_i18n("Y", strtotime($post->post_date)); ?></span>
                        <span class="day"><?php echo date_i18n("d", strtotime($post->post_date)); ?></span>
                        <span class="month"><?php echo date_i18n("M", strtotime($post->post_date)); ?></span>
                    </div>

                    <?php if(!$image_url){ ?>
                        <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
                    <?php } ?>

                </div>
			<div class="card-article-content">
                    <small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
                    <h2 class="h3"><?php the_title(); ?></h2>
                    <p><?php echo $excerpt; ?></p>
                </div><!-- /card-avatar-content -->
        </div><!-- /card-body --> 
    </article><!-- /card card-bg card-article -->
</a> <?php } ?>
