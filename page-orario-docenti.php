<?php get_header(); ?>

<main id="main-container" class="main-container">

  <section class="container mt-5">

    <div class="row">

      <div class="col-12">

        <h1 class="primary">Orario docenti</h1>

        <div class="col-6 mt-4 d-none">

          <input type="text" name="orario professori" id="search-input-orario" class="form-control" placeholder="Cerca l'orario dei docenti" data-element="search-modal-input" aria-describedby="search-form" value="" data-focus-mouse="false" type="text">

          <?php get_search_form(); ?>


        </div><!-- col-12 -->

        <div class="col-6 mt-4 min-h">

          <input type="text" id="myInput" onkeyup="filtro_Docenti()" placeholder="Cerca orari docenti">

          <ul id="myUL">
            <?php
            $loop = new WP_Query(array(

              'post_type' => "orari-docenti",
              'post_status' => "publish",
              'post_per_page' => "99",
              'orderby' => "title",
              'order' => "ASC",

            ));

            while ($loop->have_posts()) : $loop->the_post();
            ?>

              <li><a href="#orari-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></li>

            <?php
            endwhile;
            ?>
            <div class="col-6">

              <?php
              while ($loop->have_posts()) : $loop->the_post();

                $file = get_post_meta(get_the_ID(), '_martini_orario_docenti_file_orari_docenti', true);
              ?>
              
                <img id="orari-<?php echo get_the_ID(); ?>" 
                src="<?php echo array_values($file)[0]; ?>" 
                alt="<?php the_title(); ?>"
                loading="lazy">

              <?php
              endwhile;
              ?>
            </div><!-- col-6 -->

          </ul>
        </div>

      </div><!-- col-12 -->

      <div class="col-lg-2 col-6 mt-4">

        <a class="btn-md-default-outline" href="#" target="blank">
          <button>
            Orario Classi
          </button>
        </a>

      </div><!-- col-6  -->

    </div> <!-- row -->

  </section><!-- container -->
  <script>
    function filtro_Docenti() {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
  </script>
</main>

<?php get_footer(); ?>