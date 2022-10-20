<?php get_header(); ?>
<main id="main-container" class="main-container">

  <!-- HERO -->
  <section id="hero">
    <?php
    get_template_part("template-parts/hero/hero_page")
    ?>

  </section>
  <!--#hero -->

  <!-- PRESENTAZIONE SCUOLA -->
  <section id="presentazione-scuola" class="container mt-5">

    <div class="row justify-content-between">

      <div id="container-presentazione" class="col-12 col-lg-8">

        <div id="nostro-istituto">

          <h2>Il nostro istituto</h2>
          <p>L’istituto Martino Martini è una scuola secondaria di secondo grado sita nel comune di Mezzolombardo, facilmente raggiungibile attraverso i mezzi di trasporto. Nell’istituto sono presenti 8 indirizzi di studio, 4 di ambito liceale e 4 di ambito tecnico. Gli indirizzi liceali sono quelli del liceo scientifico opzione <strong>scienze applicate,</strong> del liceo <strong>scientifico sportivo,</strong> del liceo <strong>scientifico internazionale quadriennale</strong> e del liceo delle <strong>scienze umane</strong> opzione socio-economica. Gli indirizzi tecnici sono quelli dell'istituto economico opzione <strong>amministrazione finanza e marketing,</strong> dell’istituto economico internazionale sportivo, dell’istituto tecnologico opzione <strong>trasporti e logistica</strong> e dell’istituto tecnologico <strong>conduzione del mezzo aereo.</strong><br>Per tutti gli indirizzi l’orario delle lezioni è articolato su cinque giorni (dal lunedì al venerdì) con possibilità di accesso al servizio mensa in caso di prolungamento pomeridiano delle lezioni.. Le aule e i numerosi laboratori sono dislocati su due sedi: la sede di via Perlasca, di più recente costruzione, e l’edificio storico di via Filzi.

          </p>

        </div>
        <!--#nostro-istituto -->

        <div id="mission-vision">

          <h3>La scuola secondo noi</h3>
          <p>Grazie alla pluralità di indirizzi di studio che caratterizzano la nostra offerta formativa, ciascuno dei quali offre alla comunità scolastica nuovi stimoli ed opportunità, l’Istituto Martino Martini ha fatto propria un’idea di scuola i cui valori si fondano sulla flessibilità, sull’innovazione e sulla personalizzazione. Attenti a cogliere le opportunità di miglioramento offerte dalle innovazioni in campo didattico, sia di natura tecnologica che metodologica, i docenti del Martini lavorano collegialmente da anni sulle tematiche dell’accoglienza e dell’inclusione dei ragazzi, accettando la difficile sfida del successo formativo di tutti gli studenti.L’idea di fondo è quella di offrire ai ragazzi un ambiente di apprendimento sereno e motivante, ma nel contempo attento alla costruzione di competenze solide, indispensabili per il progetto di vita post-diploma e spendibili sia in ambito lavorativo che universitario.

          </p>

        </div>
        <!--#mission-vision -->

      </div>
      <!--#container-presentazione -->


      <div class="offset-lg-1 col-12 col-lg-3 order-1 order-lg-0 m-0 row">

        <h4>Area Docenti</h4>

        <div class="row mt-4 mt-lg-0">
          <a class="btn-lg-default w-100 col-12" href="#" target="blank">
            <button>Registro elettronico</button>
          </a>
          <a class="btn-lg-default-outline w-100 col-12" href="#" target="blank">
            <button>Orari docenti</button>
          </a>
          <a class="btn-lg-default-outline w-100 col-12" href="#" target="blank">
            <button>GestOre</button>
          </a>

          <!-- Calendar -->
          <div class="col-12">
            <?php echo do_shortcode('[calendar id="512"]'); ?>
          </div>

          <a class="btn-lg-default-outline w-100" href=#"">
            <button>Vedi il calendario completo</button>
          </a>

        </div>
        <!--.row -->
      </div>

      <div id="button-navigazione" class="col-12 my-4">

        <div class="row mt-4 mt-lg-0">

          <div class="col-6 col-md-3">

            <a class="btn-lg-default-outline" href="#" target="blank">

              <button>
                <span>DIDATTICA</span>
                <p class="mb-0">Corso ITE serale</p>
              </button>

            </a>

          </div>

          <div class="col-6 col-md-3">

            <a class="btn-lg-default-outline" href="https://martinomartini.local/didattica-2/offerta-formativa/" target="blank">

              <button>
                <span>DIDATTICA</span>
                <p class="mb-0">Offerta formativa</p>
              </button>

            </a>

          </div>

          <div class="col-6 col-md-3">

            <a class="btn-lg-secondary-outline" href="#" target="blank">

              <button>
                <span>SERVIZI</span>
                <p class="mb-0">Open days</p>
              </button>

            </a>

          </div>

          <div class="col-6 col-md-3">

            <a class="btn-lg-secondary-outline" href="#" target="blank">

              <button>
                <span>SERVIZI</span>
                <p class="mb-0">ASL</p>
              </button>

            </a>

          </div>

        </div>
        <!--.row -->

      </div>
      <!--#button-navigazione -->

    </div>
    <!--.row -->

  </section>
  <!--#presentazione-scuola .container-->

  <!-- LOOP -->
  <section id="loop-news-home" class="container">

    <div class="row mt-5 mt-lg-0 mr-0 ml-0">

        <!--LOOP NEWS  -->
        <div class="col-12 col-lg-7">
          <?php get_template_part("martini-template-parts/loop/loop-news-home") ?>
        </div><!-- col-12 col-lg-7 -->
        
        <!--LOOP PROGETTI  -->
        <div class="col-12 col-lg-4 offset-lg-1">
          <?php get_template_part("martini-template-parts/loop/loop-progetti-home") ?>
        </div><!-- col-12 col-lg-4 offset-lg-1 -->
        
    </div>
    <!--.row -->

  </section>
  <!--#loop-news-home .container -->

  <!--SPAZI E STORIA  -->
  <section id="spazi-storia" class="container mt-5 mb-5">

    <div class="row mb-5">

      <div id="gli-spazi-img" class="col-lg-6 col-12 mb-3 mb-lg-0">
      
        <img class="w-100" src="https://www.tandemconstruction.com/sites/default/files/styles/project_slider_main/public/images/project-images/IMG-Fieldhouse-10.jpg?itok=Whi8hHo9" alt="">


      </div>
      <!--#gli-spazi-img -->

      <div id="gli-spazi-txt" class="col-lg-5 col-12 offset-lg-1">

        <h4>Gli spazi</h4>
        <p>La scuola si compone di due sedi: la sede di via Perlasca e la sede di via Filzi. L’edificio di via Perlasca , costruito secondo criteri improntati al risparmio energetico e alla sostenibilità ambientale, ospita gli studenti in ambienti luminosi e spaziosi, con laboratori attrezzati, una grande palestra, un auditorium e ampi spazi verdi all’esterno. L’edificio di via Filzi, sede scolastica storica di Mezzolombardo, è stato di recente rinnovato per ospitare classi e laboratori dell’istituto in crescita negli ultimi anni scolastici. </p>
        <a class="btn-lg-default-outline" href="https://martinomartini.local/luogo/">
          <button class="w-auto">Scopri</button>
        </a>

      </div>
      <!--#gli-spazi-txt -->

    </div>
    <!--.row -->

    <div class="row">

      <div id="storia-img" class="col-lg-6 col-12 mb-3 mb-lg-0 order-lg-2 offset-lg-1">
        
        <img class="w-100" src="https://www.tandemconstruction.com/sites/default/files/styles/project_slider_main/public/images/project-images/IMG-Fieldhouse-10.jpg?itok=Whi8hHo9" alt="">

      </div>
      <!--#storia-img -->

      <div id="storia-txt" class="col-lg-5 col-12">

        <h4>Martino Martini</h4>
        <p>Missionario gesuita nato nel 1614 a Trento, Martino Martini fu un noto geografo e cartografo che visse a lungo nella Cina imperiale, viaggiando entro i suoi confini allo scopo di raccogliere informazioni di natura scientifica e geografica. Notevole fu il suo contributo alla conoscenza dell’impero cinese e della sua cultura, che rese accessibile all’occidente anche grazie alla redazione della prima grammatica della lingua cinese.
        Il nostro istituto, che da sempre promuove diversi progetti nell’ambito dell’internazionalizzazione, prosegue idealmente la missione di Martino Martini riconoscendo il valore fondamentale per la nostra società della conoscenza approfondita del nuovo e del diverso e promuovendo la diffusione dei saperi tradizionali quale strumento ineludibile per la formazione di cittadini consapevoli e responsabili.</p>
        <a class="btn-lg-default-outline" href="https://martinomartini.local/la-scuola-2/presentazione/">
          <button class="w-auto">Scopri</button>
        </a>

      </div>
      <!--#storia-txt -->

    </div>
    <!--.row -->

  </section>
  <!--#spazi-storia .container -->

</main>

<?php get_footer(); ?>