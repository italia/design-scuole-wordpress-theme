<?php

require_once 'vendor/dompdf/lib/html5lib/Parser.php';
require_once 'vendor/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'vendor/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'vendor/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
use Dompdf\Options;


add_action("template_redirect", "dsi_pdf_generator");

function dsi_pdf_generator(){
    global $post, $type;
    if(is_singular("circolare") && isset($_GET["pdf"]) && ($_GET["pdf"] == "true")){

        $image_url = get_template_directory_uri() ."/assets/placeholders/logo-service.png";
        $data = file_get_contents($image_url);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $post->ID);


        ob_start();
?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <style>
                body{font-size: 16px;color: black;}
                footer {
                    position: fixed;
                    bottom: 0cm;
                    left: 0cm;
                    right: 0cm;
                    font-size: 12px;
                }
            </style>
            <title><?php echo $post->post_title; ?></title>
        </head>
        <body>
        <img src="<?php echo $base64; ?>" style="width:90px; height: 90px; float:left; ">
        <p class="h1">
            <span><?php echo dsi_get_option("tipologia_scuola"); ?></span>
            <br>
            <span><strong><?php echo dsi_get_option("nome_scuola"); ?></strong></span>
            <br>
            <span class="d-none d-lg-block"><?php echo dsi_get_option("luogo_scuola"); ?></span>

        </p>

        <div style="font-size: 12px;clear:both; "><br>

            <span ><?php echo date_i18n("d F Y", strtotime($post->post_date)); ?></span>
            <?php if($numerazione_circolare){ ?>
                <h3>Circolare numero <?php echo $numerazione_circolare; ?></h3>
            <?php }  ?>

        </div>
        <h3><?php echo $post->post_title; ?></h3>


        <?php
        echo strip_tags(apply_filters("the_content", $post->post_content), "<p><b><strong><i><a><div>");
        ?>


        <footer style="text-align: center">
            <?php
            _e("PDF generato dalla circolare  ");
            if($numerazione_circolare)
                echo "n. ".$numerazione_circolare." ";
            _e("pubblicata sul sito ");
            echo dsi_get_option("nome_scuola");
            echo "<br>";
            echo get_permalink($post);
            ?>
        </footer>

        </body>
        </html>
        <?php
        $html = ob_get_clean();

        $options = new Options();

        $options->set('defaultMediaType', 'all');
        $options->set('isFontSubsettingEnabled', true);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');
        
        // clean buffer
        ob_end_clean();

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("circolare-".$post->post_name.".pdf");
        exit();
    }
}