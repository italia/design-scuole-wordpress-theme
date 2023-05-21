<?php
global $nomefile, $idfile;

/**
 * Check if file exists. 
 * If file is manually deleted or erased from media, do not perform code
 * or fatal error server error is returned.
 */

$file = get_post($idfile);
if (is_null($file)) {
	return;
}

// Get file info.
$file_info = pathinfo($file->guid);

// Default icon.
$icon = "svg-documents";

// Extension icon hashmap, better performance and readability.
$icons = [
	"pdf" => "it-pdf-document",
	"doc" => "svg-doc-document",
	"docx" => "svg-doc-document",
	"xml" => "svg-xml-document",
];

if (array_key_exists($file_info['extension'], $icons)) {
	$icon = $icons[$file_info['extension']];
}

$filetocheck = get_attached_file($idfile);
$filesize = filesize($filetocheck);

/**
 * If file not has name, automatically set for user,
 * otherwise get file title.
 */
$ptitle = trim($ptitle) == "" ? str_replace(["-", "_"], " ", $file_info["filename"]) : $file->post_title;

?>
	<div class="card card-bg card-icon rounded">
		<div class="card-body">
			<svg class="icon <?php echo $icon; ?>" role="img"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo $icon; ?>"></use></svg>
			<div class="card-icon-content">
				<p><strong><a target="_blank" href="<?php echo $nomefile; ?>"  ><?php echo $ptitle; ?></a></strong></p>
				<small><?php echo $file_info['extension']; ?> - <?php echo intval($filesize/1024); ?> kb</small>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
	</div><!-- /card card-bg card-icon rounded -->
<?php