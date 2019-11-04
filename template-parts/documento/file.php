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


$attach = get_post($idfile);
$filetocheck = get_attached_file($idfile);

$filesize = filesize($filetocheck);
$type = mime_content_type($filetocheck);
$ptitle = $attach->post_title;
if($ptitle == ""){
    $ptitle = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $ptitle);
// Remove any runs of periods (thanks falstro!)
    $ptitle = mb_ereg_replace("([\.]{2,})", '', $ptitle);

}
?>
	<div class="card card-bg card-icon rounded">
		<div class="card-body">
			<svg class="icon <?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo $icon; ?>"></use></svg>
			<div class="card-icon-content">
				<p><strong><a target="_blank" href="<?php echo $attach->guid; ?>"><?php echo $ptitle; ?></a></strong></p>
				<small><?php echo $type; ?> <?php echo intval($filesize/1024); ?> kb</small>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
	</div><!-- /card card-bg card-icon rounded -->
<?php

