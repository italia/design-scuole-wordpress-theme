<?php
/* Template Name: Presentazione
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();

$presentazione_landing_url = dsi_get_template_page_url("page-templates/presentazione.php");
?>

<main id="main-container" class="main-container">
       
      
       <?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?> 
    <div class="container">
        <section id="image-block">
            <div class="row">           
                <div class="col-sm-12 col-md-6 offset-md-1 order-md-2">
                    <h2>Il nostro istituto</h2>
                    <p>L’istituto Martino Martini è una scuola secondaria di secondo grado sita nel comune di Mezzolombardo, facilmente raggiungibile attraverso i mezzi di trasporto.
                    Nell’istituto sono presenti 8 indirizzi di studio, 4 di ambito liceale e 4 di ambito tecnico. Gli indirizzi liceali sono quelli del liceo scientifico opzione <strong>scienze applicate</strong>, del <strong>liceo scientifico sportivo</strong>, del <strong>liceo scientifico internazionale quadriennale</strong> e del <strong>liceo delle scienze umane opzione socio-economica</strong>. Gli indirizzi tecnici sono quelli dell'istituto <strong>economico opzione amministrazione finanza e marketing</strong>, dell’istituto <strong>economico internazionale sportivo</strong>, dell’istituto tecnologico opzione <strong>trasporti e logistica</strong> e dell’istituto tecnologico <strong>conduzione del mezzo aereo</strong>.</p>
                </div>

                <div class="col-sm-12 col-md-5 order-md-1">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                </div>
            </div>
        </section>

        <section id="image-block">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h3>La scuola secondo noi</h3>
                    <p>Grazie alla pluralità di indirizzi di studio che caratterizzano la nostra offerta formativa, ciascuno dei quali offre alla comunità scolastica nuovi stimoli ed opportunità, l’Istituto Martino Martini ha fatto propria un’idea di scuola i cui valori si fondano sulla <strong>flessibilità</strong>, sull’<strong>innovazione</strong> e sulla <strong>personalizzazione</strong>. 
                    Attenti a cogliere le opportunità di miglioramento offerte dalle innovazioni in campo didattico, sia di natura tecnologica che metodologica, i docenti del Martini lavorano collegialmente da anni sulle tematiche dell’<strong>accoglienza</strong> e dell’<strong>inclusione</strong> dei ragazzi, accettando la difficile sfida del successo formativo di tutti gli studenti.
                    L’idea di fondo è quella di offrire ai ragazzi un <strong>ambiente di apprendimento sereno e motivante</strong>, ma nel contempo attento alla costruzione di <strong>competenze solide,</strong> indispensabili per il progetto di vita post-diploma e spendibili sia in ambito lavorativo che universitario.</p>
                </div>
                <div class="col-sm-12 offset-md-1 col-md-5">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                </div>
            </div>
        </section>

        <section id="image-block">
            <div class="row">
            
                <div class="col-sm-12 col-md-6 offset-md-1 order-md-2">
                    <p>Dalle esperienze e dalle analisi condotte sugli esiti di apprendimento degli studenti, l’idea di realizzare un progetto
                    sperimentale centrato sui principi della didattica costruttivista e su un nuovo setting d'aula in nome della
                    flessibilità: di qui ambienti di <strong>apprendimento innovativo</strong>, progetto partito dal settembre 2016 e sostenuto sia dal
                    Dipartimento della conoscenza che da Iprase, l’ente di ricerca educativa trentino. È stata assegnata un’aula a uno o più
                    docenti della medesima disciplina onde esaltare la dimensione del design e del setting connessi agli obiettivi didattici
                    perseguiti: sono gli studenti a spostarsi dall’aula di italiano a quella di matematica, di inglese e così via, come
                    accade nelle scuole superiori di tutta Europa.
                    La riorganizzazione dell'aula, finora pensata come uno spazio per una didattica prevalentemente frontale ed erogativa,
                    prevede una maggiore <strong>elasticità</strong> degli spazi, dei tempi e delle modalità di insegnamento/apprendimento.
                    Al centro dell'innovazione didattica <strong>cooperazione</strong>, <strong>coinvolgimento attivo</strong>, <strong>autonomia</strong>.
                    Gli studenti cooperano tra di loro nello svolgimento dei compiti o nella elaborazione di quanto proposto dal docente che
                    valuta, quindi, non solo la prestazione, come avviene solitamente, ma anche il processo di interazione, l’errore come
                    fonte generativa di conoscenza, le competenze trasversali emergenti.
                    L’Istituto è impegnato a promuovere negli studenti abilità, attitudini e talenti nonché tutte le possibili azioni di
                    recupero di situazioni di difficoltà e svantaggio, di sostegno e consolidamento. Ciò attraverso lo <strong>sportello
                    individuale</strong>, attivo da ottobre a maggio, cui lo studente si prenota dall’area riservata del sito e percorsi curriculari
                    di 22 ore da gennaio a marzo di recupero o potenziamento in orario scolastico.
                    Alla eccellenza concorrono i <strong>percorsi che valorizzano il patrimonio personale</strong> di ogni studente facendone emergere e
                    potenziandone i talenti. Si citano i corsi di certificazione linguistica, i corsi di tedesco opzionale per gli indirizzi
                    che lo abbandonano come materia curriculare dopo il biennio, i corsi finalizzati all’accesso alle facoltà scientifiche,
                    le Olimpiadi, i corsi ICDL (la scuola è test center ufficiale AICA), l'<strong>alternanza scuola-lavoro</strong> intesa non solo come
                    stage, ma come interazione continua con le aziende e gli enti esterni, in un continuum di progettazione e di
                    valorizzazione delle competenze che va dalla scuola al mondo esterno e viceversa.
                    Particolarmente curata l’<strong>educazione linguistica</strong>. Sono presenti docenti madrelingua e sono attivi insegnamenti CLIL di
                    matematica, fisica, storia, storia dell’arte, logistica, meccanica, scienze umane, scienze motorie. Attivi gemellaggi,
                    scambi, soggiorni linguistici con Schwalbach e Gottingen in Germania, Irlanda, Olanda.
                    Altro punto di forza della scuola la <strong>digitalizzazione</strong>, l'accesso alla rete mondiale delle informazioni sia con
                    connessione via cavo che wireless, utilizzo di ambienti e piattaforme digitali quali Google Suite for education,
                    registro Mastercom, app per la didattica e policy di utilizzo dei device personali per percorsi innovativi.</p>
                </div>
                <div class="images col-sm-12 col-md-5 order-md-1">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                </div>
            </div>
        </section>
    
        <section id="image-block">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h3>Martino Martini</h3>
                    <p>Missionario gesuita nato nel 1614 a Trento, Martino Martini fu un noto <strong>geografo e cartografo che visse a lungo nella
                    Cina imperiale</strong>, viaggiando entro i suoi confini allo scopo di raccogliere informazioni di natura scientifica e
                    geografica. Notevole fu il suo contributo alla conoscenza dell’impero cinese e della sua cultura, che rese accessibile
                    all’occidente anche grazie alla redazione della prima grammatica della lingua cinese.
                    Il nostro istituto, che da sempre promuove diversi progetti nell’ambito dell’internazionalizzazione, prosegue idealmente
                    la missione di Martino Martini riconoscendo il valore fondamentale per la nostra società della conoscenza approfondita
                    del nuovo e del diverso e promuovendo la diffusione dei saperi tradizionali quale strumento ineludibile per la
                    <strong>formazione di cittadini consapevoli e responsabili.</strong></p>
                </div>
                <div class="col-sm-12 offset-md-1 col-md-5">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                </div>
            </div>
        </section>
    </div>
        
</main>



<?php
get_footer();
