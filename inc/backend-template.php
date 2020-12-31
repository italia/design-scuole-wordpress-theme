<?php
// includo i singoli file di template di backend
foreach (glob(get_template_directory() ."/inc/admin/*.php") as $filename)
{
	require $filename;
}