<?php
global $nomefile, $idfile;

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
$fulltype = mime_content_type($filetocheck);
$arrtype = explode("/", $fulltype);
$arrtype_more = explode(".", $arrtype[count($arrtype)-1]);
if(is_array($arrtype_more)) {
    $arrtype = $arrtype_more;
}
$type = "file";
if(is_array($arrtype))
    $type = $arrtype[count($arrtype)-1];

$ptitle = $attach->post_title;
if(trim($ptitle) == ""){
    $ptitle = str_replace("-", " ", basename($filetocheck, $ext));
    $ptitle = str_replace("_", " ", $ptitle);
}
?>
	<div class="card card-bg card-icon rounded">
		<div class="card-body">
			<svg class="icon <?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo $icon; ?>"></use></svg>
			<div class="card-icon-content">
				<p><strong><a target="_blank" href="<?php echo $attach->guid; ?>"><?php echo $ptitle; ?></a></strong></p>
				<small><?php echo $type; ?> - <?php echo intval($filesize/1024); ?> kb</small>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
	</div><!-- /card card-bg card-icon rounded -->
<?php

