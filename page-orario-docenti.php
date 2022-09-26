<?php get_header(); ?>
<main id="main-container" class="main-container">

  <section class="container mt-5">

    <div class="row">

      <div class="col-12">

        <h1 class="primary">Orario docenti</h1>

        <div class="col-6 mt-4">

          <input type="text" name="orario professori" id="search-input-orario" class="form-control" placeholder="Cerca l'orario dei docenti" data-element="search-modal-input" aria-describedby="search-form" value="" data-focus-mouse="false" type="text">

          <?php get_search_form(); ?>


        </div><!-- col-12 -->

      </div><!-- col-12 -->
      <div class="col-12">
        
      </div>
      <div class="col-lg-2 col-6 mt-4">

        <a class="btn-md-default-outline" href="#" target="blank">
          <button>
            Orario Classi
          </button> 
        </a>

      </div><!-- col-6  -->

    </div> <!-- row -->

  </section><!-- container -->

</main>

<?php get_footer(); ?>