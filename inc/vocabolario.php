<?php


/** funzioni di popolamento didattica */
if(!function_exists("dsi_didattica_array")){
    function dsi_didattica_array() {

        $didarr = [
            "Scuola dell'Infanzia",
            "Scuola Primaria",
            "Scuola Secondaria di primo grado" => [
                "Standard", "Indirizzo Musicale"
            ],
            "Scuola Secondaria di secondo grado" => [
                "Liceo" => [
                    "Liceo Artistico", "Liceo Classico", "Liceo Linguistico", "Liceo Musicale e Coreutico", "Liceo Scientifico tradizionale", "Liceo Scientifico opzione Scienze Applicate", "Liceo delle Scienze Umane opzione Economico-Sociale"
                ],
                "Istituto Tecnico" => [
                    "Settore Economico" => ["Amministrazione", "Finanza e marketing", "Turismo"],
                    "Settore Tecnologico"=> ["Meccanica, Meccatronica ed energia", "Trasporti e logistica", "Elettronica ed elettrotecnica", "Informatica e telecomunicazioni", "Grafica e comunicazione", "Chimica, materiali e biotecnologie", "Sistema Moda", "Agraria, Agroalimentare e Agroindustria", "Costruzioni, Ambiente e Territorio"]
                ],
                "Istituto Professionale" => [
                    "Settore Servizi" => ["Servizi per l’agricoltura e lo sviluppo rurale","Servizi socio-sanitari", "Servizi per l’enogastronomia e l’ospitalità alberghiera","Servizi commerciali"],
                    "Settore Industria e Artigianato" => ["Produzioni artigianali e industriali" , "Manutenzione e assistenza tecnica"],
                ],
            ],
            "Percorsi di Istruzione e Formazione Professionale"
            ];
        return $didarr;

    }
}


/** funzioni di popolamento didattica */
if(!function_exists("dsi_didattica_desc_array")){
    function dsi_didattica_desc_array() {

        $didarr = [
            "Scuola dell'Infanzia" => "La scuola dell'infanzia (in Italia nota molti anni fa anche come scuola materna) indica un percorso pre-scolastico, generalmente rivolto ai bambini dai 3 ai 6 anni d'età sulla base di un preciso e adattato progetto educativo.",
            "Scuola Primaria" => "Nell'ordinamento scolastico italiano, la scuola primaria, precedentemente denominata e tuttora comunemente chiamata scuola elementare, rappresenta il primo livello del primo ciclo di studio dell'istruzione obbligatoria.",
            "Standard" => " ",
            "Indirizzo Musicale" => "",
            "Liceo Artistico" => " ",
            "Liceo Classico" => " ",
            "Liceo Linguistico" => " ",
            "Liceo Musicale e Coreutico" => " ",
            "Liceo Scientifico tradizionale" => " ",
            "Liceo Scientifico opzione Scienze Applicate" => " ",
            "Liceo delle Scienze Umane opzione Economico-Sociale" => " ",
            "Amministrazione" => " ",
            "Finanza e marketing" => " ",
            "Turismo" => " ",
            "Meccanica, Meccatronica ed energia" => " ",
            "Trasporti e logistica" => " ",
            "Elettronica ed elettrotecnica" => " ",
            "Informatica e telecomunicazioni" => " ",
            "Grafica e comunicazione" => " ",
            "Chimica, materiali e biotecnologie" => " ",
            "Sistema Moda" => " ",
            "Agraria, Agroalimentare e Agroindustria" => " ",
            "Costruzioni, Ambiente e Territorio" => " ",
            "Servizi per l’agricoltura e lo sviluppo rurale" => " ",
            "Servizi socio-sanitari" => " ",
            "Servizi per l’enogastronomia e l’ospitalità alberghiera" => " ",
            "Servizi commerciali" => " ",
            "Produzioni artigianali e industriali" => " ",
            "Manutenzione e assistenza tecnica" => " ",
            "Percorsi di Istruzione e Formazione Professionale" => " ",
        ];
        return $didarr;

    }
}





/** funzioni di popolamento amministrazione trasparente */
if(!function_exists("dsi_amministrazione_trasparente_array")){
    function dsi_amministrazione_trasparente_array() {

        return array(
            array("Disposizioni Generali",
                array(
                    "Piano triennale per la prevenzione della corruzione e della trasparenza",
                    "Atti generali",
                    "Oneri informativi per cittadini e imprese"
                )
            ),

            array("Organizzazione",
                array(
                    "Titolari di incarichi politici, di amministrazione, di direzione o di governo",
                    "Sanzioni per mancata comunicazione dei dati",
                    "Rendiconti gruppi consiliari regionali/provinciali",
                    "Articolazione degli uffici",
                    "Telefono e posta elettronica"
                )
            ),

            array("Consulenti e collaboratori",
                array(
                    "Titolari di incarichi di collaborazione o consulenza"
                )
            ),

            array("Personale",
                array(
                    "Titolari di incarichi dirigenziali amministrativi di vertice",
                    "Titolari di incarichi dirigenziali (dirigenti non generali)",
                    "Dirigenti cessati",
                    "Posizioni organizzative",
                    "Dotazione organica",
                    "Personale non a tempo indeterminato",
                    "Tassi di assenza",
                    "Incarichi conferiti e autorizzati ai dipendenti (dirigenti e non dirigenti)",
                    "Contrattazione collettiva",
                    "Contrattazione integrativa",
                    "OIV"

                )
            ),

            array("Bandi di Concorso",
                array(
                    "Bandi di Concorso"
                )
            ),

            array("Performance",
                array(
                    "Sistema di misurazione e valutazione della Performance",
                    "Piano della Performance",
                    "Relazione sulla Performance",
                    "Documento dell'OIV di validazione della Relazione sulla Performance",
                    "Ammontare complessivo dei premi",
                    "Dati relativi ai premi"
                )
            ),

            array("Enti controllati",
                array(
                    "Enti pubblici vigilati",
                    "Società partecipate",
                    "Enti di diritto privato controllati",
                    "Rappresentazione grafica"
                )
            ),

            array("Attività e procedimenti",
                array(
                    "Tipologie di procedimento",
                    "Dichiarazioni sostitutive e acquisizione d'ufficio dei dati"
                )
            ),

            array("Provvedimenti",
                array(
                    "Provvedimenti organi indirizzo-politico",
                    "Provvedimenti dirigenti"
                )
            ),

            array("Bandi di gara e contratti",
                array(
                    "Atti delle amministrazioni aggiudicatrici e degli enti aggiudicatori distintamente per ogni procedura",
                    "Informazioni sulle singole procedure in formato tabellare"
                )
            ),

            array("Sovvenzioni, contributi, sussidi, vantaggi economici",
                array(
                    "Criteri e modalità",
                    "Atti di concessione"
                )
            ),

            array("Bilanci",
                array(
                    "Bilancio preventivo e consuntivo",
                    "Piano degli indicatori e risultati attesi di bilancio"
                )
            ),

            array("Beni immobili e gestione patrimonio",
                array(
                    "Patrimonio immobiliare",
                    "Canoni di locazione o affitto"
                )
            ),

            array("Controlli e rilievi sull'amministrazione",
                array(
                    "Organismi indipendenti di valutazione, nuclei di valutazione o altri organismi con funzioni analoghe",
                    "Organi di revisione amministrativa e contabile",
                    "Corte dei Conti"
                )
            ),

            array("Servizi erogati",
                array(
                    "Carta dei servizi e standard di qualità",
                    "Class action",
                    "Costi contabilizzati",
                    "Servizi in rete",
                    "Tempi medi di erogazione dei servizi",
                    "Liste di attesa"

                )
            ),

            array("Pagamenti dell' amministrazione",
                array(
                    "Dati sui pagamenti",
                    "Indicatore di tempestività dei pagamenti",
                    "IBAN e pagamenti informatici"
                )
            ),

            array("Opere pubbliche",
                array(
                    "Nuclei di valutazione e verifica degli investimenti pubblici",
                    "Atti di programmazione delle opere pubbliche",
                    "Tempi costi e indicatori di realizzazione delle opere pubbliche"
                )
            ),

            array("Pianificazione e governo del territorio",
                array(
                    "Pianificazione e governo del territorio"
                )
            ),

            array("Informazioni ambientali",
                array(
                    "Informazioni ambientali"
                )
            ),

            array("Strutture sanitarie private accreditate",
                array(
                    "Strutture sanitarie private accreditate"
                )
            ),

            array("Interventi straordinari e di emergenza",
                array(
                    "Interventi straordinari e di emergenza"
                )
            ),

            array("Altri contenuti",
                array(
                    "Prevenzione della Corruzione",
                    "Accesso civico",
                    "Accessibilità e Catalogo di dati, metadati e banche dati",
                    "Dati ulteriori"
                )
            ),

            array("Dati non più soggetti a pubblicazione obbligatoria",
                array(
                    "Attestazioni OIV o di struttura analoga",
                    "Burocrazia zero",
                    "Benessere organizzativo",
                    "Dati aggregati attività amministrativa",
                    "Monitoraggio tempi procedimentali",
                    "Controlli sulle imprese"
                )
            )

        );
    }
}



