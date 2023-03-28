<?php get_header();
?>

<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-md-10">
                <h3 class="mb-4">I nostri indirizzi</h3>
                <p>L’istituto Martino Martini è una scuola secondaria di secondo grado sita nel comune di Mezzolombardo, facilmente raggiungibile attraverso i mezzi di trasporto. La sua offerta formativa comprende otto percorsi di studio, quattro liceali e quattro tecnici.</p>
                <p>Per tutti gli indirizzi l’orario delle lezioni è articolato su cinque giorni (dal lunedì al venerdì) con possibilità di accesso al servizio mensa in caso di prolungamento pomeridiano delle lezioni. Le aule e i numerosi laboratori sono dislocati su due sedi: la sede di via Perlasca, di più recente costruzione, e l’edificio storico di via Filzi. Grazie alla pluralità di indirizzi di studio che caratterizzano la nostra offerta formativa, ciascuno dei quali offre alla comunità scolastica nuovi stimoli ed opportunità, l’Istituto Martino Martini ha fatto propria un’idea di scuola i cui valori si fondano sulla flessibilità, sull'innovazione e sulla personalizzazione.</p>
                <p>Attenti a cogliere le opportunità di miglioramento offerte dalle innovazioni in campo didattico, sia di natura tecnologica che metodologica, i docenti del Martini la vorano collegialmente da anni sulle tematiche dell’accoglienza e dell’inclusione dei ragazzi, accettando la difficile sfida del successo formativo di tutti gli studenti. L’idea di fondo è quella di offrire ai ragazzi un ambiente di apprendimento sereno e motivante, ma nel contempo attento alla costruzione di competenze solide, indispensabili per il progetto di vita post-diploma e spendibili sia in ambito lavorativo che universitario.</p>
            </div>
        </div>
    </section>
       
    <section class="container bg-white pt-5 pb-3">
        <?php get_template_part('martini-template-parts/carousel/indirizzi', null, 'licei');?>
    </section>

    <section class="container bg-white py-5">
        <?php get_template_part('martini-template-parts/carousel/indirizzi', null, 'istituto');?>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-md-10">
                <h3 class="mb-4">Open Days</h3>
                <p>L’istituto Martino Martini organizza una serie di open days per consentire agli studenti di terza media e ai loro genitori di valutare la sua offerta formativa. Nei pomeriggi in cui apre le porte alle famiglie, i ragazzi possono partecipare ai laboratori di materie caratterizzanti per scoprirne l’oggetto di studio e per sperimentare le metodologie didattiche in uso al Martini. </p>
                <p>Nel mentre i genitori possono visitare gli stand allestiti in atrio e raccogliere informazioni sulle attività trasversali e i progetti promossi dalla scuola. Gli eventi si concludono con la presentazione di uno o più indirizzi (quadri orario, materie dominanti, sbocchi professionali e così via) e la visita alla struttura.</p>
            </div>
        </div>
    </section>

    <section class="section bg-primary_container py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h3 class="mb-4">Scopri le giornate degli Open days</h3>
                    <p class="mb-4">Ecco qua il nostro calendario con tutti gli appuntamenti e date.</p>
                </div>
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-end">
                    <a class="btn-lg-default" href="#" target="blank">
                        <button class="w-auto">Calendario Open Days</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container">
            <?php get_template_part('martini-template-parts/loop/loop-orientamento'); ?>
        </div>
    </section>

    <section class="section bg-primary_container py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h3 class="mb-4">Videoteca</h3>
                    <p class="mb-4">Ecco qua la nostra Videoteca.</p>
                </div>
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-end">
                    <a class="btn-lg-default" href="http://martinomartini.local/videoteca/" target="blank">
                        <button class="w-auto">Vedi tutti i video</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-md-10 referente">
                <h3 class="mb-4 referente__title">Referente Orientamento</h3>
                <p>Per l’anno scolastico in corso, il referente dell’orientamento terze medie è la prof.ssa Marta Leoni: <a href="mailto:marta.leoni@martinomartini.eu" target="_blank"> marta.leoni@martinomartini.eu </a></p>
                <p>La sua funzione consiste: <span id="dots"> ...</span></p>                
                <ul id="more" class="referente__list">
                    <li class="referente__list__item">nel programmare le varie attività di orientamento a favore degli studenti di terza media e dei loro genitori che li accompagnano in questo delicato passaggio del loro percorso formativo;</li>
                    <li class="referente__list__item">nel raccordarsi con le varie scuole medie del Trentino per assicurare loro l’intervento della Dirigente, dello stesso referente, di altri docenti o di studenti di uno o l’altro indirizzo di studi in base alle esigenze e ai desideri espressi e al tipo di iniziativa prevista presso le loro sedi;</li>
                    <li class="referente__list__item">nel raccordarsi in particolare con le scuole medie di Mezzolombardo, Mezzocorona e Lavis per raccogliere le aspettative e rispondere al meglio al bisogno di orientamento dei ragazzi del bacino naturale di utenza;</li>
                    <li class="referente__list__item">nel promuovere l’Istituto e/o le attività di orientamento tramite locandine da affiggere nei vari comuni trentini, articoli di giornale, spot alla radio, post nei social;</li>
                    <li class="referente__list__item">nell’organizzare incontri informativi, pomeridiani e serali, su caratteristiche, quadri orari, profilo in uscita e prospettive future dei vari indirizzi presenti nell’offerta formativa e, in particolare, degli indirizzi più innovativi o unici in provincia quali il Liceo scientifico quadriennale, il Liceo scientifico sportivo, gli indirizzi tecnologici Trasporti & Logistica e Conduzione del mezzo, gli indirizzi economici AFM con curvatura linguistico-informatica e con curvatura sportiva;</li>
                    <li class="referente__list__item">nel promuovere tra i docenti una didattica orientativa, motivandoli a svolgere alcuni laboratori orientativi prenotabili dagli studenti nei mesi antecedenti la scelta per comprendere quale indirizzo possa rispondere meglio alle proprie inclinazioni e aspettative e per “provare” le metodologie didattiche adottate dall’Istituto;</li>
                    <li class="referente__list__item">nel definire il calendario dei laboratori prenotabili e organizzarli da un punto di vista logistico;</li>
                    <li class="referente__list__item">nel promuovere e organizzare momenti laboratoriali specifici per indirizzo;</li>
                    <li class="referente__list__item">nell’organizzare gli open days, eventi pensati per permettere una full immersion nella struttura destinata a diventare il luogo dove proseguire gli studi;</li>
                    <li class="referente__list__item">nell’incontrare individualmente o a piccoli gruppi coloro che sono impossibilitati a partecipare alle attività di orientamento aperte a tutti;</li>
                    <li class="referente__list__item">nell’organizzare i test di ingresso, dalla fase della raccolta delle iscrizioni fino alla comunicazione degli esiti, passando attraverso le fasi della trasmissione delle informazioni dettagliate sui test, della stesura delle tracce e della somministrazione delle prove presso i laboratori informatici dell’Istituto.</li>
                </ul>
                <button onclick="readMore()" id="readMoreBtn">Leggi di più</button>
            </div>
        </div>
    </section>

</main>
<?php
get_footer();