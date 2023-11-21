<?php get_header(); ?>
<main id="main-container" class="main-container">

  <!-- HERO -->
  <?php
  get_template_part("martini-template-parts/hero/hero_page")
  ?>
  <!--#hero -->

  <!-- PRESENTAZIONE SCUOLA -->
  <section id="presentazione-scuola" class="container mt-5">

    <div class="row justify-content-between">

      <div id="container-presentazione" class="col-12 col-lg-6">

        <div id="nostro-istituto">

          <h2>Il nostro istituto</h2>
          <p>L’istituto Martino Martini è una scuola secondaria di 2° grado situata a Mezzolombardo, facilmente raggiungibile con i mezzi. Nell’istituto sono presenti <strong>8 indirizzi, 4 liceali e 4 tecnici.</strong> Gli indirizzi liceali sono: lo scientifico opzione <strong>scienze applicate</strong>, lo scientifico <strong>sportivo</strong>, lo scientifico internazionale <strong>quadriennale</strong> e il liceo delle <strong>scienze umane</strong> opzione socio-economica. Gli indirizzi tecnici sono: l'istituto economico opzione <strong>amministrazione finanza e marketing</strong>, l’istituto economico <strong>internazionale sportivo</strong>, l’istituto tecnologico opzione <strong>trasporti e logistica</strong> e opzione <strong>conduzione del mezzo aereo</strong>. L’orario delle lezioni è su <strong>cinque giorni</strong> (lu-ve) con la <strong>mensa</strong>. Le classi sono dislocate su due sedi: la recente sede di via Perlasca e l’edificio storico di via Filzi.
          </p>

        </div>
        <!--#nostro-istituto -->

        <div id="mission-vision">

          <h3>La scuola secondo noi</h3>
          <p>Grazie ai diversi indirizzi di studio, ciascuno dei quali offre alla comunità scolastica nuovi stimoli ed opportunità, l’Istituto ha fatto propria un’idea di scuola i cui valori si fondano su <strong>flessibilità, innovazione e personalizzazione</strong>. Attenti a cogliere le opportunità di miglioramento offerte dalle innovazioni, sia di natura tecnologica che metodologica, i docenti lavorano collegialmente da anni sulle tematiche dell’accoglienza e dell’inclusione, accettando la difficile sfida del successo formativo di tutti gli studenti.L’obiettivo è offrire ai ragazzi un ambiente di apprendimento <strong>sereno e motivante</strong>, ma nel contempo <strong>attento alla costruzione di competenze solide</strong>, indispensabili per il progetto di vita post-diploma e spendibili sia in ambito lavorativo che universitario.</p>

        </div>
        <!--#mission-vision -->

      </div>
      <!--#container-presentazione -->


      <div class="offset-lg-1 col-12 col-lg-4 order-1 order-lg-0 m-0">

        <h4>Utilità</h4>

        <div class="row mt-4 mt-lg-0">
          <div class="col-12 mt-lg-4">
            <a class="btn-lg-default w-100" href="registri" target="blank">
              <button>Registro Docenti</button>
            </a>
            <a class="btn-lg-default-outline w-100" href="https://www.martinomartini.eu/gestore/" target="blank">
              <button>GestOre</button>
            </a>
            <a class="btn-lg-default-outline w-100" href="https://servizi.martinomartini.eu/index.php/component/users/?view=login&Itemid=101" target="blank">
              <button>Area Riservata</button>
            </a>
            <?php
            // todo: Query homepage's list of buttons from database and not hardcoding it
            $show_orari = array(
              array(
                'term'  => 'docenti',
                'label' => 'Orario docenti'
              ),
              array(
                'term'  => 'classi',
                'label' => 'Orario classi'
              ),
            );
            foreach ($show_orari as $orario) {
              $term = get_term_by('slug', $orario['term'], ORARI_TAXONOMY);
              if ($term) {
                $term_link = get_term_link($term);
                if (!is_wp_error($term_link)) {
            ?>
                  <a class="btn-lg-default-outline w-100" href="<?php echo $term_link; ?>">
                    <button><?php echo $orario['label']; ?></button>
                  </a>
            <?php
                }
              }
            }
            ?>
            <a class="btn-lg-default-outline w-100" href="https://www.martinomartini.eu/dislocazione-aule/" target="blank">
              <button>Dislocazione aule</button>
            </a>
            <a class="btn-lg-default-outline w-100" href="https://www.martinomartini.eu/piano-delle-attivita/" target="blank">
              <button>Piano delle Attività</button>
            </a>
          </div>

          <!-- Calendar -->
          <div class="col-12">
            <?php echo do_shortcode('[calendar id="512"]'); ?>

            <a class="btn-lg-default-outline w-100" href="calendario">
              <button>Vedi il calendario completo</button>
            </a>
          </div>

        </div>
        <!--.row -->
      </div>

      <div id="button-navigazione" class="col-12 my-4">

        <div class="row mt-4 mt-lg-0">
          <div class="col-6 col-md-3 p-2">
            <a class="btn-lg-default-outline" href="didattica-2/offerta-formativa">
              <button>
                <span>DIDATTICA</span>
                <p class="mb-0">Offerta formativa</p>
              </button>
            </a>
          </div>

          <div class="col-6 col-md-3 pl-lg-0 p-2">
            <a class="btn-lg-default-outline" href="2-livello-ITE-serale">
              <button>
                <span>DIDATTICA</span>
                <p class="mb-0">Corso ITE serale</p>
              </button>
            </a>
          </div>

          <div class="col-6 col-md-3 p-2">
            <a class="btn-lg-secondary-outline" href="mi-oriento">
              <button>
                <span>SERVIZI</span>
                <p class="mb-0">miOriento</p>
              </button>
            </a>
          </div>

          <div class="col-6 col-md-3 p-2 pr-lg-1">
            <a class="btn-lg-secondary-outline" href="sportello-cic">
              <button>
                <span>SERVIZI</span>
                <p class="mb-0">Spazio Ascolto CIC</p>
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
  <section id="loop-news-home" class="container my-5">

    <div class="row">

      <!--LOOP NEWS  -->
      <div class="row col-12 col-lg-7 justify-content-center align-items-center mb-4 mb-lg-0">
        <h4 class="col-12">Ultime news </h4>
        <?php get_template_part("martini-template-parts/loop/loop-news-home") ?>
        <div class="col-12 p-lg-0 p-1 p-md-3 p-lg-0">
          <a class="btn-lg-default-outline w-100" href="novita/le-notizie/" class="col-12 p-0">
            <button class="m-0">Vai alla sezione</button>
          </a>
        </div>
      </div><!-- col-12 col-lg-7 -->

      <!--LOOP PROGETTI  -->
      <div class="row col-12 col-lg-4 offset-lg-1 justify-content-between p-md-3 p-1 p-lg-0">
        <h4 class="col-12">Alcuni dei nostri progetti </h4>
        <?php get_template_part("martini-template-parts/loop/loop-progetti-home") ?>

        <div class="col-12 align-items-end d-flex p-0">
          <a class="btn-lg-default-outline w-100" href="didattica/progetti/">
            <button class="m-0">Vedi tutti</button>
          </a>
        </div>
      </div><!-- col-12 col-lg-4 offset-lg-1 -->

    </div>
    <!--.row -->


    <!--SPAZI E STORIA  -->
    <section id="spazi-storia" class="container mt-5 mb-5">

      <div class="row mb-5">

        <div id="gli-spazi-img" class="col-lg-6 col-12 mb-3 mb-lg-0">

          <img class="w-100" src="/wp-content/uploads/2023/05/martini_home.001.jpeg" alt="">


        </div>
        <!--#gli-spazi-img -->

        <div id="gli-spazi-txt" class="col-lg-5 col-12 offset-lg-1">

          <h4>I luoghi</h4>
          <p>La scuola si compone di due sedi: la sede di via Perlasca e la sede di via Filzi. L’edificio di via Perlasca , costruito secondo criteri improntati al risparmio energetico e alla sostenibilità ambientale, ospita gli studenti in ambienti luminosi e spaziosi, con laboratori attrezzati, una grande palestra, un auditorium e ampi spazi verdi all’esterno. L’edificio di via Filzi, sede scolastica storica di Mezzolombardo, è stato di recente rinnovato per ospitare classi e laboratori dell’istituto in crescita negli ultimi anni scolastici. </p>
          <a class="btn-lg-default-outline" href="luoghi">
            <button class="w-auto">Scopri</button>
          </a>

        </div>
        <!--#gli-spazi-txt -->

      </div>
      <!--.row -->

      <div class="row">

        <div id="storia-img" class="d-lg-block d-none col-lg-5 col-12 mb-3 mb-lg-0 order-lg-2 offset-lg-2">

          <img class="w-100" src="/wp-content/uploads/2023/05/Portrait_of_Martino_Martini_by_Michaelina_Wautier-1-scaled.jpg" alt="">

        </div>
        <!--#storia-img -->

        <div id="storia-txt" class="col-lg-5 col-12">

          <h4>Martino Martini</h4>
          <p>Missionario gesuita nato nel 1614 a Trento, Martino Martini fu un noto geografo e cartografo che visse a lungo nella Cina imperiale, viaggiando entro i suoi confini allo scopo di raccogliere informazioni di natura scientifica e geografica. Notevole fu il suo contributo alla conoscenza dell’impero cinese e della sua cultura, che rese accessibile all’occidente anche grazie alla redazione della prima grammatica della lingua cinese.
            Il nostro istituto, che da sempre promuove diversi progetti nell’ambito dell’internazionalizzazione, prosegue idealmente la missione di Martino Martini riconoscendo il valore fondamentale per la nostra società della conoscenza approfondita del nuovo e del diverso e promuovendo la diffusione dei saperi tradizionali quale strumento ineludibile per la formazione di cittadini consapevoli e responsabili.</p>

        </div>
        <!--#storia-txt -->

      </div>
      <!--.row -->

    </section>
    <!--#spazi-storia .container -->

</main>

<?php get_footer(); ?>