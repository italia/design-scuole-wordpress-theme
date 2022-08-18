<?php

get_header();
?>
  <main id="main-container" class="main-container petrol">
  
  <!-- HERO -->  
  <section id="hero"> 

      <?php
      get_template_part("template-parts/hero/hero-page")
      ?>
      
    </section><!--#hero -->
    
    <!-- PRESENTAZIONE SCUOLA -->
    <section id="presentazione-scuola" class="container"> 
      <div class="row">
        <div id="container-presentazione" class="col-12 col-lg-8">
          <div id="nostro-istituto">
            <h4>Il nostro istituto</h4>
            <p>L’istituto Martino Martini è una scuola secondaria di secondo grado sita nel comune di Mezzolombardo, facilmente raggiungibile attraverso i mezzi di trasporto.
            Nell’istituto sono presenti 8 indirizzi di studio, 4 di ambito liceale e 4 di ambito tecnico.</p>
          </div><!--#nostro-istituto -->
      
      
          <div id="mission-vision">
            <h4>La scuola secondo noi</h4>
            <p>Grazie alla pluralità di indirizzi di studio che caratterizzano la nostra offerta formativa, ciascuno dei quali offre alla comunità scolastica nuovi stimoli ed opportunità, l’Istituto Martino Martini ha fatto propria un’idea di scuola i cui valori si fondano sulla <strong>flessibilità,</strong> sull’<strong>innovazione</strong> e sulla <strong>personalizzazione.</strong>
              Attenti a cogliere le opportunità di miglioramento offerte dalle innovazioni in campo didattico, sia di natura tecnologica che metodologica, i docenti del Martini lavorano collegialmente da anni sulle tematiche dell’accoglienza e dell’inclusione dei ragazzi, accettando la difficile sfida del successo formativo di tutti gli studenti.
              L’idea di fondo è quella di offrire ai ragazzi un ambiente di apprendimento sereno e motivante, ma nel contempo attento alla costruzione di competenze solide, indispensabili per il progetto di vita post-diploma e spendibili sia in ambito lavorativo che universitario.
              </p>
          </div><!--#mission-vision -->
        </div><!--#container-presentazione -->
    

        <div id="sidebar-presentazione" class="offset-lg-1 col-12 col-lg-3 order-1 order-lg-0">
          <h4 class="d-lg-none">Area Docenti</h4>
            <div class="row">
              <a id="btn-lg-default" href="#" target="blank" class="col-12">
                <button>Registro elettronico</button>
              </a>
              <a id="btn-lg-default-outline" href="#" target="blank" class="col-12">
                <button>Orari docenti</button>
              </a>
              <a id="btn-lg-default-outline" href="#" target="blank" class="col-12">
                <button>GestOre</button>
              </a>
            </div><!--.row -->

          <frame> 
            <!--QUI CI VA IL CALENDARIO  -->
          </frame>
        </div><!--#sidebar-presentazione -->
        
        <div id="button-navigazione" class="col-12"> 
        <h4 class="d-lg-none">Scopri di più</h4>
          <div class="row">
            <div class="col-6 col-md-3">
              <a id="btn-lg-default-outline" href="#" target="blank">
                  <button><p>DIDATTICA</p> <span>Corso ITE serale</span></button>
              </a>
            </div>
            <div class="col-6 col-md-3">
              <a id="btn-lg-default-outline" href="#" target="blank">
                <button><p>DIDATTICA</p> <span>Offerta formativa</span></button>
              </a>
            </div>
            <div class="col-6 col-md-3">
              <a id="btn-lg-secondary-outline" href="#" target="blank">
                <button><p>SERVIZI</p> <span>Open day</span></button>
              </a>
            </div>
            <div class="col-6 col-md-3">
              <a id="btn-lg-secondary-outline" href="#" target="blank">
                <button><p>SERVIZI</p> <span>ASL</span></button>
              </a>
            </div>
          </div><!--.row -->
        </div><!--#button-navigazione -->
      </div><!--.row -->
    </section><!--#presentazione-scuola .container-->
   
    <!--LOOP NEWS  -->
    <section id="loop-news-home" class="container"> 

      <div class="row">
        <div class="col-7">
          <h4>Ultime news </h4>
          <div class="row">
          
        
            <?php
              $loop = new WP_Query( array( 
                'post_type'         => 'post', 
                'post_status'       => 'publish', 
                'orderby'           => 'count', 
                'order'             => 'DESC', 
                'posts_per_page'    => 3,)
              );
            
              while ($loop -> have_posts()) : $loop -> the_post(); ?> 

              <article class="col-4 card"> 
                <a href="<?php the_permalink();?>">
                  <div class="card-bg">
                    <div class="card-img-top card-img"> <?php the_post_thumbnail("news-thumb");?> </div>
                    <div class="card-body">
                      <p class="card-title text-sx"> <?php the_title(); ?> </p>
                      <a href="#" id="btn-mini-default"> <button class="wauto"> Scopri </button> </a>
                    </div><!--.card-body -->
                  </div><!--.card-bg -->
                </a>  
              </article> <!--.card -->
            <?php endwhile; ?>

          </div><!--.row -->
          
          <a id="btn-lg-default-outline mx-0" href="#" target="blank" class="col-12">
            <button>Vai alla sezione</button>
          </a>
        </div><!--col-8-->

        <!--LOOP PROGETTI  -->
        <div class="col-4 offset-1">
          <h4 >Alcuni dei nostri progetti </h4>
          <div class="row">

          <?php
              $loop = new WP_Query( array( 
                'post_type'         => 'post', 
                'post_status'       => 'publish', 
                'orderby'           => 'count', 
                'order'             => 'DESC', 
                'posts_per_page'    => 2,)
              );
            
              while ($loop -> have_posts()) : $loop -> the_post(); ?> 

              <article class="col-12"> 
                <div class="row">
                <a href="<?php the_permalink();?>">
                  <div class="col-4">
                    <?php the_post_thumbnail("project-thumb");?> 
                  </div>
                </a>
                  <div class="col-8">
                  <a href="<?php the_permalink();?>">
                    <h5><?php the_title(); ?></h5>
                  </a>
                  <a href="<?php the_permalink();?>">
                    <p><?php the_excerpt($length); ?></p>
                  </a>
                  </div><!--.col-8 -->
                </div><!--.row -->
              
              </article><!--.col-12 -->
            <?php endwhile; ?>
            
            <div class="col-12">
              <a id="btn-lg-default-outline" href="#" target="blank">
                <button>Vedi tutte</button>
              </a>
            </div><!--.col-12 -->
          </div><!--.row -->

        </div><!--col-3 offset-1 -->
      </div> <!--.row -->
    </section><!--#loop-news-home .container -->
    
    <!--SPAZI E STORIA  -->
    <section id="spazi-storia" class="container"> 
      <div class="row rem5">
        <div id="gli-spazi-img" class="col-6">
          <img id="w100" src="https://www.tandemconstruction.com/sites/default/files/styles/project_slider_main/public/images/project-images/IMG-Fieldhouse-10.jpg?itok=Whi8hHo9" alt="">
        </div><!--#gli-spazi-img -->

        <div id="gli-spazi-txt" class="col-6">
          <h4>Il nostro istituto</h4>
          <p>L’istituto Martino Martini è una scuola secondaria di secondo grado sita nel comune di Mezzolombardo, facilmente raggiungibile attraverso i mezzi di trasporto.
          Nell’istituto sono presenti 8 indirizzi di studio, 4 di ambito liceale e 4 di ambito tecnico.</p>
          <a id="btn-lg-default" href="#" target="blank"><button class="wauto">Scopri</button></a>
        </div><!--#gli-spazi-txt -->
      </div><!--.row -->
      
      <div class="row">
        <div id="storia-img" class="col-6 order-lg-2">
          <img id ="w100"src="https://www.tandemconstruction.com/sites/default/files/styles/project_slider_main/public/images/project-images/IMG-Fieldhouse-10.jpg?itok=Whi8hHo9" alt="">
        </div><!--#storia-img --> 
        <div id="storia-txt" class="col-6">
          <h4>La storia di Martino Martini</h4>
          <p>Missionario gesuita nato nel 1614 a Trento, Martino Martini fu un noto geografo e cartografo che visse a lungo nella Cina imperiale, viaggiando entro i suoi confini allo scopo di raccogliere informazioni di natura scientifica e geografica. 
          Il nostro istituto, che da sempre promuove diversi progetti nell’ambito dell’internazionalizzazione, prosegue idealmente la missione di Martino Martini riconoscendo il valore fondamentale per la nostra società della conoscenza approfondita del nuovo e del diverso e promuovendo la diffusione dei saperi tradizionali quale strumento ineludibile per la formazione di cittadini consapevoli e responsabili.</p>
          <a id="btn-lg-default" href="#" target="blank"><button class="wauto">Scopri</button></a>
        </div><!--#storia-txt -->
      </div><!--.row -->
    </section><!--#spazi-storia .container -->
  </main>
  <?php
get_footer();
