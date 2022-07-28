<?php
global $post, $licenza;
?>
<div id="article_data" class="article-footer">
    <p data-element="metadata"><strong><?php _e("", "design_scuole_italia"); ?></strong> <?php
		$date_publish = new DateTime($post->post_date);
		echo $date_publish->format('d.m.Y');
		?></p>
    <p class="d-none"><?php
        if(trim($licenza)!= "")
            echo $licenza;
        else
            _e("Eccetto dove diversamente specificato, questo articolo è stato rilasciato sotto Licenza Creative Commons Attribuzione 3.0 Italia.", "design_scuole_italia"); ?></p>
</div><!-- /article-footer -->

