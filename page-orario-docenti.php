<?php
get_header();
?>

<main id="main-container-orario-docenti" class="main-container">

  <section class="container mt-5 mb-5">

    <div class="row">

      <div class="col-12">

        <h1 class="primary">Orario docenti</h1>

        <div class="col-6 mt-4 d-none">

          <input type="text" name="orario professori" id="search-input-orario" class="form-control" placeholder="Cerca l'orario dei docenti" data-element="search-modal-input" aria-describedby="search-form" value="" data-focus-mouse="false" type="text">

          <?php get_search_form(); ?>


        </div><!-- col-12 -->

        <div class="col-12 z-index-1">
        <!-- <div class="col-6 mt-4 min-h"> -->

          <input type="search" id="myInput" onkeyup="filtro_Docenti(!true)" placeholder="Cerca orario docenti" autocomplete="off">

          <!-- <ul id="myUL" class="row-cols-4 row"> -->
          <ul id="myUL" class="">
            <?php
            $loop = new WP_Query(array(

              'post_type' => "orario-docenti",
              'post_status' => "publish",
              'post_per_page' => "99",
              'orderby' => "title",
              'order' => "ASC",

            ));
            {
              # code...
              while ($loop->have_posts()) : $loop->the_post();
            ?>

                <li><a href="#orario-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></li>

            <?php
              endwhile;
            }
            ?>

          </ul>
        </div>
        <div class="col-12 z-index-0">

        <span id="ancoraggio"></span>

          <?php
          while ($loop->have_posts()) : $loop->the_post();

            $file = get_post_meta(get_the_ID(), '_martini_orario_docenti_file_orari_docenti', true);
          ?>
              <img id="orario-<?php echo get_the_ID(); ?>" src="<?php echo array_values($file)[0]; ?>" alt="<?php the_title(); ?>" loading="lazy">
          <?php
          endwhile;
          ?>
        </div><!-- col-12 -->

      </div><!-- col-12 -->

      <div class="col-lg-2 col-6 mt-4">
        <?php
        $post = get_page_by_path('orario-classi');
        ?>

        <a class="btn-md-default-outline" href="<?php echo get_permalink(); ?>">
          <button>
            Orario Classi
          </button>
        </a>

      </div><!-- col-6  -->

    </div> <!-- row -->

  </section><!-- container -->
  <script>
    function filtro_Docenti({
      doHighlight
    }) {
      // Declare variables
      var input, filter, ul, li, a, i, re, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');
      re = new RegExp(filter, 'gi');

      let text = filter;
      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
          // if (!doHighlight) continue;
          text = a.innerHTML.replace(/(<mark class="highlight">|<\/mark>)/gim, '')
          a.innerHTML = filter.length ?
            text.replace(re, '<mark class="highlight">$&</mark>') :
            text;

        } else {
          li[i].style.display = "none";
        }
      }
    }
  </script>
</main>

<?php get_footer(); ?>