if(!function_exists("dsi_amministrazione_trasparente_genera_descrizioni")){
    function dsi_amministrazione_trasparente_genera_descrizioni(){

        //Disposizioni Generali
        $term = get_term_by('name', 'Piano triennale per la prevenzione della corruzione e della trasparenza', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 10, comma 8, lettera a</b>
Ogni amministrazione ha l\'obbligo di pubblicare sul proprio sito istituzionale nella sezione: «Amministrazione trasparente» di cui all\'articolo 9:<br/>
a) il Programma triennale per la trasparenza e l\'integrità ed il relativo stato di attuazione.
'));
        $term = get_term_by('name', 'Atti generali', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 12, comma 1 e 2</b> - Obblighi di pubblicazione concernenti gli atti di carattere normativo e amministrativo generale<br/>
1. Fermo restando quanto previsto per le pubblicazioni nella Gazzetta Ufficiale della Repubblica italiana dalla legge 11 dicembre 1984, n. 839, e dalle relative norme di attuazione, le pubbliche amministrazioni pubblicano sui propri siti istituzionali i riferimenti normativi con i relativi link alle norme di legge statale pubblicate nella banca dati «Normattiva» che ne regolano l\'istituzione, l\'organizzazione e l\'attività. Sono altresì pubblicati le direttive, le circolari, i programmi e le istruzioni emanati dall\'amministrazione e ogni atto che dispone in generale sulla organizzazione, sulle funzioni, sugli obiettivi, sui procedimenti ovvero nei quali si determina l\'interpretazione di norme giuridiche che le riguardano o si dettano disposizioni per l\'applicazione di esse, ivi compresi i codici di condotta.<br/>
2. Con riferimento agli statuti e alle norme di legge regionali, che regolano le funzioni, l\'organizzazione e lo svolgimento delle attività di competenza dell\'amministrazione, sono pubblicati gli estremi degli atti e dei testi ufficiali aggiornati.
'));
        $term = get_term_by('name', 'Oneri informativi per cittadini e imprese', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 34, comma 1 e 2</b> - Trasparenza degli oneri informativi<br/>
1. I regolamenti ministeriali o interministeriali, nonché i provvedimenti amministrativi a carattere generale adottati dalle amministrazioni dello Stato per regolare l\'esercizio di poteri autorizzatori, concessori o certificatori, nonché l\'accesso ai servizi pubblici ovvero la concessione di benefici, recano in allegato l\'elenco di tutti gli oneri informativi gravanti sui cittadini e sulle imprese introdotti o eliminati con gli atti medesimi. Per onere informativo si intende qualunque obbligo informativo o adempimento che comporti la raccolta, l\'elaborazione, la trasmissione, la conservazione e la produzione di informazioni e documenti alla pubblica amministrazione.<br/>
2. Ferma restando, ove prevista, la pubblicazione nella Gazzetta Ufficiale, gli atti di cui al comma 1 sono pubblicati sui siti istituzionali delle amministrazioni, secondo i criteri e le modalità definite con il regolamento di cui all\'articolo 7, commi 2 e 4, della legge 11 novembre 2011, n. 180. Art. 13 - Obblighi di pubblicazione concernenti l\'organizzazione delle pubbliche amministrazioni.
Note
Per onere informativo si intende qualunque obbligo informativo o adempimento che comporti la raccolta, l’elaborazione, la trasmissione, la conservazione e la produzione di informazioni e documenti alla P.A.
'));

        $term = get_term_by('name', 'Attestazioni OIV o di struttura analoga', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
Come previsto dalla delibera <b>CiVIT n. 71/2013</b> "Attestazioni OIV sull’assolvimento di specifici obblighi di pubblicazione per l’anno 2013 e attività di vigilanza e controllo della Commissione" sono disponibili in allegato:

1. Il documento di attestazione del Nucleo di valutazione sull’assolvimento di specifici obblighi di pubblicazione;
2. La griglia di attestazione.
'));

//Burocrazia zero
        $term = get_term_by('name', 'Burocrazia zero', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => ''));

//Organizzazione
        $term = get_term_by('name', 'Organi di indirizzo politico-amministrativo', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 14</b> - Obblighi di pubblicazione concernenti i componenti degli organi di indirizzo politico<br/>
1. Con riferimento ai titolari di incarichi politici, di carattere elettivo o comunque di esercizio di poteri di indirizzo politico, di livello statale regionale e locale, le pubbliche amministrazioni pubblicano con riferimento a tutti i propri componenti, i seguenti documenti ed informazioni:<br/>
a) l\'atto di nomina o di proclamazione, con l\'indicazione della durata dell\'incarico o del mandato elettivo;<br/>
b) il curriculum;<br/>
c) i compensi di qualsiasi natura connessi all\'assunzione della carica; gli importi di viaggi di servizio e missioni pagati con fondi pubblici;<br/>
d) i dati relativi all\'assunzione di altre cariche, presso enti pubblici o privati, ed i relativi compensi a qualsiasi titolo corrisposti;<br/>
e) gli altri eventuali incarichi con oneri a carico della finanza pubblica e l\'indicazione dei compensi spettanti;<br/>
f) le dichiarazioni di cui all\'articolo 2, della legge 5 luglio 1982, n. 441, nonché le attestazioni e dichiarazioni di cui agli articoli 3 e 4 della medesima legge, come modificata dal presente decreto, limitatamente al soggetto, al coniuge non separato e ai parenti entro il secondo grado, ove gli stessi vi consentano. Viene in ogni caso data evidenza al mancato consenso. Alle informazioni di cui alla presente lettera concernenti soggetti diversi dal titolare dell\'organo di indirizzo politico non si applicano le disposizioni di cui all\'articolo 7.<br/>
2. Le pubbliche amministrazioni pubblicano i dati cui al comma 1 entro tre mesi dalla elezione o dalla nomina e per i tre anni successivi dalla cessazione del mandato o dell\'incarico dei soggetti, salve le informazioni concernenti la situazione patrimoniale e, ove consentita, la dichiarazione del coniuge non separato e dei parenti entro il secondo grado, che vengono pubblicate fino alla cessazione dell\'incarico o del mandato. Decorso il termine di pubblicazione ai sensi del presente comma le informazioni e i dati concernenti la situazione patrimoniale non vengono trasferiti nelle sezioni di archivio.
'));
        $term = get_term_by('name', 'Sanzioni per mancata comunicazione dei dati', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 47</b> - Sanzioni per casi specifici<br/>
1. La mancata o incompleta comunicazione delle informazioni e dei dati di cui all\'articolo 14, concernenti la situazione patrimoniale complessiva del titolare dell\'incarico al momento dell\'assunzione in carica, la titolarità di imprese, le partecipazioni azionarie proprie, del coniuge e dei parenti entro il secondo grado, nonché tutti i compensi cui da diritto l\'assunzione della carica, dà luogo a una sanzione amministrativa pecuniaria da 500 a 10.000 euro a carico del responsabile della mancata comunicazione e il relativo provvedimento è pubblicato sul sito internet dell\'amministrazione o organismo interessato.<br/>
2. La violazione degli obblighi di pubblicazione di cui all\'articolo 22, comma 2, dà luogo ad una sanzione amministrativa pecuniaria da 500 a 10.000 euro a carico del responsabile della violazione. La stessa sanzione si applica agli amministratori societari che non comunicano ai soci pubblici il proprio incarico ed il relativo compenso entro trenta giorni dal conferimento ovvero, per le indennità di risultato, entro trenta giorni dal percepimento.
'));
        $term = get_term_by('name', 'Rendiconti gruppi consiliari regionali/provinciali', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 28 c. 1</b> - Pubblicità dei rendiconti dei gruppi consiliari regionali e provinciali<br/>
1. Le regioni, le province autonome di Trento e Bolzano e le province pubblicano i rendiconti di cui all\'articolo 1, comma 10, del decreto-legge 10 ottobre 2012, n. 174, convertito, con modificazioni, dalla legge 7 dicembre 2012, n. 213, dei gruppi consiliari regionali e provinciali, con evidenza delle risorse trasferite o assegnate a ciascun gruppo, con indicazione del titolo di trasferimento e dell\'impiego delle risorse utilizzate. Sono altresì pubblicati gli atti e le relazioni degli organi di controllo.
'));
        $term = get_term_by('name', 'Articolazione degli uffici', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 13 c. 1 lett. b,c</b> - Obblighi di pubblicazione concernenti l\'organizzazione delle pubbliche amministrazioni<br/>
1. Le pubbliche amministrazioni pubblicano e aggiornano le informazioni e i dati concernenti la propria organizzazione, corredati dai documenti anche normativi di riferimento. Sono pubblicati, tra gli altri, i dati relativi:<br/>
b) all\'articolazione degli uffici, le competenze e le risorse a disposizione di ciascun ufficio, anche di livello dirigenziale non generale, i nomi dei dirigenti responsabili dei singoli uffici;<br/>
c) all\'illustrazione in forma semplificata, ai fini della piena accessibilità e comprensibilità dei dati, dell\'organizzazione dell\'amministrazione, mediante l\'organigramma o analoghe rappresentazioni grafiche.
'));
        $term = get_term_by('name', 'Telefono e posta elettronica', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 13, c. 1 lett. d</b> - Obblighi di pubblicazione concernenti l\'organizzazione delle pubbliche amministrazioni<br/>
1. Le pubbliche amministrazioni pubblicano e aggiornano le informazioni e i dati concernenti la propria organizzazione, corredati dai documenti anche normativi di riferimento. Sono pubblicati, tra gli altri, i dati relativi:<br/>
d) all\'elenco dei numeri di telefono nonché delle caselle di posta elettronica istituzionali e delle caselle di posta elettronica certificata dedicate, cui il cittadino possa rivolgersi per qualsiasi richiesta inerente i compiti istituzionali.
'));

//Consulenti e Collaboratori
        $term = get_term_by('name', 'Titolari di incarichi di collaborazione o consulenza	', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '<b>Art. 15, c. 1,2</b> - Obblighi di pubblicazione concernenti i titolari di incarichi dirigenziali e di collaborazione o consulenza'));

