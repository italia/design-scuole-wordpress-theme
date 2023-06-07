<!-- Galleria -->
<?php
$prefix = '_martini_progetti_';
$galleria = get_post_meta(get_the_ID(), $prefix . 'wiki_galleria', true);
echo '<div class="file-list-wrap">';

// Loop through them and output an image
foreach ((array) $galleria as $attachment_id => $attachment_url) {
    echo '<div class="file-list-image">';
    echo wp_get_attachment_image($attachment_id, $img_size);
    echo '</div>';
}
echo '</div>';
?>