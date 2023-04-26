<?php

$titolo_pagina = get_post_meta( get_the_ID(), '_dsi_indirizzo_corso_di_studio', true );


// LOS4
if( $titolo_pagina == 'opzione scienze applicate in 4 anni (LOS4)') { ?>  
    <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-purple">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;


// LOS5
if( $titolo_pagina == 'opzione scienze applicate in 5 anni (LOS5)') { ?>
    <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-pink">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;


// LIS
if( $titolo_pagina == 'sportivo (LIS)') { ?>
    <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-green">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;


// LES
if( $titolo_pagina == 'opzione economico sociale (LES)') { ?>
   <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-red">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;


// AFM-ALI
if( $titolo_pagina == 'Amministrazione finanza e marketing (AFM-ALI)') { ?>
    <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-orange">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;


// indirizzo sportivo
if( $titolo_pagina == 'Amministrazione finanza e marketing (indirizzo sportivo)') { ?>
    <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-yellow">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;



// TL
if( $titolo_pagina == 'Trasporti e logistica (TL)') { ?>
    <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-lightblue">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;


// CM
if( $titolo_pagina == 'Conduzione del mezzo (CM)') { ?>
    <article class="col-lg-3 mt-5">

        <div class="text-center row bg-martini-blue">

            <div class="open-day-foto col-12">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="open-day-title col-12">
                <?php the_title(); ?>
            </div>
            
        </div>

    </article>
    <?php
    }

else;

?>