//Personale
        $term = get_term_by('name', 'Incarichi amministrativi di vertice', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '<b>Art. 15, c. 1,2</b> - Obblighi di pubblicazione concernenti i titolari di incarichi dirigenziali e di collaborazione o consulenza'));


        $term = get_term_by('name', 'Dirigenti', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 15, comma 1,2,5</b> - Obblighi di pubblicazione concernenti i titolari di incarichi dirigenziali e di collaborazione o consulenza<br/>
1 -  Fermi restando gli obblighi di comunicazione di cui all\'articolo 17, comma 22, della legge 15 maggio 1997, n. 127, le pubbliche amministrazioni pubblicano e aggiornano le seguenti informazioni relative ai titolari di incarichi amministrativi di vertice e di incarichi dirigenziali, a qualsiasi titolo conferiti, nonche\' di collaborazione o consulenza:<br/>
a) gli estremi dell\'atto di conferimento dell\'incarico;<br/>
b) il curriculum vitae;<br/>
c) i dati relativi allo svolgimento di incarichi o la titolarita\' di cariche in enti di diritto privato regolati o finanziati dalla pubblica amministrazione o lo svolgimento di attivita\' professionali;<br/>
d) i compensi, comunque denominati, relativi al rapporto di lavoro, di consulenza o di collaborazione, con specifica evidenza delle eventuali componenti variabili o legate alla valutazione del risultato.<br/>
2 - La pubblicazione degli estremi degli atti di conferimento di incarichi dirigenziali a soggetti estranei alla pubblica amministrazione, di collaborazione o di consulenza a soggetti esterni a qualsiasi titolo per i quali è previsto un compenso, completi di indicazione dei soggetti percettori, della ragione dell\'incarico e dell\'ammontare erogato, nonche\' la comunicazione alla Presidenza del Consiglio dei Ministri - Dipartimento della funzione pubblica dei relativi dati ai sensi dell\'articolo 53, comma 14, secondo periodo, del decreto legislativo 30 marzo 2001, n. 165 e successive modificazioni, sono condizioni per l\'acquisizione dell\'efficacia dell\'atto e per la liquidazione dei relativi compensi. Le amministrazioni pubblicano e mantengono aggiornati sui rispettivi siti istituzionali gli elenchi dei propri consulenti indicando l\'oggetto, la durata e il compenso dell\'incarico. Il Dipartimento della funzione pubblica consente la consultazione, anche per nominativo, dei dati di cui al presente comma.<br/>
5 - Le pubbliche amministrazioni pubblicano e mantengono aggiornato l\'elenco delle posizioni dirigenziali, integrato dai relativi titoli e curricula, attribuite a persone, anche esterne alle pubbliche amministrazioni, individuate discrezionalmente dall\'organo di indirizzo politico senza procedure pubbliche di selezione, di cui all\'articolo 1, commi 39 e 40, della legge 6 novembre 2012, n. 190.
'));
        $term = get_term_by('name', 'Posizioni organizzative', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 10 , comma 8, lettera d</b><br/>
8 - Ogni amministrazione ha l\'obbligo di pubblicare sul proprio sito istituzionale nella sezione: «Amministrazione trasparente»
d) i curricula e i compensi dei soggetti di cui all\'articolo 15, comma 1, nonche\' i curricula dei titolari di posizioni organizzative, redatti in conformita\' al vigente modello europeo.'));
        $term = get_term_by('name', 'Dotazione organica', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 16 , comma 1,2</b> - Obblighi di pubblicazione concernenti la dotazione organica e il costo del personale con rapporto di lavoro a tempo indeterminato<br/>
1. Le pubbliche amministrazioni pubblicano il conto annuale del personale e delle relative spese sostenute, di cui all\'articolo 60, comma 2, del decreto legislativo 30 marzo 2001, n. 165, nell\'ambito del quale sono rappresentati i dati relativi alla dotazione organica e al personale effettivamente in servizio e al relativo costo, con l\'indicazione della sua distribuzione tra le diverse qualifiche e aree professionali, con particolare riguardo al personale assegnato agli uffici di diretta collaborazione con gli organi di indirizzo politico.<br/>
2. Le pubbliche amministrazioni, nell\'ambito delle pubblicazioni di cui al comma 1, evidenziano separatamente, i dati relativi al costo complessivo del personale a tempo indeterminato in servizio, articolato per aree professionali, con particolare riguardo al personale assegnato agli uffici di diretta collaborazione con gli organi di indirizzo politico.'));
        $term = get_term_by('name', 'Personale non a tempo indeterminato', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 17 , comma 1,2</b> - Obblighi di pubblicazione dei dati relativi al personale non a tempo indeterminato<br/>
1. Le pubbliche amministrazioni pubblicano annualmente, nell\'ambito di quanto previsto dall\'articolo 16, comma 1, i dati relativi al personale con rapporto di lavoro non a tempo indeterminato, con la indicazione delle diverse tipologie di rapporto, della distribuzione di questo personale tra le diverse qualifiche e aree professionali, ivi compreso il personale assegnato agli uffici di diretta collaborazione con gli organi di indirizzo politico. La pubblicazione comprende l\'elenco dei titolari dei contratti a tempo determinato.<br/>
2. Le pubbliche amministrazioni pubblicano trimestralmente i dati relativi al costo complessivo del personale di cui al comma 1, articolato per aree professionali, con particolare riguardo al personale assegnato agli uffici di diretta collaborazione con gli organi di indirizzo politico.
'));
        $term = get_term_by('name', 'Tassi di assenza', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 16 , comma 3</b> - Obblighi di pubblicazione concernenti la dotazione organica e il costo del personale con rapporto di lavoro a tempo indeterminatoa<br/>
3. Le pubbliche amministrazioni pubblicano trimestralmente i dati relativi ai tassi di assenza del personale distinti per uffici di livello dirigenziale.
'));
        $term = get_term_by('name', 'Incarichi conferiti e autorizzati ai dipendenti', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 18, comma 1</b> - Obblighi di pubblicazione dei dati relativi agli incarichi conferiti ai dipendenti pubblici<br/>
1. Le pubbliche amministrazioni pubblicano l\'elenco degli incarichi conferiti o autorizzati a ciascuno dei propri dipendenti, con l\'indicazione della durata e del compenso spettante per ogni incarico.
'));
        $term = get_term_by('name', 'Contrattazione collettiva', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 21, comma 1</b> - Obblighi di pubblicazione concernenti i dati sulla contrattazione collettiva<br/>
1. Le pubbliche amministrazioni pubblicano i riferimenti necessari per la consultazione dei contratti e accordi collettivi nazionali, che si applicano loro, nonché le eventuali interpretazioni autentiche.
'));
        $term = get_term_by('name', 'Contrattazione integrativa', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 21, comma 2</b>  - Obblighi di pubblicazione concernenti i dati sulla contrattazione collettiva<br/>
2. Fermo restando quanto previsto dall\'articolo 47, comma 8, del decreto legislativo 30 marzo 2001, n. 165, le pubbliche amministrazioni pubblicano i contratti integrativi stipulati, con la relazione tecnico-finanziaria e quella illustrativa certificate dagli organi di controllo di cui all\'articolo 40-bis, comma 1, del decreto legislativo n. 165 del 2001, nonché le informazioni trasmesse annualmente ai sensi del comma 3 dello stesso articolo. La relazione illustrativa, fra l\'altro, evidenzia gli effetti attesi in esito alla sottoscrizione del contratto integrativo in materia di produttività ed efficienza dei servizi erogati, anche in relazione alle richieste dei cittadini.
'));
        $term = get_term_by('name', 'OIV', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 10, comma 8, lettera c</b> - Programma triennale per la trasparenza e l\'integrità<br/>
8. Ogni amministrazione ha l\'obbligo di pubblicare sul proprio sito istituzionale nella sezione: Amministrazione trasparente
c) i nominativi ed i curricula dei componenti degli organismi indipendenti di valutazione di cui all\'articolo 14 del decreto legislativo n. 150 del 2009;
'));

//Bandi di Concorso
        $term = get_term_by('name', 'Bandi di Concorso', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 19</b> - Bandi di concorso <br/>
1. Fermi restando gli altri obblighi di pubblicità legale, le pubbliche amministrazioni pubblicano i bandi di concorso per il reclutamento, a qualsiasi titolo, di personale presso l\'amministrazione.<br />
2. Le pubbliche amministrazioni pubblicano e tengono costantemente aggiornato l\'elenco dei bandi in corso, nonché quello dei bandi espletati nel corso dell\'ultimo triennio, accompagnato dall\'indicazione, per ciascuno di essi, del numero dei dipendenti assunti e delle spese effettuate.'));

//Performance
        $term = get_term_by('name', 'Piano della Performance', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 8 lett. b</b> - Programma triennale per la trasparenza e l\'integrità<br />
8. Ogni amministrazione ha l\'obbligo di pubblicare sul proprio sito istituzionale nella sezione Amministrazione trasparente di cui all\'articolo 9:<br />
b) il Piano e la Relazione di cui all\'articolo 10 del decreto legislativo 27 ottobre 2009, n. 150'));

        $term = get_term_by('name', 'Relazione sulla Performance', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 10, comma 8, lettera b</b> - Programma triennale per la trasparenza e l\'integrità<br/>
8. Ogni amministrazione ha l\'obbligo di pubblicare sul proprio sito istituzionale nella sezione: "Amministrazione trasparente" di cui all\'articolo 9:<br/>
b) il Piano e la Relazione di cui all\'articolo 10 del decreto legislativo 27 ottobre 2009, n. 150
'));
        $term = get_term_by('name', 'Ammontare complessivo dei premi', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 20, comma 1</b> - Obblighi di pubblicazione dei dati relativi alla valutazione della performance e alla distribuzione dei premi al personale<br/>
1. Le pubbliche amministrazioni pubblicano i dati relativi all\'ammontare complessivo dei premi collegati alla performance stanziati e l\'ammontare dei premi effettivamente distribuiti.
'));
        $term = get_term_by('name', 'Dati relativi ai premi', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 20, comma 2</b> - Obblighi di pubblicazione dei dati relativi alla valutazione della performance e alla distribuzione dei premi al personale<br/>
2. Le pubbliche amministrazioni pubblicano i dati relativi all\'entità del premio mediamente conseguibile dal personale dirigenziale e non dirigenziale, i dati relativi alla distribuzione del trattamento accessorio, in forma aggregata, al fine di dare conto del livello di selettività utilizzato nella distribuzione dei premi e degli incentivi, nonché i dati relativi al grado di differenziazione nell\'utilizzo della premialità sia per i dirigenti sia per i dipendenti.
'));
        $term = get_term_by('name', 'Benessere organizzativo', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 20, comma 3</b> - Obblighi di pubblicazione dei dati relativi alla valutazione della performance e alla distribuzione dei premi al personale<br/>
3. Le pubbliche amministrazioni pubblicano, altresì, i dati relativi ai livelli di benessere organizzativo.
'));

//Enti controllati   ================== MANCA LA DESCRIZIONE DETTAGLIATA
        $term = get_term_by('name', 'Enti pubblici vigilati', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 22, comma 1, lettera a – Articolo 22 , comma 2, 3</b> - Obblighi di pubblicazione dei dati relativi agli enti pubblici vigilati, e agli enti di diritto privato in controllo pubblico, nonché alle partecipazioni in società di diritto privato<br/>
'));
        $term = get_term_by('name', 'Società partecipate', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 22, comma 1, lettera a – Articolo 22 , comma 2, 3</b> - Obblighi di pubblicazione dei dati relativi agli enti pubblici vigilati, e agli enti di diritto privato in controllo pubblico, nonché alle partecipazioni in società di diritto privato<br/>
'));
        $term = get_term_by('name', 'Enti di diritto privato controllati', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 22, comma 1, lettera a – Articolo 22 , comma 2, 3</b> - Obblighi di pubblicazione dei dati relativi agli enti pubblici vigilati, e agli enti di diritto privato in controllo pubblico, nonché alle partecipazioni in società di diritto privato<br/>
'));
        $term = get_term_by('name', 'Rappresentazione grafica', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Articolo 22, comma 1, lettera a – Articolo 22 , comma 2, 3</b> - Obblighi di pubblicazione dei dati relativi agli enti pubblici vigilati, e agli enti di diritto privato in controllo pubblico, nonché alle partecipazioni in società di diritto privato<br/>
'));

//Attività e procedimenti
        $term = get_term_by('name', 'Dati aggregati attività amministrativa', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 24, comma 1</b> - Obblighi di pubblicazione dei dati aggregati relativi all\'attività amministrativa<br/>
1. Le pubbliche amministrazioni che organizzano, a fini conoscitivi e statistici, i dati relativi alla propria attività amministrativa, in forma aggregata, per settori di attività, per competenza degli organi e degli uffici, per tipologia di procedimenti, li pubblicano e li tengono costantemente aggiornati.
'));
        $term = get_term_by('name', 'Tipologie di procedimento', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 35, comma 1 e 2</b> - Obblighi di pubblicazione relativi ai procedimenti amministrativi e ai controlli sulle dichiarazioni sostitutive e l\'acquisizione d\'ufficio dei dati<br/>
1. Le pubbliche amministrazioni pubblicano i dati relativi alle tipologie di procedimento di propria competenza. Per ciascuna tipologia di procedimento sono pubblicate le seguenti informazioni:<br/>
a) una breve descrizione del procedimento con indicazione di tutti i riferimenti normativi utili;<br/>
b) l\'unità organizzativa responsabile dell\'istruttoria;<br/>
c) il nome del responsabile del procedimento, unitamente ai recapiti telefonici e alla casella di posta elettronica istituzionale, nonché, ove diverso, l\'ufficio competente all\'adozione del provvedimento finale, con l\'indicazione del nome del responsabile dell\'ufficio, unitamente ai rispettivi recapiti telefonici e alla casella di posta elettronica istituzionale;<br/>
d) per i procedimenti ad istanza di parte, gli atti e i documenti da allegare all\'istanza e la modulistica necessaria, compresi i fac-simile per le autocertificazioni, anche se la produzione a corredo dell\'istanza è prevista da norme di legge, regolamenti o atti pubblicati nella Gazzetta Ufficiale, nonché gli uffici ai quali rivolgersi per informazioni, gli orari e le modalità di accesso con indicazione degli indirizzi, dei recapiti telefonici e delle caselle di posta elettronica istituzionale, a cui presentare le istanze;
e) le modalità con le quali gli interessati possono ottenere le informazioni relative ai procedimenti in corso che li riguardino;<br/>
f ) il termine fissato in sede di disciplina normativa del procedimento per la conclusione con l\'adozione di un provvedimento espresso e ogni altro termine procedimentale rilevante;<br/>
g) i procedimenti per i quali il provvedimento dell\'amministrazione può essere sostituito da una dichiarazione dell\'interessato, ovvero il procedimento può concludersi con il silenzio assenso dell\'amministrazione;<br/>
h) gli strumenti di tutela, amministrativa e giurisdizionale, riconosciuti dalla legge in favore dell\'interessato, nel corso del procedimento e nei confronti del provvedimento finale ovvero nei casi di adozione del provvedimento oltre il termine predeterminato per la sua conclusione e i modi per attivarli;<br/>
i) il link di accesso al servizio on line, ove sia già disponibile in rete, o i tempi previsti per la sua attivazione;<br/>
l) le modalità per l\'effettuazione dei pagamenti eventualmente necessari, con le informazioni di cui all\'articolo 36;<br/>
m) il nome del soggetto a cui è attribuito, in caso di inerzia, il potere sostitutivo, nonché le modalità per attivare tale potere, con indicazione dei recapiti telefonici e delle caselle di posta elettronica istituzionale;<br/>
n) i risultati delle indagini di customer satisfaction condotte sulla qualità dei servizi erogati attraverso diversi canali, facendone rilevare il relativo andamento.<br/>
2. Le pubbliche amministrazioni non possono richiedere l\'uso di moduli e formulari che non siano stati pubblicati; in caso di omessa pubblicazione, i relativi procedimenti possono essere avviati anche in assenza dei suddetti moduli o formulari. L\'amministrazione non può respingere l\'istanza adducendo il mancato utilizzo dei moduli o formulari o la mancata produzione di tali atti o documenti, e deve invitare l\'istante a integrare la documentazione in un termine congruo.
'));
        $term = get_term_by('name', 'Monitoraggio tempi procedimentali', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 24, comma 2</b> - Obblighi di pubblicazione dei dati aggregati relativi all\'attività amministrativa<br/>
2. Le amministrazioni pubblicano e rendono consultabili i risultati del monitoraggio periodico concernente il rispetto dei tempi procedimentali effettuato ai sensi dell\'articolo 1, comma 28, della legge 6 novembre 2012, n. 190.'));
        $term = get_term_by('name', 'Dichiarazioni sostitutive e acquisizione d\'ufficio dei dati', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 35, comma 3</b> - Obblighi di pubblicazione relativi ai procedimenti amministrativi e ai controlli sulle dichiarazioni sostitutive e l\'acquisizione d\'ufficio dei dati<br/>
3. Le pubbliche amministrazioni pubblicano nel sito istituzionale:<br/>
a) i recapiti telefonici e la casella di posta elettronica istituzionale dell\'ufficio responsabile per le attività volte a gestire, garantire e verificare la trasmissione dei dati o l\'accesso diretto agli stessi da parte delle amministrazioni procedenti ai sensi degli articoli 43, 71 e 72 del decreto del Presidente della Repubblica 28 dicembre 2000, n. 445;<br/>
b) le convenzioni-quadro volte a disciplinare le modalità di accesso ai dati di cui all\'articolo 58 del codice dell\'amministrazione digitale, di cui al decreto legislativo 7 marzo 2005, n. 82;<br/>
c) le ulteriori modalità per la tempestiva acquisizione d\'ufficio dei dati nonché per lo svolgimento dei controlli sulle dichiarazioni sostitutive da parte delle amministrazioni procedenti.'));

