<?php
global $classe;
// recupero le scuole selezionate
$scuole_didattica = dsi_get_option("scuole_didattica", "didattica");
if(is_array($scuole_didattica) && count($scuole_didattica)>0) {
?>

    <section class="section section-padding py-0 section-tabs-bg bg-bluelectric" id="didattica">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col">
                    <div class="responsive-tabs-wrapper">
                        <!-- <div class="title-large">
                            <h1 class="h3"><?php // _e("La didattica", "design_scuole_italia"); ?></h1>
                            <h2 class="h4 label-didattica"><?php // _e("La nostra offerta formativa", "design_scuole_italia"); ?></h2>
                        </div> title-large -->
                        <div class="title-small">
                            <div class="h5"><?php
                                            // se sono più strutture è un istituto, altrimenti una scuola
                                if(is_array($scuole_didattica) && count($scuole_didattica) == 1)
                                                _e("La scuola", "design_scuole_italia");
                                            else
                                                _e("L'Istituto", "design_scuole_italia"); ?></div>
                            <p><?php _e("A.S.", "design_scuole_italia"); ?> <?php echo dsi_convert_anno_scuola(dsi_get_current_anno_scolastico()) ; ?></p>

                        </div><!-- /title-section -->
                        <?php
                        /*
                        Modifica per Liceo Pitagora
                            Rimozione immagine
                        START
                        */

                        /*
                        <div class="tabs-img">
                            <img class="img-fluid" src="<?php echo  get_template_directory_uri(); ?>/assets/img/didattica-mockup.png">
                        </div>
                        */

                        /*
                        END

                        Modifica per Liceo Pitagora
                        */
                        ?>

                        <div class="responsive-tabs responsive-tabs-aside padding-bottom-200">
                            <ul id="navigazione-didattica">
                                <?php
                                foreach ($scuole_didattica as $idstruttura){
                                    $scuola = get_post($idstruttura);
                                ?>
                                    <li><a href="#tab-<?php echo $idstruttura; ?>"><?php echo $scuola->post_title; ?></a></li>
                                <?php
                                }
                                ?>
                                <?php 
                                /*
                                Modifica Liceo Pitagora
                                    Aggiunta Tab links
                                START
                                */
                                ?>
                                <li><a href="#tab-dirigenza">Dirigenza e amministrazione</a></li>
								<li><a href="#tab-iscrizione">Come iscriversi</a></li>
								<li><a href="#tab-albo">Albo Online e Trasparenza</a></li>
                                <?php 
                                /*
                                START

                                Modifica Liceo Pitagora
                                */
                                ?>
                            </ul>
                            <?php
                            $c=0;
                            foreach ($scuole_didattica as $idstruttura) {
                                $scuola = get_post($idstruttura);

                            ?>
                                <div id="tab-<?php echo $idstruttura; ?>" class="responsive-tabs-content">
                                    <div class="accordion-large accordion-wrapper">
                                    <h2 class="h3"><?php _e("La didattica", "design_scuole_italia"); ?></h2>
                                    <h2 class="h4 label-didattica"><?php _e("La nostra offerta formativa", "design_scuole_italia"); ?></h2>
                                        <?php
                                        // recupero i percorsi di studio
                                        $indirizzi = dsi_get_meta("link_servizi_didattici", "", $idstruttura);
                                        if($indirizzi){
                                            foreach ($indirizzi as $idindirizzo){
                                                $indirizzo = get_post($idindirizzo);
                                                if($indirizzo && 'trash' !== get_post_status($idindirizzo)) {
                                                    $descrizione = dsi_get_meta("descrizione", "", $indirizzo->ID);
                                                    $sottotitolo = dsi_get_meta("sottotitolo", "", $indirizzo->ID);
                                        ?>
                                                    <hr/>
                                                    <div class="accordion-large-title accordion-header">
                                                        <h3><button style=" background: none; border: none;"><?php echo $indirizzo->post_title; ?></button></h3>
                                                    </div><!-- /accordion-large-title -->
                                                    <div tabindex="0" class="accordion-large-content accordion-content">
                                                        <?php echo wpautop($descrizione); ?>
                                                        <p><a href="<?php echo get_permalink($indirizzo); ?>"
                                                              class="btn"  style="background-color: #EA7653;"
                                                              ><?php _e("Per saperne di più", "design_scuole_italia"); ?></a>
                                                        </p>
                                                    </div><!-- /accordion-large-content -->

                                        <?php
                                                }
                                            }

                                        }else{
                                            echo '<div ><h5>';
                                            _e("Nessun indirizzo di studi associato a questa scuola.", "design_scuole_italia");
                                            echo '</h5></div>';
                                        }
                                        ?>

                                        <div class="text-center text-sm-left">
                                            <a class="btn mt-4 mb-2" href="<?php echo get_permalink($idstruttura); ?>" style="background-color: #EA7653;"><?php _e("Vai alla presentazione della scuola", "design_scuole_italia"); ?></a>
                                        </div>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            /*
                            Modifica per Liceo Pitagora

                            START
                            */
                            ?>

                            <div id="tab-dirigenza" class="responsive-tabs-content">
                                <div class="accordion-large accordion-wrapper">

                                    <h3 class="mb-0">Dirigenza e amministrazione</h3>
                                    <ul style="background-color: transparent !important">
                                        <li><strong>Sede principale</strong> Piazza Umberto I, 15 - 88900 Crotone (KR)</li>
                                        <li><strong>Telefono</strong> 0962-905731</li>
                                        <li><strong>E-mail</strong> KRPC02000L@istruzione.it</li>
                                        <li><strong>PEC</strong> KRPC02000L@pec.istruzione.it</li>
                                        <li><strong>Codice Fiscale</strong> 81004910790</li>
                                        <li><strong>Codice Meccanografico</strong> KRPC02000L</li>
                                    </ul>
                                    <h4>Dirigente</h4>
                                    <p>Natascia Senatore</p>

                                    <p>
                                        <a href="/la-scuola/" class="btn" style="background-color: #EA7653;">Tutto sulla nostra Scuola</a>
                                    </p>
                                </div>
                            </div><!-- /accordion-large-content -->

                            <div id="tab-iscrizione" class="responsive-tabs-content">
                                <div class="accordion-large accordion-wrapper">
                                <h3 class="mb-0">Come iscriversi</h3>

                                <p>Le Iscrizioni On Line prevedono alcune fasi:</p>

                                <ul style="background-color: transparent !important">
                                    <li><strong>PRIMA FASE:</strong> abilitazione al servizio presso il portale del Ministero dell'Istruzione e del Merito <a href="https://www.miur.gov.it/" style="text-decoration: underline">https://www.miur.gov.it</a> dal 19 dicembre 2022. I genitori e gli esercenti la responsabilità genitoriale (affidatari, tutori) si abilitano al Servizio “Iscrizioni on line”, disponibile sul portale Ministero dell’Istruzione e del Merito :<a href="http://www.istruzione.it/iscrizionionline/" style="text-decoration: underline">www.istruzione.it/iscrizionionline/</a> utilizzando le credenziali SPID (Sistema Pubblico di Identità Digitale), CIE (Carta di identità elettronica) o eIDAS (Electronic IDentification Authentication and Signature) .</li>
                                    <li><strong>SECONDA FASE:</strong> compilazione della domanda vera e propria e l'invio alle scuole scelte  utilizzando una procedura accessibile all'indirizzo: <a href="https://www.istruzione.it/iscrizionionline/" style="text-decoration: underline">https://www.istruzione.it/iscrizionionline/</a> [si accede tramite SPID/CIE/eIDAS] dal ore dalle 8:00 del 9 gennaio 2023 alle 20:00 del 30 gennaio 2023. </li>
                                    <li><strong>TERZA FASE:</strong> Aggiornamento sullo stato di avanzamento della domanda ed eventuale accettazione da parte della Scuola successivamente alla scadenza della procedura di iscrizione on line.</li>
                                </ul>

                                <p> </p>
                                </div>    
                            </div><!-- /accordion-large-content -->

                            <div id="tab-albo" class="responsive-tabs-content">
                                <div class="accordion-large accordion-wrapper">
                                <h3 class="">Albo online e trasparenza</h3>
                                <p>
                                        <a href="/tipologia-documento/albo-online/" class="btn" style="background-color: #EA7653;">Visita l'albo online</a>
                                </p>

                                <p>
                                        <a href="/amministrazione-trasparente/" class="btn" style="background-color: #EA7653;">Amministrazione trasparente</a>
                                </p>
                                    
                                </div>
                            </div><!-- /accordion-large-content -->

                            <?php
                            /*
                            Modifica per Liceo Pitagora

                            START
                            */
                            ?>

                        </div><!-- /responsive-tabs -->
                    </div><!-- /responsive-tabs-wrapper -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->

<?php
}