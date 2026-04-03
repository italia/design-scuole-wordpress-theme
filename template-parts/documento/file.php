<?php
global $nomefile, $idfile, $dsi_circolare_post_id;

$icon = "svg-documents";
if(substr($nomefile, -3) == "pdf")
	$icon = "it-pdf-document";
if(substr($nomefile, -3) == "doc")
	$icon = "svg-doc-document";
if(substr($nomefile, -4) == "docx")
	$icon = "svg-doc-document";
if(substr($nomefile, -3) == "xml")
	$icon = "svg-xml-document";

$ext = substr($nomefile, -4);

$attach = get_post($idfile);
$filetocheck = get_attached_file($idfile);
$filesize = filesize($filetocheck);
$filesize = $filetocheck && file_exists($filetocheck) ? filesize($filetocheck) : 0;
$fulltype = $filetocheck && file_exists($filetocheck) ? mime_content_type($filetocheck) : 'application/octet-stream';
$arrtype = explode("/", $fulltype);
$arrtype_more = explode(".", $arrtype[count($arrtype)-1]);
if(is_array($arrtype_more)) {
    $arrtype = $arrtype_more;
}
$type = "file";
if(is_array($arrtype))
    $type = $arrtype[count($arrtype)-1];

$ptitle = $attach->post_title ?? '';
if(trim($ptitle) == ""){
    $ptitle = str_replace("-", " ", basename($filetocheck, $ext));
    $ptitle = str_replace("_", " ", $ptitle);
}

if ( ! empty($dsi_circolare_post_id) && function_exists('dsi_get_secure_download_url') ) {
    $download_url = dsi_get_secure_download_url( $dsi_circolare_post_id, $idfile );
} else {
    $download_url = $nomefile;
}
?>
	<div class="card card-bg card-icon rounded">
		<div class="card-body">
			<svg class="icon <?php echo esc_attr($icon); ?>" role="img"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo esc_attr($icon); ?>"></use></svg>
			<div class="card-icon-content">
				<p><strong><a target="_blank" href="<?php echo esc_url($download_url); ?>"><?php echo esc_html($ptitle); ?></a></strong></p>
				<small><?php echo esc_html($type); ?> - <?php echo intval($filesize/1024); ?> kb</small>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
	</div><!-- /card card-bg card-icon rounded -->
<?php

