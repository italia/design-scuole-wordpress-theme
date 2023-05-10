<?php

$titolo_pagina = get_post_meta( get_the_ID(), '_dsi_indirizzo_corso_di_studio', true );


// LOS4
if( $titolo_pagina == 'opzione scienze applicate in 4 anni (LOS4)') { ?>  
    <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-purple">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>
    <?php
    }

else;


// LOS5
if( $titolo_pagina == 'opzione scienze applicate in 5 anni (LOS5)') { ?>
    <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-pink">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section><?php
    }

else;


// LIS
if( $titolo_pagina == 'sportivo (LIS)') { ?>
    <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-green">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section><?php
    }

else;


// LES
if( $titolo_pagina == 'opzione economico sociale (LES)') { ?>
   <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-red">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section><?php
    }

else;


// AFM-ALI
if( $titolo_pagina == 'Amministrazione finanza e marketing (AFM-ALI)') { ?>
    <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-orange">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section><?php
    }

else;


// indirizzo sportivo
if( $titolo_pagina == 'Amministrazione finanza e marketing (indirizzo sportivo)') { ?>
    <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-yellow">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section><?php
    }

else;



// TL
if( $titolo_pagina == 'Trasporti e logistica (TL)') { ?>
    <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-lightblue">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section><?php
    }

else;


// CM
if( $titolo_pagina == 'Conduzione del mezzo (CM)') { ?>
    <section>
        <div id="hero-indirizzi" class="container-fluid bg-martini-blue">
            <div id="content" class="row align-items-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1> <?php the_title(); ?> </h1>
                </div>
                <div id="icona-indirizzo" class="col-lg-2  text-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section><?php
    }

else;

?>