<?php get_header(); ?>
<main id="main-container" class="main-container">

  <section class="container mt-5">

    <div class="row">

      <div class="col-12">

        <h1 class="primary">Orario docenti</h1>

        <div class="col-6 mt-4">

          <input type="text" name="s" id="search-input-orario" data-element="search-modal-input" class="form-control" aria-describedby="search-form" placeholder="Cerca l'orario dei docenti" value="" data-focus-mouse="false" list=fruits>

          <datalist id="fruits">
            <option>Apple</option>
            <option>Banana</option>
            <option>Orange</option>
            <option>Pineapple</option>
            <option>Kiwi</option>
          </datalist>

        </div><!-- col-12 -->

      </div><!-- col-12 -->
      <div class="col-2 mt-4">

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