//Provvedimenti
        $term = get_term_by('name', 'Provvedimenti organi indirizzo-politico', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 23</b> - Obblighi di pubblicazione concernenti i provvedimenti amministrativi<br/>
1. Le pubbliche amministrazioni pubblicano e aggiornano ogni sei mesi, in distinte partizioni della sezione «Amministrazione trasparente», gli elenchi dei provvedimenti adottati dagli organi di indirizzo politico e dai dirigenti, con particolare riferimento ai provvedimenti finali dei procedimenti di:
a) autorizzazione o concessione;<br/>
b) scelta del contraente per l\'affidamento di lavori, forniture e servizi, anche con riferimento alla modalità di selezione prescelta ai sensi del codice dei contratti pubblici, relativi a lavori, servizi e forniture, di cui al decreto legislativo 12 aprile 2006, n. 163;<br/>
c) concorsi e prove selettive per l\'assunzione del personale e progressioni di carriera di cui all\'articolo 24 del decreto legislativo n. 150 del 2009;<br/>
d) accordi stipulati dall\'amministrazione con soggetti privati o con altre amministrazioni pubbliche.<br/>
2. Per ciascuno dei provvedimenti compresi negli elenchi di cui al comma 1 sono pubblicati il contenuto, l\'oggetto, la eventuale spesa prevista e gli estremi relativi ai principali documenti contenuti nel fascicolo relativo al procedimento. La pubblicazione avviene nella forma di una scheda sintetica, prodotta automaticamente in sede di formazione del documento che contiene l\'atto.'));
        $term = get_term_by('name', 'Provvedimenti dirigenti', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 23</b> - Obblighi di pubblicazione concernenti i provvedimenti amministrativi<br/>
1. Le pubbliche amministrazioni pubblicano e aggiornano ogni sei mesi, in distinte partizioni della sezione «Amministrazione trasparente», gli elenchi dei provvedimenti adottati dagli organi di indirizzo politico e dai dirigenti, con particolare riferimento ai provvedimenti finali dei procedimenti di:
a) autorizzazione o concessione;<br/>
b) scelta del contraente per l\'affidamento di lavori, forniture e servizi, anche con riferimento alla modalità di selezione prescelta ai sensi del codice dei contratti pubblici, relativi a lavori, servizi e forniture, di cui al decreto legislativo 12 aprile 2006, n. 163;<br/>
c) concorsi e prove selettive per l\'assunzione del personale e progressioni di carriera di cui all\'articolo 24 del decreto legislativo n. 150 del 2009;<br/>
d) accordi stipulati dall\'amministrazione con soggetti privati o con altre amministrazioni pubbliche.<br/>
2. Per ciascuno dei provvedimenti compresi negli elenchi di cui al comma 1 sono pubblicati il contenuto, l\'oggetto, la eventuale spesa prevista e gli estremi relativi ai principali documenti contenuti nel fascicolo relativo al procedimento. La pubblicazione avviene nella forma di una scheda sintetica, prodotta automaticamente in sede di formazione del documento che contiene l\'atto.'));

