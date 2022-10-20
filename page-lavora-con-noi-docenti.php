<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>
<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/hero/hero_page"); ?>

    <section id="input-lavora-con-noi-docenti" class="container mt-5">
        <div class="row">

            <!-- NOME -->
            <div class="col-lg-5 col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Il/La sottoscritto/a*" aria-label="Nome">
                </div>
            </div>

            <!-- RESIDENZA -->
            <div class="col-lg-5 col-12 offset-lg-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Residenza a* (inserire il domicilio, se diverso dalla residenza)" aria-label="Residenza">
                </div>
            </div>

            <!-- NATO A -->
            <div class="col-lg-5 col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nato/a a*" aria-label="Luogo di nascita">
                </div>
            </div>

            <!-- NATO IL -->
            <div class="col-lg-5 col-12 offset-lg-1">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">il*</span>
                    <input type="date" class="form-control" placeholder="Nato/a a*" aria-label="Luogo di nascita">
                </div>
            </div>

            <!-- EMAIL -->
            <div class="col-lg-5 col-12">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                </div>
            </div>

            <!-- NUMERO DI CELLULARE -->
            <div class="col-lg-5 col-12 offset-lg-1">
                <div class="input-group mb-3">
                    <input type="number" class="form-control no-spin" placeholder="Numero di cellulare" aria-label="Telefono">
                </div>
            </div>

            <!-- TITOLO -->
            <div class="col-lg-5 col-12 mt-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Titolo di accesso alla/e classe/i di concorso richiesta/e*" aria-label="Titolo di accesso alla/e classe/i di concorso richiesta/e*">
                </div>
            </div>

            <!-- CLASSE DI CONCORSO -->
            <div class="col-lg-5 col-12 mt-3 offset-lg-1">
                <div class="input-group mb-3">
                    <label for="Classe/i di concorso richiesta/e per l'insegnamento*">Classe/i di concorso richiesta/e per l'insegnamento*</label>
                    <input type="search" placeholder="Cerca..." name="" id="">
                    <div class="container">
                        <!-- LOOP -->
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="checkbox" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="checkbox" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="checkbox" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="checkbox" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="checkbox" name="IDDAINSERIRE" id="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ABILITAZIONE ALL'INSEGNAMENTO -->
            <div class="col-lg-5 col-12 mt-3">
                <div class="input-group mb-3">
                    <label for="Classe/i di concorso richiesta/e per l'insegnamento*">Abilitazione all'insegnamento*</label>
                    <input type="search" placeholder="Cerca..." name="" id="">
                    <div class="container">
                        <!-- LOOP -->
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- CERTIFICAZIONI LINGUISTICHE -->
            <div class="col-lg-5 col-12 mt-3 offset-lg-1">
                <div class="input-group mb-3">
                    <label for="Possiede certificazioni linguistiche*">Possiede certificazioni linguistiche*</label>
                    <input type="search" placeholder="Cerca..." name="" id="">
                    <div class="container">
                        <!-- LOOP -->
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                        <div class="row">
                            <label for="IDDAINSERIRE">FDFFDFDFD</label>
                            <input type="radio" name="IDDAINSERIRE" id="">
                        </div>
                    </div>
                </div>
            </div>
           

            <!-- CARICA CV-->
            <div class="col-lg-5 col-12 mt-4">
                <label for=" Carica cv in formato europeo in formato pdf"> Carica cv in formato europeo in formato pdf</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Carica</label>
                </div>
            </div>

        </div><!-- Row -->
    </section>

</main>

<?php
get_footer();
