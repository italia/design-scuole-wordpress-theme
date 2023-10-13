<?php
global $post, $licenza;
?>
<div class="article-footer">
    <p data-element="metadata"><strong><?php _e("Pubblicato", "design_scuole_italia"); ?>:</strong> <?php
		$date_publish = new DateTime($post->post_date);
		echo $date_publish->format('d.m.Y');
		?> <span>-</span> <strong><?php _e("Revisione", "design_scuole_italia"); ?>:</strong> <?php
		$date_update = new DateTime($post->post_modified);
		echo $date_update->format('d.m.Y');
		?></p>
    <p><?php
        if($licenza && trim($licenza)!= "")
            echo $licenza;
        else
            _e("Eccetto dove diversamente specificato, questo articolo è stato rilasciato sotto Licenza Creative Commons Attribuzione 4.0 Italia.", "design_scuole_italia"); ?></p>
</div><!-- /article-footer -->