//Controlli sulle imprese
        $term = get_term_by('name', 'Controlli sulle imprese', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 25</b> - Obblighi di pubblicazione concernenti i controlli sulle imprese<br/>
1. Le pubbliche amministrazioni, in modo dettagliato e facilmente comprensibile, pubblicano sul proprio sito istituzionale e sul sito: <a href="http://www.impresainungiorno.gov.it" title="Impresa in un giorno .gov">www.impresainungiorno.gov.it</a>:<br/>
a) l\'elenco delle tipologie di controllo a cui sono assoggettate le imprese in ragione della dimensione e del settore di attività, indicando per ciascuna di esse i criteri e le relative modalità di svolgimento;<br/>
b) l\'elenco degli obblighi e degli adempimenti oggetto delle attività di controllo che le imprese sono tenute a rispettare per ottemperare alle disposizioni normative.'));

//Bandi di gara e contratti
        $term = get_term_by('name', 'Bandi di gara e contratti', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 37, comma 1 e 2</b> - Obblighi di pubblicazione concernenti i contratti pubblici di lavori, servizi e forniture<br/>
1. Fermi restando gli altri obblighi di pubblicità legale e, in particolare, quelli previsti dall\'articolo 1, comma 32, della legge 6 novembre 2012, n. 190, ciascuna amministrazione pubblica, secondo quanto previsto dal decreto legislativo 12 aprile 2006, n. 163, e, in particolare, dagli articoli 63, 65, 66, 122, 124, 206 e 223, le informazioni relative alle procedure per l\'affidamento e l\'esecuzione di opere e lavori pubblici, servizi e forniture.<br/>
2. Le pubbliche amministrazioni sono tenute altresì a pubblicare, nell\'ipotesi di cui all\'articolo 57, comma 6, del decreto legislativo 12 aprile 2006, n. 163, la delibera a contrarre.'));

