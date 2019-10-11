<?php
$obj = get_queried_object();

if($obj->taxonomy == "tipologia-evento")
	get_template_part("archive-evento");
else if($obj->taxonomy == "tipologia-documento")
	get_template_part("archive-documento");
else if($obj->taxonomy == "tipologia-servizio")
	get_template_part("archive-servizio");
/*else if($obj->taxonomy == "tipologia-struttura")
	get_template_part("archive-struttura");*/
else if($obj->taxonomy == "materia")
	get_template_part("archive-programma_materia");
else if($obj->taxonomy == "tipologia-luogo")
	get_template_part("archive-luogo");
else
	get_template_part("archive");
