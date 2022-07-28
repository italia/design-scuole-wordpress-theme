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
    

        <div id="sidebar-presentazione" class="offset-lg-1 col-12 col-lg-3">
          <a href="#" target="blank"><button >Registro elettronico</button></a>
          <a href="#" target="blank"><button href="#" target="blank">Orari docenti</button></a>
          <a href="#" target="blank"><button href="#" target="blank">GestOre</button></a>

          <frame> 
            <!--QUI CI VA IL CALENDARIO  -->
          </frame>
        </div><!--#sidebar-presentazione -->
        
        <div id="button-navigazione" class="col-12"> 
          <div class="row">
            <div class="col-3" id="btn-block"><a href="#" target="blank"><button href="#" target="blank">DIDATTICA <h6>Corso ITE serale</h6></button></a></div>
            <div class="col-3" id="btn-block"><a href="#" target="blank"><button >DIDATTICA <h6>Offerta formativa</h6></button></a></div>
            <div class="col-3" id="btn-block"><a href="#" target="blank"><button href="#" target="blank">SERVIZI <h6>Open day</h6></button></a></div>
            <div class="col-3" id="btn-block"><a href="#" target="blank"><button href="#" target="blank">SERVIZI <h6>ASL</h6></button></a></div>
          </div>
        </div><!--.row -->
      </div><!--#button-navigazione -->
    </section><!--#presentazione-scuola .container-->
   
    <!--LOOP NEWS  -->
    <section id="loop-news-home" class="container"> 
      <div class="row">
        <div id="ultime-news-home" class="col-12 col-lg-8">
          <h4>Ultime news </h4>
            <div class="row"></div>
              <?php 
              while ($loop -> have_posts()) : $loop -> the_post(); ?> 
              <article> 
                  <div class="row">
                    
                  </div>        
                  <div class="row">

                  </div>        
              </article> 
          <?php endwhile; ?>
    
              ?>
              </div>
        </div>

        <div id="ultime-news-home" class="col-12 col-lg-3">
          <h4>Alcuni dei nostri progetti </h4>
          <!-- INSERIRE QUERY LOOP -->
        </div>
      </div><!--.row -->
    </section><<!--#loop-news-home -->
    
    <!--SPAZI E STORIA  -->
    <section id="spazi-storia" class="container"> 
      <div class="row">
        <div id="gli-spazi-img" class="col-6">
          <img id="w100" src="https://www.tandemconstruction.com/sites/default/files/styles/project_slider_main/public/images/project-images/IMG-Fieldhouse-10.jpg?itok=Whi8hHo9" alt="">
        </div><!--#gli-spazi-img -->

        <div id="gli-spazi-txt w100" class="col-6">
          <h4>Il nostro istituto</h4>
          <p>L’istituto Martino Martini è una scuola secondaria di secondo grado sita nel comune di Mezzolombardo, facilmente raggiungibile attraverso i mezzi di trasporto.
          Nell’istituto sono presenti 8 indirizzi di studio, 4 di ambito liceale e 4 di ambito tecnico.</p>
          <a href="#" target="blank"><button href="#" target="blank">Scopri</button></a>
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
          <a href="#" target="blank"><button href="#" target="blank">Scopri</button></a>
        </div><!--#storia-txt -->
      </div><!--.row -->
    </section><!--#spazi-storia .container -->
  </main>
  <?php
get_footer();