//Sovvenzioni, contributi, sussidi, vantaggi economici
        $term = get_term_by('name', 'Criteri e modalità', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 26, comma 1</b> - Obblighi di pubblicazione degli atti di concessione di sovvenzioni, contributi, sussidi e attribuzione di vantaggi economici a persone fisiche ed enti pubblici e privati<br/>
1. Le pubbliche amministrazioni pubblicano gli atti con i quali sono determinati, ai sensi dell\'articolo 12 della legge 7 agosto 1990, n. 241, i criteri e le modalità cui le amministrazioni stesse devono attenersi per la concessione di sovvenzioni, contributi, sussidi ed ausili finanziari e per l\'attribuzione di vantaggi economici di qualunque genere a persone ed enti pubblici e privati.'));
        $term = get_term_by('name', 'Atti di concessione', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 26, comma 2 -  Art. 27</b> - Obblighi di pubblicazione degli atti di concessione di sovvenzioni, contributi, sussidi e attribuzione di vantaggi economici a persone fisiche ed enti pubblici e privati
2. Le pubbliche amministrazioni pubblicano gli atti di concessione delle sovvenzioni, contributi, sussidi ed ausili finanziari alle imprese, e comunque di vantaggi economici di qualunque genere a persone ed enti pubblici e privati ai sensi del citato articolo 12 della legge n. 241 del 1990, di importo superiore a mille euro.<br/>
<b>Art. 27</b> - Obblighi di pubblicazione dell\'elenco dei soggetti beneficiari<br/>
1. La pubblicazione di cui all\'articolo 26, comma 2, comprende necessariamente, ai fini del comma 3 del medesimo articolo:<br/>
a) il nome dell\'impresa o dell\'ente e i rispettivi dati fiscali o il nome di altro soggetto beneficiario;<br/>
b) l\'importo del vantaggio economico corrisposto;<br/>
c) la norma o il titolo a base dell\'attribuzione;<br/>
d) l\'ufficio e il funzionario o dirigente responsabile del relativo procedimento amministrativo;<br/>
e) la modalità seguita per l\'individuazione del beneficiario;<br/>
f ) il link al progetto selezionato e al curriculum del soggetto incaricato.'));

//Bilanci
        $term = get_term_by('name', 'Bilancio preventivo e consuntivo', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 29, comma 1</b> - Obblighi di pubblicazione del bilancio, preventivo e consuntivo, e del Piano degli indicatori e risultati attesi di bilancio, nonché dei dati concernenti il monitoraggio degli obiettivi<br/>
1. Le pubbliche amministrazioni pubblicano i dati relativi al bilancio di previsione e a quello consuntivo di ciascun anno in forma sintetica, aggregata e semplificata, anche con il ricorso a rappresentazioni grafiche, al fine di assicurare la piena accessibilità e comprensibilità.'));
        $term = get_term_by('name', 'Piano degli indicatori e risultati attesi di bilancio', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 29, comma 2</b> - Obblighi di pubblicazione del bilancio, preventivo e consuntivo, e del Piano degli indicatori e risultati attesi di bilancio, nonché dei dati concernenti il monitoraggio degli obiettivi<br/>
2. Le pubbliche amministrazioni pubblicano il Piano di cui all\'articolo 19 del decreto legislativo 31 maggio 2011, n. 91, con le integrazioni e gli aggiornamenti di cui all\'articolo 22 del medesimo decreto legislativo n. 91 del 2011.'));

