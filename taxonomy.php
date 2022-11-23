<?php
$obj = get_queried_object();

if($obj->taxonomy == "tipologia-evento")
	get_template_part("archive-evento");
else if($obj->taxonomy == "tipologia-documento")
	get_template_part("archive-documento");
else if($obj->taxonomy == "tipologia-servizio")
	get_template_part("archive-servizio");
else if($obj->taxonomy == "tipologia-circolare")
    get_template_part("archive-circolare");
else if($obj->taxonomy == "tipologia-luogo")
	get_template_part("archive-luogo");
else if($obj->taxonomy == "tipologia-progetto")
    get_template_part("archive-scheda_progetto");
else if($obj->taxonomy == "tipologie")
    get_template_part("archive-amm-trasparente");
else
	get_template_part("archive");