//Beni immobili e gestione patrimonio
        $term = get_term_by('name', 'Patrimonio immobiliare', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 30</b> - Obblighi di pubblicazione concernenti i beni immobili e la gestione del patrimonio<br/>
1. Le pubbliche amministrazioni pubblicano le informazioni identificative degli immobili posseduti, nonché i canoni di locazione o di affitto versati o percepiti.'));
        $term = get_term_by('name', 'Canoni di locazione o affitto', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 30</b> - Obblighi di pubblicazione concernenti i beni immobili e la gestione del patrimonio<br/>
1. Le pubbliche amministrazioni pubblicano le informazioni identificative degli immobili posseduti, nonché i canoni di locazione o di affitto versati o percepiti.'));

//Controlli e rilievi sull'amministrazione
        $term = get_term_by('name', 'Organismi indipendenti di valutazione, nuclei di valutazione o altri organismi con funzioni analoghe', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 31, comma 1</b> - Obblighi di pubblicazione concernenti i dati relativi ai controlli sull\'organizzazione e sull\'attività dell\'amministrazione<br/>
1. Le pubbliche amministrazioni pubblicano, unitamente agli atti cui si riferiscono, i rilievi non recepiti degli organi di controllo interno, degli organi di revisione amministrativa e contabile e tutti i rilievi ancorchè recepiti della Corte dei conti, riguardanti l\'organizzazione e l\'attività dell\'amministrazione o di singoli uffici.'));
        $term = get_term_by('name', 'Organi di revisione amministrativa e contabile', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => 'Relazioni degli organi di revisione amministrativa e contabile al bilancio di previsione o budget, alle relative variazioni e al conto consuntivo o bilancio di esercizio'));
        $term = get_term_by('name', 'Corte dei Conti', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => 'Tutti i rilievi della Corte dei conti ancorchè non recepiti riguardanti l\'organizzazione e l\'attività delle amministrazioni stesse e dei loro uffici'));

//Servizi erogati
        $term = get_term_by('name', 'Carta dei servizi e standard di qualità', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 32, c. 1</b> - Obblighi di pubblicazione concernenti i servizi erogati<br/>
1. Le pubbliche amministrazioni pubblicano la carta dei servizi o il documento contenente gli standard di qualità dei servizi pubblici'));
        $term = get_term_by('name', 'Costi contabilizzati', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 32, c. 2, lett. a, Art. 10, c. 5</b> - Obblighi di pubblicazione concernenti i servizi erogati<br/>
2. Le pubbliche amministrazioni, individuati i servizi erogati agli utenti, sia finali che intermedi, ai sensi dell\'articolo 10, comma 5, pubblicano:<br/>
a) i costi contabilizzati, evidenziando quelli effettivamente sostenuti e quelli imputati al personale per ogni servizio erogato e il relativo andamento nel tempo;<br/>
<b>Art. 10</b> - Programma triennale per la trasparenza e l\'integrità<br/>
5. Ai fini della riduzione del costo dei servizi, dell\'utilizzo delle tecnologie dell\'informazione e della comunicazione, nonché del conseguente risparmio sul costo del lavoro, le pubbliche amministrazioni provvedono annualmente ad individuare i servizi erogati, agli utenti sia finali che intermedi, ai sensi dell\'articolo 10, comma 5, del decreto legislativo 7 agosto 1997, n. 279. Le amministrazioni provvedono altresì alla contabilizzazione dei costi e all\'evidenziazione dei costi effettivi e di quelli imputati al personale per ogni servizio erogato, nonché al monitoraggio del loro andamento nel tempo, pubblicando i relativi dati ai sensi dell\'articolo 32.'));
        $term = get_term_by('name', 'Tempi medi di erogazione dei servizi', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 32, c. 2, lett. b</b> - Obblighi di pubblicazione concernenti i servizi erogati<br/>
2. Le pubbliche amministrazioni, individuati i servizi erogati agli utenti, sia finali che intermedi, ai sensi dell\'articolo 10, comma 5, pubblicano:<br/>
b) i tempi medi di erogazione dei servizi, con riferimento all\'esercizio finanziario precedente.'));
        $term = get_term_by('name', 'Liste di attesa', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Art. 41, c. 6</b> - Trasparenza del servizio sanitario nazionale<br/>
6. Gli enti, le aziende e le strutture pubbliche e private che erogano prestazioni per conto del servizio sanitario sono tenuti ad indicare nel proprio sito, in una apposita sezione denominata «Liste di attesa», il tempi di attesa previsti e i tempi medi effettivi di attesa per ciascuna tipologia di prestazione erogata.'));

//Pagamenti dell' amministrazione
        $term = get_term_by('name', 'Dati sui pagamenti', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => 'Art.4-bis c.2 d.lgs 33/2013'));
        $term = get_term_by('name', 'Indicatore di tempestività dei pagamenti', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 33</b> - Obblighi di pubblicazione concernenti i tempi di pagamento dell\'amministrazione<br/>
1. Le pubbliche amministrazioni pubblicano, con cadenza annuale, un indicatore dei propri tempi medi di pagamento relativi agli acquisti di beni, servizi e forniture, denominato: «indicatore di tempestività dei pagamenti».'));
        $term = get_term_by('name', 'IBAN e pagamenti informatici', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 33</b> - Pubblicazione delle informazioni necessarie per l\'effettuazione di pagamenti informatici<br/>
1. Le pubbliche amministrazioni pubblicano e specificano nelle richieste di pagamento i dati e le informazioni di cui all\'articolo 5 del decreto legislativo 7 marzo 2005, n. 82.'));

//Opere pubbliche
        $term = get_term_by('name', 'Opere pubbliche', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 38</b> - Pubblicità dei processi di pianificazione, realizzazione e valutazione delle opere pubbliche<br/>
1. Le pubbliche amministrazioni pubblicano tempestivamente sui propri siti istituzionali: i documenti di programmazione anche pluriennale delle opere pubbliche di competenza dell\'amministrazione, le linee guida per la valutazione degli investimenti; le relazioni annuali; ogni altro documento predisposto nell\'ambito della valutazione, ivi inclusi i pareri dei valutatori che si discostino dalle scelte delle amminstrazioni e gli esiti delle valutazioni ex post che si discostino dalle valutazioni ex ante; le informazioni relative ai Nuclei di valutazione e verifica degli investimenti pubblici di cui all\'articolo 1 della legge 17 maggio 1999, n. 144, incluse le funzioni e i compiti specifici ad essi attribuiti, le procedure e i criteri di individuazione dei componenti e i loro nominativi.<br/>
2. Le pubbliche amministrazioni pubblicano, fermi restando gli obblighi di pubblicazione di cui all\'articolo 128 del decreto legislativo 12 aprile 2006, n. 163, le informazioni relative ai tempi, ai costi unitari e agli indicatori di realizzazione delle opere pubbliche completate. Le informazioni sui costi sono pubblicate sulla base di uno schema tipo redatto dall\'Autorità per la vigilanza sui contratti pubblici di lavori, servizi e forniture, che ne cura altresì la raccolta e la pubblicazione nel proprio sito web istituzionale al fine di consentirne una agevole comparazione.'));

//Pianificazione e governo del territorio
        $term = get_term_by('name', 'Pianificazione e governo del territorio', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 39</b> - Trasparenza dell\'attività di pianificazione e governo del territorio<br/>
1. Le pubbliche amministrazioni pubblicano:<br/>
a) gli atti di governo del territorio, quali, tra gli altri, piani territoriali, piani di coordinamento, piani paesistici, strumenti urbanistici, generali e di attuazione, nonché le loro varianti;<br/>
b) per ciascuno degli atti di cui alla lettera a) sono pubblicati, tempestivamente, gli schemi di provvedimento prima che siano portati all\'approvazione; le delibere di adozione o approvazione; i relativi allegati tecnici.<br/>
2. La documentazione relativa a ciascun procedimento di presentazione e approvazione delle proposte di trasformazione urbanistica d\'iniziativa privata o pubblica in variante allo strumento urbanistico generale comunque denominato vigente nonché delle proposte di trasformazione urbanistica d\'iniziativa privata o pubblica in attuazione dello strumento urbanistico generale vigente che comportino premialità edificatorie a fronte dell\'impegno dei privati alla realizzazione di opere di urbanizzazione extra oneri o della cessione di aree o volumetrie per finalità di pubblico interesse è pubblicata in una sezione apposita nel sito del comune interessato, continuamente aggiornata.<br/>
3. La pubblicità degli atti di cui al comma 1, lettera a), è condizione per l\'acquisizione dell\'efficacia degli atti stessi.<br/>
4. Restano ferme le discipline di dettaglio previste dalla vigente legislazione statale e regionale.'));

//Informazioni ambientali
        $term = get_term_by('name', 'Informazioni ambientali', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 40</b> - Pubblicazione e accesso alle informazioni ambientali<br/>
1. In materia di informazioni ambientali restano ferme le disposizioni di maggior tutela già previste dall\'articolo 3-sexies del decreto legislativo 3 aprile 2006 n. 152, dalla legge 16 marzo 2001, n. 108, nonché dal decreto legislativo 19 agosto 2005 n. 195.<br/>
2. Le amministrazioni di cui all\'articolo 2, comma 1, lettera b), del decreto legislativo n. 195 del 2005, pubblicano, sui propri siti istituzionali e in conformità a quanto previsto dal presente decreto, le informazioni ambientali di cui all\'articolo 2, comma 1, lettera a), del decreto legislativo 19 agosto 2005, n.195, che detengono ai fini delle proprie attività istituzionali, nonché le relazioni di cui all\'articolo 10 del medesimo decreto legislativo. Di tali informazioni deve essere dato specifico rilievo all\'interno di un\'apposita sezione detta «Informazioni ambientali».<br/>
3. Sono fatti salvi i casi di esclusione del diritto di accesso alle informazioni ambientali di cui all\'articolo 5 del decreto legislativo 19 agosto 2005, n. 195.<br/>
4. L\'attuazione degli obblighi di cui al presente articolo non è in alcun caso subordinata alla stipulazione degli accordi di cui all\'articolo 11 del decreto legislativo 19 agosto 2005, n. 195. Sono fatti salvi gli effetti degli accordi eventualmente già stipulati, qualora assicurino livelli di informazione ambientale superiori a quelli garantiti dalle disposizioni del presente decreto. Resta fermo il potere di stipulare ulteriori accordi ai sensi del medesimo articolo 11, nel rispetto dei livelli di informazione ambientale garantiti dalle disposizioni del presente decreto.'));

//Strutture sanitarie private accreditate
        $term = get_term_by('name', 'Strutture sanitarie private accreditate', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 41, comma 4</b> - Trasparenza del servizio sanitario nazionale<br/> - Pubblicazione e accesso alle informazioni ambientali<br/>
1. In materia di informazioni ambientali restano ferme le disposizioni di maggior tutela già previste dall\'articolo 3-sexies del decreto legislativo 3 aprile 2006 n. 152, dalla legge 16 marzo 2001, n. 108, nonché dal decreto legislativo 19 agosto 2005 n. 195.<br/>
2. Le amministrazioni di cui all\'articolo 2, comma 1, lettera b), del decreto legislativo n. 195 del 2005, pubblicano, sui propri siti istituzionali e in conformità a quanto previsto dal presente decreto, le informazioni ambientali di cui all\'articolo 2, comma 1, lettera a), del decreto legislativo 19 agosto 2005, n.195, che detengono ai fini delle proprie attività istituzionali, nonché le relazioni di cui all\'articolo 10 del medesimo decreto legislativo. Di tali informazioni deve essere dato specifico rilievo all\'interno di un\'apposita sezione detta «Informazioni ambientali».<br/>
3. Sono fatti salvi i casi di esclusione del diritto di accesso alle informazioni ambientali di cui all\'articolo 5 del decreto legislativo 19 agosto 2005, n. 195.<br/>
4. L\'attuazione degli obblighi di cui al presente articolo non è in alcun caso subordinata alla stipulazione degli accordi di cui all\'articolo 11 del decreto legislativo 19 agosto 2005, n. 195. Sono fatti salvi gli effetti degli accordi eventualmente già stipulati, qualora assicurino livelli di informazione ambientale superiori a quelli garantiti dalle disposizioni del presente decreto. Resta fermo il potere di stipulare ulteriori accordi ai sensi del medesimo articolo 11, nel rispetto dei livelli di informazione ambientale garantiti dalle disposizioni del presente decreto.<br/>
4. È pubblicato e annualmente aggiornato l\'elenco delle strutture sanitarie private accreditate. Sono altresì pubblicati gli accordi con esse intercorsi.
'));

//Interventi straordinari e di emergenza
        $term = get_term_by('name', 'Interventi straordinari e di emergenza', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => '
<b>Dlgs 33/2013 - Articolo 42</b> - Obblighi di pubblicazione concernenti gli interventi straordinari e di emergenza che comportano deroghe alla legislazione vigente<br/>
1. Le pubbliche amministrazioni che adottano provvedimenti contingibili e urgenti e in generale provvedimenti di carattere straordinario in caso di calamità naturali o di altre emergenze, ivi comprese le amministrazioni commissariali e straordinarie costituite in base alla legge 24 febbraio 1992, n. 225, o a provvedimenti legislativi di urgenza, pubblicano:<br/>
a) i provvedimenti adottati, con la indicazione espressa delle norme di legge eventualmente derogate e dei motivi della deroga, nonché l\'indicazione di eventuali atti amministrativi o giurisdizionali intervenuti;<br/>
b) i termini temporali eventualmente fissati per l\'esercizio dei poteri di adozione dei provvedimenti straordinari;<br/>
c) il costo previsto degli interventi e il costo effettivo sostenuto dall\'amministrazione; d) le particolari forme di partecipazione degli interessati ai procedimenti di adozione dei provvedimenti straordinari.'));

// Prevenzione della Corruzione
        $term = get_term_by('name', 'Prevenzione della Corruzione', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => 'Riferimenti e documenti ai fini della prevenzione della corruzione'));

//Accesso civico
        $term = get_term_by('name', 'Accesso civico', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => 'L\'accesso civico è disciplinato dall\'art. 5 del D.Lgs 33/2013. Esso comporta il diritto di chiunque di richiedere i dati, le informazioni e il documento che le pubbliche amministrazioni hanno l\'obbligo di pubblicare, nei casi in cui sia stata omessa la loro pubblicazione.'));

//Accessibilità e Catalogo di dati, metadati e banche dati
        $term = get_term_by('name', 'Accessibilità e Catalogo di dati, metadati e banche dati', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => 'Catalogo dei dati, dei metadati e delle relative banche dati in possesso delle amministrazioni'));

//Altri contenuti
        $term = get_term_by('name', 'Dati ulteriori', 'amministrazione-trasparente');
        if($term)
            wp_update_term($term->term_id, 'amministrazione-trasparente', array('description' => 'Eventuali ulteriori contenuti da pubblicare ai fini di trasparenza e non riconducibili a nessuna delle altre sotto-sezioni'));


    }
}